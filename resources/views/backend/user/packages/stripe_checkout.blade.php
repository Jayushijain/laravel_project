<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stripe | {{ get_settings('website_title') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('payment/css/stripe.css') }}" rel="stylesheet">
    <link name="favicon" type="image/x-icon" href="{{ asset('global/favicon.png') }}" rel="shortcut icon" />
</head>
<body>
    <!--required for getting the stripe token-->
    @php
    $stripe_keys = get_settings('stripe');
    $values = json_decode($stripe_keys,'true');

    if ($values['testmode'] == 'on') 
    {
        $public_key = $values['public_key'];
        $private_key = $values['secret_key'];
    } 
    else 
    {
        $public_key = $values['public_live_key'];
        $private_key = $values['secret_live_key'];
    }
    @endphp

    <script>
    var stripe_key = '{{ $public_key }}';
    </script>

    <!--required for getting the stripe token-->

    <img src="{{ asset('global/logo-sm.png') }}" width="15%;"
    style="opacity: 0.05;">
    <form method="post"
    action="<?php //echo site_url('user/payment_success/stripe/' . $user_details['id'].'/'.$package_details['id'].'/'.$package_details['price']);?>">
    <label>
        <div id="card-element" class="field is-empty"></div>
        <span><span>Credit/Debit Card</span></span>
    </label>
    <button type="submit">
        Pay {{ currency($package_details->price).' '.get_settings('stripe_currency') }}
    </button>
    <div class="outcome">
        <div class="error" role="alert"></div>
        <div class="success">
            Success! Your Stripe token is <span class="token"></span>
        </div>
    </div>
    <div class="package-details">
        <strong>User Name | {{ $user_details->name }}</strong> <br>
    </div>
    <input type="hidden" name="stripeToken" value="">
</form>
<img src="https://stripe.com/img/about/logos/logos/blue.png" width="25%;" style="opacity: 0.05;">
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('payment/js/stripe.js') }}"></script>

<script type="text/javascript">
get_stripe_currency('{{ get_settings('stripe_currency') }}');
</script>
</body>
</html>