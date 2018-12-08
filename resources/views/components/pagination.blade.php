<div class="col-12 col-lg-12">
  <nav style="margin: 2rem 0 0;text-align: center;">
    <ul style="display: flex;justify-content: center;margin-bottom: 1rem;">
      @if($pagination['current']!==1)
        <li style="margin-left: 1rem;">
          <a href="/posts?page={{$pagination['current']-1}}">前一页</a>
        </li>
      @endif
      @if($pagination['total']!==$pagination['current'])
        <li style="margin-left: 1rem;">
          <a href="/posts?page={{$pagination['current']+1}}">下一页</a>
        </li>
      @endif
    </ul>

    <p>page <strong>{{ $pagination['current'] }}</strong> out of <strong>{{ $pagination['total'] }}</strong></p>
  </nav>
</div>
