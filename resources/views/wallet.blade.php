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

                    {{ Form::open(['url' => 'walletTransfertPost']) }}
                        <div class="form-group">
                            {{ Form::text('walletkey','',['class'=>'form-control', 'placeholder'=>'Wallet key']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::number('amount', 0, ['class'=>'form-control'] ) }}
                        </div>
                        <div class="form-group">
                            {{ Form::button('Envoyer',array('type'=>'submit','class'=>'btn btn-primary')) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

