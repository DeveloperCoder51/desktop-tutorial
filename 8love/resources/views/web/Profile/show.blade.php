@extends('layouts.app')
@section('content')
    <style>
        .close-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: none;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .image-container,
        .video-container {
            position: relative;
            display: inline-block;
        }

        .image-container:hover .close-icon,
        .video-container:hover .close-icon {
            display: flex;
        }
    </style>
    <div id="app">
        @include('web.msg.msg')
        <div class="main-wrapper main-wrapper-1">
            <div class="content-wrapper">


                <div class="main-content">
                    <section class="section">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title m-b-0">Profile</h4>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="index-2.html">
                                    <i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Profile</li>
                        </ul>
                        <div class="section-body">
                            <div class="row mt-sm-4">
                                <div class="col-12 col-md-12 col-lg-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="author-box-center">
                                                <img class="rounded-circle author-box-picture"
                                                    src="{{ is_array($image) && count($image) > 0 ? asset('images/' . $image[0]) : asset('path/to/default/image.jpg') }}"
                                                    alt="User profile picture" width="80">
                                                <div class="clearfix"></div>
                                                <div class="author-box-name mt-3">
                                                    <h4><a href="#">{{ Auth::user()->user_name }}</a></h4>
                                                </div>
                                                <div class="author-box-job">
                                                    <h6 class="text-muted">{{ Auth::user()->role }}</h6>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <ul class="list-group list-group-flush">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <b>Visitor</b> <span
                                                            class="badge badge-primary badge-pill">{{ $visitorCount }}</span>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <b>Likes</b> <span
                                                            class="badge badge-success badge-pill">{{ $likesCount }}</span>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <b>Matched</b> <span
                                                            class="badge badge-info badge-pill">{{ $matchesCount }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Make sure to include FontAwesome for social icons -->
                                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
                                        rel="stylesheet">

                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Personal Details</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="py-4">
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Birthday
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        {{ $users->information->birthdate ?? '' }}
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Phone
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        {{ $users->phone ?? '' }}
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        EMail
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        {{ $users->email ?? '' }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-8">
                                    <div class="card">
                                        <div class="padding-20">
                                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab2" data-toggle="tab"
                                                        href="#about" role="tab" aria-selected="true">About</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings"
                                                        role="tab" aria-selected="false">Edit</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content tab-bordered" id="myTab3Content">
                                                <div class="tab-pane fade show active" id="about" role="tabpanel"
                                                    aria-labelledby="home-tab2">
                                                    <div class="row">
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>First Name</strong>
                                                            <br>
                                                            <p class="text-muted">{{ $users->first_name ?? '' }}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>Last Name</strong>
                                                            <br>
                                                            <p class="text-muted">{{ $users->last_name ?? '' }}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>User Name</strong>
                                                            <br>
                                                            <p class="text-muted">{{ $users->user_name ?? '' }}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <strong>Location</strong>
                                                            <br>
                                                            <p class="text-muted">{{ $users->information->location ?? '' }}
                                                            </p>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>Country</strong>
                                                            <br>
                                                            <p class="text-muted">{{ $users->country ?? '' }}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>Role</strong>
                                                            <br>
                                                            <p class="text-muted">{{ $users->role ?? '' }}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>Status Paying</strong>
                                                            <br>
                                                            <p class="text-muted">{{ $users->status ?? '' }}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <strong>Gender</strong>
                                                            <br>
                                                            <p class="text-muted">{{ $users->information->gender ?? '' }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>Relation Status</strong>
                                                            <br>
                                                            <p class="text-muted">
                                                                {{ $users->information->relation_status ?? '' }}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>height</strong>
                                                            <br>
                                                            <p class="text-muted">{{ $users->information->height ?? '' }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>Weight</strong>
                                                            <br>
                                                            <p class="text-muted">{{ $users->information->weight ?? '' }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <strong>Locking For</strong>
                                                            <br>
                                                            <p class="text-muted">
                                                                {{ $users->information->looking_for ?? '' }}</p>
                                                        </div>
                                                        <br>
                                                    </div>
                                                    <div class="row" style="margin-left: 20px">
                                                            <label class="custom-control-label">About US</label>
                                                            {{ $users->information->about }}
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>Location</strong>
                                                            <br>
                                                            <p class="text-muted">
                                                                {{ $users->information->location ?? '' }}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>Intrest</strong>
                                                            <br>
                                                            <p class="text-muted">
                                                                {{ $users->information->interest ?? '' }}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6 b-r">
                                                            <strong>Age</strong>
                                                            <br>
                                                            <p class="text-muted">{{ $users->information->age ?? '' }}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <strong>Type </strong>
                                                            <br>
                                                            <p class="text-muted">
                                                                {{ $users->information->type ?? '' }}</p>
                                                        </div>
                                                        <br>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade" id="settings" role="tabpanel"
                                                    aria-labelledby="profile-tab2">
                                                    <form method="POST"
                                                        action="{{ route('profile_update', $users->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group row">
                                                            <label for="user_name" class="col-sm-2 col-form-label">User
                                                                Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="user_name"
                                                                    name="user_name" placeholder="User Name"
                                                                    value="{{ $users->user_name ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="birthdate"
                                                                class="col-sm-2 col-form-label">BirthDate</label>
                                                            <div class="col-sm-10">
                                                                <input type="date" class="form-control" id="birthdate"
                                                                    name="birthdate" placeholder="BirthDate"
                                                                    value="{{ $users->information->birthdate ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="gender"
                                                                class="col-sm-2 col-form-label">Gender</label>
                                                            <div class="col-sm-10">
                                                                <select name="gender" id="gender"
                                                                    class="form-control">
                                                                    <option value="" selected>Select Gender</option>
                                                                    <option value="male"
                                                                        {{ ($users->information->gender ?? '') === 'male' ? 'selected' : '' }}>
                                                                        Male</option>
                                                                    <option value="female"
                                                                        {{ ($users->information->gender ?? '') === 'female' ? 'selected' : '' }}>
                                                                        Female</option>
                                                                    <option value="other"
                                                                        {{ ($users->information->gender ?? '') === 'other' ? 'selected' : '' }}>
                                                                        Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="relation_status"
                                                                class="col-sm-2 col-form-label">Relation
                                                                Status</label>
                                                            <div class="col-sm-10">
                                                                <select name="relation_status" id="relation_status"
                                                                    class="form-control">
                                                                    <option value="" selected>Select Status</option>
                                                                    <option value="single"
                                                                        {{ ($users->information->relation_status ?? '') === 'single' ? 'selected' : '' }}>
                                                                        Single</option>
                                                                    <option value="married"
                                                                        {{ ($users->information->relation_status ?? '') === 'married' ? 'selected' : '' }}>
                                                                        Married</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="height"
                                                                class="col-sm-2 col-form-label">Height</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="height"
                                                                    name="height" placeholder="Height"
                                                                    value="{{ $users->information->height ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="weight"
                                                                class="col-sm-2 col-form-label">Weight</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="weight"
                                                                    name="weight" placeholder="Weight"
                                                                    value="{{ $users->information->weight ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="looking_for"
                                                                class="col-sm-2 col-form-label">Looking
                                                                for</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    id="looking_for" name="looking_for"
                                                                    placeholder="Looking for"
                                                                    value="{{ $users->information->looking_for ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="location"
                                                                class="col-sm-2 col-form-label">Location</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="location"
                                                                    name="location" placeholder="Location"
                                                                    value="{{ $users->information->location ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="interest"
                                                                class="col-sm-2 col-form-label">Interest</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="interest"
                                                                    name="interest" placeholder="Interest"
                                                                    value="{{ $users->information->interest ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="type"
                                                                class="col-sm-2 col-form-label">Type</label>
                                                            <div class="col-sm-10">
                                                                <select name="type" id="type"
                                                                    class="form-control">
                                                                    <option value="date"
                                                                        {{ ($users->information->type ?? '') === 'date' ? 'selected' : '' ?? '' }}>
                                                                        Date</option>
                                                                    <option value="business"
                                                                        {{ ($users->information->type ?? '') === 'business' ? 'selected' : '' ?? '' }}>
                                                                        Business</option>
                                                                    <option value="friendship"
                                                                        {{ ($users->information->type ?? '') === 'friendship' ? 'selected' : '' ?? '' }}>
                                                                        Friendship</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="about"
                                                                class="col-sm-2 col-form-label">About</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" id="about" name="about" placeholder="About">{{ $users->information->about ?? '' }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="offset-sm-2 col-sm-10">
                                                                <button type="submit"
                                                                    class="btn btn-danger">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>


                                                <div class="card-body box-profile">
                                                    <form action="{{ route('image.upload') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div>
                                                            <label for="image">Select Image(s):</label>
                                                            <input type="file" name="image[]" id="image"
                                                                accept="image/*" multiple>
                                                            @if (is_array($image) && count($image) > 0)
                                                                <div class="row" style="width: 60%; margin: auto;">
                                                                    @foreach ($image as $key => $imageItem)
                                                                        <div class="col-4 mb-3 image-container">
                                                                            <img class="img-fluid"
                                                                                src="{{ asset('images/' . $imageItem) }}"
                                                                                alt="Image {{ $key + 1 }}">
                                                                            <button class="close-icon"
                                                                                onclick="deleteMedia('{{ $imageItem }}', 'image')">×</button>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div>
                                                            <label for="video">Select Video(s):</label>
                                                            <input type="file" name="video[]" id="video"
                                                                accept="video/*" multiple>

                                                            @if (count($video) > 0)
                                                                <div class="row" style="width: 60%; margin: auto;">
                                                                    @foreach ($video as $key => $videoItem)
                                                                        <div class="col-4 mb-3 video-container">
                                                                            <video class="img-fluid" controls>
                                                                                <source
                                                                                    src="{{ asset('videos/' . $videoItem) }}"
                                                                                    type="video/mp4">
                                                                                Your browser does not support the video tag.
                                                                            </video>
                                                                            <button class="close-icon"
                                                                                data-video="{{ $videoItem }}">×</button>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <button type="submit">Upload</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="settingSidebar">
                        <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                        </a>
                        <div class="settingSidebar-body ps-container ps-theme-default">
                            <div class=" fade show active">
                                <div class="setting-panel-header">Setting Panel
                                </div>
                                <div class="p-15 border-bottom">
                                    <h6 class="font-medium m-b-10">Select Layout</h6>
                                    <div class="selectgroup layout-color w-50">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="value" value="1"
                                                class="selectgroup-input-radio select-layout" checked>
                                            <span class="selectgroup-button">Light</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="value" value="2"
                                                class="selectgroup-input-radio select-layout">
                                            <span class="selectgroup-button">Dark</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="p-15 border-bottom">
                                    <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                    <div class="selectgroup selectgroup-pills sidebar-color">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="icon-input" value="1"
                                                class="selectgroup-input select-sidebar">
                                            <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                                data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="icon-input" value="2"
                                                class="selectgroup-input select-sidebar" checked>
                                            <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                                data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="p-15 border-bottom">
                                    <h6 class="font-medium m-b-10">Color Theme</h6>
                                    <div class="theme-setting-options">
                                        <ul class="choose-theme list-unstyled mb-0">
                                            <li title="white" class="active">
                                                <div class="white"></div>
                                            </li>
                                            <li title="cyan">
                                                <div class="cyan"></div>
                                            </li>
                                            <li title="black">
                                                <div class="black"></div>
                                            </li>
                                            <li title="purple">
                                                <div class="purple"></div>
                                            </li>
                                            <li title="orange">
                                                <div class="orange"></div>
                                            </li>
                                            <li title="green">
                                                <div class="green"></div>
                                            </li>
                                            <li title="red">
                                                <div class="red"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="p-15 border-bottom">
                                    <div class="theme-setting-options">
                                        <label class="m-b-0">
                                            <input type="checkbox" name="custom-switch-checkbox"
                                                class="custom-switch-input" id="mini_sidebar_setting">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="control-label p-l-10">Mini Sidebar</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="p-15 border-bottom">
                                    <div class="theme-setting-options">
                                        <label class="m-b-0">
                                            <input type="checkbox" name="custom-switch-checkbox"
                                                class="custom-switch-input" id="sticky_header_setting">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="control-label p-l-10">Sticky Header</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                    <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                        <i class="fas fa-undo"></i> Restore Default
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function deleteMedia(filename, type) {
                if (confirm('Are you sure you want to delete this ' + type + '?')) {
                    fetch(`/delete-media`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                filename: filename,
                                type: type
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert('Failed to delete ' + type);
                            }
                        });
                }
            }
        </script>
    @endsection
