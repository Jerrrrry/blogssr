<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \GuzzleHttp\Client;
use \GuzzleHttp\Exception\ClientException;
use \GuzzleHttp\Promise as Promise;
use \Psr\Http\Message\ResponseInterface;
use \GuzzleHttp\Exception\RequestException;
use Helper;
use Carbon\Carbon;
use Cache;

class Newssources extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newssources';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch All News Sources';

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
        //https://newsapi.org/v2/sources?language=en&country=us&apiKey=fa1790410a29459786c4f779b1a1b409

        try{
            $client=new \GuzzleHttp\Client();
            $response=$client->get("https://newsapi.org/v2/sources?language=en&country=us&apiKey=fa1790410a29459786c4f779b1a1b409");
            $json=json_decode($response->getBody(),true);
            foreach($json['sources'] as $source)
            {
                $this->info($source['name']);
            }

            Cache::forever('news-sources',$json['sources']);

        }catch(\GuzzleHttp\Exception\ClientException $ce){
              $this->error('client exception');
        }catch(\GuzzleHttp\Exception\RequestException $re){
              $this->error('request exception');
        }catch(\Exception $e){
              $this->error('basic errors');
        }
    }
}
