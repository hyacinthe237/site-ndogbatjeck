@extends('frontend.layouts.master')


@section('head')
    <title>Le Boukarou</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('success') }}
                </div>
            @endif

            <div class="title-form">
                <h4>Devenir un Boukarian</h4>
            </div>

            @include('errors.list')

            {!! Form::open([
                    'method' => 'post',
                    'route' => 'boukarians.become-boukarian.store',
                    'class' => '_form'
                ]) !!}

                <div class="row">

                    <div class="col-sm-6">
                        <div class="title-joinus">
                            <h5>1. Informations générales</h5>

                            <hr>
                        </div>

                        <div class="form-group">
                            {!! Form::label('firstname', 'Prénom') !!}
                            {!! Form::text('firstname', old('firstname'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Votre Prénom'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('lastname', 'Nom') !!}
                            {!! Form::text('lastname', old('lastname'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Votre Nom'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', old('email'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Votre Email'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Numéro de téléphone') !!}
                            {!! Form::text('phone', old('phone'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Votre Numéro de téléphone'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('country', 'Pays de résidence') !!}
                            {!! Form::text('country', old('country'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Votre Pays de résidence'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::checkbox('is_company') !!}
                            {!! Form::label('is_company', 'L’entreprise pour laquelle vous soumettez ce projet est-elle  créée ?') !!}

                        </div>
                       <div class="form-group">
                            {!! Form::label('project_name', 'Nom de votre project') !!}
                            {!! Form::text('project_name', old('project_name'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Le nom de votre project'
                            ]) !!}
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="title-joinus">
                            <h5>2. Dossier de candidature ?</h5>

                            <hr>
                        </div>
                        <div class="form-group">
                            {!! Form::label('issue', 'À quel problème souhaitez-vous apporter une solution ? ') !!}
                            {!! Form::text('issue', old('issue'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => ''
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('why_issue', 'Pourquoi ?') !!}
                            {!! Form::text('why_issue', old('why_issue'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => ''
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('solution', 'Quelle solution souhaitez-vous mettre en place ?') !!}
                            {!! Form::text('solution', old('solution'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => ''
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('project_story', 'Racontez-nous l’histoire de votre projet') !!}
                            {!! Form::textarea('project_story', old('project_story'), [
                                'class' => 'form-control input-lg',
                                'rows' => 4,
                                'placeholder' => 'Racontez-nous l’histoire de votre projet'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('existing_solution', 'Qu’avez-vous réalisé jusqu’à présent pour votre projet ?') !!}
                            {!! Form::text('existing_solution', old('existing_solution'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => ''
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('next_steps', 'Quelles sont les prochaines étapes ?') !!}
                            {!! Form::text('next_steps', old('next_steps'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => ''
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('why_boukarou', 'Qu’attendez-vous du Boukarou ? ') !!}
                            {!! Form::text('why_boukarou', old('why_boukarou'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => ''
                            ]) !!}
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <hr>

                        <div class="mt-20 text-right">
                            <button type="submit" class="btn btn-primary btn-md">
                                <i class="ion-log-in"></i> Devenir boukarian
                            </button>
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </section>

@endsection
