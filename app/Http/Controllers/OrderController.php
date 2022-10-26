<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Order;
use App\Models\Tank;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use GuzzleHttp\Client;


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

        if ($payment_mode == 'wallet') {

            $user_wallet = User::where('id', Auth::id())
                ->first()->wallet;

            if ($amount > $user_wallet) {

                return back()->with('error', 'Insufficient Funds, Please Fund your wallet');

            }return redirect('preview-order');
        }

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

            $body = $res->getBody();
            $array_body = json_decode($body);

            return view('preview-order', compact('date','f_name', 'account_name', 'account_number', 'bank_name', 'order_id', 'tank_size', 'l_name', 'tank_id', 'reoccur', 'reoccur_range', 'payment_mode', 'order_id'));

        }

    }




    public function preview_order()
    {


        return view('preview-order');


    }

}
