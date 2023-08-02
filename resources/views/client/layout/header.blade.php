<div class="header-area header-transparent">
    <div class="main-header ">
        <div class="header-bottom  header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10">
                        <div class="menu-wrapper d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li class="active"><a href="/">Home</a></li>
                                        <li><a href="{{ route('client.courses') }}">Courses</a></li>
                                        <li><a href="{{ route('client.about') }}">About</a></li>
                                        <li><a>Blog</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('client.blog') }}">Blog</a></li>
                                                <li><a href="#">Blog Details</a></li>

                                            </ul>
                                        </li>
                                        <li><a href="{{ route('client.contact') }}">Contact</a></li>
                                        @if (Auth::user())
                                            <li><a>Quizz</a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('quiz.index') }}">Start Quizz</a></li>
                                                    <li><a href="#">Quizz Details</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                        <!-- Button -->
                                        <li class="button-header margin-left "><a href="#" class="btn">Join</a>
                                        </li>

                                        @if (!Auth::check())
                                            <li class="button-header"><a href="{{ route('login.create') }}"
                                                    class="btn btn3">Log
                                                    in</a></li>
                                        @else
                                            <li class="button-header"><a
                                                    class="btn btn3">{{ Auth::user()->last_name }}</a>
                                                <ul class="submenu">
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="bx bx-user me-2"></i>
                                                            <span class="align-middle">My Profile</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="bx bx-cog me-2"></i>
                                                            <span class="align-middle">Settings</span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <div class="dropdown-divider"></div>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ asset('/logout') }}">
                                                            <i class="bx bx-power-off me-2"></i>
                                                            <span class="align-middle">Log Out</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
