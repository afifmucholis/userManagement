<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}"> 
    {!! Form::label('name', 'Name') !!} 
    {!! Form::text('name', null, ['class'=>'form-control']) !!} 
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!} 
</div>
<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}"> 
    {!! Form::label('email', 'Email') !!} 
    {!! Form::email('email', null, ['class'=>'form-control']) !!} 
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!} 
</div>

<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}"> 
    {!! Form::label('password', 'Password') !!} 
    {!! Form::input('password', 'password', null, ['class'=>'form-control']) !!} 
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!} 
</div>

<div class="form-group {!! $errors->has('password_confirmation') ? 'has-error' : '' !!}"> 
    {!! Form::label('password_confirmation', 'Confirm Password') !!} 
    {!! Form::input('password', 'password_confirmation', null, ['class'=>'form-control']) !!} 
    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!} 
</div>

<div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}"> 
    {!! Form::label('photo', 'Photo Profile (jpeg, png)') !!} 
    {!! Form::file('photo', ['class'=>'form-control']) !!} 
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    @if (isset($data) && $data->photo !== '') 
    <div class="row"> 
        <div class="col-md-6"> 
            <p>Current photo:</p> 
            <div class="thumbnail"> 
                <img src="{{ url('/img/' . $data->photo) }}" class="img-rounded"> 
            </div> 
        </div> 
    </div> 
    @endif
</div>
{!! Form::submit(isset($data) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
