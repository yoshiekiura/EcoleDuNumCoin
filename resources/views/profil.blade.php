@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profil</div>

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
                    <div style="display: flex;justify-content: space-between;">
                        <img src="{{ Auth::user()->avatar_uri }}" alt="profil_image" />
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

