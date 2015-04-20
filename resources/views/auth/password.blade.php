@extends('layouts.storefront.main')
@section('content')
  <div class="col-md-4 col-md-offset-4" style="padding-top:18%;">
    
    @if(session('status'))
      <div class="alert alert-success">
        {!! session('status') !!}
      </div>
    @endif
    
    <h4 class="text-muted">Reset Your Password</h4>
    <p class="small">Enter your email address and we'll send you instructions to reset your password.</p>
    {!! Form::open(array('url' => 'password/email', 'method' => 'post', 'style'=>'margin-bottom:20px')) !!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <span class="text-danger">{!! $errors->first('email') !!}</span>
        {!!Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email', 'autofocus' => 'true'))!!}
      </div>
      {!!Form::submit('Send Reset Link', array('class' => 'btn btn-info'))!!}
    {!! Form::close() !!}
  </div>
@endsection