@extends('layouts.default')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row">
        @component('components.ca')@endcomponent
        <div class="col-12">
            @foreach ($newss as $news)
                <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0.4s; animation-name: fadeInUp;">
                        <div class="row">
                            <div class="col-12">
                                <div class="single-blog-thumbnail">
                                    <img src="{{$news['urlToImage']}}" alt="">
                                    <div class="post-date">
                                        <a href="#">10 <span>march</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- Blog Content -->
                                <div class="single-blog-content mt-50">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">Lifestyle</a>
                                    <h4><a href="{{$news['url']}}" target="_blank" class="post-headline">{{$news['title']}}</a></h4>
                                    
                                    @if ($news['content']=='')
                                        <p>{{$news['description']}}</p>
                                    @else
                                        <p>{{$news['content']}}</p>
                                    @endif
                                    <div class="post-meta">
                                        <p>By <a href="#">{{$news['author']}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                  
            @endforeach
        </div>

    </div>
</div>
@endsection