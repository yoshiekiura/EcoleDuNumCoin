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
                    @if(session()->has('errorType'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session()->get('errorType') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <a href="/create-wallet" class="btn btn-primary">Create wallet</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Adress</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($wallets as $wallet)
                            <tr>
                                <td>{{ $wallet->id }}</td>
                                <td><a class="btnCopy">{{ $wallet->key }}</a></td>
                                <td>{{ $wallet->type }}</td>
                                <td>{{ $wallet->amount }}</td>
                                <td style="text-align:right;">
                                    <a href="/wallet/{{$wallet->id}}" class="btn btn-primary">View</a>
                                </td>
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
