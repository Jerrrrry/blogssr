<!-- ##### Hero Area Start ##### -->
<div class="hero-area">
    <!-- Hero Slides Area -->
    <div class="hero-slides owl-carousel">
        <!-- Loop previous 6 Slide -->
        @foreach ($posts as $post)
        <div class="single-hero-slide bg-img" style="background-image: url({{$post['image']}});">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="slide-content text-center">
                            <h2 data-animation="fadeInUp" data-delay="250ms"><a href="/post/{{$post['data']['slug']}}">{{$post['data']['title']['rendered']}}</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- ##### Hero Area End ##### -->
