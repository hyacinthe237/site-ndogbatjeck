@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Editer une activité</title>
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Editer une activité <i class="ion-android-walk"></i> </div>
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

            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('success') }}
                </div>
            @endif

            {!! Form::model($activity, ['method' => 'PATCH', 'route' => ['admin.activites.update', $activity->id], 'class' => '_form' ]) !!}

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('title', 'Titre') !!}
                            {!! Form::text('title', $activity->title,[
                                'class' => 'form-control input-lg',
                                'required' => true
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tags', 'Mots clés') !!}
                            {!! Form::text('tags', $activity->tags,[
                                'class' => 'form-control input-lg',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('location', 'Lieu') !!}
                            {!! Form::text('location', $activity->location, [
                                'class' => 'form-control input-lg'
                            ]) !!}
                        </div>


                        {{-- Date & time  --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('date_activity', 'Date') !!}
                                    {!! Form::text('date_activity', $activity->date_activity ? date('d-m-Y', strtotime($activity->date_activity)) : null, [
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
                                                <option value="{{ $value }}" {{ $value == $activity->hour ? 'selected' : '' }}>{{ $value }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col-xs-6">
                                        <select name="minutes" class="form-control input-lg">
                                            @for($i = 0; $i < 60; $i+=5)
                                                <?php $value = $i < 10 ? '0' . $i : $i ;?>
                                                <option value="{{ $value }}" {{ $value == $activity->minutes ? 'selected' : '' }}>{{ $value }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End of date & time  --}}

                        <div class="form-group">
                            {!! Form::label('excerpt', 'Extrait') !!}
                            {!! Form::textarea('excerpt', $activity->excerpt,[
                                'class' => 'form-control input-lg',
                                'rows' => 3
                            ]) !!}
                        </div>


                        <div class="form-group mt-20">
                            {!! Form::label('description', 'Contenu de votre activité') !!}
                            {!! Form::textarea('description', $activity->description,[
                                'class' => 'form-control tiny'
                            ]) !!}
                        </div>
                    </div>
                    {{-- End of main part  --}}


                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('subject_id', 'Sujet') !!}
                            <select name="subject_id" class="form-control input-lg">
                              @foreach($subjects as $categorie)
                                <option
                                    value="{{ $categorie->id }}"
                                    {{ $categorie->id == $activity->subject_id ? 'selected' : ''}}
                                >
                                    {{ $categorie->name }}
                                </option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('published', 'Statut') !!}
                            {!! Form::select('published', [
                                'unpublished' => 'Privé',
                                'published' => 'Public'
                            ], $activity->published, ['class' => 'form-control input-lg']) !!}
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('is_anchor', 'Activté Ancrée') !!}<br>
                                    <input type="radio" name="is_anchor" value="1" {{ $activity->is_anchor == '1' ? 'checked' : '' }}> <label for="is_anchor">Oui</label> <br>
                                    <input type="radio" name="is_anchor" value="0" {{ $activity->is_anchor == '1' ? '' : 'checked' }}> <label for="is_anchor">Non</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('is_frequent', 'Activté fréquente') !!}<br>
                                    <input type="radio" name="is_frequent" value="1" {{ $activity->is_frequent == '1' ? 'checked' : '' }}> <label for="is_frequent">Oui</label><br>
                                    <input type="radio" name="is_frequent" value="0" {{ $activity->is_frequent == '1' ? '' : 'checked' }}> <label for="is_frequent">Non</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-20">
                            {!! Form::label('thumbnail', 'Thumbnail') !!}

                            <input type="hidden"
                                id='profile' name='image' readonly
                                value="{{ $activity->image }}" >

                            <div id="profile_view" class="mt-20"></div>

                            <div class="text-right">
                                <a href="/backend/filemanager/dialog.php?type=1&field_id=profile" class="iframe-btn btn-dark btn round"> <i class='ion-folder'></i> Fichiers</a>
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
            $('#profile_view').html("<img class='thumbnail img-responsive mb-10' src='" + profilePic +"'/>");
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
