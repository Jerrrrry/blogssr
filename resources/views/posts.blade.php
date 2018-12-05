@extends('layouts.default')

@section('title', 'Recent Posts')

@section('content')
<div class="container">
    <div class="row">
      @foreach ($posts as $post)
        @component('components.post',['post' => $post])@endcomponent
      @endforeach
    </div>
</div>
@endsection
