<x-app-clinet>
    <div class="about-area">
        <div class="container">
            <!-- Hot Aimated News Tittle-->
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
                    <!-- Trending Tittle -->
                    <div class="about-right mb-90">
                        <div class="about-img">
                            <img src="{{ ShowImagePost($post->image_post) }}" alt="{{$post->name_image_post}}">
                        </div>
                        <div class="section-tittle mb-30 pt-30">
                            <h3>{{ $post->title }}</h3>
                        </div>
                        <div class="about-prea">
                            <p class="about-pera1" style="font-size: 14px;color: blue;">{{ $name_post->name }}</p>
                            <p class="about-pera1" style="font-size: 14px;color: blue;">{{ $post->created_at->format('d-m-Y') }}</p>
                            <p class="about-pera1 mb-25">
                                {{ $post->contents }}
                            </p>
                        </div>
                        <div class="social-share pt-30">
                            <div class="section-tittle">
                                <h3 class="mr-20">Share:</h3>
                                <ul>
                                    <li><a href="#"><img src="/themes/aznews/assets/img/news/icon-ins.png" alt=""></a></li>
                                    <li><a href="#"><img src="/themes/aznews/assets/img/news/icon-fb.png" alt=""></a></li>
                                    <li><a href="#"><img src="/themes/aznews/assets/img/news/icon-tw.png" alt=""></a></li>
                                    <li><a href="#"><img src="/themes/aznews/assets/img/news/icon-yo.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- From -->
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
    </div>
</x-app-clinet>
