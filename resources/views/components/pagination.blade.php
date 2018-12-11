@if($pagination['type']=='tags')
<div class="col-12 col-lg-12">
  <nav style="margin: 2rem 0 0;text-align: center;">
    <ul style="display: flex;justify-content: center;margin-bottom: 1rem;">
      @if($pagination['current']!==1)
        <li style="margin-left: 1rem;">
          <a href="/tag?page={{$pagination['current']-1}}&tag={{$tag['id']}}">前一页</a>
        </li>
      @endif
      @if($pagination['total']!==$pagination['current']&&$pagination['total']!=='1')
        <li style="margin-left: 1rem;">
          <a href="/tag?page={{$pagination['current']+1}}&tag={{$tag['id']}}">下一页</a>
        </li>
      @endif
    </ul>

    <p>page <strong>{{ $pagination['current'] }}</strong> out of <strong>{{ $pagination['total'] }}</strong></p>
  </nav>
</div>
@elseif($pagination['type']=='cats')
<div class="col-12 col-lg-12">
  <nav style="margin: 2rem 0 0;text-align: center;">
    <ul style="display: flex;justify-content: center;margin-bottom: 1rem;">
      @if($pagination['current']!==1)
        <li style="margin-left: 1rem;">
          <a href="/category?page={{$pagination['current']-1}}&category={{$category['id']}}">前一页</a>
        </li>
      @endif
      @if($pagination['total']!==$pagination['current']&&$pagination['total']!=='1')
        <li style="margin-left: 1rem;">
          <a href="/category?page={{$pagination['current']+1}}&category={{$category['id']}}">下一页</a>
        </li>
      @endif
    </ul>

    <p>page <strong>{{ $pagination['current'] }}</strong> out of <strong>{{ $pagination['total'] }}</strong></p>
  </nav>
</div>
@else<!--if not specific, will use default pagination for posts-->
<div class="col-12 col-lg-12">
  <nav style="margin: 2rem 0 0;text-align: center;">
    <ul style="display: flex;justify-content: center;margin-bottom: 1rem;">
      @if($pagination['current']!==1)
        <li style="margin-left: 1rem;">
          <a href="/posts?page={{$pagination['current']-1}}">前一页</a>
        </li>
      @endif
      @if($pagination['total']!==$pagination['current']&&$pagination['total']!=='1')
        <li style="margin-left: 1rem;">
          <a href="/posts?page={{$pagination['current']+1}}">下一页</a>
        </li>
      @endif
    </ul>

    <p>page <strong>{{ $pagination['current'] }}</strong> out of <strong>{{ $pagination['total'] }}</strong></p>
  </nav>
</div>

@endif
