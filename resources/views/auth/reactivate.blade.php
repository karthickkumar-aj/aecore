@extends('layouts.storefront.main')
@section('content')
  <div class="col-md-4 col-md-offset-4" style="padding-top:18%;">
    
    @if(session('status'))
      <div class="alert alert-success">
        {!! session('status') !!}
      </div>
    @endif
    
    <h4 class="text-muted">Reactivate Your Account</h4>
    <p class="small">Your account is currently disabled. Please enter your email address and we'll send you an activation link.</p>
    {!! Form::open(array('url' => 'reactivate', 'method' => 'post', 'style'=>'margin-bottom:20px')) !!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <span class="text-danger">{!! $errors->first('email') !!}</span>
        {!!Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email', 'autofocus' => 'true'))!!}
      </div>
      {!!Form::submit('Send Activation Link', array('class' => 'btn btn-info'))!!}
    {!! Form::close() !!}
  </div>
@endsection