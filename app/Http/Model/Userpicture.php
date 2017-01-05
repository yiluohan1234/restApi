<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Userpicture extends Model
{
    protected $table = 'userpicture';
    protected $primaryKey = 'api_id';
    public $timestamps = false;
    protected $guarded = [];
}
