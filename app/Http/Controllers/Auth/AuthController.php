<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;



class AuthController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }


    public function register_view(){

        return view('register');


    }


    public function register_now(Request $request){

        $email_code = $random = mt_rand(100000, 999999);

        $api_key = env('ELASTIC_API');
        $from = env('FROM_API');
        $app_name = env('APP_NAME');

        $request->validate([
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);





        $phone = $request->phone;
        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $email = $request->email;
        $gender = $request->gender;
        $password = $request->password;


        $user = new User();
        $user->f_name = $f_name;
        $user->l_name = $l_name;
        $user->phone = $phone;
        $user->email = $email;
        $user->email_code = $email_code;
        $user->gender = $gender;
        $user->password = Hash::make($password);
        $user-> save();


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
                'subject' => 'Verification Code',
                'to' => "$email",
                'bodyHtml' => view('notification.email-code', compact('f_name','email_code','app_name'))->render(),
                'encodingType' => 0,

            ],
        ]);

        $body = $res->getBody();
        $array_body = json_decode($body);














        return view('register');


    }




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
    //         'subject' => 'Welcome on Board',
    //         'to' => "$email",
    //         'bodyHtml' => view('notification.register', compact('f_name', 'app_name'))->render(),
    //         'encodingType' => 0,

    //     ],
    // ]);

    // $body = $res->getBody();
    // $array_body = json_decode($body);















    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
