<?php

namespace Djmitry\Youtube;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class YoutubeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('youtube', function($params) {
            $params = explode(', ', $params);
            $src = $params[0];
            $w = !empty($params[1]) ? $params[1] : 560;
            $h = !empty($params[2]) ? $params[2] : 312;
            return '<iframe width="' . $w . '" height="' . $h . '" src="https://www.youtube.com/embed/' . $src . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        });
    }   
}