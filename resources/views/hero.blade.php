@extends('layouts.default')

@section('title', $hero['name'])
@section('keywords', 'test')
@section('content')
<div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Hero Description  -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                    <img src="{{$hero['thumbnail']['path']}}/landscape_xlarge.jpg" alt="">
                                    
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Blog Content -->
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">Lifestyle</a>
                                    <h4>{{$hero['name']}}</h4>
                                    <p>{{$hero['description']}}</p>
                                    <div class="post-meta">
                                        <p>By <a href="#">james smith</a></p>
                                        <p>3 comments</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Serires -->

                   
            </div>

            <!--series-->

            <div class="col-12 col-md-4 col-lg-12">
              <div class="post-sidebar-area">
                <div class="sidebar-widget-area">
                    
                    <h5 class="title">Series</h5>
                    <div class="widget-content">
                        <ul class="tags">
                            @foreach ($hero['series']['items'] as $series)
                                <li >
                                <a href="/series/">{{$series['name']}}</a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection