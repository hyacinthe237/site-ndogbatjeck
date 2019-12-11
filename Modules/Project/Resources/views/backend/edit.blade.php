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

            {!! Form::model($project, ['method' => 'PUT', 'route' => ['admin.projects.update', $project->id], 'class' => '_form' ]) !!}


                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('title', 'Titre') !!}
                            {!! Form::text('title', $project->title, [
                                'class' => 'form-control input-lg',
                                'required' => true
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tags', 'Mots clés') !!}
                            {!! Form::text('tags', $project->tags, [
                                'class' => 'form-control input-lg'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('idea', 'Idée Principale') !!}
                            {!! Form::text('idea', $project->idea, [
                                'class' => 'form-control input-lg',
                                'required' => true
                            ]) !!}
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('phone', 'Numéro de téléphone') !!}
                                    {!! Form::text('phone', $project->phone, [
                                        'class' => 'form-control input-lg'
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('email', 'Adresse email') !!}
                                    {!! Form::email('email', $project->email, [
                                        'class' => 'form-control input-lg'
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('location', 'Résidence') !!}
                            {!! Form::text('location', $project->location, [
                                'class' => 'form-control input-lg'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('excerpt', 'Description courte') !!}
                            {!! Form::textarea('excerpt', $project->excerpt, [
                                'class' => 'form-control input-lg',
                                'rows' => 3
                            ]) !!}
                        </div>


                        <div class="form-group mt-20">
                            {!! Form::label('description', 'Description détaillée du projet') !!}
                            {!! Form::textarea('description', $project->description, [
                                'class' => 'tiny',
                            ]) !!}
                        </div>
                    </div>
                    {{-- End of main part  --}}

                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('owner', 'Chef de projet') !!}
                            {!! Form::text('owner', $project->owner, [
                                'class' => 'form-control input-lg'
                            ]) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label('theme_id', 'Thème') !!}
                             {!! Form::select('theme_id',
                                $themes,
                                $project->theme_id ,
                                [
                                   'class' => 'form-control input-lg'
                                ])
                           !!}

                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('status', 'Status') !!}
                                    {!! Form::select('status', [
                                        'en_cours' => 'En cours',
                                        'termine' => 'Terminé',
                                        'annule' => 'Annulé',
                                    ], $project->status, ['class' => 'form-control input-lg']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('published', 'Visibilité') !!}
                                    {!! Form::select('published', [
                                        'published' => 'Public',
                                        'unpublished' => 'Privé'
                                    ], $project->published, ['class' => 'form-control input-lg']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="mt-20">
                            {!! Form::label('logo', 'Logo') !!}

                            <input type="hidden"
                                id='logo' name='logo' readonly
                                value="{{ $project->logo }}" >

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
