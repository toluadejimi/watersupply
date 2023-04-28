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

                        <form class="pt-3" action="/wallet-confirm-transaction?order_id={{$order_id}}&amount={{$amount}}" method="POST">
                            @csrf
                            <div class="card-body">

                                <h4 class="card-title">Order Preview</h4>

                                <div class="form-group">
                                    <label>DELIVERY DATE</label>
                                    <h6>{{$date}}</h6>
                                    <input type="text" value="{{$date}}" name="date" hidden>
                                </div>

                                <div class="form-group">
                                    <label>TANK INFORMATION</label>
                                    <h6>{{$tank_size}}</h6>
                                    <input type="text" name="tank_size" value="{{$tank_size}}" hidden>
                                </div>

                                <div class="form-group">
                                    <label>REOCCURENCE</label>
                                    @if ($reoccur == 1)
                                    <h6>Yes</h6>
                                    @elseif ($reoccur == 0)
                                    <h6>No</h6>
                                    @endif
                                    <input type="text" name="reoccur" value="{{$reoccur}}" hidden>

                                </div>

                                <div class="form-group">
                                    <label>OCCURENCE RANGE</label>
                                    <h6>{{$reoccur_range}} Days </h6>
                                    <input type="text" name="reoccur_range" value="{{$reoccur_range}}" hidden>

                                </div>

                                <div class="form-group">
                                    <label>PAYMENT METHOD</label>
                                    @if ($payment_mode == 'bank_transfer')
                                    <h6>Bank Transfer</h6>
                                    @elseif ($payment_mode == 'wallet')
                                    <h6>Wallet</h6>
                                    @endif
                                    <input type="text" name="payment_mode" value="{{$payment_mode}}" hidden>

                                </div>



                            </div>

                            <div class="mt-8">
                                <button a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    name="submit" type="submit" >Confirm Transaction</a></button>
                            </div>
                        </form>
                    </div>
                </div>






            </div>






















    </div>

@endsection
