<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_master extends Model
{
    protected $table = 'user_master';

    protected $guarded = array('user_id');

    public $timestamps = true;

    public function getData($email_address = null)
    {
        $query = DB::table($this->table);

        if ($email_address != null) $query->where('email_address', $email_address);

        $data = $query->get();

        return $data;
    }
}
