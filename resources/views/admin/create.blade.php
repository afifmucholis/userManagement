@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	Admin Management
                	<a href="{{ route('admin.create') }}" class="btn btn-warning btn-sm ">Add Admin</a>
                </div>
                <div class="card-body">
                    <div class="container"> 
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <h3>Add Admin</h3> 
                                {!! Form::open(['route' => 'admin.store', 'files' => true])!!} 
                                @include('admin._form')
                                {!! Form::close() !!} 
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
