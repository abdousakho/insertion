@extends('layout.index')
@section('content')
<div class="content">
    <div class="container col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">Agents</p>
                </div>
                <div class="card-body">
                    <div class="row pt-5"></div>
                    
                    <form method="POST" action="{{route('agents.store')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="input-prenom">Matricule</label>
                            <input type="text" name="matricule" class="form-control" id="input-matricule" placeholder="matricule du agent" value="{{ old('matricule') }}">
                            <small id="input-matricule-help" class="form-text text-muted">
                                @if ($errors->has('matricule'))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->get('matricule') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="input-prenom">Prenom</label>
                            <input type="text" name="prenom" class="form-control" id="input-prenom" placeholder="prenom du agent" value="{{ old('prenom') }}">
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
                            <input type="text" name="nom" class="form-control" id="input-nom" placeholder="nom du agent" value="{{ old('nom') }}">
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
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email du agent" value=" {{old('email')}}">
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('email'))
                                @foreach ($errors->get('email') as $message)
                                <p class="text-danger">{{ $message }}</p>
                                @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="input-telephone">Telephone</label>
                            <input type="text" name="telephone" class="form-control" id="input-telephone" placeholder="telephone du agent" value="{{ old('telephone') }}">
                            <small id="input-telephone-help" class="form-text text-muted">
                                @if ($errors->has('telephone'))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->get('telephone') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="mot de passe du agent">
                            @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $message)
                            <p class="text-danger">{{ $message }}</p>
                            @endforeach
                            @endif
                        </div>                        
                        <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
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
</div>
    @endsection