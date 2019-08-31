<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;

class RoseController extends Controller
{
    public function roses()
    {
        try{

            $roses=Cache::get('wholeheros');
      
      
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
}
