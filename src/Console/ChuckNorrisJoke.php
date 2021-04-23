<?php
namespace Manojksrivastava\ChuckNorrisJokes\Console;

use Illuminate\Console\Command;
use Manojksrivastava\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisJoke extends Command
{
    protected $signature = 'chuck-norris';
    protected $description = 'Output a funny Chuck Norris joke.';
    public function handle()
    {
        $this->info(ChuckNorris::getRandomJoke());
    }
}