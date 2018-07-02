<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPageController extends Controller
{

    public function acceuil()
    {
        return view('pages.admin.acceuil');
    }


    public function chaussures(){
        return view('pages.admin.categorie.chaussures');
    }

    public function chemise(){
        return view('pages.admin.categorie.chemise');
    }
}
