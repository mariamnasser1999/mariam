@extends('Theme.master')
@section('title', 'Edit Blog')
@section('content')
    @include('Theme.partials.hero', ['title' => $blog->name ?? '---'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    @if (session('blogUpdatestatus'))
                        <div class="alert alert-success">
                            {{ session('blogUpdatestatus') }}

                        </div>
                    @endif

                    <form action="{{ route('blogs.update', ['blog' => $blog]) }}" class="form-contact contact_form"
                        method="post" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <input class="form-control border" name="name" type="text" placeholder="Enter your name"
                                value="{{ $blog->name }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

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
                                    <option value="{{ $cateogry->id }}" @if ($cateogry->id == $blog->category_id) selected @endif>
                                        {{ $cateogry->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />

                        </div>



                        <div class="form-group">
                            <textarea class="form-control different-control w-100" name="description" cols="30" rows="5">{{ $blog->description }}</textarea>
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
