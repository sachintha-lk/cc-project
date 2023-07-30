<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function modules()
    {
        return $this->hasMany(\App\Models\Module::class);
    }
}
