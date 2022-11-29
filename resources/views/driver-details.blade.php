@extends('layouts.driverdetails')

@section('content')
    <div class="container-fluid py-4">
        <div class="col-6 w-100">
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
        </div>

        <div class="row my-1">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">


                            <div class="mb-3">
                                <h5>{{ $f_name }} {{ $l_name }}</h5>
                                <span>

                                </span>
                            </div>


                            <form method="POST" action="update-driver" enctype="multipart/form-data">
                                @csrf

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>First Name</label>
                                    <input class="form-control form-control-lg" name="f_name" autofocus required value="{{$f_name}}">
                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Last Name</label>
                                    <input class="form-control form-control-lg" name="l_name" autofocus required value="{{$l_name}}">
                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4 form-group">
                                    <label> Gender </label>
                                    <select class="form-control form-control-lg" required name="gender"
                                        id="exampleFormControlSelect2">
                                        <option value="{{$gender}}">{{$gender}}</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="prefer">Prefer not to say</option>

                                    </select>
                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Phone Number</label>
                                    <input class="form-control form-control-lg" name="phone" autofocus required value="{{$phone}}">

                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Licence No</label>
                                    <input class="form-control form-control-lg" name="licence_no" autofocus value="{{$licence_no}}">

                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Upload Licence</label>
                                    <input type="file" class="form-control form-control-lg" name="licence_image"
                                        autofocus>

                                </div>





                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Email</label>
                                    <input class="form-control form-control-lg" name="email" autofocus required value="{{$email}}">

                                </div>



                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4 mt-2">
                                    <label>Password</label>
                                    <input class="form-control form-control-lg" name="password" autofocus required>

                                </div>

                                <button a class="btn btn-block btn-primary btn-lg mt-4 font-weight-medium auth-form-btn"
                                    name="submit" type="submit">Update Driver</a></button>



                            </form>









                        </div>






                    </div>

                </div>
            </div>

        </div>



        <div class="row mt-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-0">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">

                            <div class="col-lg-6 mb-5">

                                <div class="col-lg-6 col-md-6 mb-md-0 mt-2 mb-7">
                                    <h6>Driver Licence Image</h6>
                                    @if ($image == null)

                                    <p> No Image</p>
                                    @else
                                    <img src="{{url('/public/uploads/driver')}}/{{$image}}" width="250" height="180">
                                    @endif

                                </div>

                            </div>






                        </div>






                    </div>

                </div>
            </div>

        </div>


    @endsection
