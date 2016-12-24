<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Ugc extends Model
{
    protected $table = 'ugc';
    protected $primaryKey = 'api_id';
    public $timestamps = false;
    protected $guarded = [];
}
