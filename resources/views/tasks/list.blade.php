@extends('layouts.application.main_wide')
@section('content')

  Hi, {!! Auth::user()->name !!}, you're logged in!

@endsection