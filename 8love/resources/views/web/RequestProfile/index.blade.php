@extends('layouts.app')
@section('content')
    {{-- <div class="content-wrapper">
        <div class="row">
            <div class="offset-1 col-4" style="margin">
                <h1>Request Profile</h1>
                <h6>User Management / Request Profile</h6>
                <style>
                    .side {
                        margin-top: 5%;
                    }

                    .scroller {
                        max-height: 400px;
                        overflow-y: auto;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        padding: 10px;
                        margin-top: 20px;
                    }

                    .user-item {
                        display: flex;
                        align-items: center;
                        padding: 10px;
                        border-bottom: 1px solid #ddd;
                    }

                    .user-item img {
                        width: 40px;
                        height: 40px;
                        border-radius: 50%;
                        margin-right: 10px;
                    }

                    .user-item label {
                        flex: 1;
                        cursor: pointer;
                    }

                    .user-item input[type="checkbox"] {
                        margin-right: 10px;
                    }

                    .btn-rounded-app {
                        border-radius: 20px;
                        padding: 10px 20px;
                    }
                </style>
                <div class="card mt-2 background-card sidebar-content card">
                    <div class="card-content">
                        <div class="card-body " style="position: relative;">
                            <fieldset class="form-group position-relative has-icon-left  p-50">
                                <input type="text" class="form-control round  h-10" value="" id="chat-search"
                                    placeholder="Search People">
                                <div class="form-control-position">
                                    <i class="feather icon-search"></i>
                                </div>
                            </fieldset>

                            <div class="scroller">
                                <form action="{{ route('user.request_process') }}" method="POST">
                                    @csrf
                                    @foreach ($data as $user)
                                        <div class="user-item">
                                            <input type="checkbox" name="users[]" id="user{{ $user->id }}"
                                                value="{{ $user->id }}">
                                            <label for="user{{ $user->id }}">
                                                <img src="{{ $user->profile_image_url ?? 'https://via.placeholder.com/40' }}"
                                                    alt="{{ $user->user_name }}">
                                                {{ $user->user_name }} | {{ $user->country }}<br>

                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="mt-5 m-2">
                                        <div class="vs-checkbox-con">
                                            <input type="checkbox" id="select-all" class="checkbox" value="false">
                                            <span class="vs-checkbox checkbox1 vs-checkbox-lg">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="checkbox-text">Select All</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" id="approve-btn" class="btn btn-info btn-sm">
                                            Approve
                                        </button>
                                    </div>
                                </form>
                            </div>




                        </div>

                        <div class="background-card">

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-7 side">
                @include('web.msg.msg')
                <div class="card background-card">
                    <div class="card-content">
                        <div class="card-body pt-30" style="position: relative;">
                            <div class="row m-2">
                                <div class="col-xl-5 col-md-4 col-sm-1  ">
                                    <div class="card text-center custom-card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="dot-green"></div>
                                                <h2 class="card-h1" style="color: rgb(204, 204, 10); font-size: 40px;">
                                                    Pending Request</h2>
                                                <hr>
                                                <span id="all-request" class="data-value"
                                                    style="color: rgb(204, 204, 10); font-size: 60px;">{{ $pendingCount }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-4 col-sm-1  ">
                                    <div class="card text-center custom-card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="dot-green"></div>
                                                <h2 class="card-h1" style="color: green; font-size: 40px;">Approved</h2>
                                                <hr>
                                                <span id="approve-count" style="color: green; font-size: 60px;"
                                                    class="data-value">{{ $acceptCount }}</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-1  ">
                                    <div class="card text-center custom-card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="dot-red"></div>
                                                <h2 class=" card-h1" style="color: rgb(204, 10, 10); font-size: 40px;">Block
                                                </h2>
                                                <hr>
                                                <span id="block-count" class="data-value"
                                                    style="color: rgb(204, 10, 10); font-size: 60px;">{{ $blockcount }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="user-details-div" class="col-xl-12 col-md-12 col-sm-12 user-details d-none ">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script>
        document.getElementById('select-all').onclick = function() {
            var checkboxes = document.getElementsByName('users[]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script> --}}
    @include('web.msg.msg')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Chat</h4>
                </li>
                <li class="breadcrumb-item">
                    <a href="index-2.html">
                        <i data-feather="home"></i></a>
                </li>
                <li class="breadcrumb-item">Apps</li>
                <li class="breadcrumb-item">Chat</li>
            </ul>
            <div class="section-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4">
                        <div class="card">
                            <div class="body">
                                <div id="plist" class="people-list">
                                    <div class="chat-search">
                                        <input type="text" class="form-control" placeholder="Search..." />
                                    </div>
                                    <div class="m-b-20">
                                        <div class="chat-scroll">
                                            <form action="{{ route('user.request_process') }}" method="POST">
                                                @csrf
                                                @foreach ($data as $user)
                                                    <div class="user-item">
                                                        <input type="checkbox" name="users[]" id="user{{ $user->id }}"
                                                            value="{{ $user->id }}">
                                                        <label for="user{{ $user->id }}">
                                                            <img
                                                                src="{{ $user->profile->image ?? 'https://via.placeholder.com/40' }}">
                                                            {{ $user->user_name }} | {{ $user->country }}<br>

                                                        </label>
                                                    </div>

                                                    @endforeach
                                                    <div class="mt-5 m-2">
                                                        <div class="vs-checkbox-con">
                                                            <input type="checkbox" id="select-all" class="checkbox"
                                                                value="false">
                                                            <span class="vs-checkbox checkbox1 vs-checkbox-lg">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check"></i>
                                                                </span>
                                                            </span>
                                                            <span class="checkbox-text">Select All</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" id="approve-btn" class="btn btn-info btn-sm">
                                                            Approve
                                                        </button>
                                                    </div>
                                              

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-8">
                        @include('web.msg.msg')
                        <div class="card background-card">
                            <div class="card-content">
                                <div class="card-body pt-30" style="position: relative;">
                                    <div class="row m-2">
                                        <div class="col-xl-4 col-md-4 col-sm-4">
                                            <div class="card text-center custom-card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="dot-green"></div>
                                                        <h2 class="card-h1"
                                                            style="color: rgb(204, 204, 10); font-size: 13px;">Pending
                                                            Request</h2>
                                                        <hr>
                                                        <span id="all-request" class="data-value"
                                                            style="color: rgb(204, 204, 10); font-size: 30px;">{{ $pendingCount }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-4 col-sm-4">
                                            <div class="card text-center custom-card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="dot-green"></div>
                                                        <h2 class="card-h1"
                                                            style="color: rgb(204, 204, 10); font-size: 13px;">Approve
                                                            Request</h2>
                                                        <hr>
                                                        <span id="approve-count" style="color: green; font-size: 30px;"
                                                            class="data-value">{{ $acceptCount }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-4 col-sm-4">
                                            <div class="card text-center custom-card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="dot-red"></div>
                                                        <h2 class=" card-h1"
                                                            style="color: rgb(204, 10, 10); font-size: 13px;">Block User
                                                        </h2>
                                                        <hr>
                                                        <span id="block-count" class="data-value"
                                                            style="color: rgb(204, 10, 10); font-size: 30px;">{{ $blockcount }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <script>
        document.getElementById('select-all').onclick = function() {
            var checkboxes = document.getElementsByName('users[]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script>
@endsection
