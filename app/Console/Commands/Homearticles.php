<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Helper;
use Cache;


class Homearticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'homearticles';

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
        
        $per_page=9;
        $query="per_page=$per_page&&categories=7";
        
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
                //get image
                //$client = new \GuzzleHttp\Client(['base_uri' => 'http://loveplanet.live/wp-json/wp/v2/']);
                $imageid=$result['featured_media'];
                $data[]=array(
                'data'=>$result,
                'image'=>Helper::featureMediumImage($imageid),
                'date'=>$time->day,
                'month'=>$time->format('F'),
                );
            }
            Cache::forever('homearticles',$data);
            
        }catch(\GuzzleHttp\Exception\ClientException $ce){
            $this->error($ce->getMessge());
        }catch(\GuzzleHttp\Exception\RequestException $re){
            $this->error($rs->getMessge());
        }catch(\Exception $e){
            $this->error($e->getMessge());
        }
    }
}
