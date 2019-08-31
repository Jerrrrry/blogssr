<div class="original-nav-area" id="stickyNav">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between">

                <!-- Subscribe btn -->
                <div class="subscribe-btn">
                    <a href="#" class="btn subscribe-btn" data-toggle="modal" data-target="#subsModal">Subscribe</a>
                </div>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu" id="originalNav">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/posts">Latest Posts</a></li>
                            <li><a href="/category?category=44">Movies</a></li>
                            <li><a href="/newscenter">News Center</a></li>
                            <li><a href="/roses">Roses</a></li>
                            <li><a href="#">Category</a>
                                <ul class="dropdown">
                                    <li><a href="/category?category=7">好吃的</a></li>
                                    <li><a href="/category?category=8">好玩的</a></li>
                                    <li><a href="/category?category=9">好看的</a></li>
                                    <li><a href="/category?category=1">新鲜有趣的</a></li>
                                </ul>
                            </li>

                            <li><a href="#">MARVEL</a>
                                <ul class="dropdown">
                                    <li><a href="/marvel-heros">人物</a></li>
                                    <li><a href="/category?category=8">事件</a></li>
                                </ul>
                            </li>
                            
                                <li class="megamenu-item"><a href="#">News</a>
                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-4">

                                                @foreach (Helper::sourcesMegamenu()[0] as $source)
                                                    <li><a href="#">{{$source['name']}}</a></li>
                                                    <li><a href="/news?source={{$source['id']}}">{{$source['name']}}</a></li>
                                                @endforeach
                                                <
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                
                                                @foreach (Helper::sourcesMegamenu()[1] as $source)
                                                    <li><a href="/news?source={{$source['id']}}">{{$source['name']}}</a></li>
                                                @endforeach
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                
                                                @foreach (Helper::sourcesMegamenu()[2] as $source)
                                                    <li><a href="/news?source={{$source['id']}}">{{$source['name']}}</a></li>
                                                @endforeach
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                
                                                @foreach (Helper::sourcesMegamenu()[3] as $source)
                                                    <li><a href="/news?source={{$source['id']}}">{{$source['name']}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                
                                    <span class="dd-trigger"></span><span class="dd-arrow"></span>
                                </li>
                           
                        </ul>

                        <!-- Search Form  -->
                        @component('components.search')@endcomponent
                    </div>

                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>
