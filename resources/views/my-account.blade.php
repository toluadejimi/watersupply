    @extends('layouts.myaccount')
    @section('content')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h3 class="font-weight-bold">Hi, {{ $f_name }} {{ $l_name }}</h3>
                                <h6 class="font-weight-normal mb-0">My Account<span class="text-primary"></span>
                                </h6>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6 grid-margin">

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

                            <form class="pt-3" action="/update-account" method="POST">
                                @csrf
                                <div class="card-body col-md-8">


                                    <p class="card-title">Account Information</p>

                                    <div class="form-group">
                                        <label>FIRST NAME</label>
                                        <input type="text" required class="form-control form-control-lg" name="f_name"
                                            id="f_name" placeholder="Enter First Name" value="{{ $f_name }}">
                                    </div>

                                    <div class="form-group">
                                        <label>LAST NAME</label>
                                        <input type="text" required class="form-control form-control-lg" name="l_name"
                                            id="l_name" placeholder="Enter First Name" value="{{ $l_name }}">
                                    </div>

                                    <div class="form-group">
                                        <label>GENDER</label>
                                        <select class="form-control form-control-lg" required name="gender" id="gender">
                                            <option value="{{ $gender }}">{{ $gender }}</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="prefer">Prefer not to say</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>PHONE NUMBER</label>
                                        <input type="text" required class="form-control form-control-lg" name="phone"
                                            id="phone" placeholder="Enter Phone" value="{{ $phone }}">
                                    </div>

                                    <div class="mt-8">
                                        <button a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                            name="submit" type="submit">Update Account</a></button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="col-md-6 grid-margin ">
                        <div class="card">

                            <form class="pt-3" action="/update-info" method="POST">
                                @csrf
                                <div class="card-body col-md-8">


                                    <p class="card-title">Location Information</p>

                                    <div class="form-group">
                                        <label>APT | SUIT | HOUSE | FLAT</label>
                                        <input type="text" required class="form-control form-control-lg" name="apt"
                                            id="apt" placeholder="Enter First Name" value="{{ $apt }}">
                                    </div>

                                    <div class="form-group">
                                        <label>STREET</label>
                                        <input type="text" required class="form-control form-control-lg" name="street"
                                            id="l_name" placeholder="Enter First Name" value="{{ $street }}">
                                    </div>

                                    <div class="form-group">
                                        <label>LGA</label>
                                        <input type="text" required class="form-control form-control-lg" name="lga"
                                            id="lga" placeholder="Enter LGA" value="{{ $lga }}">
                                    </div>


                                    <div class="form-group">
                                        <label>STATE</label>
                                        <input type="text"  class="form-control form-control-lg" name=""
                                            id="state" placeholder="Enter State" value="{{ $state }}">
                                    </div>

                                    <div class="mt-8">
                                        <button a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                            name="submit" type="submit">Update Information</a></button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>


                </div>


























            </div>

        @endsection
