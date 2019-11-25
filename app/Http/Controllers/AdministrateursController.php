<?php

namespace App\Http\Controllers;

use App\Administrateur;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use Yajra\Datatables\Datatables;

class AdministrateursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrateurs.index');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    /* public function create(array $data)
    {
        $user = User::create([
            'matricule' => $data['matricule'],
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'telephone' => $data['telephone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return view('administrateurs.create',compact('user'));
    } */

    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
           User::create([
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'telephone' => $data['telephone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
         return view('administrateurs.create',compact('user'));
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
                'matricule'     => 'required|string|max:50',
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
        return redirect()->route('administrateurs.index')->with('success','utilisateur ajoutée avec succès !');
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
      return view('administrateurs.update', compact('administrateur','utilisateur','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrateur $administrateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrateur $administrateur)
     {
            $administrateur->delete();
            $message = $administrateur->user->firstname.' '.$administrateur->user->name.' a été supprimé(e)';
            return redirect()->route('administrateurs.index')->with(compact('message'));
            //return $administrateur;
        }
    
    

    public function list(Request $request)
    {
        $administrateurs=Administrateur::with('user')->get();
        return Datatables::of($administrateurs)->make(true);
    }
}