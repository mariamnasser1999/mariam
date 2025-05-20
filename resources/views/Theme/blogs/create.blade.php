@extends('Theme.master')
@section('title', 'blogs')
@section('content')
    @include('Theme.partials.hero', ['title' => 'Add New Blogs'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('blogCreateStatus'))
                        <div class="alert alert-success">
                            {{ session('blogCreateStatus') }}
                        </div>
                    @endif
                    <form action="{{ route('blogs.store') }}" class="form-contact contact_form" method="post"
                        novalidate="novalidate" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input class="form-control border" name="name" type="text" placeholder="Enter your name"
                                value="{{ old('name') }}">
                           @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group">

                        <input class="form-control border" name="image" type="file">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />

                    </div>

                    <div class="form-group">


                        <select class="form-control border" name="category_id" type="text"
                            placeholder="Enter your category_id" value="{{ old('category_id') }}">
                            <option value="">Select Category</option>
                            @foreach ($cateogries as $cateogry)
                                <option value="{{ $cateogry->id }}">{{ $cateogry->name }}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />

                    </div>



                    <div class="form-group">
                        <textarea class="form-control different-control w-100" name="description" cols="30" rows="5"
                            placeholder="Enter your blog title"></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />

                    </div>

                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" class="button button--active button-contactForm">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection
