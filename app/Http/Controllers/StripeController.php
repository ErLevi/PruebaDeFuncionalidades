<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function PagoTarjeta(){
        $stripe = new \Stripe\StripeClient(env('STRIPE_API_SECRET_KEY'));

        $response = $stripe->checkout->sessions->create([
          'success_url' => 'https://example.com/success',
          'line_items' => [
            [
              'price' => 'price_1QG5IRLvTbS1YqIPNmVFhsee',
              'quantity' => 1,
            ],
          ],
          'mode' => 'subscription',
        ]);

        return $response;

        // $checkout_session = $stripe->checkout->sessions->create([
        //   'line_items' => [[
        //     'price' => 'price_1QFeyALvTbS1YqIPabD2hF0l',
        //     'quantity' => 1,
        //   ]],
        //   'mode' => 'payment',
        //   'success_url' => '/success.html',
        //   'cancel_url' => '/cancel.html',
        // ]);

        // $checkout_session = $stripe->checkout->sessions->create([
        //   'line_items' => [[
        //     'price_data' => [
        //         'currency' => 'usd',
        //         'unit_amount' => 1,
        //         'product_data' => [
        //             'name' => "test"
        //         ]
        //     ],
        //     'quantity' => 1,
        //   ]],
        //   'mode' => 'payment',
        //   'success_url' => '/success.html',
        //   'cancel_url' => '/cancel.html',
        // ]);

        // return $checkout_session;

    }
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_API_SECRET_KEY'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "mxn",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

    }
}
