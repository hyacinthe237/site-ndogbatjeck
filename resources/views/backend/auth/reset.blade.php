@extends('backend.layouts.auth')


@section('head')
    <title>{{ config('app.name') }} | Connexion</title>
@endsection


@section('content')
    <admin-reset-password :email="{{ json_encode($email) }}" :token="{{ json_encode($token) }}"></admin-reset-password>
@endsection
