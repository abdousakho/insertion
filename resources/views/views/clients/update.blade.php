@extends('layout.index')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h3 class="card-title">Modification</h3>
                <p class="card-category">Clients</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ action('clientController@update', $id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PATCH" /> 
                    <div class="form-group">
                        <label for="input-prenom">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="input-prenom" placeholder="prenom du client" value="{{ $utilisateur->firstname }}">
                        <small id="input-prenom-help" class="form-text text-muted">
                            @if ($errors->has('prenom'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('prenom') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="input-nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="input-nom" placeholder="nom du client" value="{{ $utilisateur->name }}">
                        <small id="input-nom-help" class="form-text text-muted">
                            @if ($errors->has('nom'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('nom') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Adresse Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email du client" value=" {{ $utilisateur->email }}">
                        <small id="emailHelp" class="form-text text-muted">
                            @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $message)
                            <p class="text-danger">{{ $message }}</p>
                            @endforeach
                            @endif
                        </small>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            Option one is this
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>                        
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
                    <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies svp</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @endsection