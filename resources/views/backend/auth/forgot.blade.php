@extends('backend.layouts.auth')


@section('head')
    <title>{{ config('app.name') }} | Mot de passe oublié</title>
@endsection


@section('content')
    <admin-forgot-password></admin-forgot-password>
@endsection
