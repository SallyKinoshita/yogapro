<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asana extends Model
{
    protected $table = 'asanas';

    use SoftDeletes;

    protected $fillable = [
        'user_id','name','six_category','posture','intensity','description','image','url','private_flg',
    ];
//
//    public function user()
//    {
//        return $this->belongsTo('App\Models\User');
//    }
}
