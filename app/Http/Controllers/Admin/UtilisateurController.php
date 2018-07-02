<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Contracts\Encryption\DecryptException;

class UtilisateurController extends Controller
{

    /**
     * authentification aubligatoire pour la gestion des articles
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.utilisateur.index');
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
        User::create([
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'admn' => $request->type,
            'password' => bcrypt($request->password),
        ]);
        return redirect(route('Utilisateur.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $UserAEditer = User::find($id);
        return $UserAEditer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->pseudo = $request->pseudo;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->admn = $request->type;
        $user->update();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    private function actif($id){
        if($id == 1){
            return "<i class='fa fa-close'></i> Desactiver ";
        }{
            return "<i class='fa fa-check'></i> Activer";
        }
    }

    public function apiUser(){
        $users = User::all ();
        return DataTables::of($users)
            ->addColumn('action', function ($users){
                return
                    '<a onclick="editUser('.$users->id .')" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i> Modifier</a>'
                    .'<a onclick="destroyUser('.$users->id .')" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Supprimer</a>'
                    .'<a onclick="editUser('.$users->id .')" class="btn btn-primary btn-xs"> '.$this->actif($users->actif).' </a>';
            })->make(true);
    }

}
