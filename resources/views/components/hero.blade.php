<!-- Single Blog Area  -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
        <div class="single-blog-thumbnail">
            <a href="/marvel-hero/{{$hero['id']}}">
              <img src="{{$hero['thumbnail']['path']}}/landscape_xlarge.jpg" alt="Hero Featured Image"/>
            </a>
            
        </div>
        <!-- Blog Content -->
        <div class="single-blog-content mt-50">
            <h4>
              <a href="/marvel-hero/{{$hero['id']}}">
                {{$hero['name']}}
              </a>
            </h4>

        </div>
    </div>
</div>