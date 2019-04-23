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


class Marvelcharacters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marvel';

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
        //
        
        $url=Helper::urlAuth("https://gateway.marvel.com:443/v1/public/characters?");

        $pages=[];
        try{
            $client=new \GuzzleHttp\Client();
            $response=$client->get($url);
            $json=json_decode($response->getBody(),true);

            $total=$json['data']['total'];
            $this->info(floor($total/100));
            //$offset=$json['data']['offset'];
            //$this->info($offset);
            for($n=0;$n<=floor($total/100);$n++)
            {
                $offset=$n*100;
                $newurl=Helper::urlAuth("https://gateway.marvel.com:443/v1/public/characters?")."&offset=$offset&limit=100";
                
                $client=new \GuzzleHttp\Client();
                $response=$client->get($newurl);
                $json=json_decode($response->getBody(),true);
                foreach($json['data']['results'] as $hero)
                {
                    $this->info($hero['name']);
                    $id=$hero['id'];
                    Cache::forever("mc-$id",$hero);

                }

                $pages[]=$json['data']['results'];
            }

            Cache::forever('herospage',$pages);

        }catch(\GuzzleHttp\Exception\ClientException $ce){
              $this->error($ce->getMessage());
        }catch(\GuzzleHttp\Exception\RequestException $re){
              $this->error('request exception');
        }catch(\Exception $e){
              $this->error('basic errors');
        }
    }
}
