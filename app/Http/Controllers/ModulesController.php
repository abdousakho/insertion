<?php

namespace App\Http\Controllers;
use App\Administrateur;

use App\Module;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //$utilisateur = User::find($id);
        $administrateur = Administrateur::find($id);
        $utilisateur=$administrateur->user;
        //return $utilisateur;
        return view('formations.update',  compact('formations','utilisateur','id'));
      }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $this->validate(
            $request, 
            [
                'matricule'     => 'required|string|max:50',
                'prenom'        => 'required|string|max:50',
                'nom'           => 'required|string|max:50',
                'telephone'     => 'required|string|max:50',
                'email'         => "required|email|max:255|unique:users,email"
            ]);

        $gestionnaires = Administrateur::find($id);
        $utilisateur=$gestionnaires->user;

        $roles_id = Role::where('name','Administrateur')->first()->id;

        $utilisateur->name           =      $request->input('nom');
        $utilisateur->firstname      =      $request->input('prenom');
        $utilisateur->email          =      $request->input('email');
        $utilisateur->telephone      =      $request->input('telephone');
        $utilisateur->roles_id       =      $roles_id;

        $utilisateur->save();

        $gestionnaires->matricule   =     $request->input('matricule');
        $gestionnaires->users_id    =     $utilisateur->id;

        $gestionnaires->save();
        
        return redirect()->route('formations.index',compact('id'))->with('success','utilisateur modifier avec succès !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $gestionnairess->delete();
        $message = $gestionnairess->user->firstname.' '.$gestionnairess->user->name.' a été supprimé(e)';
        return redirect()->route('formations.index')->with(compact('message'));
        //return $administrateur;
    }

        

    public function list(Request $request)
    {
        $administrateurs=Administrateur::with('user')->get();
        return Datatables::of($administrateurs)->make(true);
    }
}
