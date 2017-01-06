<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Uc extends Model
{
    protected $table = 'uc';
    protected $primaryKey = 'api_id';
    public $timestamps = false;
    protected $guarded = [];
}
