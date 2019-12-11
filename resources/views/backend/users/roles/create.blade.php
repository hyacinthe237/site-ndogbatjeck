@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Nouveau</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Nouveau Rôle <i class="ion-person"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.roles') }}" class="btn btn-grey btn-md bold">
                            <i class="ion-reply"></i> Retour
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="dashboard">
        <div class="container-fluid">

            @include('errors.list')

            {!! Form::open([
                    'method' => 'post',
                    'route' => 'admin.roles.store',
                    'class' => '_form'
                ]) !!}

                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Nom') !!}
                                    {!! Form::text('name', old('name'), [
                                        'class' => 'form-control input-lg',
                                        'required' => true,
                                        'placeholder' => 'nom du rôle'
                                    ]) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('display_name', 'Description') !!}
                                    {!! Form::text('display_name', old('display_name'), [
                                        'class' => 'form-control input-lg',
                                        'required' => true,
                                        'placeholder' => 'Description'
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End of main part  --}}

                    <div class="col-sm-4">
                        <div class="mt-20 text-right">
                            <button type="submit" class="btn btn-primary btn-md">
                                <i class="ion-android-done-all"></i> Enregistrer
                            </button>
                        </div>
                    </div>
                    {{-- End of sidebar  --}}
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
