<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Regression extends Model
{
    protected $table = 'regression';
    protected $primaryKey = 'api_id';
    public $timestamps = false;
    protected $guarded = [];
}
