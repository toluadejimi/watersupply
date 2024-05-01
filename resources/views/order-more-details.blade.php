@extends('layouts.orderdetails')

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
                                <h5>Order Information</h5>
                                <span>
                                    @if ($status == '1')
                                        <td><span class="badge rounded-pill bg-success ">Delivered</span></td>
                                    @elseif($status == '3')
                                        <td><span class="badge rounded-pill bg-danger">Rejected</span></td>
                                    @elseif($status == '2')
                                        <td><span class="badge rounded-pill bg-primary">Assigned</span></td>
                                    @else
                                        <td><span class="badge rounded-pill bg-warning">Pending</span></td>
                                    @endif
                                </span>
                            </div>


                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>Order Id</h6>
                                <p> {{ $order_id }} </p>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>Order Amount</h6>
                                <p> NGN {{ number_format($order_amount), 2 }} </p>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>Tank Size</h6>
                                <p> {{ $tank_size }} </p>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>Payment Mode</h6>
                                @if ($payment_mode == 'bank_transfer')
                                    <p>Bank Transfer</p>
                                @else
                                    <p>Wallet</p>
                                @endif
                            </div>




                        </div>

                        <div class="row mt-4">

                            <div class="mb-3">
                                <h5>Customer Information</h5>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>Customer Name</h6>
                                <p> {{ $f_name }} {{ $l_name }} </p>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>Customer Phone</h6>
                                <p> {{ $phone }}</p>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>Customer Email</h6>
                                <p> {{ $email }}</p>
                            </div>


                        </div>

                        <div class="row mt-4 mb-4">

                            <div class="mb-3">
                                <h5>Address Information</h5>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>APT | SUIT | FLOOR | NO</h6>
                                <p> {{ $apt }} </p>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>Street</h6>
                                <p> {{ $street }} </p>
                            </div>


                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>LGA</h6>
                                <p> {{ $lga }} </p>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>STATE</h6>
                                <p> {{ $state }} </p>
                            </div>


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

                            <div class="mb-3">
                                <h5>Assign Order</h5>

                            </div>


                            <div class="col-lg-4">

                                <form method="POST" action="update-order?order_id={{ $order_id }}">
                                    @csrf

                                    <div class="form-group">
                                        <label> Assign order to a Driver </label>
                                        <select class="form-control form-control-lg" required name="driver_id"
                                            id="exampleFormControlSelect2">
                                            <option>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="prefer">Prefer not to say</option>

                                        </select>
                                    </div>



                                    <button a class="mb-5 btn btn-block btn-success btn-lg font-weight-medium auth-form-btn"
                                        name="submit" type="submit">Assign Order</a></button>

                                </form>

                            </div>

                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">

                            </div>

                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                <h6>Assigned Driver</h6>
                                <p> {{ $assigned_driver  ?? null }} </p>
                            </div>








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

                            <div class="col-lg-3">

                                <form method="POST" action="update-order?order_id={{ $order_id }}">
                                    @csrf

                                    <button a class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn"
                                        name="submit" type="submit">Complete Order</a></button>

                                </form>

                            </div>

                            <div class="col-lg-3">

                                <form method="POST" action="reject-order?order_id={{ $order_id }}">
                                    @csrf

                                    <button a class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn"
                                        name="submit" type="submit">Reject Order</a></button>

                                </form>

                            </div>

                            <div class="col-lg-3">

                                <form method="POST" action="delete-order?order_id={{ $order_id }}">
                                    @csrf

                                    <button a class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn"
                                        name="submit" type="submit">Delete Order</a></button>

                                </form>


                            </div>


                        </div>






                    </div>

                </div>
            </div>

        </div>


    @endsection
