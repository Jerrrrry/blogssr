<div class="container">
    <div class="row">
         <h2>Delicious</h2>
         <hr>
    </div>

</div>

<div class="container">
    <div class="row">
      @foreach ($posts as $post)
        @component('components.post',['post' => $post])@endcomponent
      @endforeach

    </div>
</div>