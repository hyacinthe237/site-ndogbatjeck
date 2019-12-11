@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Nouveau Projet</title>
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Nouveau Projet <i class="ion-social-buffer"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.projects') }}" class="btn btn-grey btn-md bold">
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

            @if(session('success'))
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('success') }}
                </div>
            @endif

            {!! Form::open([
                'method' => 'post',
                'route' => 'admin.projects.store',
                'class' => '_form'
                ]) !!}


                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('title', 'Titre') !!}
                            {!! Form::text('title', old('title'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Titre du projet'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tags', 'Mots clés') !!}
                            {!! Form::text('tags', old('tags'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'liste des mots clés (utilisez la virgule pour séparer chaque mot clé)'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('idea', 'Idée Principale') !!}
                            {!! Form::text('idea', old('idea'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'donnez le sens principale de votre projet'
                            ]) !!}
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('phone', 'Numéro de téléphone') !!}
                                    {!! Form::text('phone', old('phone'), [
                                        'class' => 'form-control input-lg',
                                        'placeholder' => 'Numéro de téléphone'
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('email', 'Adresse email') !!}
                                    {!! Form::email('email', old('email'), [
                                        'class' => 'form-control input-lg',
                                        'placeholder' => 'Adresse email'
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('location', 'Résidence') !!}
                            {!! Form::text('location', old('location'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Résidence'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('excerpt', 'Description courte') !!}
                            {!! Form::textarea('excerpt', old('excerpt'), [
                                'class' => 'form-control input-lg',
                                'rows' => 3,
                                'placeholder' => 'Saississez la courte description du projet'
                            ]) !!}
                        </div>


                        <div class="form-group mt-20">
                            {!! Form::label('description', 'Description détaillée du projet') !!}
                            {!! Form::textarea('description', old('description'), [
                                'class' => 'tiny',
                            ]) !!}
                        </div>
                    </div>
                    {{-- End of main part  --}}

                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('owner', 'Chef de projet') !!}
                            {!! Form::text('owner', old('owner'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Nom du chef de projet'
                            ]) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label('theme_id', 'Thème') !!}
                            <select name="theme_id" id="themes" class="form-control">
                              @foreach($themes as $theme)
                                <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                              @endforeach
                            </select>

                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('status', 'Status') !!}
                                    {!! Form::select('status', [
                                        'en_cours' => 'En cours',
                                        'termine' => 'Terminé',
                                        'annule' => 'Annulé',
                                    ], old('status'), ['class' => 'form-control input-lg']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('published', 'Visibilité') !!}
                                    {!! Form::select('published', [
                                        'published' => 'Public',
                                        'unpublished' => 'Privé'
                                    ], old('published'), ['class' => 'form-control input-lg']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="mt-20">
                            {!! Form::label('logo', 'Logo') !!}

                            <input type="hidden"
                                id='logo' name='logo' readonly
                                value="{{ old('logo') }}" >

                            <div id="logo_view" class="mt-20"></div>

                            <div class="text-right">
                                <a href="/backend/filemanager/dialog.php?type=1&field_id=logo" class="logo-btn btn-dark btn round">
                                    <i class='ion-upload'></i> Logo</a>
                            </div>
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



@section('js')
<script type="text/javascript" src="/backend/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="/backend/tinymce/tinymce.min.js"></script>
<script>
$(document).ready(function() {
    $('.logo-btn').fancybox({
        'width'     : 900,
        'maxHeight' : 600,
        'minHeight'    : 400,
        'type'      : 'iframe',
        'autoSize'      : false
    });

    $("body").hover(function() {
        var logoPic = $("input[name='logo']").val();
        if(logoPic)
            $('#logo_view').html("<img class='thumbnail img-responsive mb-10' src='" + logoPic +"'/>");
    });
})

tinymce.init({
    selector: ".tiny",
    theme: "modern",
    relative_urls: false,
    height : 220,
    fontsize_formats: "8px 10px 12px 14px 16px 18px 24px 32px 36px 60px",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor filemanager code"
   ],
   toolbar1: "undo redo | fontsizeselect bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
   toolbar2: "|filemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | styleselect",
   image_advtab: true ,

    external_filemanager_path:"/backend/filemanager/",
    filemanager_title:"Responsive Filemanager" ,
    external_plugins: { "filemanager" : "/backend/filemanager/plugin.min.js"}
});
</script>
@endsection
