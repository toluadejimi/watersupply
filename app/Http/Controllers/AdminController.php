<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Fleet;
use App\Models\Driver;

class AdminController extends Controller
{

    public $successStatus = true;
    public $failedStatus = false;

    public function admin_dashboard()
    {
        $total_money_in = Transaction::where('type', 'credit')
            ->sum('amount');

        $total_money_out = Transaction::where('type', 'debit')
            ->sum('amount');

        $total_users = User::all()->count();

        $total_orders = Order::all()->count();

        $pending_orders = Order::where('status', 0)
            ->count();

        $completed_orders = Order::where('status', 1)
            ->count();

        $rejected_orders = Order::where('status', 3)
            ->count();

        $latest_order = Order::all()->take(10);

        return view('admin-dashboard', compact('total_money_in', 'pending_orders', 'completed_orders', 'rejected_orders', 'latest_order', 'total_money_out', 'total_users', 'total_orders'));

    }
    public function order_details(Request $request)
    {

        $id = $request->id;

        $order_id = Order::where('id', $id)
            ->first()->order_id;

        $order_amount = Order::where('id', $id)
            ->first()->amount;

        $tank_size = Order::where('id', $id)
            ->first()->tank_size;

        $status = Order::where('id', $id)
            ->first()->status;

        $payment_mode = Order::where('id', $id)
            ->first()->payment_method;

        $user_id = Order::where('id', $id)
            ->first()->user_id;

        $f_name = User::where('id', $user_id)
            ->first()->f_name;

        $l_name = User::where('id', $user_id)
            ->first()->l_name;

        $street = User::where('id', $user_id)
            ->first()->street;

        $apt = User::where('id', $user_id)
            ->first()->apt;

        $lga = User::where('id', $user_id)
            ->first()->lga;

        $state = User::where('id', $user_id)
            ->first()->state;

        $phone = User::where('id', $user_id)
            ->first()->phone;

        $email = User::where('id', $user_id)
            ->first()->email;

        return view('order-more-details', compact('order_id', 'status', 'email', 'street', 'apt', 'state', 'lga', 'phone', 'l_name', 'f_name', 'order_amount', 'tank_size', 'payment_mode'));

    }

    public function update_order(Request $request)
    {

        $order_id = $request->order_id;

        $order_update = Order::where('order_id', $order_id)
            ->update(['status' => 1]);

        return back()->with('message', 'Order has been completed successfully');

    }

    public function delete_order(Request $request)
    {

        $order_id = $request->order_id;

        $order_update = Order::where('order_id', $order_id)
            ->delete();

        return redirect('admin-dashboard')->with('message', 'Order has been delected successfully');

    }

    public function reject_order(Request $request)
    {

        $order_id = $request->order_id;

        $order_update = Order::where('order_id', $order_id)
            ->update(['status' => 3]);

        return back()->with('message', 'Order has been rejected successfully');

    }

    public function customer(Request $request)
    {

        $customers = User::where('type', 2)
            ->paginate(10);

        return view('customer', compact('customers'));

    }

    public function driver(Request $request)
    {

        $customers = User::where('type', 3)
            ->paginate(10);

        return view('driver', compact('customers'));

    }

    public function create_customer(Request $request)
    {

        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $phone = $request->phone;
        $email = $request->email;
        $gender = $request->gender;
        $password = $request->password;

        $create = new User();
        $create->f_name = $f_name;
        $create->l_name = $l_name;
        $create->phone = $phone;
        $create->email = $email;
        $create->type = 2;
        $create->password = Hash::make($password);
        $create->gender = $gender;
        $create->save();

        return back()->with('message', 'Customer Created Successfully');

    }


    public function create_owner(Request $request)
    {

        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $phone = $request->phone;
        $email = $request->email;
        $gender = $request->gender;
        $password = $request->password;

        $create = new User();
        $create->f_name = $f_name;
        $create->l_name = $l_name;
        $create->phone = $phone;
        $create->email = $email;
        $create->type = 4;
        $create->password = Hash::make($password);
        $create->gender = $gender;
        $create->save();

        return back()->with('message', 'Owner Created Successfully');

    }

    public function create_driver(Request $request)
    {

        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $phone = $request->phone;
        $email = $request->email;
        $gender = $request->gender;
        $password = $request->password;
        $licence_no = $request->licence_no;

        if ($request->hasFile('licence_image')) {
            $file = $request->file('licence_image');
            $destination = 'public/uploads/driver';
            $ext = $file->getClientOriginalExtension();
            $mainFilename = Str::random(6) . date('h-i-s');
            $file->move($destination, $mainFilename . "." . $ext);
            $filename = $mainFilename . "." . $ext;

        }

        $create = new User();
        $create->f_name = $f_name;
        $create->l_name = $l_name;
        $create->phone = $phone;
        $create->email = $email;
        $create->licence_no = $licence_no;
        $create->licence_image = $filename ?? null;

        $create->type = 3;
        $create->password = Hash::make($password);
        $create->gender = $gender;
        $create->save();

        return back()->with('message', 'Driver Created Successfully');

    }

    public function delete_customer(Request $request)
    {

        $id = $request->id;

        $remove_customer = User::where('id', $id)
            ->delete();

        return back()->with('message', 'Customer Deleted Successfully');

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

    public function view_driver(Request $request){

        $id = $request->id;

        $f_name = User::where('id', $id )
        ->first()->f_name;

        $l_name = User::where('id', $id )
        ->first()->l_name;

        $email = User::where('id', $id )
        ->first()->email;

        $phone = User::where('id', $id )
        ->first()->phone;

        $licence_no = User::where('id', $id )
        ->first()->licence_no;

        $gender = User::where('id', $id )
        ->first()->gender;

        $image = User::where('id', $id )
        ->first()->licence_image;



        return view('driver-details', compact('f_name', 'image', 'licence_no', 'l_name', 'id', 'email', 'gender', 'phone'));
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


    public function fleet()
    {

        $fleets = Fleet::all();
        $drivers = User::where('type', 3)
        ->get();
        $owners = User::where('type', 4)
        ->get();

        return view('fleet', compact('fleets', 'drivers', 'owners'));


    }


    public function owner()
    {


        $owners = User::where('type', 4)
        ->get();

        return view('owner', compact('owners'));


    }

    public function create_fleet(Request $request)
    {

        $plate_number = $request->plate_number;
        $fleet_type = $request->fleet_type;
        $capacity = $request->capacity;
        $driver = $request->driver;
        $owner = $request->owner;



        $fleet = new Fleet();
        $fleet->plate_number = $plate_number;
        $fleet->fleet_type = $fleet_type;
        $fleet->capacity = $capacity;
        $fleet->driver = $driver;
        $fleet->owner = $owner;
        $fleet->save();

        return back()->with('message', 'Fleet added successfully');


    }


    public function all_orders()
    {

        $pending_order = Order::where('status', 0)
        ->count();


        $completed_orders = Order::where('status', 1)
        ->count();


        $declined_orders = Order::where('status', 3)
        ->count();

        $orders = Order::orderBy('id', 'DESC')
        ->paginate(10);

        $allorders = Order::all()->count();

        return view('all-orders', compact('pending_order', 'allorders','completed_orders', 'declined_orders', 'orders'));







    }







}
