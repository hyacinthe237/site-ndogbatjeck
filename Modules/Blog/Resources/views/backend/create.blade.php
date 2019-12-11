@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Nouveau Article</title>
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Nouveau Article <i class="ion-clipboard"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.blog') }}" class="btn btn-grey btn-md bold">
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
                    'route' => 'admin.blog.store',
                    'class' => '_form'
                ]) !!}

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('title', 'Titre') !!}
                            {!! Form::text('title', old('title'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Titre de votre article'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tags', 'Mots clés') !!}
                            {!! Form::text('tags', old('tags'), [
                                'class' => 'form-control input-lg tags',
                                'placeholder' => 'liste des mots clés (utilisez la virgule pour séparer chaque mot clé)'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('excerpt', 'Extrait') !!}
                            {!! Form::textarea('excerpt', old('excerpt'), [
                                'class' => 'form-control input-lg',
                                'rows' => 3,
                                'placeholder' => 'Saississez la courte description de votre article'
                            ]) !!}
                        </div>


                        <div class="form-group mt-20">
                            {!! Form::label('content', 'Contenu de votre article') !!}
                            {!! Form::textarea('content', old('content'), [
                                'class' => 'tiny',
                            ]) !!}
                        </div>
                    </div>
                    {{-- End of main part  --}}

                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('category_id', 'Catégorie') !!}
                            <select name="category_id" id="categories" class="form-control">
                              @foreach($postscategories as $postcategorie)
                                <option value="{{ $postcategorie->id }}">{{ $postcategorie->name }}</option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', [
                                'unpublished' => 'Privé',
                                'published' => 'Public'
                            ], old('status'), ['class' => 'form-control input-lg']) !!}
                        </div>

                        <div class="mt-20">
                            {!! Form::label('thumbnail', 'Thumbnail') !!}

                            <input type="hidden"
                                id='profile' name='image' readonly
                                value="{{ old('image') }}" >

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
<script type="text/javascript" src="/backend/js/scripts.min.js"></script>
<script type="text/javascript" src="/backend/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="/backend/tinymce/tinymce.min.js"></script>
<script>
$(document).ready(function() {
    $('.tags').tokenfield();

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
