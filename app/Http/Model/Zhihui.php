<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Zhihui extends Model
{
    protected $table = 'zhihui';
    protected $primaryKey = 'api_id';
    public $timestamps = false;
    protected $guarded = [];
}
