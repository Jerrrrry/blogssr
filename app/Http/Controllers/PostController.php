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

class PostController extends Controller
{
  public function posts(Request $request)
  {
    //get page number
    if($request->input('page')!==null&&is_numeric($request->input('page')))
    {
      $page=$request->input("page");
    }else{
      $page=1;
    }
    $per_page=env('POSTS_PER_PAGE');
    $query="per_page=$per_page&page=$page";
    if(Cache::has("posts-$page"))
    {
      return view('posts',Cache::get("posts-$page"));
    }else{
      try{

        $client=new \GuzzleHttp\Client();
        $response=$client->get("https://loveplanet.live/wp-json/wp/v2/posts?$query");
        //return $response->getHeaders()['X-WP-TotalPages'];
        $data=[];
        $results=json_decode($response->getBody(),true);
        //return $results;
        $totalpages=$response->getHeaders()['X-WP-TotalPages'][0];
        //return $totalpages;
        foreach($results as $result)
        {
          $time=Carbon::parse($result['date']);
          //get image
          //$client = new \GuzzleHttp\Client(['base_uri' => 'http://loveplanet.live/wp-json/wp/v2/']);
          $imageid=$result['featured_media'];
          $data[]=array(
            'data'=>$result,
            'image'=>Helper::featureMediumImage($imageid),
            'date'=>$time->day,
            'month'=>$time->format('F'),
          );
        }
        $cache=array(
          'posts'=>$data,
          'pagination'=>array(
          'current'=>$page,
          'total'=>$totalpages,
          'type'=>'posts'
        ));
        Cache::put("posts-$page",$cache,180);
        return view('posts',
          [
            'posts'=>$data,
            'pagination'=>array(
              'current'=>$page,
              'total'=>$totalpages,
              'type'=>'posts'
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
    
  }
  //post
  public function post($slug)
  {
    if(Cache::has("post-$slug"))
    {
      return view('post',['post'=>Cache::get("post-$slug")]);
    }else{
      try{
        $client=new \GuzzleHttp\Client();
        $response=$client->get('https://loveplanet.live/wp-json/wp/v2/posts?slug='.$slug);
        //return $response->getHeaders()['X-WP-TotalPages'];
        $post=json_decode($response->getBody(),true)[0];
        //return $post;
        $imageid=$post['featured_media'];
        $time=Carbon::parse($post['date']);
        $tags=[];
        foreach($post['tags'] as $tag)
        {
          $tags[]=json_decode(file_get_contents("https://loveplanet.live/wp-json/wp/v2/tags/$tag"));
        }
        $metatags='';
        foreach($tags as $tag)
        {
          $metatags.=$tag->name.',';
        }
        $data=array(
          'post'=>$post,
          'image'=>Helper::featureFullImage($imageid),
          'date'=>$time->day,
          'month'=>$time->format('F'),
          'tags'=>$tags,
          'metatags'=>$metatags
        );
        Cache::put("post-$slug",$data,180);
        return view('post',['post'=>$data]);
      }catch(\GuzzleHttp\Exception\ClientException $ce){
        return redirect()->route('404');
      }catch(\GuzzleHttp\Exception\RequestException $re){
        return redirect()->route('404');
      }catch(\Exception $e){
        return redirect()->route('404');
      }
    }
  }
  //tag
  public function tag(Request $request)
  {
    //get page number
    if($request->input('page')!==null&&is_numeric($request->input('page')))
    {
      $page=$request->input("page");
    }else{
      $page=1;
    }
    $per_page=env('POSTS_PER_PAGE');
    $query="per_page=$per_page&page=$page";
    //check tags request
    if($request->input('tag')!==null&&is_numeric($request->input('tag')))
    {
      $tag=$request->input('tag');
      $query.="&tags=$tag";
    }
    if(Cache::has("tag-$tag-$page"))
    {
      return view('tag',Cache::get("tag-$tag-$page"));
    }else{
      try{

        $client=new \GuzzleHttp\Client();
        $response=$client->get("https://loveplanet.live/wp-json/wp/v2/posts?$query");
        //return $response->getHeaders()['X-WP-TotalPages'];
        $data=[];
        $results=json_decode($response->getBody(),true);
        //return $results;
        $totalpages=$response->getHeaders()['X-WP-TotalPages'][0];
        $tagdata=json_decode(file_get_contents("https://loveplanet.live/wp-json/wp/v2/tags/$tag"),true);
        //return $totalpages;
        foreach($results as $result)
        {
          $time=Carbon::parse($result['date']);
          //get image
          //$client = new \GuzzleHttp\Client(['base_uri' => 'http://loveplanet.live/wp-json/wp/v2/']);
          $imageid=$result['featured_media'];
          $data[]=array(
            'data'=>$result,
            'image'=>Helper::featureMediumImage($imageid),
            'date'=>$time->day,
            'month'=>$time->format('F'),
          );
        }

        $cache=array(
          'posts'=>$data,
          'pagination'=>array(
            'current'=>$page,
            'total'=>$totalpages,
            'type'=>'tags',
          ),
          'tag'=>$tagdata);
        Cache::put("tag-$tag-$page",$cache,180);
        return view('tag',
          [
            'posts'=>$data,
            'pagination'=>array(
              'current'=>$page,
              'total'=>$totalpages,
              'type'=>'tags',
            ),
            'tag'=>$tagdata
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

  //category
  public function category(Request $request)
  {
    //get page number
    if($request->input('page')!==null&&is_numeric($request->input('page')))
    {
      $page=$request->input("page");
    }else{
      $page=1;
    }
    $per_page=env('POSTS_PER_PAGE');
    $query="per_page=$per_page&page=$page";
    //check tags request
    if($request->input('category')!==null&&is_numeric($request->input('category')))
    {
      $category=$request->input('category');
      $query.="&categories=$category";
    }
    try{

      $client=new \GuzzleHttp\Client();
      $response=$client->get("https://loveplanet.live/wp-json/wp/v2/posts?$query");
      //return $response->getHeaders()['X-WP-TotalPages'];
      $data=[];
      $results=json_decode($response->getBody(),true);
      //return $results;
      $totalpages=$response->getHeaders()['X-WP-TotalPages'][0];
      $catdata=json_decode(file_get_contents("https://loveplanet.live/wp-json/wp/v2/categories/$category"),true);
      //return $totalpages;
      foreach($results as $result)
      {
        $time=Carbon::parse($result['date']);
        //get image
        //$client = new \GuzzleHttp\Client(['base_uri' => 'http://loveplanet.live/wp-json/wp/v2/']);
        $imageid=$result['featured_media'];
        $data[]=array(
          'data'=>$result,
          'image'=>Helper::featureMediumImage($imageid),
          'date'=>$time->day,
          'month'=>$time->format('F'),
        );
      }

      return view('category',
        [
          'posts'=>$data,
          'pagination'=>array(
            'current'=>$page,
            'total'=>$totalpages,
            'type'=>'cats',
          ),
          'category'=>$catdata
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
  //search

  public function searchPosts(Request $request)
  {
    //get page number
    if($request->input('page')!==null&&is_numeric($request->input('page')))
    {
      $page=$request->input("page");
    }else{
      $page=1;
    }
    $per_page=env('POSTS_PER_PAGE');
    $search=$request->input('yb');
    try{

      $client=new \GuzzleHttp\Client();
      $response=$client->get("https://loveplanet.live/wp-json/wp/v2/posts?search=$search&per_page=$per_page&page=$page");
      //return $response->getHeaders()['X-WP-TotalPages'];
      $data=[];
      $results=json_decode($response->getBody(),true);
      $totalpages=$response->getHeaders()['X-WP-TotalPages'][0];
      //return $totalpages;
      foreach($results as $result)
      {
        $time=Carbon::parse($result['date']);
        //get image
        //$client = new \GuzzleHttp\Client(['base_uri' => 'http://loveplanet.live/wp-json/wp/v2/']);
        $imageid=$result['featured_media'];
        $data[]=array(
          'data'=>$result,
          'image'=>json_decode(file_get_contents('https://loveplanet.live/wp-json/wp/v2/media/'.$imageid),true)['media_details']['sizes']['medium']['source_url'],
          'date'=>$time->day,
          'month'=>$time->format('F'),
        );



      }

      return view('search',
        [
          'posts'=>$data,
          'pagination'=>array(
            'current'=>$page,
            'total'=>$totalpages,
            'type'=>'posts'
          )
        ]
      );
    }catch(\GuzzleHttp\Exception\ClientException $ce){
      return redirect()->route('404');
    }catch(\GuzzleHttp\Exception\RequestException $re){
      return redirect()->route('404');
    }catch(\Exception $e){
      return redirect()->route('404');
    }
  }
}
