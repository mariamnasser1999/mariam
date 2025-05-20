@extends('Theme.master')
@section('title', 'blogs')
@section('content')
    @include('Theme.partials.hero', ['title' => 'Add New Blogs'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('blogdeletestatus'))
                        <div class="alert alert-success">
                            {{ session('blogdeletestatus') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col" width="15%">Actions</th>
                            </tr>




                        </thead>
                        <tbody>
                            @if (count($blogs) > 0)
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>
                                            <a href="{{ route('Theme.blog', $blog->id) }}" target="_blank">
                                                {{ $blog->name }}
                                            </a>
                                        </td>
                                        <td> <a href="{{ route('blogs.edit', ['blog' => $blog]) }}"
                                                class="btn btn-sm btn-primary mr-2">
                                                edit</a>

                                            <form action="{{ route('blogs.destroy', ['blog' => $blog]) }}" method="POST"
                                                id="delete_form" class="d-inline">
                                                @method('delete')
                                                @csrf










                                                <a href="route('logout')"
                                                    onclick="event.preventDefault();
                                                        this.closest('form#delete_form').submit();"
                                                    class="btn btn-sm btn-danger mr-2">

                                                    Delete</a>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if (count($blogs) > 0)
                        {{ $blogs->render('pagination::bootstrap-4') }}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
