@extends('layouts.default')

@section('title', '一种很作的生活方式')

@section('content')
  @component('components.heroarea',['posts' => $posts])@endcomponent
  @component('components.intro')@endcomponent
  @component('components.ins')@endcomponent
@endsection
