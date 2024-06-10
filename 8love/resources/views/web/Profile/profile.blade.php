@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <div class="text-center">
                                        {{-- <img class="profile-user-img img-fluid img-circle"
                                 src="{{ (is_array($image) && count($image) > 0) ? asset('images/' . $image[0]) : asset('path/to/default/image.jpg') }}"
                                 alt="User profile picture"> --}}
                                    </div>




                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->user_name }}</h3>

                                <p class="text-muted text-center">{{ Auth::user()->email }}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        {{-- <b>Visitor</b> <a class="float-right">{{ $visitorCount }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Likes</b> <a class="float-right">{{ $likesCount }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Matched</b> <a class="float-right">{{ $matchesCount  }}</a> --}}
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i>About Me</strong>

                                <p class="text-muted">
                                    {{ $users->information->about ?? '' }}
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">{{ $users->information->location ?? '' }}</p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Profile Type</strong>

                                <p class="text-muted">{{ $users->information->type ?? '' }}</p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Interest</strong>

                                <p class="text-muted">{{ $users->information->interest ?? '' }}</p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Relation</strong>

                                <p class="text-muted">{{ $users->information->relation_status ?? '' }}</p>

                                <hr>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <a class="nav-link active" href="{{ route('profile_edit') }}">Edit Profile</a>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">User Profile</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>First Name</b> <span>{{ $users->first_name ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>Last Name</b> <span>{{ $users->last_name ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>Phone</b> <span>{{ $users->phone ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>BirthDate</b> <span>{{ $users->information->birthdate ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>Gender</b> <span>{{ $users->information->gender ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>Height</b> <span>{{ $users->information->height ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>Weight</b> <span>{{ $users->information->weight ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>Age</b> <span>{{ $users->information->age ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>status</b> <span>{{ $users->status ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>Country</b> <span>{{ $users->country ?? '' }}</span>
                                        </li>
                                    </ul>
                                </div>



                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h4 class="card-title">Images</h4>
                                    </div>
                                    <div class="card-body">
                                        {{-- <div id="imageCarousel" class="carousel slide" data-ride="carousel" style="width: 20%; margin:auto;">
                                    <div class="carousel-inner">
                                        @foreach ($image as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img class="d-block" src="{{ asset('images/'.$image) }}" alt="Image {{ $key + 1 }}">
                                        </div>
                                    @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div> --}}
                                    </div>
                                </div>

                                <!-- Static Videos with Slider -->
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h4 class="card-title">Videos</h4>
                                    </div>
                                    <div class="card-body">
                                        {{-- <div id="videoCarousel" class="carousel slide" data-ride="carousel" style="width: 40%; margin:auto;">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" class="text-center">
                                            @foreach ($video as $key => $video)
                                            <video class="d-block {{ $key == 0 ? 'active' : '' }}" controls>
                                                <source src="{{ asset('videos/'.$video) }}"  type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endforeach
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#videoCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#videoCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div> --}}
                                    </div>
                                </div>


                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
