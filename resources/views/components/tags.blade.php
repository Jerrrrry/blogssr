<div class="sidebar-widget-area">
    <h5 class="title">Tags</h5>
    <div class="widget-content">
        <ul class="tags">
          @foreach ($tags as $tag)
            <li >
              <a href="/tag?tag={{$tag->id}}&slug={{$tag->slug}}">{{$tag->name}}</a>
            </li>
          @endforeach


        </ul>
    </div>
</div>
