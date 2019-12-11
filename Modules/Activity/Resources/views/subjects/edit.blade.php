@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Editer une catégorie</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Editer une catégorie <i class="ion-grid"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.sujets') }}" class="btn btn-grey btn-md bold">
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

            {!! Form::model($subject, ['method' => 'PUT', 'route' => ['admin.sujets.update', $subject->id], 'class' => '_form' ]) !!}

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('name', 'Nom') !!}
                            {!! Form::text('name', $subject->name, [
                                'class' => 'form-control input-lg'
                            ]) !!}
                        </div>
                    </div>
                    {{-- End of main part  --}}


                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('parent_id', 'Sujet Parent') !!}
                            <select name="parent_id" class="form-control input-lg">
                                <option value="null"></option>
                                @foreach($subjects as $categorie)
                                    <option
                                        value="{{ $categorie->id }}"
                                        {{ $categorie->id == $subject->parent_id ? 'selected' : ''}}
                                    >
                                        {{ $categorie->name }}
                                    </option>
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
