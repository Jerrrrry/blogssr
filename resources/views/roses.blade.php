@extends('layouts.default')

@section('title', 'All Roses in California')

@section('content')
<div class="container">
    <div class="row">
    
      @foreach ($roses as $rose)
        @component('components.rose',['rose' => $rose])@endcomponent
      @endforeach

     
    </div>
</div>
@endsection