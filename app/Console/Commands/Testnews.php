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

class Testnews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testnews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test News';

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
        try{
            $client=new \GuzzleHttp\Client();
            $response=$client->get("https://newsapi.org/v2/top-headlines?sources=fox-news&apiKey=fa1790410a29459786c4f779b1a1b409");
            $json=json_decode($response->getBody(),true);
            foreach($json['articles'] as $article)
            {
                $this->info($article['title']);
            }

            Cache::forever('test-news',$json['articles'],60);

        }catch(\GuzzleHttp\Exception\ClientException $ce){
              $this->error('client exception');
        }catch(\GuzzleHttp\Exception\RequestException $re){
              $this->error('request exception');
        }catch(\Exception $e){
              $this->error('basic errors');
        }
        

    }
}
