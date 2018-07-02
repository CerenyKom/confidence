<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;


class PageController extends Controller
{
    public function index(){

        return view('pages.index');
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function updateimg(Request $request){

        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = $request->user()->id .'.'. time() . '.'. $request->file('avatar')->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 400)->save( public_path('uploads/avatar/'. $filename));
            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }

        $actifuser = $request->user();
        return view('pages.profil', compact('actifuser'));
    }

    public function profil(Request $request){
        $actifuser = $request->user();
        return view('pages.profil', compact('actifuser'));
    }

    public function account(){
        return view('pages.complet');
    }
}
