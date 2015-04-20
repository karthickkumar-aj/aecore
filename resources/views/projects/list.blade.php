@extends('layouts.application.main')
@section('content')

  Hi, {!! Auth::user()->name !!}, you're logged in!

@endsection