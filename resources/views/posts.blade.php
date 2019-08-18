@extends('layouts.default')

@section('title', '最近发布')

@section('content')
<div class="container">
    <div class="row">
      <a href="https://tracking.cannaffiliate.com/aff_c?offer_id=12&aff_id=1215&file_id=78" target="_blank"><img src="/img/ca/cablog.jpg" width="728" height="90"/></a>
    </div>
    <div class="row">
      @foreach ($posts as $post)
        @component('components.post',['post' => $post])@endcomponent
      @endforeach

      @component('components.pagination',['pagination' => $pagination])@endcomponent

    </div>
</div>
@endsection
