@extends('layouts.storefront.main')
@section('content')
  <div class="col-md-4 col-md-offset-4" style="padding-top:18%;">
    
    @if(session('status'))
      <div class="alert alert-success">
        {!! session('status') !!}
      </div>
    @endif
    
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> We found problems with your input.
      </div>
    @endif
          
    <h4 class="text-muted">Reset Your Password</h4>
    {!! Form::open(array('url' => 'password/reset', 'method' => 'post', 'style'=>'margin-bottom:20px')) !!}
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-group">
        <span class="text-danger">{!! $errors->first('email') !!}</span>
        {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email address', 'autofocus' => 'true')) !!}
      </div>
      <div class="form-group">
        <span class="text-danger">{!! $errors->first('password') !!}</span>
        {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) !!}
      </div>
      <div class="form-group">
        <span class="text-danger">{!! $errors->first('password_confirmation') !!}</span>
        {!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) !!}
      </div>
      {!! Form::submit('Reset Password', array('class' => 'btn btn-success')) !!}
    {!! Form::close() !!}
  </div>
@endsection