<?php

class Helper
{
  public static function featureImage($id)
  {
    try{
      //this.get(`/media/${post.featured_media}`);
      //response.data.media_details.sizes['medium'].source_url
      $client=new \GuzzleHttp\Client();
      return json_decode($client->get('http://loveplanet.live/wp-json/wp/v2/media/'.$id)->getBody(),true);
    }catch(\GuzzleHttp\Exception\ClientException $ce){
      return 1;
    }catch(\GuzzleHttp\Exception\RequestException $re){
      return 2;
    }catch(\Exception $e){
      return 3;
    }
  }
}
