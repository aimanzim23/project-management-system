<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', /* Other fillable attributes */];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function progressReports()
    {
        return $this->hasMany(ProgressReport::class);
    }
}
