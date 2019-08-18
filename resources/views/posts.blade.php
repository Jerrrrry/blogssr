@extends('layouts.default')

@section('title', '最近发布')

@section('content')
<div class="container">
  <div class="row"> 
    <div class="col-12 col-md-12">
      <a href="https://tracking.cannaffiliate.com/aff_c?offer_id=12&aff_id=1215&file_id=78" target="_blank">
          <img src="https://media.go2speed.org/brand/files/cannaffiliate/12/20190807124555-728x90.jpg" width="100%"/>
      </a>
  </div>
  </div>
</div>
<div class="container">
    <div class="row">
     
      @foreach ($posts as $post)
        @component('components.post',['post' => $post])@endcomponent
      @endforeach

      @component('components.pagination',['pagination' => $pagination])@endcomponent

    </div>
</div>
@endsection
