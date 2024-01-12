<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUnit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phoneNo' /* Other fillable attributes */];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function systems()
    {
        return $this->hasMany(System::class);
    }
}
