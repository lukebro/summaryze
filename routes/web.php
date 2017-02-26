<?php

use App\Summary;
use App\Summaryzer;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/summaryze', function () {

	$uri = request('uri');

	if (strpos($uri, 'http') === false) {
    	$uri = 'http://' . $uri;
	}
	
	$temp = Summary::where('uri', $uri)->first();

	if ($temp) {
		return redirect()->route('summary', $temp->id);
	}

	$client = new Client([
		'base_uri' => $uri
	]);

	try {
		$response = $client->request('GET');
	} catch (Exception $e) {
		return redirect()->route('500');
	}

	$crawler = new Crawler((string) $response->getBody());

	$attributes = (new Summaryzer($crawler))->summary();

	$summary = Summary::create($attributes + ['uri' => $uri]);

	return redirect()->route('summary', $summary->id);

})->name('summaryze');

Route::get('500', function () {
	return view('errors.500')->withTitle('500 Error');
})->name('500');

Route::get('{summary}', function (Summary $summary) {
	return view('summary', [
		'summary' => $summary,
	])->withTitle($summary->uri);
})->name('summary');


