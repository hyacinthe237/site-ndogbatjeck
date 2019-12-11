@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Nouvelle permission</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Nouvelle permission <i class="ion-person"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.permissions') }}" class="btn btn-grey btn-md bold">
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
                    'route' => 'admin.permissions.store',
                    'class' => '_form'
                ]) !!}

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('name', 'Nom unique') !!}
                            {!! Form::text('name', old('name'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'nom de la permission'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('display_name', 'Description') !!}
                            {!! Form::text('display_name', old('display_name'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'nom secondaire de la permission'
                            ]) !!}
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
