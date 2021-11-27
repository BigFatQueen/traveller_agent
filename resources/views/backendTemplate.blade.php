<!--

=========================================================
* Argon Dashboard - v1.1.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>
            Lucky Seven
        </title>
        <!-- Favicon -->
        <link
            href="{{ asset('assets/img/brand/favicon.png') }}"
            rel="icon"
            type="image/png"
        />
        <!-- Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
            rel="stylesheet"
        />
        <!-- Icons -->
        <link
            href="{{ asset('assets/js/plugins/nucleo/css/nucleo.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{
                asset(
                    'assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css'
                )
            }}"
            rel="stylesheet"
        />

        <link
            href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
            rel="stylesheet"
        />

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
            crossorigin="anonymous"
        />
        {{-- datatable css --}}
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css"
        />

        {{-- summernote --}}
        <link
            href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="{{asset('js/sweetalert2.min.css')}}">

        <!-- CSS Files -->
        <link
            href="{{ asset('assets/css/argon-dashboard.css?v=1.1.1') }}"
            rel="stylesheet"
        />


        {{-- google font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap" rel="stylesheet">
        
        <style>
            html,
            body {
                height: 100%;
            }

            .my-row-flex {
                display: flex;
                flex-wrap: wrap;
            }

            [class*="col-"] {
                margin-bottom: 30px;
            }

            .content {
                height: 100%;
                padding: 20px 20px 10px;
            }
            @media (max-width: 720px) {
                .profilemedia {
                    text-align: center;
                    margin-left: 183px;
                    margin-right: 0px;
                    margin-top: 0px;
                    padding-top: 0px;
                }
            }

            @media (min-width: 768px) {
                .main-content .container-fluid {
                    padding-left: 20px !important;
                    padding-right: 20px !important;
                }
            }

            .sfont {
                font-size: 0.875rem;
            }
            .my-td {
                max-width: 100px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            .my-td:hover {
                overflow: visible;

                white-space: unset;
            }
            #more {
                display: none;
            }
            body {
                min-height: 100vh;
            }
            #page-content {
                flex: 1 0 auto;
            }
            .my-card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid rgba(0, 0, 0, 0.05);
                border-radius: 0 0 0.375rem 0.375rem;
            }
            .my-ct-page-title {
                padding-left: 1.25rem;
                border-left: 2px solid #fff;
                margin-bottom: 1.5rem;
            }

            .my-td {
                max-width: 150px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            .my-td:hover {
                overflow: visible;

                white-space: unset;
            }

            .inputfile {
                width: 0.1px;
                height: 0.1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }

            .inputfile + label {
                font-size: 1.1em;
                font-weight: 700;
                color: white;
                background-color: orange;
                display: inline-block;
                padding: 2px 6px;
                border-radius: 5px;
                box-shadow: 2px 3px rgba(0, 0, 0, 0.2);
                transition: box-shadow 1s;
                cursor: pointer;
            }

            .inputfile:focus + label,
            .inputfile + label:hover {
                font-size: 1.2em;
                box-shadow: 3px 4px rgba(0, 0, 0, 0.3);
            }
            .package-card:hover {
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
                transition: 1s;
                }

            .dataTable_class_width{
                width: 2em !important;
                
            }

            
        </style>
    </head>

    <body class="">
        <nav
            class="
                navbar navbar-vertical
                fixed-left
                navbar-expand-md navbar-light
                bg-white
            "
            id="sidenav-main"
        >
            <div class="container-fluid">
                <!-- Toggler -->
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#sidenav-collapse-main"
                    aria-controls="sidenav-main"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand pt-0" href="../index.html">
                    <img class="d-inline-block mb-3" src="{{ asset('frontend/assets/travel.svg') }}" width="40" alt="logo" /><span class="fw-bold fs-4 text-primary ms-2">Lucky Seven</span>
                    
                </a>
                <!-- User -->
                <ul class="nav align-items-center d-md-none">
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link nav-link-icon"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <i class="ni ni-bell-55"></i>
                        </a>
                        <div
                            class="
                                dropdown-menu
                                dropdown-menu-arrow
                                dropdown-menu-right
                            "
                            aria-labelledby="navbar-default_dropdown_1"
                        >
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                                >Something else here</a
                            >
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img
                                        alt="Image placeholder"
                                        src="../assets/img/theme/team-1-800x800.jpg
"
                                    />
                                </span>
                            </div>
                        </a>
                        <div
                            class="
                                dropdown-menu
                                dropdown-menu-arrow
                                dropdown-menu-right
                            "
                        >
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a
                                href="./examples/profile.html"
                                class="dropdown-item d-none"
                            >
                                <i class="ni ni-single-02"></i>
                                <span>My profile</span>
                            </a>
                            
                            <a
                                href="route('logout')"
                                class="dropdown-item"
                                onclick="event.preventDefault();
                                                document.getElementById('logoutform').closest('form').submit();"
                            >
                                <i class="ni ni-user-run"></i>

                                Log out

                                <form
                                    method="POST"
                                    id="logoutform"
                                    class="d-inline"
                                    action="{{ route('logout') }}"
                                >
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
                <!-- Collapse -->
                <div
                    class="collapse navbar-collapse"
                    id="sidenav-collapse-main"
                >
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="../index.html">
                                    <img
                                        src="{{
                                            asset('assets/img/brand/blue.png')
                                        }}"
                                    />
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button
                                    type="button"
                                    class="navbar-toggler"
                                    data-toggle="collapse"
                                    data-target="#sidenav-collapse-main"
                                    aria-controls="sidenav-main"
                                    aria-expanded="false"
                                    aria-label="Toggle sidenav"
                                >
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Form -->
                    <form class="mt-4 mb-3 d-md-none">
                        <div
                            class="
                                input-group
                                input-group-rounded
                                input-group-merge
                            "
                        >
                            <input
                                type="search"
                                class="
                                    form-control
                                    form-control-rounded
                                    form-control-prepended
                                "
                                placeholder="Search"
                                aria-label="Search"
                            />
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-search"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <!-- admin/car/hotel start -->
                        @hasanyrole('admin')
                            <!-- city  -->
                            <li
                                class="nav-item {{ Request::is('city*') ? 'active' : '' }} "
                            >
                                <a
                                    class="nav-link"
                                    href="{{ route('city.index') }}"
                                >
                                    <i class="ni ni-tv-2 text-primary"></i> City
                                </a>
                            </li>
                           
                        
                         <!-- type -->
                            <li
                                class="nav-item {{ Request::is('type*') ? 'active' : '' }}"
                            >
                                <a
                                    class="nav-link"
                                    href="{{ route('type.index') }}"
                                >
                                    <i class="ni ni-pin-3 text-orange"></i> Type
                                </a>
                            </li>
                            @endhasanyrole

                        @hasanyrole('admin|car')
                        <!-- admin/car -->
                            @role('car')
                            <li
                                class="nav-item {{ Request::is('dashboard/car') ? 'active' : '' }}"
                            >
                                <a
                                    class="nav-link"
                                    href="{{ route('dashboard.car') }}"
                                >
                                    <i class="ni ni-planet text-blue"></i>
                                    Dashboard
                                </a>
                            </li>
                            @endrole
                            <!-- pickup location -->

                            <li
                                class="nav-item {{ Request::is('pickup*') ? 'active' : '' }}"
                            >
                                <a
                                    class="nav-link"
                                    href="{{ route('pickup.index') }}"
                                >
                                    <i class="ni ni-planet text-blue"></i>
                                    Pickup_location
                                </a>
                            </li>
                            <!-- brand for car -->
                            <li
                                class="nav-item {{ Request::is('brand*') ? 'active' : '' }}"
                            >
                                <a
                                    class="nav-link"
                                    href="{{ route('brand.index') }}"
                                >
                                    <i class="ni ni-pin-3 text-orange"></i> Brand
                                </a>
                            </li>
                            <!-- car  -->
                            <li
                                class="nav-item {{ Request::is('car*') ? 'active' : '' }}"
                            >
                                <a class="nav-link" href="{{ route('car.index') }}">
                                    <i class="ni ni-single-02 text-yellow"></i> Cars
                                </a>
                            </li>
                        @endhasanyrole
                        
                        @hasanyrole('admin|hotel')
                        <!-- admin/hotel -->
                            @role('hotel')
                            <li
                                class="nav-item {{ Request::is('dashboard/hotel') ? 'active' : '' }}"
                            >
                                <a
                                    class="nav-link"
                                    href="{{ route('dashboard.hotel') }}"
                                >
                                    <i class="ni ni-planet text-blue"></i>
                                    Dashboards
                                </a>
                            </li>
                            @endrole
                            <!-- Facility Category -->
                            <li
                                class="nav-item {{ Request::is('fcategory*') ? 'active' : '' }}"
                            >
                                <a
                                    class="nav-link"
                                    href="{{ route('fcategory.index') }}"
                                >
                                    <i class="ni ni-single-02 text-yellow"></i>
                                    Facility Category
                                </a>
                            </li>
                            <!-- sub-facilties -->
                            <li
                                class="nav-item {{ Request::is('facility*') ? 'active' : '' }}"
                            >
                                <a
                                    class="nav-link"
                                    href="{{ route('facility.index') }}"
                                >
                                    <i class="ni ni-single-02 text-yellow"></i>
                                    Facility sub Category
                                </a>
                            </li>
                            <!-- hotel room -->
                            <li
                                class="nav-item {{ Request::is('room') ? 'active' : '' }}"
                            >
                                <a
                                    class="nav-link"
                                    href="{{ route('room.index') }}"
                                >
                                    <i class="ni ni-single-02 text-yellow"></i>
                                    Hotel Room
                                </a>
                            </li>
                        @endhasanyrole
                        @role('admin')
                        <!-- admin  -->
                            <!-- partnership  -->
                            <li
                                class="nav-item {{ Request::segment(1) === 'partnerships' || Request::segment(1) === 'detail' ? 'active' : '' }}"
                            >
                                <a
                                    class="nav-link"
                                    href="{{ route('partnership') }}"
                                >
                                    <i class="ni ni-bullet-list-67 text-red"></i>
                                    Partnership
                                </a>


                                <input
                                    type="hidden"
                                    name="url"
                                    value="{{Request::segment(1)}}"
                                    class="url"
                                />
                            </li>


                            <li class="nav-item {{ Request::segment(1) === 'feedbacks' || Request::segment(1) === 'detail' ? 'active' : '' }}"
                            >
                                <a
                                    class="nav-link "
                                    href="{{ route('feedbacks') }}"
                                >
                                    <i class="fas fa-comments text-orange"></i>
                                    Feedback
                                </a>

                            </li>
                        @endrole
                    </ul>
                    <!-- booking url div  -->
                    <!-- Divider -->
                    <hr class="my-3" />
                    <!-- Heading -->
                    <h6 class="navbar-heading text-muted">Booking list</h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                    @hasanyrole('admin|car')
                        <li
                            class="nav-item {{ Request::is('list*') ? 'active' : '' }}"
                        >
                            <a class="nav-link" href="{{ route('list.car') }}">
                                <i class="ni ni-key-25 text-info"></i>
                                Car-Bookings
                            </a>
                        </li>
                        @role('car')
                        <li
                            class="nav-item {{ Request::is('detail/*') ? 'active' : '' }}"
                        >
                            <a
                                class="nav-link"
                                href="{{ route('company.detail',Auth::user()->company->id) }}"
                            >
                                <i class="ni ni-circle-08 text-pink"></i>
                                Profile 
                            </a>
                        </li>
                        @endrole
                    @endhasanyrole

                    @hasanyrole('admin|hotel')

                        <li
                            class="nav-item {{ Request::is('room/hotel/bookings') ? 'active' : '' }}"
                        >
                            <a
                                class="nav-link"
                                href="{{ route('backend.hotel.bookinglist') }}"
                            >
                                <i class="ni ni-circle-08 text-pink"></i>
                                Hotel-Booking
                            </a>
                        </li>
                        @role('hotel')
                        <li
                            class="nav-item {{ Request::is('detail/*') ? 'active' : '' }}"
                        >
                            <a
                                class="nav-link"
                                href="{{ route('company.detail',Auth::user()->company->id) }}"
                            >
                                <i class="ni ni-circle-08 text-pink"></i>
                                Profile 
                            </a>
                        </li>
                        @endrole

                    @endhasanyrole
                    </ul>
                    <!-- booking package url div end -->
                   @role('admin')
                    <!-- Heading -->
                    <h6 class="navbar-heading text-muted">Package</h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="{{ route('tour.index') }}"
                            >
                                <i class="ni ni-spaceship"></i> Tour Places
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="{{ route('package.index') }}"
                            >
                                <i class="ni ni-palette"></i> Packages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="{{route('backend.package.bookinglist')}}"
                            >
                                <i class="ni ni-ui-04"></i> Package Booknig
                            </a>
                        </li>
                    </ul>
                    <!-- booking url div  -->
                    <!-- Divider -->
                    <hr class="my-3" />
                    <!-- Heading -->
                    <h6 class="navbar-heading text-muted"></h6>
                    <!-- Navigation -->
                    @endrole
                    
                </div>
            </div>
        </nav>
        <div class="main-content">
            <!-- Navbar -->
            <nav
                class="navbar navbar-top navbar-expand-md navbar-dark"
                id="navbar-main"
            >
                <div class="container-fluid">
                    <!-- Brand -->
                    <a
                        class="
                            h4
                            mb-0
                            text-white text-uppercase
                            d-none d-lg-inline-block
                        "
                        href="../index.html"
                        >Tables</a
                    >
                    <!-- Form -->
                    <form
                        class="
                            navbar-search navbar-search-dark
                            form-inline
                            mr-3
                            d-none d-md-flex
                            ml-lg-auto
                        "
                    >
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                        ><i class="fas fa-search"></i
                                    ></span>
                                </div>
                                <input
                                    class="form-control"
                                    placeholder="Search"
                                    type="text"
                                />
                            </div>
                        </div>
                    </form>
                    <!-- User -->
                    <ul class="navbar-nav align-items-center d-none d-md-flex">
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link pr-0"
                                href="#"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <div class="media align-items-center">
                                    <span
                                        class="avatar avatar-sm rounded-circle"
                                    >
                                        <img
                                            alt="Image placeholder"
                                            src="{{
                                                asset(
                                                    'assets/img/theme/team-4-800x800.jpg'
                                                )
                                            }}"
                                        />
                                    </span>
                                    <div
                                        class="
                                            media-body
                                            ml-2
                                            d-none d-lg-block
                                        "
                                    >
                                        <span
                                            class="
                                                mb-0
                                                text-sm
                                                font-weight-bold
                                            "
                                        >
                                            @if(Auth::check())
                                            {{Auth::user()->name}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <div
                                class="
                                    dropdown-menu
                                    dropdown-menu-arrow
                                    dropdown-menu-right
                                "
                            >
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <!-- <a
                                    href="../examples/profile.html"
                                    class="dropdown-item"
                                >
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a> -->
                                
                                <a
                                    href="route('logout')"
                                    class="dropdown-item"
                                    onclick="event.preventDefault();
                                                document.getElementById('logoutform').closest('form').submit();"
                                >
                                    <i class="ni ni-user-run"></i>

                                    Log out

                                    <form
                                        method="POST"
                                        id="logoutform"
                                        class="d-inline"
                                        action="{{ route('logout') }}"
                                    >
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
            <!-- Header -->
            @yield('main-content')
        </div>
        <!--   Core   -->
        <script src="{{
                asset('assets/js/plugins/jquery/dist/jquery.min.js')
            }}"></script>
        <script src="{{
                asset(
                    'assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js'
                )
            }}"></script>
        <!--   Optional JS   -->
        <!--   Optional JS   -->
        <script src="{{asset('assets/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/chart.js/dist/Chart.extension.js')}}"></script>
        {{-- datatable js   --}}

        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
            integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
            integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/"
            crossorigin="anonymous"
        ></script>

        <script
            type="text/javascript"
            language="javascript"
            src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"
        ></script>

        <script
            type="text/javascript"
            language="javascript"
            src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"
        ></script>
        {{-- datatable js   --}}
        <!--   Argon JS   -->
        <script src="{{
                asset('assets/js/argon-dashboard.js')
            }}"></script>
        <!-- <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
        {{-- summernote --}}
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <!-- <script>
            window.TrackJS &&
                TrackJS.install({
                    token: "ee6fab19c5a04ac1a32a645abde4613a",
                    application: "argon-dashboard-free",
                });
        </script> -->

        <script>
            $(".summernote").summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ["style", ["bold", "italic", "underline", "clear"]],
                    ["font", ["strikethrough", "superscript", "subscript"]],
                    ["fontsize", ["fontsize"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["height", ["height"]],
                    ["insert", ["link"]],
                ],
            });

            $(".summernote_tour").summernote();
        </script>
        @yield('script')
        <script type="text/javascript">
            $(document).ready(function (argument) {
                if ($(".url").val() != "detail") {
                    localStorage.clear();
                }
            });
            
        </script>
    </body>
</html>
