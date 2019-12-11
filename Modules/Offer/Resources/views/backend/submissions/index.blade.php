@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Souscriptions</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Souscriptions <i class="ion-social-buffer"></i> </div>
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

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Vu</th>
                        <th>Contacts</th>
                        <th>Pays</th>
                        <th>Offre</th>
                        <th>Background</th>
                        <th>Souscrit le</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($submissions as $submission)
                        <tr>
                            <td>{{ $submission->firstname }} {{ $submission->lastname }}</td>
                            <td>{{ $submission->open ? 'Oui' : 'Non' }}</td>
                            <td>{{ $submission->email }} <br>{{ $submission->phone }} </td>
                            <td>{{ $submission->country }}</td>
                            <td>
                                {{ str_limit(strip_tags($submission->offer->name), 20) }}
                            </td>
                            <td>
                             {{ str_limit(strip_tags($submission->background), 50) }}
                                    @if (strlen(strip_tags($submission->background)) > 50)
                                      ...
                                    @endif
                            </td>
                            <td>{{ $submission->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.offers.submissions.show', $submission->code) }}" class="edit-icon">
                                    <i class="ion-gear-b"></i>
                                </a>
                                <a class="delete-icon" data-toggle="modal" data-target="#{{$submission->id}}">
                                    <i class="ion-trash-a"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="{{$submission->id}}" tabindex="-1" role="dialog" aria-labelledby="detePartnerLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5 class="modal-title" id="detePartnerLabel">Suppression d'une soumission</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                               </div>
                              </div>
                              <div class="modal-body">
                                <p>Voulez vous supprimer cette soumission ?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulé</button>
                                <a href="{{ route('admin.offers.submissions.delete', $submission->id) }}" class="btn btn-danger btn-md active" role="button" aria-pressed="true">Supprimé</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
           {{ $submissions->links() }}
        </div>
    </section>


@endsection
