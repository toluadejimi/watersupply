<?php

use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\AuthController;


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/', function () {
    return view('login');
});



// Route::post('/funding', [MainController::class,'funding'])->name('funding');

// Route::post('/pay', 'MainController@redirectToGateway')->name('pay');
Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('payment');



Route::get('/welcome', [AuthController::class,'login_view']);



Route::get('forgot-password', [MainController::class, 'forgot_password']);
Route::get('reset-password', [MainController::class, 'reset_passsword']);
Route::get('set-password', [MainController::class, 'set_password']);


Route::post('set-password-now', [MainController::class, 'set_password_now']);


Route::get('fund-history', [PaymentController::class, 'funding']);



Route::post('forgot-password-now', [MainController::class, 'forgot_password_send_code']);

Route::get('reset-password', [MainController::class, 'reset_password']);

Route::get('verify-reset-code',[MainController::class, 'verify_reset_code']);

Route::post('verify-reset-code-now', [MainController::class, 'verify_reset_code_now']);

Route::post('reset-password-now', [MainController::class, 'reset_password_now']);












//Login

Route::get('login_notification', 'MainController@loginNotification');



Route::post('signin', [AuthController::class,'sign_in']);
Route::get('log-out', [AuthController::class,'log_out']);



//Registration
Route::get('/register', [AuthController::class,'register_view']);
Route::post('register-now', [AuthController::class,'register_now']);

//verification
Route::get('verify-email-code', [AuthController::class,'verify_email_code']);
Route::post('verify-code', [AuthController::class,'verify_code']);

//email
Route::get('update-email', [AuthController::class,'update_email']);
Route::post('update-email-now', [AuthController::class,'update_email_now']);


//location
Route::get('location-information', [AuthController::class,'location_info']);
Route::post('location', [AuthController::class,'location']);


//tank
Route::get('tank', [AuthController::class,'tank']);
Route::post('tank-info', [AuthController::class,'tank_info']);







Route::get('send-verification-code', [MainController::class,'send_verification_code']);
Route::post('register-verify-email', [MainController::class,'email_verify_code']);













Route::get('/add-account', [MainController::class,'add_account']);
Route::get('/add-account-now', [MainController::class,'add_account_now']);


Route::get('/confirmation', [MainController::class,'confirmation']);




Route::get('/pin-verify-account', [MainController::class,'pin_verify_account']);

Route::get('/verify-change-account', [MainController::class,'verify_change_account']);








Route::group(['middleware' => 'adminAuth'],function(){


    //dashboard
    Route::get('/user-dashboard', [MainController::class,'user_dashboard']);



    //Order
    Route::get('/new-order', [OrderController::class,'new_order']);
    Route::post('/new-order-now', [OrderController::class,'new_order_now']);
    Route::get('/preview-order', [OrderController::class,'preview_order']);


    Route::get('/wallet-preview-order', [OrderController::class,'preview_order']);
    Route::post('/wallet-confirm-transaction', [OrderController::class,'wallet_confirmation']);



    Route::get('/order-history', [OrderController::class,'order_history']);
    Route::post('/confirm-transaction', [OrderController::class,'confirm_transaction']);






    //Account
    Route::get('/my-account', [MainController::class,'my_account']);
    Route::post('/update-account', [MainController::class,'update_account']);
    Route::post('/update-email', [MainController::class,'update_email']);
    Route::post('/update-password', [MainController::class,'update_password']);

    Route::get('/security', [MainController::class,'security']);
    Route::post('/update-info', [MainController::class,'update_info']);


    //Support
    Route::get('/support', [MainController::class,'support']);
    Route::post('/post-support', [MainController::class,'post_support']);























    Route::get('/profile', [MainController::class,'profile']);
    Route::get('/bank-account', [MainController::class,'bank_account']);
    Route::get('/add-account-now', [MainController::class,'add_account_now']);


    Route::get('/security', [MainController::class,'secutiry']);


    Route::post('/delete', [MainController::class,'delete']);







    Route::get('pin-verify', [MainController::class,'pin_verify']);
    Route::get('verify', [MainController::class,'verify']);


    Route::post('verify-account-now', [MainController::class,'verify_account_now']);
    Route::get('verify-account', [MainController::class,'verify_account']);














    //fund-wallet
    Route::get('fund-wallet', [MainController::class,'fund_wallet']);

    Route::post('/pay-now', [MainController::class, 'pay_now']);
    // The callback url after a payment
    Route::get('/verify-pay', [MainController::class, 'callback']);


    Route::post('/bank-transfer-fund', [MainController::class, 'bank_transfer_fund']);






















    Route::get('updatepassword', [MainController::class,'update_password']);
    Route::post('update-password-now', [MainController::class,'update_password_now']);







        Route::get('logout', [MainController::class,'logout']);


        //drop off
        Route::get('/drop-off', [MainController::class,'drop_offlist']);
        Route::delete('dropoffDelete/{id}', [MainController::class,'dropoffDelete']);


        //agent request
        Route::get('/agent-request', [MainController::class,'agent_request']);
        Route::get('/agent_request_update/{id}', [MainController::class,'agent_request_update']);

       //fund agent
       Route::get('/fund-agent', [MainController::class,'fund_agent']);





       //transaction
        Route::get('/transactions', [MainController::class,'transactions']);


        //Admin dashboard
        Route::get('admin-dashboard', [AdminController::class, 'admin_dashboard']);
        Route::get('order-details', [AdminController::class, 'order_details']);
        Route::get('order-more-details', [AdminController::class, 'order_more_details']);
        Route::get('all-orders', [AdminController::class, 'all_orders']);
        Route::get('pending-order', [AdminController::class, 'pending_order']);
        Route::get('completed-order', [AdminController::class, 'completed_order']);
        Route::get('transactions', [AdminController::class, 'transactions']);

        Route::post('delete-order', [AdminController::class, 'delete_order']);
        Route::post('update-order', [AdminController::class, 'update_order']);
        Route::post('reject-order', [AdminController::class, 'reject_order']);
        Route::get('customer', [AdminController::class, 'customer']);
        Route::get('owner', [AdminController::class, 'owner']);
        Route::post('create-customer', [AdminController::class, 'create_customer']);
        Route::post('delete-customer', [AdminController::class, 'delete_customer']);
        Route::post('create-owner', [AdminController::class, 'create_owner']);
        Route::post('delete-owner', [AdminController::class, 'delete_owner']);
        Route::get('driver', [AdminController::class, 'driver']);
        Route::get('view-driver', [AdminController::class, 'view_driver']);
        Route::post('create-driver', [AdminController::class, 'create_driver']);
        Route::post('delete-driver', [AdminController::class, 'delete_driverr']);
        Route::post('update-driver', [AdminController::class, 'update_driver']);
        Route::get('fleet', [AdminController::class, 'fleet']);
        Route::post('create-fleet', [AdminController::class, 'create_fleet']);





















        // Route::get('admin-dashboard', [AdminController::class, 'admin_dashboard']);
        // Route::get('admin-dashboard', [AdminController::class, 'admin_dashboard']);
        // Route::get('admin-dashboard', [AdminController::class, 'admin_dashboard']);







});






