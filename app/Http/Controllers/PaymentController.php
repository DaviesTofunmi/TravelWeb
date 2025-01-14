<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;


class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try {
            $data = array(
                "amount" => 700 * 100,
                "reference" => '4g4ge5e485g8t4te5jg8nkngjiu',
                "email" => 'user@mail.com',
                "currency" => "NGN",
                "orderID" => 23456,
            );

            // return Paystack::getAuthorizationUrl()->redirectNow();
            $url = Paystack::getAuthorizationUrl($data);

            if ($url) {
                Log::info([$url]);
                return response()->json(['url' => [$url]], 200);
            }
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}

// return Paystack::getAuthorizationUrl($data)->redirectNow();