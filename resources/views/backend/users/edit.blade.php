@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Editer un Utilisateur</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Editer un Utilisateur <i class="ion-android-people"></i> </div>
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

            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('success') }}
                </div>
            @endif

            {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id], 'class' => '_form' ]) !!}

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                           {!! Form::label('firstname', 'Prénom') !!}
                           {!! Form::text('firstname', $user->firstname, [
                               'class' => 'form-control input-lg',
                               'required' => true
                           ]) !!}
                       </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                           {!! Form::label('role_id', 'Rôle') !!}
                           <select name="role_id" id="role_id" class="form-control input-lg">
                             @foreach($roles as $role)
                               <option value="{{ $role->id }}">{{ $role->name }}</option>
                             @endforeach
                           </select>
                       </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('lastname', 'Nom') !!}
                            {!! Form::text('lastname',$user->lastname, [
                                'class' => 'form-control input-lg'
                            ]) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('gender', 'Sexe') !!}
                            {!! Form::select('gender', [
                                'male' => 'Masculin',
                                'female' => 'Féminin'
                            ], $user->gender, ['class' => 'form-control input-lg']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', $user->email, [
                                'class' => 'form-control input-lg',
                                'required' => true
                            ]) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('dob', 'Date de naissance') !!}
                            {!! Form::date('dob', $user->dob, [
                                'class' => 'form-control input-lg'
                            ]) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group mt-20">
                            {!! Form::label('phone', 'Numéro de téléphone') !!}
                            {!! Form::text('phone', $user->phone, [
                                'class' => 'form-control input-lg'
                            ]) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group mt-20">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', [
                                'pending' => 'Pending',
                                'active' => 'Active',
                                'blocked' => 'Blocked'
                            ], $user->status, ['class' => 'form-control input-lg']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">

                    </div>
                    <div class="col-sm-4">
                        <div class="mt-20 text-right">
                            <button type="submit" class="btn btn-primary btn-md">
                                <i class="ion-android-done-all"></i> Enregistrer
                            </button>

                            @if ($user->status === 'active')
                                <a href="{{ route('admin.users.blocked', $user->id) }}" class="btn btn-danger btn-md">
                                    <i class="ion-android-lock"></i> Bloquer Utilisateur
                                </a>
                            @endif

                            @if ($user->status === 'blocked')
                                <a href="{{ route('admin.users.blocked', $user->id) }}" class="btn btn-success btn-md">
                                    <i class="ion-android-unlock"></i> Débloquer Utilisateur
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </section>
@endsection
