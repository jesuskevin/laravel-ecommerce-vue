<?php

namespace App\Models;

use BraintreeHttp\Serializer\Json;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use PayPal\Core\PayPalHttpClient;
use PayPal\v1\Payments\PaymentCreateRequest;
use PayPal\v1\Payments\PaymentExecuteRequest;
use PayPal\Core\SandboxEnvironment; //ProductionEnvironment for production

class PayPal {
    public $client, $environment;

    public function __construct()
    {

        $clientId = Config::get('services.paypal.clientId');
        $secret = Config::get('services.paypal.secret');

        $this->environment = new SandboxEnvironment($clientId, $secret);

        $this->client = new PayPalHttpClient($this->environment);
    }

    //Solicitud de cobro
    public function buildPaymentRequest($amount){
        $request = new PaymentCreateRequest();

        $body = [
            "intent" => "sale",
            "transactions" => [
                [
                    "amount" => ["total" => $amount, "currency" => "USD"]
                ]
            ],
            "payer" => [
                "payment_method" => "paypal",
            ],
            "redirect_urls" => [
                "cancel_url" => URL::route('shopping_cart.show'),
                "return_url" => URL::route('payments.execute')
            ]
        ];

        $request->body = $body;

        return $request;
    }

    public function charge($amount){
        return $this->client->execute($this->buildPaymentRequest($amount));
    }

    public function execute($paymentId, $payerId){
        $paymentExecute = new PaymentExecuteRequest($paymentId);

        
        $paymentExecute->body = [
            'payer_id' => $payerId
        ];

        // dd($paymentExecute->body);

        return $this->client->execute($paymentExecute);
    }
}