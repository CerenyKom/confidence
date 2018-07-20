<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Com;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;


class CommentController extends Controller
{
    public function index(){
        $comment = Com::allFor( Input::get('id'), Input::get('type'));
        return Response::json($comment, 200, [], JSON_NUMERIC_CHECK);
    }

    public function store(StoreCommentRequest $request){
        $comment = Com::create([
            'post_id' => Input::get('post_id'),
            'post_type' => Input::get('post_type'),
            'comment' => $request->comment,
            'reponse' => Input::get('reponse', 0),
            'user_id' => 34,
        ]);
        return Response::json($comment, 200, [], JSON_NUMERIC_CHECK);
    }

    public function destroy($id){
        $com = Com::find($id);
        if ($com->user_id == Auth::id()){
            $com->delete();
            return Response::json($com, 200, [], JSON_NUMERIC_CHECK);
       }else{
            return Response::json('ce commentaire ne vous appartient pas', 403);
        }
    }

}