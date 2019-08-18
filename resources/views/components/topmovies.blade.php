
    <div class="container">
        <div class="row">
            <h2>Full Movies to Watch</h2>
        </div>

    </div>
    <div class="container">
        <div class="row">
            @component('components.ca')@endcomponent  
            <br>  
            @foreach ($posts as $post)
                @component('components.post',['post' => $post])@endcomponent
            @endforeach

        </div>
    </div>
