@extends('layouts.newordernav')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Hi, {{ $f_name }} {{ $l_name }}</h3>
                        <h6 class="font-weight-normal mb-0">Request for a new order<span class="text-primary"></span>
                        </h6>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">

            </div>

            <div class="col-md-6 grid-margin stretch-card">

            </div>











            <div class="col-md-12 grid-margin transparent">
                <div class="row">
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">My Wallet</p>
                                <p class="fs-30 mb-4">NGN {{$user_wallet}}</p>
                                <a button type="button" href="fund-wallet"
                                    class="btn btn-inverse-primary btn-fw text-white">Fund Wallet</button> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Successful Order</p>
                                <p class="fs-30 mb-4">{{ $delivered_order }}</p>
                                <p>Total Delivered Order</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Pending Order</p>
                                <p class="fs-30 mb-4">{{ $pending_order }}</p>
                                <p>Total Order on the way</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Money Out</p>
                                <p class="fs-30 mb-4">NGN{{ number_format($money_out), 2 }}</p>
                                <p>Total Money Spent</p>

                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">


                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">

                <div class="card">

                    <form class="pt-3" action="/new-order-now" method="POST">
                        @csrf
                        <div class="card-body">
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

                            <h4 class="card-title">Create New Order</h4>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Choose Delivery Date</label>
                                        <input type="date" required class="form-control form-control-lg"
                                            name="delivery_date" id="exampleInputPassword1" placeholder="Select Date">
                                    </div>
                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Select Tank Size</label>
                                        <select class="js-example-basic-single w-100" name="tank_id" id="tanl_size"
                                            class="form-control" required>
                                            <option value="">Select Tank Size</option>
                                            @foreach ($tank_size as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Will you like this order to reoccur?</label>
                                        <select class="form-control " name="reoccur" required>
                                            <option value="">Choose one</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                </div>


                                <div class="col-lg-3">



                                    <div class="form-group">
                                        <label>Occurrence Range</label>
                                        <select class="form-control " name="reoccur_range">
                                            <option value="">Choose one</option>
                                            <option value="7">1 Week</option>
                                            <option value="14">2 Weeks</option>
                                            <option value="21">3 Weeks</option>
                                            <option value="28">4 Weeks</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="col-lg-3">


                                    <div class="form-group">
                                        <label>Select Payment Mode</label>
                                        <select class="form-control" name="payment_mode" required>
                                            <option value="">Choose one</option>
                                            <option value="wallet">Wallet</option>
                                            <option value="bank_transfer">Bank Transfer</option>


                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-6">


                                    <div class="mt-5">
                                        <button a
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                            name="submit" type="submit">Continue</a></button>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </form>
                </div>
            </div>



            <div class="col-md-6 grid-margin">

                <div class="card">


                    <form class="pt-3" action="/new-order-now" method="POST">
                        @csrf
                        <div class="card-body">

                            <h4 class="card-title">Delivery Infomation</h4>

                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" required class="form-control form-control-lg"
                                            value="{{$f_name}} {{$l_name}}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">


                                    <div class="form-group">
                                        <label>Apt | Suit | Room</label>
                                        <input type="text" required class="form-control form-control-lg"
                                            value="{{$user_apt}}" readonly>
                                    </div>

                                </div>

                                <div class="col-lg-6">


                                    <div class="form-group">
                                        <label>Street</label>
                                        <input type="text" required class="form-control form-control-lg"
                                            value="{{$user_street}}" readonly>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Local Govt</label>
                                        <input type="text" required class="form-control form-control-lg"
                                            value="{{$user_lga}}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">


                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" required class="form-control form-control-lg"
                                            value="{{$user_state}}" readonly>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </form>
                </div>
            </div>


        </div>






















        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Recent Order</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="example" class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Amount</th>
                                                <th>Tank Size</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Time</th>


                                            </tr>


                                        </thead>

                                        <tbody class="table-border-bottom-0">



                                            @forelse ($orders as $data)
                                            <tr>
                                                <td>{{ $data->order_id }}</td>
                                                <td>{{ number_format($data->amount) }}</td>
                                                <td>{{ $data->tank_size }} Liters</td>
                                                @if ($data->status == 0)
                                                <td><span
                                                        class="badge rounded-pill bg-warning text-white">Pending</span>
                                                </td>
                                                @elseif($data->status == 1)
                                                <td><span
                                                        class="badge rounded-pill bg-success text-white">Delivered</span>
                                                </td>
                                                @elseif($data->status == 3)
                                                <td><span
                                                        class="badge rounded-pill bg-danger text-white">Returned</span>
                                                </td>
                                                @endif
                                                <td>{{ date('F d, Y', strtotime($data->created_at)) }}</td>
                                                <td>{{ date('h:i:s A', strtotime($data->created_at)) }}</td>


                                            </tr>
                                            @empty
                                            <tr colspan="20" class="text-center">No History Found</tr>
                                            @endforelse







                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
