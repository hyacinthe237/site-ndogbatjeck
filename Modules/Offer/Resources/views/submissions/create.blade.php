@extends('frontend.layouts.master')


@section('head')
    <title>Souscrire a une offre</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">

            <div class="title-form">
                <h4>Formulaire pour souscrire a une offre</h4>
            </div>

            @include('errors.list')

            {!! Form::open([
                    'method' => 'post',
                    'route' => ['offers.submissions.store',$offer_id],
                    'class' => '_form'
                ]) !!}

                <div class="row">

                    <div class="col-sm-6">

                        {!! Form::hidden('offer_id', $offer_id) !!}

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
                            {!! Form::label('is_company', 'L’entreprise pour laquelle vous soumettez cet offre est-elle  créée ?') !!}

                        </div>

                    </div>


                    <div class="col-sm-6">


                        <div class="form-group">
                            {!! Form::label('background', 'background') !!}
                            {!! Form::textarea('background', old('background'), [
                                'class' => 'form-control input-lg',
                                'rows' => 4,
                                'placeholder' => 'Décrivez votre background'
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
                                <i class="ion-log-in"></i> souscrire
                            </button>
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </section>

    <a class="_scroll" id="scroll" href="/accueil"></a>
@endsection

@section('scripts')
    @include('frontend.includes.scroll-scripts')
@endsection
