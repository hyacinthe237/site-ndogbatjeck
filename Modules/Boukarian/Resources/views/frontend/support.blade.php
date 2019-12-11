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
                <h4>Formulaire pour nous soutenir</h4>
            </div>

            @include('errors.list')

            {!! Form::open([
                    'method' => 'post',
                    'route' => 'boukarian.supports.store',
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
                            <select class="form-control input-lg" name="person_type" id="who">
                                <option value="morale">Je suis une personne morale</option>
                                <option value="physique">Je suis une personne physique</option>
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('name', 'Votre nom complet') !!}
                            {!! Form::text('name', old('name'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Votre nom complet'
                            ]) !!}
                        </div>

                        <div class="who morale" id="morale">
                            <div class="form-group">
                                {!! Form::label('corporate_name', 'Nom de la personne responsable') !!}
                                {!! Form::text('corporate_name', old('corporate_name'), [
                                    'class' => 'form-control input-lg',
                                    'placeholder' => 'Nom de la personne responsable'
                                ]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('field_of_activity', 'Domaine d’activité') !!}
                                {!! Form::text('field_of_activity', old('field_of_activity'), [
                                    'class' => 'form-control input-lg',
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
                                'required' => true,
                                'placeholder' => 'Votre Numéro de téléphone'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('country', 'Pays de résidence') !!}
                            {!! Form::text('country', old('country'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Votre pays de résidence'
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
                            {!! Form::radio('support_type', 'matériel') !!}
                            {!! Form::label('support_type', 'Matériel') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::radio('support_type', 'technique') !!}
                            {!! Form::label('support_type', 'Technique') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::radio('support_type', 'financier') !!}
                            {!! Form::label('support_type', 'Financier') !!}
                        </div>
                        <div class="form-group">
                            <input type="radio" name="support_type" id="autres" value="autres">
                            {!! Form::label('other_support_type', 'Autres') !!}
                            <div id="hidden_fields">
                                {!! Form::text('other_support_type', old('other_support_type'), [
                                    'class' => 'form-control input-lg',
                                    'placeholder' => ''
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('sector_cible', 'Visez-vous un secteur d’activité précis ?') !!}
                            {!! Form::text('sector_cible', old('sector_cible'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Visez-vous un secteur d’activité précis ?'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('experience', 'Avez-vous d’autres expériences de collaboration dans le domaine ?') !!}
                            {!! Form::text('experience', old('experience'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Avez-vous d’autres expériences de collaboration dans le domaine ? '
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('attente', 'Qu’attendez-vous du Boukarou ?') !!}
                            {!! Form::textarea('attente', old('attente'), [
                                'class' => 'form-control input-lg',
                                'rows' => 4,
                                'required' => true,
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
    @include('frontend.includes.support-scripts')
@endsection
