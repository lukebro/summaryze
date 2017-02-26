<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $fillable = [
    	'title',
    	'description',
    	'keywords',
    	'images',
    	'uri',
	    'excerpts',
    ];

    protected $casts = [
    	'images' => 'array',
    	'excerpts' => 'array',
    ];

    public function getKeywordsAttribute($keywords)
    {
    	if ($keywords) {
    		return explode(', ', $keywords);
    	}

    	return null;
    }

    public function randomColor()
    {
    	$colors = ['primary', 'info', 'warning', 'danger', 'light', 'dark'];

    	return $colors[rand(0, count($colors) - 1)];
    }
}
