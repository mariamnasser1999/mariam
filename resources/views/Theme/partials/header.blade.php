    {{-- @php
        $headerCategories = App\Models\Category::all();
    @endphp

 --}}



    <!--================Header Menu Area =================-->

    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="{{ route('Theme.index') }}"><img
                            src=" {{ asset('assets') }}/img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-center">
                            <li class="nav-item @yield('home-active')"><a class="nav-link"
                                    href="{{ route('Theme.index') }}">Home</a>
                            </li>
                            <li class="nav-item submenu @yield('category-active') dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Categories</a>
                                <ul class="dropdown-menu">
                                    @foreach ($cateogries as $category)
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('Theme.category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>


                            <l class="nav-item @yield('contact-active')"><a class="nav-link"
                                    href="{{ route('Theme.contact') }}">Contact</a>
                            </l i>

                        </ul>
                        @if (Auth::check())
                            <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary mr-2">add new</a>
                        @endif
                        <ul class="nav navbar-nav navbar-right navbar-social">
                            @if (!Auth::check())
                                <a href="{{ route('register') }}" class=" btn btn-sm btn-warning">Register/login
                                </a>
                            @else
                                <li class="nav-item submenu dropdown" class="p-3">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true"
                                        aria-expanded="false">{{ Auth::user()->name }}</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{ route('blogs.my-blogs') }}">My
                                                Blogs</a>
                                        </li>
                                        <li class="nav-item">
                                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                                @csrf
                                                <a class="nav-link" style="cursor: pointer" :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                        this.closest('form#logout-form').submit();">
                                                    {{ __('Log Out') }}
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif



                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->
