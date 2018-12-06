<!-- Single Blog Area  -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
        <div class="single-blog-thumbnail">
            <a href="/post/{{$post['data']['slug']}}">
              <img src="{{$post['image']}}" alt="Blog Post Featured Image"/>
            </a>
            <div class="post-date">
                <a href="#">{{$post['date']}}<span>{{$post['month']}}</span></a>
            </div>
        </div>
        <!-- Blog Content -->
        <div class="single-blog-content mt-50">
            <h4>
              <a href="/post/{{$post['data']['slug']}}">
                {{$post['data']['title']['rendered']}}
              </a>
            </h4>

        </div>
    </div>
</div>
