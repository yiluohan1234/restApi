<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Zan extends Model
{
    protected $table = 'zan';
    protected $primaryKey = 'api_id';
    public $timestamps = false;
    protected $guarded = [];
}
