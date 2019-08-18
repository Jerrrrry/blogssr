@extends('layouts.default')

@section('title', $post['post']['title']['rendered'])
@section('keywords', $post['metatags'])
@section('content')
<div class="single-blog-wrapper section-padding-0-100">

    <!-- Single Blog Area  -->
    <div class="single-blog-area blog-style-2 mb-50">
        <div class="single-blog-thumbnail">
            <img src="{{$post['image']}}" alt="{{$post['post']['title']['rendered']}}"/>
            <div class="post-tag-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="post-date">
                                <a href="#">{{$post['date']}}<span>{{$post['month']}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @component('components.ca')@endcomponent
            <div class="col-12 col-lg-12">
                <!-- Single Blog Area  -->
                <div class="single-blog-area blog-style-2 mb-50">
                    <!-- Blog Content -->
                    <div class="single-blog-content">
                        <h1><a href="#" class="post-headline mb-0">{{$post['post']['title']['rendered']}}</a></h1>

                        {!!html_entity_decode($post['post']['content']['rendered'])!!}
                    </div>
                </div>

            </div>

            <div class="col-12 col-md-4 col-lg-12">
                <div class="post-sidebar-area">
                    @component('components.tags',['tags' => $post['tags']])@endcomponent

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
