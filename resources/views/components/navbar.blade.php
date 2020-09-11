<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">

            {{-- moblie toggle --}}
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>

            {{-- Logo --}}
            <a class="navbar-brand justify-content-center" href="{{route('index')}}">
                <b class="logo-icon d-flex align-items-center">
                    <svg class="start" height="41" viewBox="0 0 155 152" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <rect x="-11.4142" y="76.1629" width="123.853" height="123.392" rx="31"
                                transform="rotate(-45 -11.4142 76.1629)" fill="#fff" stroke="#fff" stroke-width="2" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.06 61.84a30.07 30.07 0 00-.8 27.08C10.1 90.17 15.9 91 21 90.06c8.8-1.6 8.67-5.33 7.5-7-.97-1.15-3.87-1.87-7.3-2.7-5.46-1.34-12.25-3-14.7-7.3-1.72-3.01-1.6-7.14-.44-11.22zm13.52 43.9l35.04 35.05a30 30 0 0042.43 0l43.74-43.74a30 30 0 000-42.43l-43.41-43.4a30 30 0 00-42.43 0l-31.3 31.3A48.74 48.74 0 0137 38.56c10-1.5 24.33.34 30 1.5l-6.5 17c-5.5-2.5-19.5-4.5-25-2.5-7.16 2.6-5.5 7.36 2.5 8.5 8.3 1.19 18 4 17 13.5s-8 20-17.5 24.5c-5.1 2.42-11.3 4.02-17.92 4.69zM52.5 86l-7 17c1 .5 4.4 1.3 14 2.5 12 1.5 24.5-.23 33.5-4.5 9.5-4.5 16.5-15 17.5-24.5s-8.7-12.31-17-13.5c-8-1.14-9.66-5.9-2.5-8.5 5.5-2 19.5 0 25 2.5l6.5-17c-5.67-1.17-20-3-30-1.5s-17.5 5.5-23 10S58 66 62 73c2.45 4.3 9.24 5.95 14.7 7.29 3.43.84 6.33 1.55 7.3 2.71 1.17 1.67 1.3 5.4-7.5 7-8.8 1.6-19.67-2-24-4z"
                                fill="#30318B" />
                            <path d="M151.5 41.5H129l-25.5 63H127l24.5-63z" fill="#fff" stroke="#fff"
                                stroke-width="2" />
                            <path
                                d="M131 38h-.69l-.24.64-6 15.5-.52 1.32 1.42.04 20.25.5.7.02.26-.66 6.25-16 .53-1.36H131z"
                                fill="#E8232A" stroke="#fff" stroke-width="2" />
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="155" height="151.921" fill="#fff" />
                            </clipPath>
                        </defs>
                    </svg>
                </b>
                <span class="logo-text ml-1" style="font-size: 12px; font-weigth:900; letter-spacing:1px;">
                    SINAR SEJAHTERA INTI
                </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>


        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                        data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav float-right">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                        href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name}}
                        <img src="{{asset('image/'.auth()->user()->image)}}" alt="{{auth()->user()->image}}"
                            class="rounded-circle" width="31" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.banner.index') }}">
                            <i class="ti-settings px-3"></i>Banner
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="ti-power-off px-3"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</header>
