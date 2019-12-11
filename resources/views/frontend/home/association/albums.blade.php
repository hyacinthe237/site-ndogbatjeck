@extends('frontend.layouts.master')


@section('head')
    <title>Présentation</title>
@endsection

@section('content')
    <section>
        @include('frontend.includes.breadcrumb', [ 'current' => 'Albums'])
    </section>
@endsection
