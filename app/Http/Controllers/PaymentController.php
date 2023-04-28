<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank; // Paystack package
use App\Models\User;
use App\Models\Transaction;
use Auth;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use Illuminate\Support\Str;


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

        $status = $check['status'];
        $amount_in_kobo = $check['data']['amount'];
        $amount_in_naira = $amount_in_kobo / 100;

        $credit = Auth::user()->wallet + $amount_in_naira;

            $transaction = new Transaction();
            $transaction->ref_trans_id = "FUN"."-".Str::random(10);
            $transaction->user_id = Auth::id();
            $transaction->type = "Funding";
            $transaction->status = 1;
            $transaction->balance = $credit;
            $transaction->amount = $amount_in_naira;
            $transaction->note = "Paystack Funding | NGN $amount_in_naira ";
            $transaction->save();

            // $update = User::where('id', Auth::id())
            //     ->update(['wallet' => $credit]);

            // $api_key = env('ELASTIC_API');
            // $from = env('FROM_API');
            // $app_name = env('APP_NAME');

            // $email = User::where('id', Auth::id())->first()->email;
            // $l_name = User::where('id', Auth::id())->first()->l_name;
            // $f_name = User::where('id', Auth::id())->first()->f_name;

            // $client = new Client([
            //     'base_uri' => 'https://api.elasticemail.com',
            // ]);

            // // The response to get
            // $res = $client->request('GET', '/v2/email/send', [
            //     'query' => [

            //         'apikey' => "$api_key",
            //         'from' => "$from",
            //         'fromName' => $app_name,
            //         'sender' => "$from",
            //         'senderName' => $app_name,
            //         'subject' => 'Wallet Funding',
            //         'to' => "$email",
            //         'bodyHtml' => view('notification.fund', compact('f_name', 'amount_in_naira'))->render(),
            //         'encodingType' => 0,

            //     ],
            // ]);

            return back()->with('message', "Congratulations your wallet has been successfully funded with NGN" . " " . number_format($amount_in_naira));



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
