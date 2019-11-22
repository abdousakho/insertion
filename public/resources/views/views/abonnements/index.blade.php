@extends('layout.index')
@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Liste des abonnements
                  </div>
                <div class="card-body"> 
                  <div class="table-responsive">                  
                      <div align="right">
                          <a href="{{ route('abonnements.selectclient') }}"><div class="btn btn-success">Nouveau Abonnement&nbsp;<i class="fas fa-user-plus"></i></div></a> 
                      </div>
                    <br />
                    <table class="table" id="table-abonnements">
                      <thead class="table-dark">
                        <th>ID</th>
                        <th>Date</th>
                        <th>Prenom Client</th>
                        <th>Nom Client</th>
                        <th>Compteur</th>
                        <th>Action</th>
                      </thead>
                      <tfoot class="table-dark">
                        <th>ID</th>
                        <th>Date</th>
                        <th>Prenom Client</th>
                        <th>Nom Client</th>
                        <th>Compteur</th>
                        <th>Action</th>
                      </tfoot>
                      <tbody>
                          
                      </tbody>
                     
                    </table>
                
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Enregitrement</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if(Session::has('message'))
                                {{ Session::get('message') }}
                                    
                              
                              
                                @push('scripts')
                                <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#error-modal").modal({
                                        'show':true,
                                    })
                                });
                                </script>
                                    
                                @endpush
                                @endif
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      @endsection

      @push('scripts')
      <script type="text/javascript">
      $(document).ready(function () {
          $('#table-abonnements').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('abonnements.list')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'client.user.name', name: 'client.user.name' },
                    { data: 'client.user.firstname', name: 'client.user.firstname' },
                    { data: 'compteur.numero_serie', name: 'compteur.numero_serie' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('abonnements.show',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary" title="Modifier"><i class="far fa-edit">&nbsp;Edit</a>';
                        },
                        "targets": 5
                        },
                    // {
                    //     "data": null,
                    //     "render": function (data, type, row) {
                    //         url =  "{!! route('clients.edit',':id')!!}".replace(':id', data.id);
                    //         return check_status(data,url);
                    //     },
                    //     "targets": 1
                    // }
                ],
                language: {
                  "sProcessing":     "Traitement en cours...",
                  "sSearch":         "Rechercher&nbsp;:",
                  "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                  "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                  "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                  "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                  "sInfoPostFix":    "",
                  "sLoadingRecords": "Chargement en cours...",
                  "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                  "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                  "oPaginate": {
                      "sFirst":      "Premier",
                      "sPrevious":   "Pr&eacute;c&eacute;dent",
                      "sNext":       "Suivant",
                      "sLast":       "Dernier"
                  },
                  "oAria": {
                      "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                      "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                  },
                  "select": {
                          "rows": {
                              _: "%d lignes séléctionnées",
                              0: "Aucune ligne séléctionnée",
                              1: "1 ligne séléctionnée"
                          } 
                  }
                },
              
          });
      });
      </script>

          
      @endpush