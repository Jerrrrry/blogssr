<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use \GuzzleHttp\Exception\ClientException;
use \GuzzleHttp\Promise as Promise;
use \Psr\Http\Message\ResponseInterface;
use \GuzzleHttp\Exception\RequestException;
use Helper;
use Carbon\Carbon;

class PageController extends Controller
{
  public function about(){
    return view('about');
  }

  public function contact()
  {
    return view('contact');
  }

  public function index()
  {

    try{

      $client=new \GuzzleHttp\Client();
      $response=$client->get("https://loveplanet.live/wp-json/wp/v2/posts?per_page=6&page=1");
      //return $response->getHeaders()['X-WP-TotalPages'];
      $data=[];
      $results=json_decode($response->getBody(),true);
      foreach($results as $result)
      {
        $time=Carbon::parse($result['date']);
        //get image
        //$client = new \GuzzleHttp\Client(['base_uri' => 'http://loveplanet.live/wp-json/wp/v2/']);
        $imageid=$result['featured_media'];
        $data[]=array(
          'data'=>$result,
          'image'=>Helper::featureFullImage($imageid),
        );
      }

      return view('index',[
          'posts'=>$data,
          'sources'=>Helper::sourcesMegamenu()
        ]);
    }catch(\GuzzleHttp\Exception\ClientException $ce){
      return view('errors.404');
    }catch(\GuzzleHttp\Exception\RequestException $re){
        return view('errors.404');
    }catch(\Exception $e){
        return view('errors.404');
    }

  }
}
