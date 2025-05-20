@extends('Theme.master')
@section('title', 'index')
@section('home-active', 'active')
@section('content')

    <main class="site-main">
        <!--================Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                    <div class="hero-banner__content">
                        <h3>Tours & Travels</h3>
                        <h1>Amazing Places on earth</h1>
                        <h4>December 12, 2018</h4>
                    </div>
                </div>
            </div>
        </section>
        <!--================Hero Banner end =================-->
        <!--================ Blog slider start =================-->
        <section>
            <div class="container">
                <div class="owl-carousel owl-theme blog-slider">
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0" src=" {{ asset('assets') }}/img/blog/blog-slider/blog-slide1.png"
                                alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href=" {{ asset('assets') }}/#">Fashion</a>
                            <h3><a href=" {{ asset('assets') }}/#">New york fashion week's continued the evolution</a>
                            </h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0"
                                src=" {{ asset('assets') }}/img/blog/blog-slider/blog-slide2.png" alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href=" {{ asset('assets') }}/#">Fashion</a>
                            <h3><a href=" {{ asset('assets') }}/#">New york fashion week's continued the evolution</a>
                            </h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0"
                                src=" {{ asset('assets') }}/img/blog/blog-slider/blog-slide3.png" alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href=" {{ asset('assets') }}/#">Fashion</a>
                            <h3><a href=" {{ asset('assets') }}/#">New york fashion week's continued the evolution</a>
                            </h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0"
                                src=" {{ asset('assets') }}/img/blog/blog-slider/blog-slide1.png" alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href=" {{ asset('assets') }}/#">Fashion</a>
                            <h3><a href=" {{ asset('assets') }}/#">New york fashion week's continued the evolution</a>
                            </h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0"
                                src=" {{ asset('assets') }}/img/blog/blog-slider/blog-slide2.png" alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href=" {{ asset('assets') }}/#">Fashion</a>
                            <h3><a href=" {{ asset('assets') }}/#">New york fashion week's continued the evolution</a>
                            </h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0"
                                src=" {{ asset('assets') }}/img/blog/blog-slider/blog-slide3.png" alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href=" {{ asset('assets') }}/#">Fashion</a>
                            <h3><a href=" {{ asset('assets') }}/#">New york fashion week's continued the evolution</a>
                            </h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Blog slider end =================-->

        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @if ($blogs->count() > 0)
                            @foreach ($blogs as $blog)
                                <div class="single-recent-blog-post">
                                    <div class="thumb">
                                        <img class=" img-fluid" src="/{{ $blog->image }} " width="20%" alt="">
                                        <ul class="thumb-info">
                                            <li><a href=" {{ asset('assets') }}/#"><i
                                                        class="ti-user"></i>{{ @$blog->user->name }}</a></li>
                                            <li><a href=" {{ asset('assets') }}/#"><i
                                                        class="ti-notepad"></i>{{ $blog->created_at->format('d M Y') }}</a>
                                            </li>
                                            <li><a href=" {{ asset('assets') }}/#"><i class="ti-themify-favicon"></i>2
                                                    Comments</a></li>
                                        </ul>
                                    </div>
                                    <div class="details mt-20">
                                        <a href=" {{ asset('assets') }}/blog-single.html">
                                            <h3>{{ $blog->name }}</h3>
                                        </a>
                                        <p>{{ $blog->description }}</p>
                                        <a class="button" href="{{ route('Theme.blog', $blog->id) }}">Read More <i
                                                class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="row">
                            <div class="col-lg-12">
                                {{ $blogs->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>

                    @include('Theme.partials.sidebar')
                </div>
        </section>
        <!--================

                                                                                                                                </main>
                                                                                                                                End Blog Post Area =================-->
    @endsection
