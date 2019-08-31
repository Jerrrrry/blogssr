@extends('layouts.default')

@section('title', 'Marvel Heros')

@section('content')
<div class="container">
    <div class="row">
    
      @foreach ($heros as $hero)
        @component('components.hero',['hero' => $hero])@endcomponent
      @endforeach

      @component('components.pagination',['pagination' => $pagination])@endcomponent
     
    </div>
</div>
@endsection