<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Zt extends Model
{
    protected $table = 'zt';
    protected $primaryKey = 'api_id';
    public $timestamps = false;
    protected $guarded = [];
}
