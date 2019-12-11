@extends('frontend.layouts.master')


@section('head')
    <title>Le Boukarou</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">

            <div class="title-form">
                <h4>Formulaire pour devenir Boukarian</h4>
            </div>

            @include('errors.list')

            {!! Form::open([
                    'method' => 'post',
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
                                'required' => true,
                                'placeholder' => 'Votre Numéro de téléphone'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('country', 'Pays de résidence') !!}
                            {!! Form::text('country', old('country'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Votre Pays de résidence'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('is_company', 'L’entreprise pour laquelle vous soumettez ce projet est-elle  créée ?') !!}
                            <br>
                            {!! Form::radio('is_company', 1) !!}
                            {!! Form::label('is_company', 'Oui') !!}<br>
                            {!! Form::radio('is_company', 0) !!}
                            {!! Form::label('is_company', 'Non') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('project_name', 'Nom de votre projet') !!}
                            {!! Form::text('project_name', old('project_name'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Nom de votre projet'
                            ]) !!}
                        </div>

                    </div>


                    <div class="col-sm-6">
                        <div class="title-joinus">
                            <h5>2. Dossier de candidature</h5>

                            <hr>
                        </div>

                        <div class="form-group">
                            {!! Form::label('issue', 'À quel problème souhaitez-vous apporter une solution ?') !!}
                            {!! Form::textarea('issue', old('issue'), [
                                'class' => 'form-control input-lg',
                                'rows' => 1,
                                'placeholder' => 'À quel problème souhaitez-vous apporter une solution ?'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('why_issue', 'pourquoi ?') !!}
                            {!! Form::textarea('why_issue', old('why_issue'), [
                                'class' => 'form-control input-lg',
                                'rows' => 1,
                                'placeholder' => 'pourquoi ?'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('solution', 'Quelle solution souhaitez-vous mettre en place ?') !!}
                            {!! Form::textarea('solution', old('solution'), [
                                'class' => 'form-control input-lg',
                                'rows' => 1,
                                'placeholder' => 'Quelle solution souhaitez-vous mettre en place ?'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('project_story', 'Qu’avez-vous réalisé jusqu’à présent pour votre projet ?') !!}
                            {!! Form::textarea('project_story', old('project_story'), [
                                'class' => 'form-control input-lg',
                                'rows' => 2,
                                'placeholder' => 'Qu’avez-vous réalisé jusqu’à présent pour votre projet ?'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('existing_solution', 'Racontez-nous l’histoire de votre projet') !!}
                            {!! Form::textarea('existing_solution', old('existing_solution'), [
                                'class' => 'form-control input-lg',
                                'rows' => 1,
                                'placeholder' => 'Racontez-nous l’histoire de votre projet'
                            ]) !!}
                        </div>



                        <div class="form-group">
                            {!! Form::label('next_steps', 'Quelles sont les prochaines étapes ?') !!}
                            {!! Form::textarea('next_steps', old('next_steps'), [
                                'class' => 'form-control input-lg',
                                'rows' => 1,
                                'placeholder' => 'Quelles sont les prochaines étapes ?'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('why_boukarou', 'Qu’attendez-vous du Boukarou ?') !!}
                            {!! Form::textarea('why_boukarou', old('why_boukarou'), [
                                'class' => 'form-control input-lg',
                                'rows' => 2,
                                'placeholder' => 'Qu’attendez-vous du Boukarou ?'
                            ]) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <hr>

                        <div class="mt-20 text-right">
                            <button type="submit" class="btn btn-primary btn-md">
                                <i class="ion-log-in"></i> Devenir un Boukarian
                            </button>
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </section>

@endsection

@section('scripts')
    @include('frontend.home.scripts')
@endsection
