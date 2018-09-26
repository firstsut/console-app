<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class TextOutput extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'text:output {--condition=?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Text output words by condition';

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
	    $args = $this->option('condition');
	    $data = [];
	    if(file_exists(public_path('words.txt'))){
			$data = json_decode(File::get(public_path('words.txt')),true);
	    }
		switch ($args){
			case 'all' :
				echo $this->readData($data);
				break;
			case 'first' :
				if(count($data) > 0){
					echo $this->readData([$data[0]]);
				}else{
					echo $this->readData(['']);
				}
				break;
			case 'last' :
				if(count($data) > 0){
					echo $this->readData([$data[count($data) - 1]]);
				}else{
					echo $this->readData(['']);
				}
				break;
			default :
				echo 'Param value not match [all,first,last]';
				break;
		}
    }

    private function readData($data){
    	$txt = count($data) > 0 ? implode(",",$data) : '';
		return 'Data: '.$txt;
    }

}
