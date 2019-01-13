<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    protected $table = 'programs';

    use SoftDeletes;

    protected $fillable = [
        'user_id','name','tag','description','time','private_flg',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function asanas()
    {
        return $this->belongsToMany('App\Models\Asana','program_asana','program_id','asana_id');
    }
}
