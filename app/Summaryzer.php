<?php

namespace App;

use Symfony\Component\DomCrawler\Crawler;

class Summaryzer {

	protected $crawler;

	public function __construct(Crawler $crawler)
	{
		$this->crawler = $crawler;
	}

	public function summary()
	{
		$summary = [];
		foreach ($this->details() as $detail) {
			$summary[$detail->name] = $detail->execute($this->crawler->filter($detail->selector));
		}

		return $summary;
	}

	protected function details()
	{
		$content = function ($c) { return $c->attr('content'); };

		return [
			new Detail('title', 'title'),
			new Detail('description', 'meta[name="description"]', $content),
			new Detail('excerpts', 'p', function ($c) { return $c->each(function ($c) { return $c->text(); }); }),
			new Detail('keywords', 'meta[name="keywords"]', $content),
			new Detail('images', 'img[src^="http"]', function ($c) { return $c->each(function ($c) { return $c->attr('src'); });})
		];
	}

}