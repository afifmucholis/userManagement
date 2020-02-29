@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	User Management
                	<a href="{{ route('op.create') }}" class="btn btn-warning btn-sm ">Add User</a>
                </div>
                <div class="card-body">
                    <div class="container"> 
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <h3>Add User</h3> 
                                {!! Form::model($data, ['route' => ['op.update', $data], 'method' =>'patch', 'files' => true])!!} 
                                @include('op._form')
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
