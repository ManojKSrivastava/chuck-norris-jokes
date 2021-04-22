<?php
namespace Manojksrivastava\ChuckNorrisJokes;

use Carbon\Laravel\ServiceProvider;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }
    public function register()
    {
        $this->app->bind('chuck-norris', function() {
            return new JokeFactory();
        });
    }
}