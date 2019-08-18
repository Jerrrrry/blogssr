@extends('layouts.default')

@section('title', $category['name'].','.$category['description'])
@section('keywords', $category['name'].','.$category['description'])
@section('content')
<div class="container">
    <div class="row">
      @component('components.ca')@endcomponent
      <div class="col-12 col-lg-12">
        <h3>Category : {{$category['name']}} </h3>
      </div>
      @foreach ($posts as $post)
        @component('components.post',['post' => $post])@endcomponent
      @endforeach
      @component('components.pagination',['pagination' => $pagination,'category'=>$category])@endcomponent
      @component('components.ca')@endcomponent
    </div>
</div>
@endsection
