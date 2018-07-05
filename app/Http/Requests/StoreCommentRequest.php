<?php

namespace App\Http\Requests;

use App\Models\Com;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class StoreCommentRequest extends FormRequest
{

    public function wantsJson()
    {
        return true;
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        Validator::extend('canReply', function ($attribut, $value, $param){
            if (!$value){
              return true;
            }
            $comment = Com::find($value);
            if ($$comment){
                return $comment->reponse == 0;
            }
             return false;
        });

        return [
            'comment' => 'required',
            'reply' => 'canReply'
        ];
    }
}
