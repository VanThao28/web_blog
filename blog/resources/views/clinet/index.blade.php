<x-app-clinet>
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                    <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                    <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img style="width:800px; height: 500px;" src="{{ ShowImagePost($top_trending->image_post) }}" alt="{{ $top_trending->name_image_post }}">
                                <div class="trend-top-cap">
                                    <span>{{ $top_trending->topic }}</span>
                                    <h2><a href="{{route('clinet.detail', $top_trending->id)}}">{{ $top_trending->title }}</a></h2>

                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                @foreach($button_trendy as $button_trending)
                                    <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img style="width: 240px;height: 150px;" src="{{ ShowImagePost($button_trending->image_post) }}" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color1">{{$button_trending->topic}}</span>
                                            <h4><a href="{{ route('clinet.detail',['id' => $button_trending->id]) }}">{{ $button_trending->title }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        @foreach($right as $right_trending)
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img style="width: 120px; height: 110px" src="{{ ShowImagePost($right_trending->image_post) }}" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1">{{ $right_trending->topic }}</span>
                                    <h4><a href="{{ route('clinet.detail',['id' => $right_trending->id]) }}">{{ $right_trending->title }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>Whats New</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach($tab_trending as $key_tab_trending)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img style="height: 273px;" src="{{ ShowImagePost($key_tab_trending->image_post) }}" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">{{ $key_tab_trending->topic }}</span>
                                                        <h4><a href="{{ route('clinet.detail', ['id'=> $key_tab_trending->id]) }}">{{ $key_tab_trending->title }}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-40">
                        <h3>Follow Us</h3>
                    </div>
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="/themes/aznews/assets/img/news/icon-fb.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="/themes/aznews/assets/img/news/icon-tw.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="/themes/aznews/assets/img/news/icon-ins.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="/themes/aznews/assets/img/news/icon-yo.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- New Poster -->
                    <div class="news-poster d-none d-lg-block">
                        <img src="/themes/aznews/assets/img/news/news_card.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area  weekly2-pading gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Weekly Top News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly2-news-active dot-style d-flex dot-style">
                            @foreach($section_tile as $key_section_tile)
                             <div class="weekly2-single">
                                <div class="weekly2-img">
                                    <img style="width: 270px; height: 175px;" src="{{ ShowImagePost($key_section_tile->image_post) }}" alt="">
                                </div>
                                <div class="weekly2-caption">
                                    <span class="color1">{{ $key_section_tile->topic }}</span>
                                    <p>{{ $key_section_tile->created_at->format('d-m-Y') }}</p>
                                    <h4><a href="{{ route('clinet.detail', ['id' => $key_section_tile->id]) }}">{{ $key_section_tile->title }}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-clinet>
