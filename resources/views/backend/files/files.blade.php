@extends('backend.layouts.master')


@section('head')
    <title>Dashboard</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Fichiers <i class="ion-folder"></i> </div>
                </div>
            </div>
        </div>
    </section>




    <section class="dashboard">
        <div class="container-fluid">
            <iframe  width="100%" height="600" frameborder="0"
                src="/backend/filemanager/dialog.php?type=0">
        </div>
    </section>
@endsection





@section('js')
<script>
$(document).ready(function () {

})
</script>
@endsection
