@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">

            <div style="margin-left: 1%">
                <h4>Destination Update ({{ $destination->name }})</h4>
            </div>
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <a href="{{ route('destinations.index') }}" class="btn btn-primary">Back Destination</a>
                </li>
            </ul>
            <div class="card">
                <br>
                <form method="POST" action="{{ route('destinations.update', $destination->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6" style="margin-left: 1%">
                            <label>Name destination</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Name" value="{{ $destination->name }}">
                            @error('name')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <label>Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" placeholder="description" value="{{ $destination->description }}">
                            @error('description')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6" style="margin-left: 1%">
                            <label> Status </label>
                            <select name="status" id="status" class="form-control">
                                <option value="active" {{ $destination->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="block" {{ $destination->status == 'block' ? 'selected' : '' }}>Block</option>
                            </select>

                            @error('status')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5" style="margin-left: 1%">
                            <label> Type </label>
                            <select name="type" id="type" class="form-control">
                                <option value="mostpopular" {{ $destination->type == 'mostpopular' ? 'selected' : '' }}>Most Popular</option>
                                <option value="popular" {{ $destination->type == 'popular' ? 'selected' : '' }}>popular</option>
                            </select>

                            @error('type')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5" style="margin-left: 1%">
                            <label>Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                placeholder="image">
                            @error('image')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if (isset($category->image))
                                <div class="mt-2">
                                    <img src="{{ asset('category/' . $category->image) }}" alt="Category Image"
                                        style="max-width: 100%;">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer text-left">
                        <button class="btn btn-primary" type="submit">Update Destination</button>
                    </div>
                </form>
            </div>
        @endsection
