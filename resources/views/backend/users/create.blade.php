@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Nouveau Utilisateur</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Nouveau Utilisateur <i class="ion-android-people"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.users') }}" class="btn btn-grey btn-md bold">
                            <i class="ion-reply"></i> Annuler
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
                    'route' => 'admin.users.store',
                    'class' => '_form'
                ]) !!}

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('firstname', 'Prénom') !!}
                            {!! Form::text('firstname', old('firstname'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Prénom de l\'utilisateur '
                            ]) !!}
                            <input type="hidden" name="password" value="pass">
                        </div>

                        <div class="form-group">
                            {!! Form::label('lastname', 'Nom') !!}
                            {!! Form::text('lastname', old('lastname'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Nom de l\'utilisateur'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', old('email'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Email de l\'utilisateur'
                            ]) !!}
                        </div>


                        <div class="form-group mt-20">
                            {!! Form::label('phone', 'Numéro de téléphone') !!}
                            {!! Form::text('phone', old('phone'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Numéro de téléphone de l\'utilisateur',
                            ]) !!}
                        </div>
                    </div>
                    {{-- End of main part  --}}

                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('role_id', 'Rôle') !!}
                            <select name="role_id" id="role_id" class="form-control input-lg">
                              @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                              @endforeach
                            </select>
                        </div>

                        <hr>

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
