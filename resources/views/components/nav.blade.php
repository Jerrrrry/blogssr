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
                            <li><a href="/category?category=44">Movies</a></li>
                            <li><a href="#">目录</a>
                                <ul class="dropdown">
                                    <li><a href="/category?category=7">好吃的</a></li>
                                    <li><a href="/category?category=8">好玩的</a></li>
                                    <li><a href="/category?category=9">好看的</a></li>
                                    <li><a href="/category?category=1">新鲜有趣的</a></li>
                                </ul>
                            </li>

                            <!--<li><a href="#">MARVEL</a>
                                <ul class="dropdown">
                                    <li><a href="/marvel-heros">人物</a></li>
                                    <li><a href="/category?category=8">事件</a></li>
                                </ul>
                            </li>-->
                            <li><a href="#">News</a>
                                <ul class="dropdown">

                                    <li><a href="/news?source=politico">Politico</a></li>
                                    <li><a href="/news?source=entertainment-weekly">Entertainment</a></li>
                                    <li><a href="/news?source=espn">ESPN</a></li>
                                    <li><a href="/news?source=time">Time</a></li>
                                    <li><a href="/news?source=crypto-coins-news">Crypto News</a></li>
                                    <li><a href="/newscenter">More News</a></li>
                                </ul>
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
