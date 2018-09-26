<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TextSearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'text:search {--word=?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Text search words by substring';

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
	    $data = [];
	    $str = [];
	    if(file_exists(public_path('words.txt'))){
		    $data = json_decode(File::get(public_path('words.txt')),true);
	    }
		foreach($data as $txt){
			if(strpos($txt,$args) !== false){
				array_push($str,$txt);
			}
		}
		echo 'Result: '.(count($str) > 0 ? implode(',',$str) : '');
    }
}
