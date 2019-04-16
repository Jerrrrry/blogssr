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
use Cache;

class NewsController extends Controller
{
    public function testnews()
    {
        if(Cache::has('test-news'))
        {
            $news=Cache::get('test-news');
        }else{
            $news=[];
        }
        return view('testnews',
        [
          'news'=>$news,
        ]
      );

    }
}
