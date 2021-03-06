@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Wallet</div>

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

                    <!-- <h1>Create your first Wallet</h1> -->
                    {{ Form::open(['url' => 'create-wallet']) }}
                        <div class="form-group">
                            {{ Form::select('cryptoMoney', array(
                                '' => 'Please select value',
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
    </div>
</div>
@endsection

