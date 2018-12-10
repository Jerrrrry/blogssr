<?php

class Helper
{
  public static function featureFullImage($id)
  {
    try{
      //this.get(`/media/${post.featured_media}`);
      //response.data.media_details.sizes['medium'].source_url
      $client=new \GuzzleHttp\Client();
      return json_decode(file_get_contents('http://loveplanet.live/wp-json/wp/v2/media/'.$id),true)['media_details']['sizes']['full']['source_url'];
      return json_decode($client->get('http://loveplanet.live/wp-json/wp/v2/media/'.$id)->getBody(),true)['media_details']['sizes']['full']['source_url'];
    }catch(\GuzzleHttp\Exception\ClientException $ce){
      return '/random/random_'.rand(1,20).'.jpg';
    }catch(\GuzzleHttp\Exception\RequestException $re){
      return '/random/random_'.rand(1,20).'.jpg';
    }catch(\Exception $e){
      return '/random/random_'.rand(1,20).'.jpg';
    }
  }

  public static function featureMediumImage($id)
  {
    try{
      //this.get(`/media/${post.featured_media}`);
      //response.data.media_details.sizes['medium'].source_url
      $client=new \GuzzleHttp\Client();
      return json_decode($client->get('http://loveplanet.live/wp-json/wp/v2/media/'.$id)->getBody(),true)['media_details']['sizes']['medium']['source_url'];
    }catch(\GuzzleHttp\Exception\ClientException $ce){
      return '/random/random_'.rand(1,20).'.jpg';
    }catch(\GuzzleHttp\Exception\RequestException $re){
      return '/random/random_'.rand(1,20).'.jpg';
    }catch(\Exception $e){
      return '/random/random_'.rand(1,20).'.jpg';
    }
  }
}
