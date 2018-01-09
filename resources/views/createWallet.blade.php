<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create your wallet</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1>Create your first Wallet</h1>
            {{ Form::open(['url' => 'create-wallet']) }}
                <div class="form-group">
                    {{ Form::select('cryptoMoney', array(
                        '' => 'Please select one crypto money',
                        'BTC'=>'Bitcoin',
                        'ETH'=>'Etherum'
                    )) }}
                </div>
                <div class="form-group">
                    {{ Form::button('Créer',array('type'=>'submit','class'=>'btn btn-primary')) }}
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>