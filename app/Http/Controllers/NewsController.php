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
        return Helper::sourcesMegamenu();
    }

    public function newsCenter()
    {
        try{
            
            return view('newscenter',[
                'sources'=>Cache::get('news-sources'),
              ]);
          }catch(\Exception $e){
              return view('errors.404');
          }
    }

    public function newspage(Request $request)
    {
        if($request->input('source')==null)
        {
            $sourceid='crypto-coins-news';
        }else{
            $sourceid=$request->input('source');
        }

        return view(
            'news',['title'=>$sourceid,'newss'=>Cache::get("toplines-$sourceid")]
        );

    }


}
