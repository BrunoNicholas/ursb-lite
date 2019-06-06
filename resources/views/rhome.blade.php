<!DOCTYPE html>

<head>
    <title>Test | {{ config('app.name') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
    <div class="container" style="min-height: 100px;"></div>
    @include('layouts.includes.notifications')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body" id="main-body">
                        
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-body" id="extra-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=AY_tdMpmHFZRhd5ehqqr8Am46GahDvSvEcbfGhYKz5wBRVjDFMXqG-PU71TgNbbF3MOOF5n_ByVSEnWR"></script>
    <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          // Set up the transaction
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '12.05'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name);
            // Call your server to save the transaction
            return fetch('/paypal-transaction-complete', {
              method: 'post',
              headers: {
                'content-type': 'application/json'
              },
              body: JSON.stringify({
                orderID: data.orderID
              })
            });
          });
        }

      }).render('#extra-body');
    </script>
<body>
</body>