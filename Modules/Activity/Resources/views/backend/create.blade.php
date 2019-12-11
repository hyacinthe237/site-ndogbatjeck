@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Nouvelle activité</title>
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Nouvelle activité <i class="ion-android-walk"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.activites') }}" class="btn btn-grey btn-md bold">
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

            {!! Form::open([
                    'method' => 'post',
                    'route' => 'admin.activites.store',
                    'class' => '_form'
                ]) !!}

                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('title', 'Titre') !!}
                            {!! Form::text('title', old('title'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Titre de votre activité'
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
                            {!! Form::label('location', 'Lieu') !!}
                            {!! Form::text('location', old('location'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'lieu ou votre activité se déroulera)'
                            ]) !!}
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('date_activity', 'Date') !!}
                                    {!! Form::text('date_activity', old('date_activity'), [
                                        'class' => 'form-control input-lg datepicker',
                                        'placeholder' => 'Date de l\'activité',
                                        'readonly' => true
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('time_activity', 'Temps (HH:mm)') !!}

                                <div class="row">
                                    <div class="col-xs-6">
                                        <select name="hour" class="form-control input-lg">
                                            @for($i = 0; $i < 24; $i++)
                                                <?php $value = $i < 10 ? '0' . $i : $i ;?>
                                                <option value="{{ $value }}" {{ $value == '15' ? 'selected' : '' }}>{{ $value }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col-xs-6">
                                        <select name="minutes" class="form-control input-lg">
                                            @for($i = 0; $i < 60; $i+=5)
                                                <?php $value = $i < 10 ? '0' . $i : $i ;?>
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('excerpt', 'Extrait') !!}
                            {!! Form::textarea('excerpt', old('excerpt'), [
                                'class' => 'form-control input-lg',
                                'rows' => 3,
                                'placeholder' => 'Saississez la courte description de votre activité'
                            ]) !!}
                        </div>


                        <div class="form-group mt-20">
                            {!! Form::label('description', 'Contenu de votre activité') !!}
                            {!! Form::textarea('description', old('description'), [
                                'class' => 'tiny',
                            ]) !!}
                        </div>
                    </div>
                    {{-- End of main part  --}}



                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('subject_id', 'Sujet') !!}
                            <select name="subject_id" class="form-control input-lg">
                              @foreach($subjects as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                              @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            {!! Form::label('published', 'Status') !!}
                            {!! Form::select('published', [
                                    'unpublished' => 'Privé',
                                    'published' => 'Public'
                                ], old('published'), ['class' => 'form-control input-lg']) !!}
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('is_anchor', 'Activté Ancrée') !!}<br>
                                    {!! Form::radio('is_anchor', 1, 'true') !!}
                                    {!! Form::label('is_anchor', 'Oui') !!} <br>
                                    {!! Form::radio('is_anchor', 0) !!}
                                    {!! Form::label('is_anchor', 'Non') !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('is_frequent', 'Activté récurrente') !!}<br>
                                    {!! Form::radio('is_frequent', 1) !!}
                                    {!! Form::label('is_frequent', 'Oui') !!} <br>
                                    {!! Form::radio('is_frequent', 0, 'true') !!}
                                    {!! Form::label('is_frequent', 'Non') !!}
                                </div>
                            </div>
                        </div>

                        <div class="mt-20">
                            {!! Form::label('thumbnail', 'Thumbnail') !!}

                            <input type="hidden"
                                id='image' name='image' readonly
                                value="{{ old('image') }}" >

                            <div id="image_view" class="mt-20"></div>

                            <div class="text-right">
                                <a href="/backend/filemanager/dialog.php?type=1&field_id=image" class="iframe-btn btn-dark btn round"> <i class='ion-folder'></i> Fichiers</a>
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
    $('.datepicker').datepicker({
        startdate: 'd',
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true
    })


    $('.iframe-btn').fancybox({
        'width'     : 900,
        'maxHeight' : 600,
        'minHeight'    : 400,
        'type'      : 'iframe',
        'autoSize'      : false
    });

    $("body").hover(function() {
        var profilePic = $("input[name='image']").val();
        if(profilePic)
            $('#image_view').html("<img class='thumbnail img-responsive mb-10' src='" + profilePic +"'/>");
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
    })
})
</script>
@endsection
