@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">

            <div style="margin-left: 1%">
                <h4>Category </h4>
            </div>
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <a href="{{ route('category.index') }}" class="btn btn-primary">Back Category</a>
                </li>
            </ul>
            <div class="card">
                <br>
                <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6" style="margin-left: 1%">
                            <label>Name Category</label>
                            <input type="text" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name">
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
                            <label> Status </label>
                            <select name="status" id="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="block">Block</option>
                                <option value=""></option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <label> Image </label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                placeholder="image">
                            @error('image')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer text-left">
                        <button class="btn btn-primary" type="submit">Create Category</button>
                    </div>
                </form>
            </div>
        @endsection
