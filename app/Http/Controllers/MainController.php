<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Validator;
use Exception;




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

        $main_weather = $var->weather['0']->main;

        $description = $var->weather['0']->description;

        $get_temp = $var->main->temp;

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




        return view('my-account', compact('f_name','apt','street','lga','state','phone', 'l_name','email', 'gender'));

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
            'gender' => $gender
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
                        'password' => Hash::make($new_password)
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


        return view('security', compact('email', 'f_name','l_name'));
    }




}
