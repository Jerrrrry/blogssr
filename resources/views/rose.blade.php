@extends('layouts.default')

@section('title', 'Rose '.$rose['name'].' detail information')
@section('keywords', $rose['name'].' '.$rose['type'].' '.$rose['category'].' ')
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
                                        <img src="/storage/rosedata/images/{{$rose['seourl']}}.jpg" alt="$rose['seourl']">
                                        
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <!-- Blog Content -->
                                    <div class="single-blog-content">
                                        <div class="line"></div>
                                        <a href="#" class="post-tag">Rose Book</a>
                                        <h4>{{$rose['name']}}</h4>
                                        <h4>{{$rose['category']}}</h4>
                                        <p>{{$rose['description']}}</p>
                                        <div class="post-meta">
                                            <p>By <a href="#">{{$rose['type']}}</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
             
                </div>
                <!--series-->
                @if (count($rose['lists'])>0)
                <div class="col-12 col-md-4 col-lg-12">
                    <div class="post-sidebar-area">
                        <div class="sidebar-widget-area">
                            
                            <h5 class="title">Feature</h5>
                            <div class="widget-content">
                                <ul class="tags">
                                    @foreach ($rose['lists'] as $list)
                                        <li >
                                            {{$list}}
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
               
        </div>
    </div>
</div>
@endsection