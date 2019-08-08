<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = [
        'userid',
        'uuid',
        'path',
        'mime'
    ];
    
}
