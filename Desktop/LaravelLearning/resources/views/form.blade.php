<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

        .container {
            width: 25%;
            margin: 0 auto;
        }

        .customer-form {
            text-align: center;
            width: 100%;
        }

        .input-tag {
            padding: 10px;
            margin-left: 10px;
        }

        .row {
            display: block;
            margin: 20px;
        }

        .label-class {
            text-align: left;
        }

    </style>
</head>
<body>


<div class="container">
    <h2>Direct Api Implementation</h2>
    <form method="post" action="/submitForm">
        {{csrf_field()}}
        <div class="customer-form">
            <div class="row">
                <label class="label-class">First Name</label>
                <input class="input-tag" name="first_name" type="text" placeholder="First Name" id="first_name">
            </div>
            <div class="row">
                <label class="label-class">Last Name</label>
                <input class="input-tag" name="last_name" type="text" placeholder="Last Name" id="last_name">
            </div>
            <div class="row">
                <label class="label-class">Email</label>
                <input class="input-tag" name="email" type="text" placeholder="Email" id="email">
            </div>
            <div class="row">
                <label class="label-class">DOB</label>
                <input class="input-tag" name="dob" type="text" placeholder="Date of birth" id="dob">
            </div>
            <div class="row">
                <label class="label-class">Phone Number</label>
                <input class="input-tag" name="phone_number" type="text" placeholder="Phone Number" id="phone_number">
            </div>
            <div class="row">
                <label class="label-class">Address</label>
                <input class="input-tag" name="address" type="text" placeholder="Address" id="address">
            </div>
            <div class="row">
                <label class="label-class">Status Code</label>
                <input class="input-tag" name="status_code" type="text" placeholder="Status Code" id="status">
            </div>
            <div class="row">
                <label class="label-class">Postal Code</label>
                <input class="input-tag" name="postal_code" type="text" placeholder="Postal Code" id="postal_code">
            </div>
            <div class="row">
                <label class="label-class">City</label>
                <input class="input-tag" name="city" type="text" placeholder="City" id="city">
            </div>
            <div class="row">
                <label class="label-class">Country Code</label>
                <input class="input-tag" name="country_code" type="text" placeholder="Country Code" id="country_code">
            </div>
            <div class="row">
                <label class="label-class">Flat Amount</label>
                <input class="input-tag" name="fiat_amount" type="text" placeholder="Flat Amount" id="fiat_amount">
            </div>
            <div class="row">
                <label class="label-class">Flat Currency</label>
                <input class="input-tag" name="fiat_currency" type="text" placeholder="Flat Currency" id="fiat_currency">
            </div>
            <div class="row">
                <label class="label-class">Crypto Amount</label>
                <input class="input-tag" name="crypto_amount" type="text" placeholder="Crypto Amount" id="crypto_amount">
            </div>
            <div class="row">
                <label class="label-class">Crypto Currency</label>
                <input class="input-tag" name="crypto_currency" type="text" placeholder="Crypto Currency" id="crypto_currency">
            </div>
            <div class="row">
                <label class="label-class">Affiliate Referral Code</label>
                <input class="input-tag" name="affiliate_referral_code" type="text" placeholder="Affiliate Referral Code" id="affiliate_referral_code">
            </div>
            <div class="row">
                <label class="label-class">Callback URL</label>
                <input class="input-tag" name="callback_url" type="text" placeholder="Callback URL" id="callback_url">
            </div>
            <div class="row">
                <label class="label-class">Request Reference</label>
                <input class="input-tag" name="request_reference" type="text" placeholder="Request Reference" id="request_reference">
            </div>
            <div class="row">
                <label class="label-class">Merchant Profile</label>
                <input class="input-tag" name="merchant_profile" type="text" placeholder="Merchant Profile" id="merchant_profile">
            </div>
            <div class="row">
                <label class="label-class">Affiliate Redirect URL</label>
                <input class="input-tag" name="affiliate_redirect_url" type="text" placeholder="Affiliate Redirect URL" id="affiliate_redirect_url">
            </div>
            <div class="row">
                <label class="label-class">Settlement Currency</label>
                <input class="input-tag" name="settlement_currency" type="text" placeholder="Settlement Currency" id="settlement_currency">
            </div>
            <div class="row">
                <label class="label-class">Checksum </label>
                <input class="input-tag" name="checksum" type="text" placeholder="Checksum" id="checksum">
            </div>
            <div class="row">
                <input type="submit" value="Submit">
            </div>
        </div>
    </form>
</div>
</body>
</html>
