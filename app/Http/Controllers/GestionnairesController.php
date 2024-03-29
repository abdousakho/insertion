<?php

namespace App\Http\Controllers;

use App\Administrateur;
use App\Gestionnaire;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class GestionnairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gestionnaires.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('gestionnaires.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, [
              /*   'matricule'     => 'required|string|max:50', */
              
                'prenom'        => 'required|string|max:50',
                'nom'           => 'required|string|max:50',
                'telephone'     => 'required|string|max:50',
                'email'         => 'required|email|max:255|unique:users,email',
                'password'  => 'required|confirmed|string|min:8|max:50',
                'password_confirmation'=>'required',
            ],
            [
                'password.min'=>'Pour des raisons de sécurité, votre mot de passe doit faire au moins :min caractères.'
            ],
            [
                'password.max'=>'Pour des raisons de sécurité, votre mot de passe ne doit pas dépasser :max caractères.'
            ]
        );
        //return view('administrateurs.index');
       $roles_id = Role::where('name','Administrateur')->first()->id;
        $utilisateur = new User([            
            'name'           =>      $request->input('nom'),
            'firstname'      =>      $request->input('prenom'),
            'email'          =>      $request->input('email'),
            'telephone'      =>      $request->input('telephone'),
            'password'       =>      $request->input('mot_de_passe'),
            'roles_id'       =>      $roles_id

        ]);
        
        $utilisateur->save();
        
        $administrateur = new Administrateur([
            'matricule'     =>     $request->input('matricule'),
            'users_id'      =>     $utilisateur->id
        ]);

        $administrateur->save();
        return redirect()->route('gestionnaires.index')->with('success','utilisateur ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function show(Administrateur $administrateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //$utilisateur = User::find($id);
        $administrateur = Administrateur::find($id);
        $utilisateur=$administrateur->user;
        //return $utilisateur;
        return view('gestionnaires.update', compact('gestionnaires','utilisateur','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
               'matricule'     => 'required|string|max:50',
                'prenom'        => 'required|string|max:50',
                'nom'           => 'required|string|max:50',
                'telephone'     => 'required|string|max:50',
                'email'         => "required|email|max:255|unique:users,email,".$id,
            ]);

        $administrateur = Administrateur::find($id);
        $utilisateur=$administrateur->user;

        $roles_id = Role::where('name','gestionnaire')->first()->id;

        $utilisateur->name           =      $request->input('nom');
        $utilisateur->firstname      =      $request->input('prenom');
        $utilisateur->email          =      $request->input('email');
        $utilisateur->telephone      =      $request->input('telephone');
        $utilisateur->roles_id       =      $roles_id;

        $utilisateur->save();

        $gestionnaires->matricule   =     $request->input('matricule');
        $gestionnaires->users_id    =     $utilisateur->id;

        $administrateur->save();
        
        return redirect()->route('gestionnaires.index')->with('success','utilisateur modifier avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gestionnaire $gestionnaire)
    {
        $gestionnaire->delete();
        $message = $gestionnaire->user->firstname.' '.$gestionnaire->user->name.' a été supprimé(e)';
        return redirect()->route('gestionnaires.index')->with(compact('message'));
        //return $gestionnaires;
    }

    public function list(Request $request)
    {
        $gestionnaires=Gestionnaire::with('user')->get();
        return Datatables::of($gestionnaires)->make(true);
    }
 
}
