@extends('layout.dashboard')
@section('content')




<div class="form-admin">
<form method="PUT" action="{{url('administrateurs/create')}}">


    <fieldseT>
        <legend>Informations du profil utilisateur</legend>
        <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                                <input type="text" class="form-control" placeholder="Matricule" name="matricule" value="">
                              </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Téléphone" name="telephone" value="">
                        </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Prenom" name="prenom" value="">
                              </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                    <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email" value="">
                                     </div>
                            </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                        <div class="form-group">
                                             
                                                <input type="text" class="form-control" name="nom" placeholder="Nom" value="">
                                </div>
                                  </div>
                        </div>
                        <div class="col-md-6">
                   
                        </div>
                    </div>
    


            </fieldset>
            <div>
                <button type="submit" class="btn btn-add btn-fill btn-primary">Enregistrer</button>
            </div>
           

</form>

</div>

@endsection