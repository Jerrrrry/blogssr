<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Cache;

class Rose extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rose';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $files=scandir('/var/www/html/blogssr/public/storage/rosedata/lists');
        $roses=[];
        foreach($files as $file)
        {
            if($file!=='.'&&$file!=="..")
            {
                $roses[]=json_decode('/var/www/html/blogssr/public/storage/rosedata/lists/'.$file.'.json',true);
                $this->info($file);
                Cache::forever("rose*$file",json_decode('/var/www/html/blogssr/public/storage/rosedata/lists/'.$file.'.json',true));
            }
        }
        Cache::forever('allroses',$roses);

    }
}
