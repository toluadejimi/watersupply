@extends('layouts.userdashboardnav')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
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
                        <h3 class="font-weight-bold">Welcome {{ $f_name }} {{ $l_name }}</h3>
                        <h6 class="font-weight-normal mb-0">What would like to do today? <span
                                class="text-primary"></span>
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
                                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>{{ $temp
                                        }}<sup>C</sup></h2>
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
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">My Orders</p>
                                <p class="fs-30 mb-3">{{$total_order}}</p>


                                <a button type="button" href="new-order" class="btn btn-primary" >
                                    Make an order
                                </button></a>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">My Wallet</p>
                                <p class="fs-30 mb-4">NGN {{number_format(Auth::user()->wallet)}}</p>

                                <div class="modal fade" id="pay" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <h5 class="modal-title btn-fw text-dark" id="staticBackdropLabel">Fund
                                                    your Wallet</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>


                                            <div class="modal-body">


                                                <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8">

                                                    <div class="form-group col-lg-8">
                                                        <h5 class="mb-2 text-dark">Enter Amount to Fund(NGN)</h5>
                                                        <input type="number" required
                                                            class="form-control form-control-lg mt-3" name="amount"
                                                            id="exampleInputPassword1" placeholder="200">
                                                    </div>




                                                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                                    {{--
                                                    required --}}




                                                    <input type="hidden" name="currency" value="NGN">

                                                    {{-- <input type="hidden" name="reference"
                                                        value="{{ Paystack::genTranxRef() }}">
                                                    {{ csrf_field() }} --}}


                                                    <div class="row">
                                                        <div class="col-lg-6 mb-2">
                                                            <button class="btn btn-primary btn-lg btn-block"
                                                                type="submit" value="Pay Now!">

                                                                <i class="fa fa-plus-circle fa-lg"></i> Pay
                                                                Now!</button>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <a button href="fund-history"
                                                                class="btn btn-secondary btn-lg btn-block">Fund
                                                                History</button></a>
                                                        </div>
                                                    </div>






                                                </form>

                                            </div>










                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-inverse-primary btn-fw text-white"
                                    data-bs-toggle="modal" data-bs-target="#pay">
                                    Fund Wallet
                                </button>

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
                                                <td>{{number_format($data->amount) }}</td>
                                                <td>{{ $data->tank_size }} Liters</td>
                                                @if($data->status == 0)
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
                                                <td>{{date('F d, Y', strtotime($data->created_at))}}</td>
                                                <td>{{date('h:i:s A', strtotime($data->created_at))}}</td>


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

    <script>
        var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
    </script>
    @endsection
