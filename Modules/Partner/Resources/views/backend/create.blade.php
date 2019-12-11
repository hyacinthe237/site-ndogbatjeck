@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Nouveau Partenaire</title>
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Nouveau Partenaire <i class="ion-network"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.partners') }}" class="btn btn-grey btn-md bold">
                            <i class="ion-reply"></i> Retour
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
                    'route' => 'admin.partners.store',
                    'class' => '_form'
                ]) !!}

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('name', 'Nom *') !!}
                            {!! Form::text('name', old('name'), [
                                'class' => 'form-control input-lg',
                                'required' => true,
                                'placeholder' => 'Nom du partenaire '
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('category', 'categorie') !!}
                             {!! Form::select('category', [
                                    'Gold' => 'Gold',
                                    'Silver' => 'Silver',
                                    'Platinum' => 'Platinum'
                                ],
                                null,
                                [
                                   'class' => 'form-control input-lg',
                                   'required' => true
                                ])
                           !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('link', 'Lien vers le site') !!}
                            {!! Form::text('link', old('link'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Lien vers le site du partenaire'
                            ]) !!}
                        </div>


                        <div class="form-group mt-20">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', old('description'), [
                                'class' => 'form-control input-lg',
                                'rows' => 4,
                                'placeholder' => 'Description du partenaire'
                            ]) !!}
                        </div>

                    </div>
                    {{-- End of main part  --}}

                    <div class="col-sm-4">
                         <div class="mt-20">
                            {!! Form::label('image', 'Image') !!}

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
<script type="text/javascript" src="/backend/fancybox/jquery.fancybox.js"></script>
<script>
$(document).ready(function() {
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

</script>
@endsection
