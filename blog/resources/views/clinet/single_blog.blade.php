<x-app-clinet>
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ ShowImagePost($blog_detail->image_post) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{ $blog_detail->title }}
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i>{{ $blog_detail->user->name }}</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                            </ul>
                            <p class="excert">
                                {{ $blog_detail->contents }}
                            </p>
                            <div class="quote-wrapper">
                                <div class="quotes">
                                    MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                                    should have to spend money on boot camp when you can get the MCSE study materials yourself at
                                    a fraction of the camp price. However, who has the willpower to actually sit through a
                                    self-imposed MCSE training.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4>{{ $sum_comment }} Comments</h4>
                        <div class="comment-list">
                           @include('clinet.show_comment', ['comments' => $blog_detail->comments, 'post_id' =>$blog_detail->id])
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form class="form-contact" action="{{ route('admin.CreateComment') }}" method="post">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="post_id" value="{{ $blog_detail->id }}"/>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                <div class="col-12">
                                    <div class="form-group">
                                      <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                placeholder="Write Comment"></textarea>
                                    </div>
                                    @foreach ($errors->get('comment') as $message)
                                        <div class="alert-danger">
                                            <ul>
                                                <li>{{ $message }}</li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
   @section('script')
        @include('layouts.partials.client.js_client')
    @endsection
</x-app-clinet>
