<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;

class TestController extends Controller
{
  public function testImage()
  {
    return Helper::featureFullImage(69);
    return '/random/random_'.rand(1,20).'.jpg';
  }
}
