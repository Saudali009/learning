<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {

        // dd($request->all());

        //Api call to end point

        $qbd_api_url = "https://test.quickbit.eu/direct_api/create_transaction";
        $qbd_secret_key = "tkXPfX5EEfpXwLYCPHjeN0ZgOVDHzgnG";
        $qbd_refferal_code = "4ac1a3ff97bb9309ba01fb869b5dcdd3";

        $requestArray = array(
            "first_name" => $request->get('first_name'),
            "last_name" => $request->get('last_name'),
            "email" => $request->get('email'),
            "dob" => $request->get('dob'),
            "phone_number" => $request->get('phone_number'),
            "address" => $request->get('address'),
            "status_code" => $request->get('status_code'),
            "postal_code" => $request->get('postal_code'),
            "city" => $request->get('city'),
            "country_code" => $request->get('country_code'),
            "fiat_amount" => $request->get('fiat_amount'),
            "fiat_currency" => $request->get('fiat_currency'),
            "crypto_amount" => $request->get('crypto_amount'),
            "crypto_currency" => $request->get('crypto_currency'),
            "affiliate_referral_code" => $request->get('affiliate_referral_code'),
            "callback_url" => $request->get('callback_url'),
            "request_reference" => $request->get('request_reference'),
            "merchant_profile" => $request->get('merchant_profile'),
            "affiliate_redirect_url" => $request->get('affiliate_redirect_url'),
            "settlement_currency" => $request->get('settlement_currency')
        );

        $request_data = implode("", $requestArray);
        $checksum = hash('sha256', $request_data . $qbd_secret_key);
        $requestArray['checkSum'] = $checksum;

        $ch = curl_init($qbd_api_url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestArray);

        # The response is in the variable $response

        $response = curl_exec($ch);
        dd($response);

        curl_close($ch);

    }
}
