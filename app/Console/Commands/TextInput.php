<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TextInput extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'text:input {--word=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Text input words';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
	    $args = $this->option('word');
	    File::put(public_path('words.txt'), json_encode($args));
		echo   'Added '.count($args).' words.';
    }
}
