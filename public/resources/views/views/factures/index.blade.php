@extends('layout.index')
@section('content')
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card"> 
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Liste des factures
                  </div>              
                <div class="card-body">
                      <div class="table-responsive">
                          <div align="right">
                              <a href="{{route('factures.create')}}"><div class="btn btn-success">Nouvelle Facture&nbsp;<i class="fas fa-user-plus"></i></div></a> 
                          </div>
                          <br />
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-factures">
                          <thead class="table-dark">
                            <tr>
                              <th>ID</th>
                              <th>MONTANT</th>
                              <th>PRENOM</th>
                              <th>NOM</th>
                              <th>EMAIL</th>
                              <th>TELEPHONE</th>
                              <th>TYPE PAIEMENT</th>
                              <th>ACTION</th>
                            </tr>
                          </thead>
                          <tfoot class="table-dark">
                              <tr>
                                <th>ID</th>
                                <th>MONTANT</th>
                                <th>PRENOM</th>
                                <th>NOM</th>
                                <th>EMAIL</th>
                                <th>TELEPHONE</th>
                                <th>TYPE PAIEMENT</th>
                                <th>ACTION</th>
                              </tr>
                            </tfoot>
                          <tbody>
                           
                          </tbody>
                      </table>                        
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection

      @push('scripts')
      <script type="text/javascript">
      $(document).ready(function () {
          $('#table-factures').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('factures.list')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'montant', name: 'montant' },
                    { data: 'user.firstname', name: 'user.firstname' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'user.email', name: 'user.email' },
                    { data: 'user.telephone', name: 'user.telephone' },
                    { data: 'reglement.type.name', name: 'reglement.type.name' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('factures.edit',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('factures.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary edit " title="Modifier"><i class="far fa-edit">&nbsp;Edit</i></a>&nbsp;'+
                        '<a class="btn btn-danger delete" title="Supprimer" href='+url_d+'><i class="fas fa-times">&nbsp;Delete</i></a>';
                        },
                        "targets": 7
                        },
                    // {
                    //     "data": null,
                    //     "render": function (data, type, row) {
                    //         url =  "{!! route('agents.edit',':id')!!}".replace(':id', data.id);
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