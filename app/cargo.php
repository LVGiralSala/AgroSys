<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    protected $table = 'cargo';

    protected $fillable = [
    		'cargo'    		
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
