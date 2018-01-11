@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 resize">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <a href="/create-wallet" class="btn btn-primary">Ajouter un compte</a>
                        <a href="/send-money" class="btn btn-primary">Envoyer de l'argent</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Key</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($wallets as $wallet)
                            <tr>
                                <td>{{ $wallet->id }}</td>
                                <td>{{ $wallet->key }}</td>
                                <td>{{ $wallet->type }}</td>
                                <td>{{ $wallet->amount }}</td>
                                <td style="text-align:right;"><a href="/wallet/{{$wallet->id}}" class="btn btn-primary">Voir</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!--You are logged in!-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
