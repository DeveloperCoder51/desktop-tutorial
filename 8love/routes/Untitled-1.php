<section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ is_array($image) && count($image) > 0 ? asset('images/' . $image[0]) : asset('path/to/default/image.jpg') }}"
                                                alt="User profile picture">
                                        </div>

                                        <!-- Form for uploading the profile picture -->
                                        <form id="profilePictureForm" action="" method="POST"
                                            enctype="multipart/form-data" class="d-none">
                                            @csrf
                                            <input type="file" name="profile_picture" id="profilePictureInput">
                                        </form>


                                        <h3 class="profile-username text-center">{{ Auth::user()->user_name }}</h3>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Visitor</b> <a class="float-right">{{ $visitorCount }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Likes</b> <a class="float-right">{{ $likesCount }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Matched</b> <a class="float-right">{{ $matchesCount }}</a>
                                            </li>
                                        </ul>
                                        <div class="card-body box-profile">
                                            {{-- {{ route('image.upload') }} --}}
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div>
                                                    <label for="image">Select Image(s):</label>
                                                    <input type="file" name="image[]" id="image" accept="image/*"
                                                        multiple>
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
                                                    <input type="file" name="video[]" id="video" accept="video/*"
                                                        multiple>

                                                    {{-- @if (count($video) > 0)
                                            <div class="row" style="width: 60%; margin: auto;">
                                                @foreach ($video as $key => $videoItem)
                                                    <div class="col-4 mb-3 video-container">
                                                        <video class="img-fluid" controls>
                                                            <source src="{{ asset('videos/' . $videoItem) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <button class="close-icon" data-video="{{ $videoItem }}">×</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif --}}
                                                </div>
                                                <button type="submit">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active"
                                                    href="{{ route('show') }}">Profile</a>
                                            </li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        @include('web.msg.msg')
                                        <div class="tab-content">

                                            <div class="active tab-pane" id="">
                                                {{-- {{ route('profile_update', $users->id) }} --}}
                                                <form method="POST" action="">
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
                                                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                                        <div class="col-sm-10">
                                                            <select name="gender" id="gender" class="form-control">
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
                                                        <label for="looking_for" class="col-sm-2 col-form-label">Looking
                                                            for</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="looking_for"
                                                                name="looking_for" placeholder="Looking for"
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
                                                        <label for="type" class="col-sm-2 col-form-label">Type</label>
                                                        <div class="col-sm-10">
                                                            <select name="type" id="type" class="form-control">
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
                                                            <button type="submit" class="btn btn-danger">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>