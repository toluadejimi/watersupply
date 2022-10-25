<?php

namespace App\Http\Controllers;

use App\Http\Traits\HistoryTrait;
use App\Models\Bank;
use App\Models\BankTransfer;
use App\Models\Cable;
use App\Models\Charge;
use App\Models\DataType;
use App\Models\EMoney;
use App\Models\Power;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vcard;
use App\Services\Encryption;
use Auth;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;

class MainController extends Controller{


    public function user_dashboard(){

        return view('user-dashboard', compact(''));
    }





    











}

