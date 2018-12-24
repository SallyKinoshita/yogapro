<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    protected $table = 'programs';

    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
