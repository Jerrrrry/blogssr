<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;

class RoseController extends Controller
{
    public function roses()
    {
        try{

            $roses=Cache::get('allroses');
      
            return view('roses',
              [
                'roses'=>$roses,
              ]
            );
          }catch(\GuzzleHttp\Exception\ClientException $ce){
            return view('errors.404');
          }catch(\GuzzleHttp\Exception\RequestException $re){
              return view('errors.404');
          }catch(\Exception $e){
              return view('errors.404');
          }
    }

    public function rose($url)
    {
        try{
            //return Cache::get("mc-$id");
          return Cache::get("rose*$url");
          return view('rose',['rose'=>Cache::get("rose*$url")]);
        }catch(\GuzzleHttp\Exception\ClientException $ce){
          return redirect()->route('404');
        }catch(\GuzzleHttp\Exception\RequestException $re){
          return redirect()->route('404');
        }catch(\Exception $e){
          return redirect()->route('404');
        }
    }
}
