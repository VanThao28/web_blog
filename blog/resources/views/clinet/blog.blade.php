<x-app-clinet>
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($blog as $key_blog)
                            <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" style="width: 770px; height: 385px" src="{{ ShowImagePost($key_blog->image_post) }}" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>{{ $key_blog->created_at->format('d') }}</h3>
                                    <p>{{ $key_blog->created_at->format('m') }}</p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ route('clinet.single_blog',['id' => $key_blog->id]) }}">
                                    <h2>{{ $key_blog->title }}</h2>
                                </a>
                                <p>{{ substr($key_blog->contents,0,200) }}...</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i>{{ $key_blog->user->name }}</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article>
                        @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $blog->links('layouts.partials.my-pagination') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-clinet>
