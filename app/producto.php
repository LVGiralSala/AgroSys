<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = 'producto';
    public $timestamps=false;

    protected $fillable = [
    		'producto'    		
    ];

}
