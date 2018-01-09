@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Auth::user()->id }}
                    <div class="table-responsive"> 
                        <a href="/create-wallet" class="btn btn-primary">Ajouter un compte</a>    
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Clef</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--  <tr>
                            <td>1</td>
                            <td>Q2W6QSDWS5D5S6DSD5SCQ9SQ9</td>
                            <td style="text-align:right;"><button class="btn btn-primary">Voir</button></td>
                        </tr>  --}}
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
