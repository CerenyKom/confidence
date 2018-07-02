<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\coms_user;

class Com extends Model
{
    public $guarded = [];

    protected $hidden = ['email'];

    protected $appends = ['email_md5'];

    public function getEmailMd5Attribute(){
        return md5($this->attribute['email']);
    }

    public static  function allFor($id, $type){
        $comment = [];
        $by_id = [];
        $reponse = coms_user::where(['post_id' => $id, 'post_type' => $type])->orderBy('created_at', 'ASC')->get();
        foreach ($reponse as $records){
            if ($records->reponse){
                $by_id[$records->reponse]->attributes['replies'][] = $records;

            }else{
                $records->attributes['replies'] = [];
                $by_id[$records->id] = $records;
                $comment[] = $records;
            }
        }
        return array_reverse($comment);
    }
}
