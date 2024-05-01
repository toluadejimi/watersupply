<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{

    public $successStatus = true;
    public $failedStatus = false;

    public function user_dashboard()
    {

        $f_name = User::where('id', Auth::id())
            ->first()->f_name;

        $l_name = User::where('id', Auth::id())
            ->first()->l_name;

        $wallet = User::where('id', Auth::id())
            ->first()->wallet;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.openweathermap.org/data/2.5/weather?lat=6.4550575&lon=3.3941795&appid=75fb55370457ed6da4c4004564141f6c',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiY2UyNmY1NTgwMjdhNjlmZDQ2YWE4MWRhOThlMDJlYmMwYzZhMjFjYmVkYmI5M2RjZDQwZWYzZTZjOGIxNzQ4ZDIxYjIzOWYzOGI0NGY5MDMiLCJpYXQiOjE2NjI2MzcyMjIuNDI0MTQwOTMwMTc1NzgxMjUsIm5iZiI6MTY2MjYzNzIyMi40MjQxNDQwMjk2MTczMDk1NzAzMTI1LCJleHAiOjE2OTQxNzMyMjIuNDIwNjg5MTA1OTg3NTQ4ODI4MTI1LCJzdWIiOiI0NCIsInNjb3BlcyI6W119.pXICZZmtAL8K2qnWJ6cL5GlAxV63otZk3MJdm78niPQ603Yax-fiHpkc-be5olhRFulZc2wvUdqtM_3jihmb5S4YJmCZqJAbqdQdgfkgTdQ1FLbxj0jYK0LPqzhiNyxsNFFyc_fxOCsPEpjMvEB2p7ubSPqYGtHRAe8qVbCyJzLy5tg_S6leeP7mdoux4Eg4RJNIe7pcXIJx43KysX3k-VSmJDXUekatjcmpPKMvEM5KNAmskiNtk5iAfZqKBrWkJEJh8c6wDOYTkcbYh70iq6RIqTJFmmI-Ju_6riUweT-e0Ba3x9Ttq1kKVqx_nySpnHavMt7vy2OvKTetyGpfVaC65bWjuB4UAZAuIyY_hh_BlR7U2xzvo5sRLKNmdWJqCvc2ECoOVRv1JpqrWjpRUrqzJR4tf2EvGD8y5nJfaYB4YDscYc4L3XAVHQoVdRPSYHffGj7lcbdie9tE6etvzmYEmG_pbRC0AEOThMbDCHyRSJsCuzQVpUNWsfVheCaaA4f55-uE2UwHReAc_Y9dp2eMiKT-ESFFC4YcOZKDSexmA_ItRnuBe6HIya13A32-9X6CNY1tD_t5_kHgIOMNeosRrSFqaBcpIIJboIBEqVv25A4yQMxaPC0d1hiYTnAzoiisAJlww6b3BOE7Lrwv8QFQecj4kEX5LfpFnrqno_8',
            ),
        ));

        $var = curl_exec($curl);
        curl_close($curl);

        $var = json_decode($var);

        $main_weather = $var->weather['0']->main ?? 27;

        $description = $var->weather['0']->description ?? 0;

        $get_temp = $var->main->temp ?? 310;

        $temp = $get_temp - 273.15;

        $total_order = Order::where('user_id', Auth::id())
            ->count();

        $money_out = Order::where('user_id', Auth::id())
            ->where('status', 1)
            ->sum('amount');

        $pending_order = Order::where('user_id', Auth::id())
            ->where('status', 0)
            ->count();

        $orders = Order::where('user_id', Auth::id())
            ->get();

        return view('user-dashboard', compact('f_name', 'orders', 'pending_order', 'money_out', 'l_name', 'main_weather', 'description', 'temp', 'wallet', 'total_order'));
    }

    public function my_account()
    {

        $f_name = User::where('id', Auth::id())
            ->first()->f_name;

        $l_name = User::where('id', Auth::id())
            ->first()->l_name;

        $gender = User::where('id', Auth::id())
            ->first()->gender;

        $phone = User::where('id', Auth::id())
            ->first()->phone;

        $email = User::where('id', Auth::id())
            ->first()->email;

        $apt = User::where('id', Auth::id())
            ->first()->apt;

        $street = User::where('id', Auth::id())
            ->first()->street;

        $lga = User::where('id', Auth::id())
            ->first()->lga;

        $state = User::where('id', Auth::id())
            ->first()->state;

        return view('my-account', compact('f_name', 'apt', 'street', 'lga', 'state', 'phone', 'l_name', 'email', 'gender'));

    }

    public function update_account(Request $request)
    {

        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $phone = $request->phone;
        $gender = $request->gender;

        $update = User::where('id', Auth::id())
            ->update([

                'f_name' => $f_name,
                'l_name' => $l_name,
                'phone' => $phone,
                'gender' => $gender,
            ]);

        return back()->with('message', 'Your information was updated successfully');

    }

    public function update_info(Request $request)
    {

        $apt = $request->apt;
        $street = $request->street;
        $lga = $request->lga;

        $update = User::where('id', Auth::id())
            ->update([

                'apt' => $apt,
                'street' => $street,
                'lga' => $lga,

            ]);

        return back()->with('message', 'Your information was updated successfully');

    }

    public function update_email(Request $request)
    {

        $email = $request->email;

        $update = User::where('id', Auth::id())
            ->update([

                'email' => $email,

            ]);

        return back()->with('message', 'Your Email has been updated successfully');

    }

    public function update_password(Request $request)
    {

        $request->validate([
            'old_password' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed'],
        ]);

        $old_password = $request->old_password;
        $new_password = $request->password;
        $password_confirmation = $request->password_confirmation;

        $user_password = User::where('id', Auth::id())
            ->first()->password;

        $user_id = Auth::id();

        if ((Hash::check(request('old_password'), $user_password)) == false) {
            return back()->with('error', 'Check your old password');
        } else if ((Hash::check(request('password'), $user_password)) == true) {
            return back()->with('error', 'Please enter a password which is not similar then current password');
        } else {
            User::where('id', $user_id)->update([
                'password' => Hash::make($new_password),
            ]);

            return redirect('/welcome')->with('message', 'Password Updated Successfully, Please Login to continue');
        }

    }

    public function secutiry()
    {
        $email = User::where('id', Auth::id())
            ->first()->email;

        $f_name = User::where('id', Auth::id())
            ->first()->f_name;

        $l_name = User::where('id', Auth::id())
            ->first()->l_name;

        return view('security', compact('email', 'f_name', 'l_name'));
    }

    public function forgot_password()
    {

        return view('forgot-password');

    }

    public function set_password(request $request)
    {

        $email = $request->email;



        return view('set-password', compact('email'));


    }


    public function set_password_now(request $request)
    {

        $email = $request->email;

        $input = $request->validate([
            'password' => ['required', 'confirmed'],
        ]);

        $password = Hash::make($request->password);


        function extract_emails_from($string){
            preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $string, $matches);
            return $matches[0];
          }

          $get_email = $email;

          $new_email = extract_emails_from($get_email);

          $f_email = implode("\n", $new_email);


        $check_email = User::where('email', $f_email)->first() ?? null;


        if ($check_email == null) {

            return back()->with('error', 'User not found');

        }

        $update_password = User::where('email', $email)
            ->update(['password' => $password]);





        return redirect('welcome')->with('message', "Password resest successful, Please login to continue");


    }

    public function reset_password(request $request)
    {

        $email = $request->email;

        $check_email = User::where('email', $email)
            ->first()->email ?? null;

        $f_name = User::where('email', $email)
            ->first()->f_name ?? null;

        if ($check_email == null) {
            return back()->with('error', 'Account does not exist');
        }

        if ($email == $check_email) {

            $link = url('') . "/set-password?email=$email";

            $api_key = env('ELASTIC_API');
            $from = env('FROM_API');
            $app_name = env('APP_NAME');

            $client = new Client([
                'base_uri' => 'https://api.elasticemail.com',
            ]);

            $res = $client->request('GET', '/v2/email/send', [
                'query' => [

                    'apikey' => "$api_key",
                    'from' => "$from",
                    'fromName' => $app_name,
                    'sender' => "$from",
                    'senderName' => $app_name,
                    'subject' => 'Reset Password',
                    'to' => "$email",
                    'bodyHtml' => view('notification.reset-password', compact('link', 'f_name', 'app_name'))->render(),
                    'encodingType' => 0,

                ],
            ]);

            $body = $res->getBody();
            $array_body = json_decode($body);

            return view('success');

        }

        return view('forgot-password');

    }

}
