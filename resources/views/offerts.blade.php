@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buy and Sell</div>

                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{ Form::open(['url' => 'transfertMoneyPost', 'id' => 'formBuy']) }}
                        <div class="form-group">
                            {{ Form::number('amount', 0, ['class'=>'form-control'] ) }}
                        </div>
                        <div class="form-group">
                            <h3 class="text-center textInfo-Bbtc">Acheter 1 BTC pour 14,568$</h3>
                        </div>
                        <div class="form-group">
                            {{ Form::button('Buy',array('type'=>'submit','class'=>'btn btn-fullwidth btn-primary')) }}
                        </div>
                    {{ Form::close() }}

                    <hr>

                    {{ Form::open(['url' => 'transfertMoneyPost', 'id' => 'formSell']) }}
                        <div class="form-group">
                            {{ Form::number('amount', 0, ['class'=>'form-control'] ) }}
                        </div>
                        <div class="form-group">
                            <h3 class="text-center textInfo-Sbtc">Vendre 1230 BTC pour 132365$</h3>
                        </div>
                        <div class="form-group">
                            {{ Form::button('Sell',array('type'=>'submit','class'=>'btn btn-fullwidth btn-primary')) }}
                        </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

