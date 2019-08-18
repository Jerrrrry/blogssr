@extends('layouts.default')

@section('title', '最近发布')

@section('content')
<div class="container">
    <div class="row">
      @component('components.ca')@endcomponent
    </div>
    <div class="row">
      @foreach ($posts as $post)
        @component('components.post',['post' => $post])@endcomponent
      @endforeach

      @component('components.pagination',['pagination' => $pagination])@endcomponent

    </div>
</div>
@endsection
