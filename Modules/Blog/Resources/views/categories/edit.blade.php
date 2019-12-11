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
                        <a href="{{ route('admin.categories') }}" class="btn btn-grey btn-md bold">
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

            {!! Form::model($category, ['method' => 'PUT', 'route' => ['admin.categories.update', $category->id], 'class' => '_form' ]) !!}

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('name', 'Nom') !!}
                            {!! Form::text('name', $category->name, [
                                'class' => 'form-control input-lg',
                                'required' => true
                            ]) !!}
                        </div>
                    </div>
                    {{-- End of main part  --}}


                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('parent_id', 'Catégorie Parent') !!}
                            <select name="parent_id" id="categories" class="form-control">
                                <option value=""></option>
                                @foreach($categories as $categorie)
                                  <option
                                      value="{{ $categorie->id }}"
                                      {{ $categorie->id == $category->parent_id ? 'selected' : ''}}
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
