<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Order;
use App\Models\Tank;
use App\Models\Transaction;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function new_order()
    {

        $f_name = User::where('id', Auth::id())
            ->first()->f_name;

        $l_name = User::where('id', Auth::id())
            ->first()->l_name;

        $delivered_order = Order::where('user_id', Auth::id())
            ->where('status', 1)
            ->count();

        $pending_order = Order::where('user_id', Auth::id())
            ->where('status', 0)
            ->count();

        $money_out = Order::where('user_id', Auth::id())
            ->where('status', 1)
            ->sum('amount');

        $user_wallet = User::where('id', Auth::id())
            ->first()->wallet;

        $tank_size = Tank::all();

        $orders = Order::orderBy('id', 'DESC')
            ->where('user_id', Auth::id())
            ->take(10)->get();

        $user_apt = User::where('id', Auth::id())
            ->first()->apt;

        $user_street = User::where('id', Auth::id())
            ->first()->street;

        $user_lga = User::where('id', Auth::id())
            ->first()->lga;

        $user_state = User::where('id', Auth::id())
            ->first()->state;

        $f_name = User::where('id', Auth::id())
            ->first()->f_name;

        $l_name = User::where('id', Auth::id())
            ->first()->l_name;

        return view('new-order', compact('f_name', 'f_name', 'f_name', 'user_street', 'user_lga', 'user_state', 'user_apt', 'orders', 'l_name', 'pending_order', 'tank_size', 'delivered_order', 'money_out', 'user_wallet'));
    }

    public function new_order_now(Request $request)
    {

        $date = $request->delivery_date;
        $tank_id = $request->tank_id;
        $reoccur = $request->reoccur;
        $reoccur_range = $request->reoccur_range;
        $payment_mode = $request->payment_mode;
        $order_id = Str::random(10);

        $amount = Tank::where('id', $tank_id)
            ->first()->amount;

        $tank_size = Tank::where('id', $tank_id)
            ->first()->size;

        if ($payment_mode == 'bank_transfer') {

            $order = new Order();
            $order->order_id = $order_id;
            $order->user_id = Auth::id();
            $order->amount = $amount;
            $order->tank_size = $tank_size;
            $order->reoccur = $reoccur;
            $order->reoccur_range = $reoccur_range;
            $order->order_date = $date;
            $order->status = 0;
            $order->payment_method = $payment_mode;
            $order->save();

            $api_key = env('ELASTIC_API');
            $from = env('FROM_API');
            $app_name = env('APP_NAME');

            $email = User::where('id', Auth::id())->first()->email;
            $l_name = User::where('id', Auth::id())->first()->l_name;
            $f_name = User::where('id', Auth::id())->first()->f_name;
            $account_name = Bank::all()->first()->account_name;
            $bank_name = Bank::all()->first()->bank_name;
            $account_number = Bank::all()->first()->account_number;

            $client = new Client([
                'base_uri' => 'https://api.elasticemail.com',
            ]);

            // The response to get
            $res = $client->request('GET', '/v2/email/send', [
                'query' => [

                    'apikey' => "$api_key",
                    'from' => "$from",
                    'fromName' => $app_name,
                    'sender' => "$from",
                    'senderName' => $app_name,
                    'subject' => 'Order ID',
                    'to' => "$email",
                    'bodyHtml' => view('notification.new-order', compact('order_id', 'f_name', 'app_name'))->render(),
                    'encodingType' => 0,

                ],
            ]);

            $body = $res->getBody();
            $array_body = json_decode($body);

            $api_key = env('ELASTIC_API');
            $from = env('FROM_API');
            $app_name = env('APP_NAME');

            $user_email = User::where('id', Auth::id())->first()->email;

            $client = new Client([
                'base_uri' => 'https://api.elasticemail.com',
            ]);

            // The response to get
            $res = $client->request('GET', '/v2/email/send', [
                'query' => [

                    'apikey' => "$api_key",
                    'from' => "$from",
                    'fromName' => $app_name,
                    'sender' => "$from",
                    'senderName' => $app_name,
                    'subject' => 'Order ID',
                    'to' => "toluadejimi@gmail.com",
                    'bodyText' => "You have a new order-  $order_id ",
                    'encodingType' => 0,

                ],
            ]);

            return view('preview-order', compact('date', 'f_name', 'order_id', 'account_name', 'account_number', 'bank_name', 'order_id', 'tank_size', 'l_name', 'tank_id', 'reoccur', 'amount', 'reoccur_range', 'payment_mode', 'order_id'));

        }

        if ($payment_mode == 'wallet') {

            $date = $request->delivery_date;
            $tank_id = $request->tank_id;
            $reoccur = $request->reoccur;
            $reoccur_range = $request->reoccur_range;
            $payment_mode = $request->payment_mode;
            $order_id = "ORD" . "-" . Str::random(10);

            $email = User::where('id', Auth::id())->first()->email;
            $l_name = User::where('id', Auth::id())->first()->l_name;
            $f_name = User::where('id', Auth::id())->first()->f_name;
            $account_name = Bank::all()->first()->account_name;
            $bank_name = Bank::all()->first()->bank_name;
            $account_number = Bank::all()->first()->account_number;

            $chk_wallet = Auth::user()->wallet;

            if ($amount > $chk_wallet) {

                return back()->with('error', 'Insufficent Amount, Please fund your wallet');

            }

            return view('wallet-preview-order', compact('date', 'f_name', 'order_id', 'account_name', 'account_number', 'bank_name', 'order_id', 'tank_size', 'l_name', 'tank_id', 'reoccur', 'amount', 'reoccur_range', 'payment_mode', 'order_id'));

        }

    }

    public function preview_order()
    {

        return view('preview-order');

    }

    public function order_history()
    {

        $orders = Order::orderBy('id', 'DESC')
            ->where('user_id', Auth::id())
            ->paginate(10);

        $f_name = User::where('id', Auth::id())
            ->first()->f_name;

        $l_name = User::where('id', Auth::id())
            ->first()->l_name;

        $delivered_order = Order::where('user_id', Auth::id())
            ->where('status', 1)
            ->count();

        $pending_order = Order::where('user_id', Auth::id())
            ->where('status', 0)
            ->count();

        $money_out = Order::where('user_id', Auth::id())
            ->where('status', 1)
            ->sum('amount');

        return view('order-history', compact('orders', 'f_name', 'l_name', 'delivered_order', 'pending_order', 'money_out'));

    }

    public function confirm_transaction(Request $request)
    {

        $amount = $request->amount;
        $order_id = $request->order_id;

        $user_id = Auth::id();

        $order = new Transaction();
        $order->user_id = $user_id;
        $order->ref_id = $order_id;
        $order->type = 'credit';
        $order->amount = $amount;
        $order->save();

        return redirect('user-dashboard');

    }

    public function wallet_confirmation(request $request)
    {

        $date = $request->delivery_date;
        $tank_name = $request->tank_size;
        $reoccur = $request->reoccur;
        $reoccur_range = $request->reoccur_range;
        $payment_mode = $request->payment_mode;
        $order_id = "ORD" . "-" . Str::random(10);

        $tank_id = Tank::where('size', $tank_name)
            ->first()->id;

        $amount = Tank::where('id', $tank_id)
            ->first()->amount;

        $chk_wallet = Auth::user()->wallet;

        if ($amount > $chk_wallet) {

            return back()->with('error', 'Insufficent Amount, Please fund your wallet');

        }

        $debit = Auth::user()->wallet - $amount;

        $update = User::where('id', Auth::id())
            ->update(['wallet' => $debit]);

        $transaction = new Transaction();
        $transaction->ref_trans_id = $order_id;
        $transaction->user_id = Auth::id();
        $transaction->type = "Debit";
        $transaction->status = 1;
        $transaction->balance = $debit;
        $transaction->amount = $amount;
        $transaction->note = "Purchase  | NGN $amount ";
        $transaction->save();

        $order = new Order();
        $order->order_id = $order_id;
        $order->user_id = Auth::id();
        $order->amount = $amount;
        $order->tank_size = $tank_name;
        $order->reoccur = $reoccur;
        $order->reoccur_range = $reoccur_range;
        $order->order_date = $date;
        $order->status = 0;
        $order->payment_method = $payment_mode;
        $order->save();

        $api_key = env('ELASTIC_API');
        $from = env('FROM_API');
        $app_name = env('APP_NAME');

        $email = User::where('id', Auth::id())->first()->email;
        $l_name = User::where('id', Auth::id())->first()->l_name;
        $f_name = User::where('id', Auth::id())->first()->f_name;
        $account_name = Bank::all()->first()->account_name;
        $bank_name = Bank::all()->first()->bank_name;
        $account_number = Bank::all()->first()->account_number;

        $client = new Client([
            'base_uri' => 'https://api.elasticemail.com',
        ]);

        // The response to get
        $res = $client->request('GET', '/v2/email/send', [
            'query' => [

                'apikey' => "$api_key",
                'from' => "$from",
                'fromName' => $app_name,
                'sender' => "$from",
                'senderName' => $app_name,
                'subject' => 'Order ID',
                'to' => "$email",
                'bodyHtml' => view('notification.new-order', compact('order_id', 'f_name', 'app_name'))->render(),
                'encodingType' => 0,

            ],
        ]);

        $body = $res->getBody();
        $array_body = json_decode($body);

        $api_key = env('ELASTIC_API');
        $from = env('FROM_API');
        $app_name = env('APP_NAME');

        $user_email = User::where('id', Auth::id())->first()->email;

        $client = new Client([
            'base_uri' => 'https://api.elasticemail.com',
        ]);

        // The response to get
        $res = $client->request('GET', '/v2/email/send', [
            'query' => [

                'apikey' => "$api_key",
                'from' => "$from",
                'fromName' => $app_name,
                'sender' => "$from",
                'senderName' => $app_name,
                'subject' => 'Order ID',
                'to' => "toluadejimi@gmail.com",
                'bodyText' => "You have a new order-  $order_id ",
                'encodingType' => 0,

            ],
        ]);

        $body = $res->getBody();
        $array_body = json_decode($body);

        return redirect('new-order')->with('message', 'Your Order has been successfully placed');
    }

}
