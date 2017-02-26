<?php

namespace App;

use Symfony\Component\DomCrawler\Crawler;

class Detail {

	public $name;

	public $selector;

	public $callback;

	public function __construct($name, $selector, $callback = null){
		$this->name = $name;
		$this->selector = $selector;

		$this->callback = $callback ?: function ($c) { return $c->text(); };
	}

	public function execute(Crawler $crawler)
	{
		if ($crawler->count()) {
			return ($this->callback)($crawler);
		}

		return null;
	}

}