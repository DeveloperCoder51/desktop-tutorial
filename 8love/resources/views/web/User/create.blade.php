@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">

            <div>
                <h4>User Create </h4>
            </div>
            
            <div class="card">
                <br>
                <form class="needs-validation" novalidate="" action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <div class="form-row" style="margin-left: 6%">
                        <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name" placeholder="First Name">
                            @error('first_name')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <label>Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                name="last_name" placeholder="Last Name">
                            @error('last_name')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>User Name</label>
                            <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                name="user_name" placeholder="Username">
                            @error('user_name')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <label>Phone</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                placeholder="Phone">
                            @error('phone')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email">
                            @error('email')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <div class="form-group col-md-5">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Country</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                                placeholder="Country">
                        </div>
                    </div>
                    <div class="card-footer text-left" style="margin-left:4%">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        @endsection
