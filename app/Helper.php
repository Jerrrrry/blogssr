<?php
use Carbon\Carbon;
class Helper
{
  public static function homePosts()
  {
    if(Cache::has('homearticles'))
    {
      return Cache::get('homearticles');
    }else{
      return [];
    }
  }

  public static function slidercache()
  {
    if(Cache::has('slidercache'))
    {
      return Cache::get('slidercache');
    }else{
      return [];
    }
  }

  public static function topMovies()
  {
    if(Cache::has('topmovies'))
    {
      return Cache::get('topmovies');
    }else{
      return [];
    }
  }

  public static function featureFullImage($id)
  {
    try{
      return json_decode(file_get_contents('http://loveplanet.live/wp-json/wp/v2/media/'.$id),true)['media_details']['sizes']['full']['source_url'];
    }catch(\Exception $e){
      return '/img/random/random_'.rand(1,20).'.jpg';
    }
  }

  public static function featureMediumImage($id)
  {
    try{
      return json_decode(file_get_contents('http://loveplanet.live/wp-json/wp/v2/media/'.$id),true)['media_details']['sizes']['medium']['source_url'];
    }catch(\Exception $e){
      return '/img/random/random_'.rand(1,20).'.jpg';
    }
  }

  public static function newsApiKey()
  {
    return 'fa1790410a29459786c4f779b1a1b409';
  }

  public static function partition( $list, $p ) {
    $listlen = count( $list );
    $partlen = floor( $listlen / $p );
    $partrem = $listlen % $p;
    $partition = array();
    $mark = 0;
    for ($px = 0; $px < $p; $px++) {
        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
        $partition[$px] = array_slice( $list, $mark, $incr );
        $mark += $incr;
    }
    return $partition;
  }

  public static function sourcesMegamenu()
  {
        if(Cache::has('news-sources'))
        {
            return Helper::partition(Cache::get('news-sources'),4);
        }else{
            return [];
        }
  }

  public static function urlAuth($url)
  {
    $publickey="a056a00ff900c56d29c9f431dbe66752";
    $privatekey="788fcea57fcaec42733d96ea61f45341839b6f0f";
    $ts=Carbon::now()->timestamp;
    $hash=md5($ts.$privatekey.$publickey);
    return $url."apikey=$publickey&ts=$ts&hash=$hash";
  }

  public static function herokeywords($hero)
  {
    $keywords='';
    try{
      foreach($hero['comics']['items'] as $comic)
      {
        $keywords.=$comic['name'].' ';
      }
      foreach($hero['events']['items'] as $event)
      {
        $keywords.=$event['name'].' ';
      }
      foreach($hero['stories']['items'] as $story)
      {
        $keywords.=$story['name'].' ';
      }
      foreach($hero['series']['items'] as $series)
      {
        $keywords.=$series['name'].' ';
      }
      return $keywords;
    }catch(\Exception $e){
      return 'Welcome to Love Planet';
    }
  }
}
