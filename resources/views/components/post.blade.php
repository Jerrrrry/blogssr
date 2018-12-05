<!-- Single Blog Area  -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
        <div class="single-blog-thumbnail">
            <a href="#">
              <img src="{{$post['image']}}" alt="Blog Post Featured Image"/>
            </a>
            <div class="post-date">
                <a href="#">11<span>12</span></a>
            </div>
        </div>
        <!-- Blog Content -->
        <div class="single-blog-content mt-50">
            <h4>
              {{$post['data']['title']['rendered']}}

            </h4>

        </div>
    </div>
</div>
