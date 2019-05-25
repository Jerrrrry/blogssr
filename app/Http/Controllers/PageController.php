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

      return view('index',[
          'posts'=>Helper::slidercache(),
          'hposts'=>Helper::homePosts(),
          'sources'=>Helper::sourcesMegamenu(),
          'movies'=>Helper::topMovies()
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
