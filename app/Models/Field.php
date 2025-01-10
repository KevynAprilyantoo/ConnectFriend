<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $guarded = [
        'id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'field_user');
    }
}
