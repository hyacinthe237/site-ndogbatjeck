@extends('backend.layouts.auth')


@section('head')
    <title>{{ config('app.name') }} | Connexion</title>
@endsection


@section('content')
    <admin-auth-signin></admin-auth-signin>
@endsection
