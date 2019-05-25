<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Helper;
use Cache;

class Slidercache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slidercache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate sliders cache';

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
            $response=$client->get("https://loveplanet.live/wp-json/wp/v2/posts?per_page=6&page=1");
            $data=[];
            $results=json_decode($response->getBody(),true);
            foreach($results as $result)
            {
              $imageid=$result['featured_media'];
              $data[]=array(
                'data'=>$result,
                'image'=>Helper::featureFullImage($imageid),
              );
            }
            Cache::forever('slidercache',$data);
          }catch(\GuzzleHttp\Exception\ClientException $ce){
            $this->error($ce->getMessage());
          }catch(\GuzzleHttp\Exception\RequestException $re){
            $this->error($re->getMessage());
          }catch(\Exception $e){
            $this->error($e->getMessage());
          }
    }
}
