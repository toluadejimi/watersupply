@extends('layouts.security')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Hi, {{ $f_name }} {{ $l_name }}</h3>
                            <h6 class="font-weight-normal mb-0">Security Settings <span class="text-primary"></span>
                            </h6>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin ">
                    <div class="card">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                        <form class="pt-3" action="/update-email" method="POST">
                            @csrf
                            <div class="card-body col-md-8">


                                <p class="card-title">Update Email</p>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" required class="form-control form-control-lg" name="email"
                                        id="email" placeholder="Enter your email" value="{{ $email }}">
                                </div>


                                <div class="mt-8">
                                    <button a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        name="submit" type="submit">Update Email</a></button>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">

                        <form class="pt-3" action="/update-password" method="POST">
                            @csrf
                            <div class="card-body col-md-8">


                                <p class="card-title">Update Password</p>

                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" required class="form-control form-control-lg" name="old_password"
                                        id="old_password" placeholder="Enter your old password">
                                </div>

                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" required class="form-control form-control-lg" name="password"
                                        id="password" placeholder="Enter your new password">
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" required class="form-control form-control-lg" name="password_confirmation"
                                        id="password" placeholder="Confirm your password">
                                </div>

                                <div class="mt-8">
                                    <button a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        name="submit" type="submit">Change password</a></button>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>


            </div>


























        </div>

    @endsection
