<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloWorld extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello:world';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hello world command created to test the command system';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        dd('Hello, this is my logic for the command.');
        return 0;
    }
}
