<?php

namespace App\Http\Controllers\Admin;


use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;


class PostsController extends Controller{


    /**
     * authentification aubligatoire pour la gestion des articles
     * PostController constructor.
     */
    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $p = Post::all();
        return view('pages.admin.post.index', compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        Post::create([
            'titre_post' => $request->titre,
            'contenue_post' => $request->post,
        ]);
        return redirect(route('Posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $PostAEditer = Post::find($id);
        return $PostAEditer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $art = Post::find($id);
        $art->titre_post = $request->titre;
        $art->contenue_post = $request->contenue;
        $art->update();
        return $art;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $art = Post::find($id);
        $art->delete();
    }

    public function apiPost()
    {
        $article = Post::all();
        return DataTables::of($article)
            ->addColumn('action', function ($article) {
                return
                    '<a href="#" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i> Visualiser</a>'
                    . '<a onclick="edit(' . $article->id . ')" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i> Modifier</a>'
                    . '<a onclick="destroy(' . $article->id . ')" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Supprimer</a>';
            })->make(true);
    }


}
