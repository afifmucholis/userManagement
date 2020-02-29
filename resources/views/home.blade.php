@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{ url('/img/' . Auth::user()->photo) }}" class="img-thumbnail"> 
                </div>
                <div class="card-footer">
                    Email : {{Auth::user()->email}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
