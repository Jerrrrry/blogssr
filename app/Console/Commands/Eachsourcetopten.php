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


class Eachsourcetopten extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eachsourcetopten';

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
        if(Cache::has('news-sources'))
        {
            $sources=Cache::get('news-sources');
            foreach($sources as $source)
            {
                try{
                    $this->info($source['name']);
                    $id=$source['id'];
                    $client=new \GuzzleHttp\Client();
                    $response=$client->get("https://newsapi.org/v2/top-headlines?sources=$id&apiKey=fa1790410a29459786c4f779b1a1b409");
                    $json=json_decode($response->getBody(),true);
                    if($json['status']=='ok'&&$json['articles'])
                    {
                        foreach($json['articles'] as $article)
                        {
                            $this->info($article['title']);
                        }
                        Cache::forever("toplines-$id",$json['articles']);
                    }
                    
        
                }catch(\GuzzleHttp\Exception\ClientException $ce){
                      $this->error('client exception');
                }catch(\GuzzleHttp\Exception\RequestException $re){
                      $this->error('request exception');
                }catch(\Exception $e){
                      $this->error('basic errors');
                }
            }
        }else{
            $this->error('no sources available');
        }
    }
}
