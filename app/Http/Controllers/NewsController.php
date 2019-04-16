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
          'newss'=>$news,
        ]
      );

    }

    public function fourLinesSources()
    {
        if(Cache::has('news-sources'))
        {
            return Helper::partition(Cache::get('news-sources'),4);
        }else{
            return [];
        }
    }
}
