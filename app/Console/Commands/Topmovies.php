<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Helper;
use Cache;

class Topmovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'topmovies';

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
        $per_page=20;
        $query="per_page=$per_page&&categories=44";
        
        try{

            $client=new \GuzzleHttp\Client();
            $response=$client->get("https://loveplanet.live/wp-json/wp/v2/posts?$query");
            //return $response->getHeaders()['X-WP-TotalPages'];
            $data=[];
            $results=json_decode($response->getBody(),true);
            //return $totalpages;
            foreach($results as $result)
            {
                $time=Carbon::parse($result['date']);
                $this->info($result['slug']);
                $imageid=$result['featured_media'];
                $data[]=array(
                'data'=>$result,
                'image'=>Helper::featureMediumImage($imageid),
                'date'=>$time->day,
                'month'=>$time->format('F'),
                );
            }
            Cache::forever('topmovies',$data);
            
        }catch(\GuzzleHttp\Exception\ClientException $ce){
            $this->error($ce->getMessge());
        }catch(\GuzzleHttp\Exception\RequestException $re){
            $this->error($rs->getMessge());
        }catch(\Exception $e){
            $this->error($e->getMessge());
        }
    }
}
