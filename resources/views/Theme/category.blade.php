@extends('Theme.master')
@section('title', 'category')
@section('cateory-active', 'active')

@section('content')
    @include('Theme.partials.hero', ['title' => $categoryName])

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @if (count($blogs) > 0)
                            @foreach ($blogs as $blog)
                                <div class="col-md-6">
                                    <div class="single-recent-blog-post card-view">
                                        <div class="thumb">
                                            <img class="card-img rounded-0" src="/{{ $blog->image }}" alt="">
                                            <ul class="thumb-info">
                                                <li><a href="{{ asset('assets') }}/#"><i
                                                            class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                                <li><a href="{{ asset('assets') }}/#"><i class="ti-themify-favicon"></i>2
                                                        Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="details mt-20">
                                            <a href="{{ asset('assets') }}/blog-single.html">
                                                <h3>{{ $blog->name }}</h3>
                                            </a>
                                            <p>{{ $blog->description }}</p>
                                            <a class="button" href="{{ route('Theme.blog', $blog->id) }}">Read More
                                                <i class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            {{ $blogs->links('pagination::bootstrap-4') }}

                        </div>
                    </div>
                </div>

                @include('Theme.partials.sidebar')
            </div>
    </section>
    <!--================ End Blog Post Area =================-->

    <!--================ Start Footer Area =================-->

@endsection
