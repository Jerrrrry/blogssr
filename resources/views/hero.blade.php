@extends('layouts.default')

@section('title', 'Marvel Hero '.$hero['name'])
@section('keywords', Helper::herokeywords($hero))
@section('content')
<div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                <!-- Hero Description  -->
                <div class="col-lg-12">
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
                <!--stories-->
                <div class="col-12 col-md-4 col-lg-12">
                    <div class="post-sidebar-area">
                        <div class="sidebar-widget-area">
                            
                            <h5 class="title">Story</h5>
                            <div class="widget-content">
                                <ul class="tags">
                                    @foreach ($hero['stories']['items'] as $story)
                                        <li >
                                        <a href="/series/">{{$story['name']}}</a>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--comics-->
                <div class="col-12 col-md-4 col-lg-12">
                    <div class="post-sidebar-area">
                        <div class="sidebar-widget-area">
                            
                            <h5 class="title">Comics</h5>
                            <div class="widget-content">
                                <ul class="tags">
                                    @foreach ($hero['comics']['items'] as $comic)
                                        <li >
                                        <a href="/series/">{{$comic['name']}}</a>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--events-->
                <div class="col-12 col-md-4 col-lg-12">
                    <div class="post-sidebar-area">
                        <div class="sidebar-widget-area">
                            
                            <h5 class="title">Events</h5>
                            <div class="widget-content">
                                <ul class="tags">
                                    @foreach ($hero['events']['items'] as $event)
                                        <li >
                                        <a href="/series/">{{$event['name']}}</a>
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