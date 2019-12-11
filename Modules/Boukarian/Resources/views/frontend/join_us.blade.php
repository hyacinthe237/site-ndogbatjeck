@extends('frontend.layouts.master')


@section('head')
    <title>Le Boukarou</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">

            <div class="title-form">
                <h4>Formulaire pour nous réjoindre</h4>
            </div>

            @include('errors.list')

            {!! Form::open([
                    'method' => 'post',
                    'route' => 'boukarians.joinus.store',
                    'class' => '_form'
                ]) !!}

                <div class="row">

                    <div class="col-sm-6">
                        <div class="title-joinus">
                            <h5>1. Qui êtes-vous ?</h5>

                            <hr>
                        </div>

                        <div class="form-group">
                            {!! Form::label('first_name', 'Prénom') !!}
                            {!! Form::text('first_name', old('first_name'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Votre Prénom'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('last_name', 'Nom') !!}
                            {!! Form::text('last_name', old('last_name'), [
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
                            {!! Form::label('social_network', 'Réseaux sociaux') !!}
                            {!! Form::text('social_network', old('social_network'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Réseaux sociaux'
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

                    </div>


                    <div class="col-sm-6">
                        <div class="title-joinus">
                            <h5>2. Que recherchez-vous ?</h5>

                            <hr>
                        </div>

                        <div class="form-group">
                            {!! Form::radio('search_type', 'Rejoindre le staff ?') !!}
                            {!! Form::label('search_type', 'Rejoindre le staff ?') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::radio('search_type', 'Un stage chez nous') !!}
                            {!! Form::label('search_type', 'Un stage chez nous') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::radio('search_type', 'Un stage dans une des entités chez nous') !!}
                            {!! Form::label('search_type', 'Un stage dans une des entités chez nous') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::radio('search_type', 'Travailler en freelance') !!}
                            {!! Form::label('search_type', 'Travailler en freelance') !!}
                        </div>

                        <div class="title-joinus">
                            <h5>3. Des choses en plus qu’on devrait savoir ?</h5>

                            <hr>
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('more_details', old('more_details'), [
                                'class' => 'form-control input-lg',
                                'rows' => 4,
                                'placeholder' => 'Décrivez ce que nous ne savons pas sur vous'
                            ]) !!}
                        </div>

                        <div class="title-joinus">
                            <h5>4. Qu’attendez-vous du Boukarou ?</h5>

                            <hr>
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('why_boukarou', old('why_boukarou'), [
                                'class' => 'form-control input-lg',
                                'rows' => 4,
                                'placeholder' => 'Décrivez ce que vous attendez de nous'
                            ]) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <hr>

                        <div class="mt-20 text-right">
                            <button type="submit" class="btn btn-primary btn-md">
                                <i class="ion-log-in"></i> Nous rejoindre
                            </button>
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </section>

@endsection
