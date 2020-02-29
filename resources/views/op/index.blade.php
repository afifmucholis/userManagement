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
                    <table class="table table-hover"> 
                    	<thead> 
                    		<tr> 
                    			<td>Nama</td> 
                    			<td>Email</td> 
                    			<td>Role</td> 
                    			<td>Photo</td> 
                    			<td>Action</td> 
                    		</tr> 
                    	</thead> 
                    	<tbody> 
                    		@foreach($datas as $data) 
                    		<tr> 
                    			<td>{{ $data->name }}</td> 
                    			<td>{{ $data->email }}</td> 
                    			<td>{{ $data->role }}</td> 
                    			<td>
				                    <img src="{{ url('/img/' . $data->photo) }}" class="img-thumbnail" width="30px"> 
                    			</td> 
                    			<td>
                    				{!! Form::model($data, ['route' => ['op.destroy', $data], 'method' => 'delete', 'class' => 'form-inline'] ) !!} 
                    				<a href="{{ route('op.edit', $data->id)}}">Edit</a> | {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger']) !!}
                    				{!! Form::close()!!} 
                    			</td>
                    		</tr> 
                    		@endforeach 
                    	</tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
