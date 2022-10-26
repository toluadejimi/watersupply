@extends('layouts.userdashboardnav')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ $f_name }} {{ $l_name }}</h3>
                            <h6 class="font-weight-normal mb-0">What will like to do today <span class="text-primary"></span>
                            </h6>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card tale-bg">
                        <div class="card-people mt-auto">
                            <img src="{{ url('') }}/public/images/dashboard/people.svg" alt="people">
                            <div class="weather-info">
                                <div class="d-flex">
                                    <div>
                                        <h2 class="mb-0 font-weight-normal"><i
                                                class="icon-sun mr-2"></i>{{ $temp }}<sup>C</sup></h2>
                                    </div>
                                    <div class="ml-2">
                                        <h4 class="location font-weight-normal">Lagos</h4>
                                        <h6 class="font-weight-normal">Nigeria</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>











                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">My Wallet</p>
                                    <p class="fs-30 mb-4">NGN {{$wallet}}</p>
                                    <a button type="button" href="fund-wallet" class="btn btn-inverse-primary btn-fw text-white">Fund Wallet</button> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Order</p>
                                    <p class="fs-30 mb-3">{{$total_order}}</p>
                                    <a button type="button" href="new-order" class="btn btn-inverse-secondary btn-fw text-white">Make an Order</button> </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Money Out</p>
                                    <p class="fs-30 mb-3">NGN {{number_format($money_out), 2}}</p>
                                    <p>All money spent</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Total Pending Orders</p>
                                    <p class="fs-30 mb-3">{{$pending_order}}</p>
                                    <p>All pending orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">

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
                                                    <td>{{$data->order_id}}</td>
                                                    <td>{{number_format($data->amount)  }}</td>
                                                    <td>{{ $data->tank_size }} Liters</td>
                                                    @if($data->status == 0)
                                                    <td><span class="badge rounded-pill bg-warning text-white">Pending</span></td>
                                                    @elseif($data->status == 1)
                                                    <td><span class="badge rounded-pill bg-success text-white">Delivered</span></td>
                                                    @elseif($data->status == 3)
                                                    <td><span class="badge rounded-pill bg-danger text-white">Returned</span></td>
                                                    @endif
                                                    <td>{{date('F d, Y', strtotime($data->date))}}</td>
                                                    <td>{{date('h:i:s A', strtotime($data->date))}}</td>


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
