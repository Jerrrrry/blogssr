@extends('layouts.default')

@section('title', 'News Center')
@section('keywords', 'News Sources, everyday refresh')
@section('content')
<div class="single-blog-wrapper section-padding-0-100">
    <div class="container">
        <div class="row">
          <div class="col-12 col-md-4 col-lg-12">
              <div class="post-sidebar-area">
                <div class="sidebar-widget-area">
                    <h5 class="title">News Center</h5>
                    <div class="widget-content">
                            <ul class="tags">
                            @foreach ($sources as $source)
                                <li >
                                    <a href="/news?source={{$source['id']}}">{{$source['name']}}</a>
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