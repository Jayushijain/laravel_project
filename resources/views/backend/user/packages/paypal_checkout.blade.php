<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paypal | {{ get_settings('website_title') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('payment/css/stripe.css') }}" rel="stylesheet">
  <link name="favicon" type="image/x-icon" href="{{ asset('global/favicon.png') }}" rel="shortcut icon" />
</head>
<body>
@php
    $paypal_keys = get_settings('paypal');
    $paypal = json_decode($paypal_keys,'true');
    // print_r($paypal);
    // exit();
@endphp
<!--required for getting the stripe token-->

<img src="{{ asset('global/logo-sm.png') }}" width="15%;" style="opacity: 0.05;">

<div class="package-details">
    <strong>User Name | {{ $user_details->name }}</strong> <br>
    <strong>Amount To Pay | {{ currency($package_details->price) }}</strong> <br>
    <div id="paypal-button" style="margin-top: 20px;"></div><br>
</div>

<img src="https://www.paypalobjects.com/webstatic/i/logo/rebrand/ppcom-white.svg" width="25%;"
     style="opacity: 0.05;">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
    paypal.Button.render({
        env: '{{ $paypal['mode'] }}', // 'sandbox' or 'production'
        style: {
            label: 'paypal',
            size:  'medium',    // small | medium | large | responsive
            shape: 'rect',     // pill | rect
            color: 'blue',     // gold | blue | silver | black
            tagline: false
        },
        client: {
            sandbox:    '{{ $paypal['sandbox_client_id'] }}',
            production: '{{ $paypal['production_client_id'] }}'
        },

        commit: true, // Show a 'Pay Now' button

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '{{ $package_details->price }}', currency: '{{ get_settings('paypal_currency') }}' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            // executes the payment
            return actions.payment.execute().then(function() {
                // make an ajax call for saving the payment info
                $.ajax({
                   url: '{{ url('user/payment_success/paypal/'.$user_details['id'].'/'.$package_details['id'].'/'.$package_details['price']) }}'
                }).done(function () {
                    window.location = '{{ url('user/uesr_packages') }}';
                });
            });
        }

    }, '#paypal-button');
</script>

</body>
</html>
