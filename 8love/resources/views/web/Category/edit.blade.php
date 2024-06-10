@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">

            <div style="margin-left: 1%">
                <h4>Category Update ({{ $category->name }})</h4>
            </div>
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <a href="{{ route('category.index') }}" class="btn btn-primary">Back Category</a>
                </li>
            </ul>
            <div class="card">
                <br>
                <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6" style="margin-left: 1%">
                            <label>Name Category</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Name" value="{{ $category->name }}">
                            @error('name')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <label>Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" placeholder="description" value="{{ $category->description }}">
                            @error('description')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6" style="margin-left: 1%">
                            <label> Status </label>
                            <select name="status" id="status" class="form-control">
                                <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="block" {{ $category->status == 'block' ? 'selected' : '' }}>Block</option>
                            </select>

                            @error('status')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
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

                    <button type="submit" class="btn btn-primary col-lg-12">Category Update</button>
                </form>
            </div>
        @endsection
