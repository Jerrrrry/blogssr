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

class PostController extends Controller
{
  public function posts()
  {
    //return Helper::featureImage(39);
    try{
      $client=new \GuzzleHttp\Client();
      $response=$client->get('http://loveplanet.live/wp-json/wp/v2/posts?page=1');
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
          'image'=>json_decode(file_get_contents('http://loveplanet.live/wp-json/wp/v2/media/'.$imageid),true)['media_details']['sizes']['medium']['source_url'],
          'date'=>$time->day,
          'month'=>$time->format('F')
        );

      }
      return view('posts',['posts'=>$data]);
    }catch(\GuzzleHttp\Exception\ClientException $ce){
      return $ce;
    }catch(\GuzzleHttp\Exception\RequestException $re){
      return $re;
    }catch(\Exception $e){
      return $e;
    }
  }
  //post
  public function post($slug)
  {
    try{
      $client=new \GuzzleHttp\Client();
      $response=$client->get('http://loveplanet.live/wp-json/wp/v2/posts?slug='.$slug);
      //return $response->getHeaders()['X-WP-TotalPages'];
      $post=json_decode($response->getBody(),true)[0];
      $imageid=$post['featured_media'];
      $time=Carbon::parse($post['date']);
      $data=array(
        'post'=>$post,
        'image'=>json_decode(file_get_contents('http://loveplanet.live/wp-json/wp/v2/media/'.$imageid),true)['media_details']['sizes']['large']['source_url'],
        'date'=>$time->day,
        'month'=>$time->format('F')
      );
      return view('post',['post'=>$data]);
    }catch(\GuzzleHttp\Exception\ClientException $ce){
      return $ce;
    }catch(\GuzzleHttp\Exception\RequestException $re){
      return $re;
    }catch(\Exception $e){
      return $e;
    }
  }
}
