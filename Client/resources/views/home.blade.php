@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Timeline</div>
               
                <div class="card-body">
                   @if (Auth::user()->token)
                       @if ($tweets->count())
                           @foreach ($tweets as $tweet)
                               <div class="media my-1">
                                   <div class="media-left">
                                    <img src="https://www.gravatar.com/avatar/205e460b479edhd5b48aec07710c08d50" alt="">
                                   </div>
                                   <div class="media-body mx-1">
                                       <strong>{{ $tweet->user->name }}</strong>
                                       <p>{{ $tweet->body }}</p>
                                   </div>
                               </div>
                           @endforeach
                       @endif
                    @else
                        <p>Authorize with <a href="{{ url('/auth/twitter') }}">Twitter</a></p>
                   @endif
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
