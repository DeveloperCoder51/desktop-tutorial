@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">

            <div style="margin-left: 1%">
                <h4>Create Course </h4>
            </div>
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <a href="{{ route('course.index') }}" class="btn btn-primary">Back Course</a>
                </li>
            </ul>
            <div class="card">
                <br>
                <form method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6" style="margin-left: 1%">
                            <label>Name Course</label>
                            <input type="text" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Course Name ">
                            @error('name')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <label>Description</label>
                            <input type="text" value="{{ old('description') }}"
                                class="form-control @error('description') is-invalid @enderror" name="description"
                                placeholder="description">
                            @error('description')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6" style="margin-left: 1%">
                            <label> Type </label>
                            <select name="type" id="type" class="form-control">
                                <option value="biggener">biggener</option>
                                <option value="intermediate">intermediate</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <label> Status </label>
                            <select name="status" id="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="block">Block</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6" style="margin-left: 1%">
                            <label> Category </label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" selected>Select Category</option>
                                @foreach ($category as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group col-md-5">
                            <label>Student Gain This Course</label>
                            <input type="text" value="{{ old('student_what_gain') }}"
                                class="form-control @error('student_what_gain') is-invalid @enderror"
                                name="student_what_gain" id="student_what_gain">
                            @error('student_what_gain')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6" style="margin-left: 1%">
                            <label> states Rate Course</label>
                            <select name="states" id="states" class="form-control">
                                <option value="popular">Papular</option>
                                <option value="Average">Average</option>
                            </select>
                            @error('states')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <label>Charges</label>
                            <select name="charges" id="charges" class="form-control">
                                <option value="paid">paid</option>
                                <option value="free">free</option>
                            </select>
                            @error('charges')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" id="price-field" style="margin-left: 1%">
                            <label>Price</label>
                            <input type="text" value="{{ old('price') }}"
                                   class="form-control @error('price') is-invalid @enderror"
                                   name="price" id="price">
                            @error('price')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <label> Video Course </label>
                            <input type="file" name="video[]" id="video" multiple
                                class="form-control @error('video') is-invalid @enderror">
                            @error('video.*')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6" style="margin-left: 1%">
                            <label> Audio Course </label>
                            <input type="file" name="audio[]" id="audio" multiple
                                class="form-control @error('audio') is-invalid @enderror">
                            @error('audio.*')
                                <!-- Corrected from 'audios' to 'audio' -->
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                    </div>

                    <div class="card-footer text-left" style="">
                        <button class="btn btn-primary" type="submit">Create Course</button>
                    </div>
                </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    function togglePriceField() {
                        var charges = $('#charges').val();
                        if (charges === 'free') {
                            $('#price-field').hide();
                        } else {
                            $('#price-field').show();
                        }
                    }

                    // Initial check
                    togglePriceField();

                    // Event listener for changes in the charges dropdown
                    $('#charges').change(function() {
                        togglePriceField();
                    });
                });
            </script>
        @endsection
