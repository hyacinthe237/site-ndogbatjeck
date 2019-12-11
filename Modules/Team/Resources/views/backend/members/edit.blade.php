@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Editer un Membre</title>
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Editer un Membre <i class="ion-android-people"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.members') }}" class="btn btn-grey btn-md bold">
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

            {!! Form::model($member, ['method' => 'PUT', 'route' => ['admin.members.update', $member->id], 'class' => '_form' ]) !!}

                <div class="row">

                    <div class="col-sm-8">

                        <div class="form-group">
                           {!! Form::label('name', 'Nom') !!}
                           {!! Form::text('name', $member->name, [
                               'class' => 'form-control input-lg',
                               'required' => true
                           ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('position', 'Position') !!}
                            {!! Form::text('position',$member->position, [
                                'class' => 'form-control input-lg'
                            ]) !!}
                        </div>
           
                        <div class="form-group mt-20">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', $member->description, [
                                'class' => 'form-control input-lg',
                                'rows' => 4,
                                'placeholder' => 'Description du membre'
                            ]) !!}
                        </div>
                    </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mt-20">
                            {!! Form::label('image', 'Image') !!}

                            <input type="hidden"
                                id='profile' name='image' readonly
                                value="{{ $member->image }}" >

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
