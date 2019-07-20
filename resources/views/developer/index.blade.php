@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <passport-clients></passport-clients>
                <br>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
@endsection