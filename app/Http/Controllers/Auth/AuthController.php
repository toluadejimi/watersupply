<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Models\Location;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Client;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{

    public function login_view()
    {
        return view('login');
    }

    public function register_view()
    {

        return view('register');

    }

    public function sign_in(Request $request)
    {

        $app_name = env('APP_NAME');
        $api_key = env('ELASTIC_API');
        $from = env('FROM_API');

        $email_code = random_int(100000, 999999);

        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->input('email'),
            'password' => $request->input('password')])) {

            if (Auth::user()->type == 1) {
                return redirect('admin-dashboard');
            }

            if (Auth::user()->is_email_verified == 0) {

                return redirect('verify-email-code')->with('message', "Enter the verification code sent to your email provided");
            } else {

                return redirect('user-dashboard');

            }

        }return back()->with('error', 'Incorrect Credientials');

    }

    public function register_now(Request $request)
    {

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
        $user->type = 2;
        $user->wallet = 0;
        $user->email_code = $email_code;
        $user->gender = $gender;
        $user->password = Hash::make($password);
        $user->save();

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
                'bodyHtml' => view('notification.email-code', compact('f_name', 'email_code', 'app_name'))->render(),
                'encodingType' => 0,

            ],
        ]);

        $body = $res->getBody();
        $array_body = json_decode($body);

        return redirect('welcome')->with('message', 'Your account has been successfully created');

    }

    public function verify_email_code(Request $request)
    {

        $user_email = User::where('id', Auth::id())
            ->first()->email;

        return view('verify-email-code', compact('user_email'));

    }

    public function verify_code(Request $request)
    {
        $app_name = env('APP_NAME');
        $api_key = env('ELASTIC_API');
        $from = env('FROM_API');

        $code = $request->code;

        $email = User::where('id', Auth::id())
            ->first()->email;

        $f_name = User::where('id', Auth::id())
            ->first()->f_name;

        $email_code = User::where('id', Auth::id())
            ->first()->email_code;

        if ($code == $email_code) {

            $update = User::where('id', Auth::id())
                ->update(['is_email_verified' => 1]);

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
                    'subject' => 'Welcome on Board',
                    'to' => "$email",
                    'bodyHtml' => view('notification.register', compact('f_name', 'app_name'))->render(),
                    'encodingType' => 0,

                ],
            ]);

            $body = $res->getBody();
            $array_body = json_decode($body);

            return redirect('location-information')->with('message', 'Your email has been verified');

        }

        return back()->with('error', 'Invalid verification code');

    }

    public function update_email(Request $request)
    {
        return view('update-email');

    }

    public function location_info(Request $request)
    {

        $locations = Location::all();



        return view('location-information', compact('locations'));

    }

    public function location(Request $request)
    {

        $apt = $request->apt;
        $street = $request->street;
        $location = $request->location;

        $update = User::where('id', Auth::id())
            ->update([

                'apt' => $apt,
                'location' => $locaton,
                'street' => $street,

            ]);

        return redirect('tank')->with('message', 'Your Location as been successfully submitted');

    }

    public function tank(Request $request)
    {
        return view('tank');

    }

    public function tank_info(Request $request)
    {

        $tank_size = $request->tank_size;

        $update = User::where('id', Auth::id())
            ->update([

                'tank_size' => $tank_size,

            ]);

        return redirect('user-dashboard')->with('message', 'Your are all set');

    }

    public function update_email_now(Request $request)
    {

        $email = $request->email;

        $update = User::where('id', Auth::id())
            ->update(['email' => $email]);
        return redirect('welcome')->with('message', 'Your Email has been chnage successfully');

    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function log_out()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }
}
