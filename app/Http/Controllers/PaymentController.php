<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Paystack;
use App\Models\Bank; // Paystack package
use Illuminate\Support\Facades\Redirect;


// User model

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        // try{
        return Paystack::getAuthorizationUrl()->redirectNow();
        // }catch(\Exception $e) {
        return back()->with('error', 'The paystack token has expired. Please refresh the page and try again');
        // }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(request $request)
    {
        $ref = $request->reference;

        $check = Paystack::getPaymentData($ref);

        //$status = $check['status'];
        $amount_in_kobo = $check['data']['requested_amount'];

        $amount_in_naira = $amount_in_kobo / 100;

        $wallet = User::where('id', Auth::id())
        ->first()->wallet;

        $chk_ref = Transaction::where('ref_trans_id', $ref)
        ->first()->ref_trans_id ?? null;

        if($chk_ref == $ref){
            return back()->with('error', "Transaction has successfully  been funded, Create a new funding");
        }


        $credit = $wallet + $amount_in_naira;

        $update = User::where('id', Auth::id())
        ->update(['wallet' => $credit]);

            $transaction = new Transaction();
            $transaction->ref_trans_id = $ref;
            $transaction->user_id = Auth::id();
            $transaction->type = "Funding";
            $transaction->status = 1;
            $transaction->balance = $credit;
            $transaction->amount = $amount_in_naira;
            $transaction->note = "Paystack Funding | NGN $amount_in_naira ";
            $transaction->save();




    return redirect('fund-history')->with('message', "Congratulations your wallet has been successfully funded with NGN" . " " . number_format($amount_in_naira));



    }

    public function funding()
    {


        $money_in = Transaction::where('user_id', Auth::id())
        ->sum('amount');

        $successful_funding = Transaction::where('user_id', Auth::id())
        ->count();

        $funding = Transaction::latest()->where('user_id', Auth::id())
        ->paginate('10');

    return view('funding', compact('successful_funding', 'money_in', 'funding'));

    }
}
