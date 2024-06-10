{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Love Love Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="/"><b>8Love</b>Register</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <form action="{{ route('registerAction') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('first_name')
                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('last_name')
                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="user_name" placeholder="User Name" value="{{ old('user_name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('user_name')
                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    @error('phone')
                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="country" placeholder="Country" value="{{ old('country') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-flag"></span>
                            </div>
                        </div>
                    </div>
                    @error('country')
                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
                

                <a href="{{ route('login_view') }}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>8Love</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/bootstrap-social/bootstrap-social.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('admin/assets/img/favicon.ico') }}' />
</head>


<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('registerAction') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="first_name">First Name</label>
                                            <input id="first_name" type="text" class="form-control" name="first_name"
                                                autofocus>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Last Name</label>
                                            <input id="last_name" type="text" class="form-control" name="last_name">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="user_name">User Name</label>
                                            <input id="user_name" type="text" class="form-control" name="user_name">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="phone">Phone</label>
                                            <input id="phone" type="text" class="form-control" name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input id="country" type="country" class="form-control" name="country">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="email">Email</label>
                                            <input id="email" type="text" class="form-control" name="email">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password">Password</label>
                                            <input id="password" type="text" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-4 text-muted text-center">
                                Already Registered? <a href="{{ route('login_view') }}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
    <!-- JS Libraries -->
    <script src="{{ asset('admin/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/assets/js/page/auth-register.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

</body>

</html>
