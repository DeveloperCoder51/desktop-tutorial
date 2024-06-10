<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>8Love</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('admin/assets/img/favicon.ico') }}' />
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">

</head>


<body>
    {{-- <div class="loader"></div> --}}
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="menu"></i></a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li>
                        <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                            <i data-feather="maximize"></i>
                        </a>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle"><i data-feather="mail" class="mailAnim"></i>
                            <span class="badge headerBadge1">
                            </span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar
											text-white"> <img alt="image"
                                            src="assets/img/users/user-1.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">John
                                            Deo</span>
                                        <span class="time messege-text">Please check your mail !!</span>
                                        <span class="time">2 Min Ago</span>
                                    </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Request for leave
                                            application</span>
                                        <span class="time">5 Min Ago</span>
                                    </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                                            Ryan</span> <span class="time messege-text">Your payment invoice is
                                            generated.</span> <span class="time">12 Min Ago</span>
                                    </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                                            Smith</span> <span class="time messege-text">hii John, I have upload
                                            doc
                                            related to task.</span> <span class="time">30
                                            Min Ago</span>
                                    </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                                            Joshi</span> <span class="time messege-text">Please do as specify.
                                            Let me
                                            know if you have any query.</span> <span class="time">1
                                            Days Ago</span>
                                    </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Client Requirements</span>
                                        <span class="time">2 Days Ago</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg"><i data-feather="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                                        class="dropdown-item-icon l-bg-orange text-white"> <i
                                            class="far fa-envelope"></i>
                                    </span> <span class="dropdown-item-desc"> You got new mail, please check. <span
                                            class="time">2 Min
                                            Ago</span>
                                    </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon l-bg-purple text-white"> <i class="fas fa-bell"></i>
                                    </span> <span class="dropdown-item-desc"> Meeting with <b>John Deo</b> and <b>Sarah
                                            Smith </b> at
                                        10:30 am <span class="time">10 Hours
                                            Ago</span>
                                    </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon l-bg-green text-white"> <i
                                            class="far fa-check-circle"></i>
                                    </span> <span class="dropdown-item-desc"> Sidebar Bug is fixed by Kevin <span
                                            class="time">12
                                            Hours
                                            Ago</span>
                                    </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-danger text-white"> <i
                                            class="fas fa-exclamation-triangle"></i>
                                    </span> <span class="dropdown-item-desc"> Low disk space error!!!. <span
                                            class="time">17 Hours
                                            Ago</span>
                                    </span>
                                </a>
                                <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-info text-white"> <i
                                            class="fas
												fa-bell"></i>
                                    </span> <span class="dropdown-item-desc"> Welcome to Gati
                                        template! <span class="time">Yesterday</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img
                                alt="image"src="{{ asset('admin/assets/img/WhatsApp Image 2024-06-03 at 14.39.45_19b585fe.jpg') }}">
                            <span class="d-sm-none d-lg-inline-block"></span></a>

                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">{{ Auth::user()->user_name }}</div>
                            <a href="{{ route('show') }}" class="dropdown-item has-icon"> <i
                                    class="far
										fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index-2.html">
                            <img alt="image" src="{{ asset('admin/assets/img/logo.png') }}"
                                class="header-logo" />
                            <span class="logo-name">8Love</span>
                        </a>
                    </div>
                    <div class="sidebar-user">
                        <div class="sidebar-user-picture">
                            <img
                                alt="image"src="{{ asset('admin/assets/img/WhatsApp Image 2024-06-03 at 14.39.45_19b585fe.jpg') }}">

                        </div>
                        <div class="sidebar-user-details">
                            <div class="user-name">{{ Auth::user()->user_name }}</div>
                            <div class="user-role">{{ Auth::user()->role }}</div>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="dropdown active">
                            <a href="{{ route('dashboard') }}" class="nav-link"><i
                                    data-feather="monitor"></i><span>Dashboard</span></a>

                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="user-check"></i><span>User Management</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('user.index') }}">Users List</a></li>
                                <li><a class="nav-link" href="{{ route('user.create') }}">Users Add</a></li>
                        </li>
                    </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('blocklist') }}" class="nav-link"><i
                                data-feather="calendar"></i><span>Block Users</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('user.request_profile') }}" class="nav-link"><i
                                data-feather="check-circle"></i><span>Profile Request</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="mail"></i><span>Inventory</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('category.index') }}">Category</a></li>
                            <li><a class="nav-link" href="{{ route('course.index') }}">Course</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="{{ route('show') }}"><i data-feather="file"></i><span>Profile
                                Page</span></a></li>
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Vendors</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('destinations.index') }}">Destinations</a></li>
                            <li><a class="nav-link" href="">Hotels</a></li>
                            <li><a class="nav-link" href="">Blogs</a></li>
                        </ul>
                    </li>
                    {{--
                    <li class="menu-header">UI Elements</li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="copy"></i><span>Basic
                                Components</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="alert.html">Alert</a></li>
                            <li><a class="nav-link" href="badge.html">Badge</a></li>
                            <li><a class="nav-link" href="breadcrumb.html">Breadcrumb</a></li>
                            <li><a class="nav-link" href="buttons.html">Buttons</a></li>
                            <li><a class="nav-link" href="collapse.html">Collapse</a></li>
                            <li><a class="nav-link" href="dropdown.html">Dropdown</a></li>
                            <li><a class="nav-link" href="checkbox-and-radio.html">Checkbox &amp; Radios</a></li>
                            <li><a class="nav-link" href="list-group.html">List Group</a></li>
                            <li><a class="nav-link" href="media-object.html">Media Object</a></li>
                            <li><a class="nav-link" href="navbar.html">Navbar</a></li>
                            <li><a class="nav-link" href="pagination.html">Pagination</a></li>
                            <li><a class="nav-link" href="popover.html">Popover</a></li>
                            <li><a class="nav-link" href="progress.html">Progress</a></li>
                            <li><a class="nav-link" href="tooltip.html">Tooltip</a></li>
                            <li><a class="nav-link" href="flags.html">Flag</a></li>
                            <li><a class="nav-link" href="typography.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="shopping-bag"></i><span>Advanced</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="avatar.html">Avatar</a></li>
                            <li><a class="nav-link" href="card.html">Card</a></li>
                            <li><a class="nav-link" href="modal.html">Modal</a></li>
                            <li><a class="nav-link" href="sweet-alert.html">Sweet Alert</a></li>
                            <li><a class="nav-link" href="toastr.html">Toastr</a></li>
                            <li><a class="nav-link" href="empty-state.html">Empty State</a></li>
                            <li><a class="nav-link" href="multiple-upload.html">Multiple Upload</a></li>
                            <li><a class="nav-link" href="pricing.html">Pricing</a></li>
                            <li><a class="nav-link" href="tabs.html">Tab</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="blank.html"><i data-feather="file"></i><span>Blank
                                Page</span></a></li>
                    <li class="menu-header">Form</li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="layout"></i><span>Forms</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="basic-form.html">Basic Form</a></li>
                            <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                            <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                            <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                            <li><a class="nav-link" href="form-wizard.html">Form Wizard</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="grid"></i><span>Tables</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="basic-table.html">Basic Tables</a></li>
                            <li><a class="nav-link" href="advance-table.html">Advanced Table</a></li>
                            <li><a class="nav-link" href="datatables.html">Datatable</a></li>
                            <li><a class="nav-link" href="export-table.html">Export Table</a></li>
                            <li><a class="nav-link" href="footable.html">Footable</a></li>
                            <li><a class="nav-link" href="editable-table.html">Editable Table</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="pie-chart"></i><span>Charts</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="chart-amchart.html">amChart</a></li>
                            <li><a class="nav-link" href="chart-apexchart.html">apexchart</a></li>
                            <li><a class="nav-link" href="chart-echart.html">eChart</a></li>
                            <li><a class="nav-link" href="chart-chartjs.html">Chartjs</a></li>
                            <li><a class="nav-link" href="chart-sparkline.html">Sparkline</a></li>
                            <li><a class="nav-link" href="chart-morris.html">Morris</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="feather"></i><span>Icons</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="icon-font-awesome.html">Font Awesome</a></li>
                            <li><a class="nav-link" href="icon-material.html">Material Design</a></li>
                            <li><a class="nav-link" href="icon-ionicons.html">Ion Icons</a></li>
                            <li><a class="nav-link" href="icon-feather.html">Feather Icons</a></li>
                            <li><a class="nav-link" href="icon-weather-icon.html">Weather Icon</a></li>
                        </ul>
                    </li>
                    <li class="menu-header">Media</li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="image"></i><span>Gallery</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="light-gallery.html">Light Gallery</a></li>
                            <li><a href="gallery1.html">Gallery 2</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="flag"></i><span>Sliders</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="carousel.html">Bootstrap Carousel.html</a></li>
                            <li><a class="nav-link" href="owl-carousel.html">Owl Carousel</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="timeline.html"><i
                                data-feather="sliders"></i><span>Timeline</span></a></li>
                    <li class="menu-header">Maps</li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="map"></i><span>Google
                                Maps</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                            <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                            <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                            <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                            <li><a href="gmaps-marker.html">Marker</a></li>
                            <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                            <li><a href="gmaps-route.html">Route</a></li>
                            <li><a href="gmaps-simple.html">Simple</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="vector-map.html"><i data-feather="map-pin"></i><span>Vector
                                Map</span></a></li>
                    <li class="menu-header">Pages</li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="user-check"></i><span>Auth</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="auth-login.html">Login</a></li>
                            <li><a href="auth-register.html">Register</a></li>
                            <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                            <li><a href="auth-reset-password.html">Reset Password</a></li>
                            <li><a href="subscribe.html">Subscribe</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="alert-triangle"></i><span>Errors</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="errors-503.html">503</a></li>
                            <li><a class="nav-link" href="errors-403.html">403</a></li>
                            <li><a class="nav-link" href="errors-404.html">404</a></li>
                            <li><a class="nav-link" href="errors-500.html">500</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="anchor"></i><span>Other
                                Pages</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="create-post.html">Create Post</a></li>
                            <li><a class="nav-link" href="posts.html">Posts</a></li>
                            <li><a class="nav-link" href="profile.html">Profile</a></li>
                            <li><a class="nav-link" href="contact-us.html">Contact</a></li>
                            <li><a class="nav-link" href="invoice.html">Invoice</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="chevrons-down"></i><span>Multilevel</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Menu 1</a></li>
                            <li class="dropdown">
                                <a href="#" class="has-dropdown">Menu 2</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Child Menu 1</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="has-dropdown">Child Menu 2</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Child Menu 1</a></li>
                                            <li><a href="#">Child Menu 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"> Child Menu 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            @yield('content')

        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
    <!-- JS Libraries -->
    <script src="{{ asset('admin/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/assets/bundles/jqvmap/dist/jquery.vmap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/bundles/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script> --}}
    <script src="{{ asset('admin/assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('admin/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS Files -->
    <script src="{{ asset('admin/assets/js/page/index.js') }}"></script>
    <script src="{{ asset('admin/assets/js/page/datatables.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>



</body>

</html>
