<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;

class MarvelController extends Controller
{
    public function heros(Request $request)
  {
    //get page number
    if($request->input('page')!==null&&is_numeric($request->input('page')))
    {
      $page=$request->input("page");
    }else{
      $page=1;
    }
    
    try{

      $wholeheros=Cache::get('wholeheros');

      $totalpages=count($wholeheros);

      $heros=$wholeheros[$page];
      return view('heros',
        [
          'heros'=>$heros,
          'pagination'=>array(
            'current'=>$page,
            'total'=>$totalpages,
            'type'=>'marvel-heros'
          )
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

  //post
  public function hero($id)
  {
    try{
        return Cache::get("mc-$id");
      
      //return view('post',['post'=>$data]);
    }catch(\GuzzleHttp\Exception\ClientException $ce){
      return redirect()->route('404');
    }catch(\GuzzleHttp\Exception\RequestException $re){
      return redirect()->route('404');
    }catch(\Exception $e){
      return redirect()->route('404');
    }
  }
}
