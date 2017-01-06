<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    protected $table = 'demo';
    protected $primaryKey = 'api_id';
    public $timestamps = false;
    protected $guarded = [];
}
