@extends('layout.dashboard')
@section('content')
<div class="content">
    <div class="container col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <div class="container-fluid">
      {{--       @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif     --}}                
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">Ajout formation</p>
                </div>
                <div class="card-body">
                                               
                        <form method="POST" action="{{url('formations')}}">
                            {{ csrf_field() }}
                                                    
                    {{--         <div class="form-group">
                                <label for="input-matricule"><b>Matricule:</b></label>
                                <input type="text" name="matricule" class="form-control" id="input-matricule" placeholder="Entrer votre matricule..." value="{{ old('matricule') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('matricule'))
                                        @foreach ($errors->get('matricule') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div> --}}
                            <div class="form-group">
                                <label for="input-prenom"><b>Intitulé:</b></label>
                                <input type="text" name="prenom" class="form-control" id="input-prenom" placeholder="entrer le prénom..." value="{{ old('intitule') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('intitule'))
                                        @foreach ($errors->get('intitule') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>
                            
                            <div class="form-group">
                                <label for="input-nom"><b>Domaine:</b></label>
                                <input type="text" name="domaine" class="form-control" id="input-nom" placeholder="Entrer votre nom..." value="{{ old('domaine') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('domaine'))
                                        @foreach ($errors->get('domaine') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><b>Niveau:</b></label>
                                <input type="text" name="niveau" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer votre adresse email..." value=" {{old('niveau')}}">
                                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email avec qui que ce soit.</small>
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('niveau'))
                                    @foreach ($errors->get('niveau') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><b>Année:</b></label>
                                <input type="date" name="annee" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{old('annee')}}">
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('annee'))
                                    @foreach ($errors->get('annee') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                    @endif
                                </small>
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1"><b>Choisir un role:</b></label>
                                <select name="choixrole" id="choixrole" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                    </select>
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('choixrole'))
                                    @foreach ($errors->get('choixrole') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                    @endif
                                </small>
                            </div> --}}
                           {{--  <div class="form-group">
                                <label for="exampleInputPassword1"><b>Mot de passe:</b></label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre mot de passe...">
                                @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $message)
                                <p class="text-danger">{{ $message }}</p>
                                @endforeach
                                @endif
                            </div> 
                            <div class="form-group">
                                <label for="exampleInputPassword1"><b>Mot de passe:</b>(confirmation)</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Répéter votre mot de passe...">
                                @if ($errors->has('password_confirmation'))
                                @foreach ($errors->get('password_confirmation') as $message)
                                <p class="text-danger">{{ $message }}</p>
                                @endforeach
                                @endif
                            </div>  --}}                          
                            <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                        </form>
                        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifier les donnés&eacute;saisies svp</h5>
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