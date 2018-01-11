@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Send money</div>

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

                    @if ($wallets)
                        {{ Form::open(['url' => 'create-wallet']) }}
                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                {{ Form::button('Créer',array('type'=>'submit','class'=>'btn btn-primary')) }}
                            </div>
                        {{ Form::close() }}
                        @foreach($wallets as $wallet)
                            type: {{ $wallet->type }} | key: {{ $wallet->key }} <br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

