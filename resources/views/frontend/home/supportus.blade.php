@extends('frontend.layouts.master')


@section('head')
    <title>Le Boukarou</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">

            <div class="title-form">
                <h4>Formulaire pour nous soutenir</h4>
            </div>

            @include('errors.list')

            {!! Form::open([
                    'method' => 'post',
                    'route' => 'boukarians.supportus',
                    'class' => '_form'
                ]) !!}

                <div class="row">

                    <div class="col-sm-6">
                        <div class="title-joinus">
                            <h5>1.Informations générales ?</h5>

                            <hr>
                        </div>

                        <div class="form-group">
                            {!! Form::label('who', 'Qui êtes-vous ?') !!}
                            <select class="form-control input-lg" name="who" id="who">
                                <option value="m0">Je suis une personne morale</option>
                                <option value="1">Je suis une personne physique</option>
                            </select>
                        </div>

                        <div class="who m0" id="m0">
                            <div class="form-group">
                                {!! Form::label('lastname', 'Nom de la personne responsable') !!}
                                {!! Form::text('lastname', old('lastname'), [
                                    'class' => 'form-control input-lg',
                                    'placeholder' => 'Nom de la personne responsable'
                                ]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('domaine', 'Domaine d’activité') !!}
                                {!! Form::text('domaine', old('domaine'), [
                                    'class' => 'form-control input-lg',
                                    'required' => true,
                                    'placeholder' => 'Domaine d’activité'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', old('email'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Email'
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
                            {!! Form::label('pays', 'Pays de résidence') !!}
                            {!! Form::text('pays', old('pays'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Votre Pays de résidence'
                            ]) !!}
                        </div>

                    </div>


                    <div class="col-sm-6">
                        <div class="title-joinus">
                            <h5>2. Informations particulières</h5>

                            <hr>
                            <p>Quel type de soutien souhaitez-vous apporter ?</p>
                        </div>

                        <div class="form-group">
                            {!! Form::checkbox('materiel', 'Matériel') !!}
                            {!! Form::label('materiel', 'Matériel') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::checkbox('technique', 'Technique') !!}
                            {!! Form::label('technique', 'Technique') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::checkbox('fanancier', 'Financier') !!}
                            {!! Form::label('fanancier', 'Financier') !!}
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="autres" id="autres" value="autres">
                            {!! Form::label('autres', 'Autres') !!}
                        </div>

                        <div class="form-group" id="hidden_fields">
                            <textarea name="name" rows="2" id="hidden_field" class="form-control input-lg"></textarea>
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Visez-vous un secteur d’activité précis ?') !!}
                            {!! Form::text('phone', old('phone'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Visez-vous un secteur d’activité précis ?'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('pays', 'Avez-vous d’autres expériences de collaboration dans le domaine ?') !!}
                            {!! Form::text('pays', old('pays'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Avez-vous d’autres expériences de collaboration dans le domaine ? '
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('pays', 'Qu’attendez-vous du Boukarou ?') !!}
                            {!! Form::textarea('attente', old('attente'), [
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
                                <i class="ion-android-walk"></i> Nous soutenir
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
