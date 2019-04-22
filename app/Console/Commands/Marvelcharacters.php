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
        $url="https://gateway.marvel.com:443/v1/public/characters?offset=100&apikey=a056a00ff900c56d29c9f431dbe66752";
        try{
            $client=new \GuzzleHttp\Client();
            $response=$client->get($url);
            $json=json_decode($response->getBody(),true);
            print_r($json);

        }catch(\GuzzleHttp\Exception\ClientException $ce){
              $this->error($ce->getMessage());
        }catch(\GuzzleHttp\Exception\RequestException $re){
              $this->error('request exception');
        }catch(\Exception $e){
              $this->error('basic errors');
        }
    }
}
