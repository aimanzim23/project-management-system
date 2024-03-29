<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', /* Other fillable attributes */];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

