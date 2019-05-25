@extends('layouts.default')

@section('title', $tag['name'].','.$tag['description'])
@section('keywords', $tag['name'].','.$tag['description'])
@section('content')
<div class="container">
    <div class="row">
      <div class="col-12 col-lg-12">
        <h3>Tag : {{$tag['name']}}</h3>
      </div>
      @foreach ($posts as $post)
        @component('components.post',['post' => $post])@endcomponent
      @endforeach
      @component('components.pagination',['pagination' => $pagination,'tag'=>$tag])@endcomponent
    </div>
</div>
@endsection
