<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use \GuzzleHttp\Exception\ClientException;
use \GuzzleHttp\Exception\RequestException;

class PostController extends Controller
{
  public function posts()
  {
    try{
      $client=new \GuzzleHttp\Client();
      $response=$client->get('http://loveplanet.live/wp-json/wp/v2/posts?page=1');
      return $response->getBody();
    }catch(\GuzzleHttp\Exception\ClientException $ce){

    }catch(\GuzzleHttp\Exception\RequestException $re){

    }catch(\Exception $e){

    }
  }
}
