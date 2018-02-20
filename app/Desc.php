<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desc extends Model
{
    protected $table = 'descs';
    protected $primaryKey = 'id';
    public $incrementing = FALSE;
    public $timestamps = TRUE;
}
