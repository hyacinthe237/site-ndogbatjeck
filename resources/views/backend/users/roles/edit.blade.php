@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Editer un rôle</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Editer un rôle <i class="ion-person"></i> </div>
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

            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('success') }}
                </div>
            @endif

            {!! Form::model($role, ['method' => 'PUT', 'route' => ['admin.roles.update', $role->id], 'class' => '_form' ]) !!}

                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Nom') !!}
                                    {!! Form::text('name', $role->name, [
                                        'class' => 'form-control input-lg',
                                        'required' => true
                                    ]) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('display_name', 'Description') !!}
                                    {!! Form::text('display_name', $role->display_name, [
                                        'class' => 'form-control input-lg',
                                        'required' => true
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
