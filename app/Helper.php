<?php

class Helper
{
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
}
