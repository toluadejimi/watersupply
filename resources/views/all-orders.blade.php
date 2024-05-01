@extends('layouts.order')

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
        <div class="row mb-3">


            <div class="row mb-3">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">

                        <div class="card-body p-3">
                            <div class="row">

                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">All Orders</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ number_format($allorders), 2 }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-bold-up text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">

                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Completed</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ number_format($completed_orders), 2 }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-bold-up text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pending</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ number_format($pending_order), 2 }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-bold-down text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Declined</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $declined_orders }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-circle-08 diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="row mt-4">
                <div class="col-lg-5 mb-lg-0 mb-4">

                </div>

            </div>
            <div class="row my-4">
                <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>All Orders</h6>
                                    <p class="text-sm mb-0">
                                    </p>
                                </div>
                                <div class="col-lg-6 col-5 my-auto text-end">

                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
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

                                    <tbody>

                                        @forelse ($orders as $item)
                                            <tr>
                                                <td><a
                                                        href="/order-details/?id={{ $item->id }}">{{ $item->order_id }}</a>
                                                </td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->tank_size }}</td>
                                                @if ($item->status == '1')
                                                    <td><span class="badge rounded-pill bg-success ">Delivered</span>
                                                    </td>
                                                @elseif($item->status == '3')
                                                    <td><span class="badge rounded-pill bg-danger">Rejected</span></td>
                                                @else
                                                    <td><span class="badge rounded-pill bg-warning">Pending</span></td>
                                                @endif
                                                <td>{{ date('F d, Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ date('h:i:s A', strtotime($item->created_at)) }}</td>

                                            </tr>
                                        @empty
                                            <tr colspan="20" class="text-center">No Record Found</tr>
                                        @endforelse


                                    </tbody>
                                    {!! $orders->appends(Request::all())->links() !!}




                                </table>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">

                </div>
            </div>
        @endsection
