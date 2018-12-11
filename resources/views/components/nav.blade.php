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
                            <li><a href="/">主页</a></li>
                            <li><a href="/posts">最近发布</a></li>
                            <li><a href="#">目录</a>
                                <ul class="dropdown">
                                    <li><a href="/category?category=7">好吃的</a></li>
                                    <li><a href="/category?category=8">好玩的</a></li>
                                    <li><a href="/category?category=9">好看的</a></li>
                                    <li><a href="/category?category=1">新鲜有趣的</a></li>
                                </ul>
                            </li>
                            <li><a href="/about">关于我们</a></li>
                            <li><a href="/contact">联系我们</a></li>
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
