@extends('layouts.orderpreview')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Hi, {{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</h3>
                            <h6 class="font-weight-normal mb-0">Preview Your Order<span class="text-primary"></span>
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







                    </div>


                    <div class="row">


                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6 grid-margin">

                    <div class="card">

                        <form class="pt-3" action="/confirm-transaction?order_id={{$order_id}}&amount={{$amount}}" method="POST">
                            @csrf
                            <div class="card-body">

                                <h4 class="card-title">Order Preview</h4>

                                <div class="form-group">
                                    <label>DELIVERY DATE</label>
                                    <h6>{{$date}}</h6>
                                </div>

                                <div class="form-group">
                                    <label>TANK INFORMATION</label>
                                    <h6>{{$tank_size}}</h6>
                                </div>

                                <div class="form-group">
                                    <label>REOCCURENCE</label>
                                    @if ($reoccur == 1)
                                    <h6>Yes</h6>
                                    @elseif ($reoccur == 0)
                                    <h6>No</h6>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>OCCURENCE RANGE</label>
                                    <h6>{{$reoccur_range}} Days </h6>
                                </div>

                                <div class="form-group">
                                    <label>PAYMENT METHOD</label>
                                    @if ($payment_mode == 'bank_transfer')
                                    <h6>Bank Transfer</h6>
                                    @elseif ($payment_mode == 'wallet')
                                    <h6>Wallet</h6>
                                    @endif
                                </div>



                            </div>

                            <div class="mt-8">
                                <button a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    name="submit" type="submit" >Confirm Transaction</a></button>
                            </div>
                        </form>
                    </div>
                </div>



                <div class="col-md-6 grid-margin">

                    <div class="card">


                        <form class="pt-3" action="/new-order-now" method="POST">
                            @csrf
                            <div class="card-body">

                                <h4 class="card-title">Bank Infomation</h4>

                                <div class="form-group">
                                    <label>ACCOUNT NAME</label>
                                    <h6>{{$account_name}}</h6>
                                </div>

                                <div class="form-group">
                                    <label>BANK NAME</label>
                                    <h6>{{$bank_name}}</h6>
                                </div>

                                <div class="form-group">
                                    <label>ACCOUNT NUMBER</label>
                                    <h6>{{$account_number}}</h6>
                                </div>

                                <div class="form-group">
                                    <label>PAYMENT REFERENCE</label>
                                    <h6>{{$order_id}}</h6>
                                </div>


                            </div>


                        </form>
                    </div>
                </div>


            </div>






















    </div>

@endsection
