<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Diy extends Model
{
    protected $table = 'diy';
    protected $primaryKey = 'api_id';
    public $timestamps = false;
    protected $guarded = [];
}
