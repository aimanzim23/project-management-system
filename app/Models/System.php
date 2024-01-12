<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;
    protected $fillable = ['business_unit_id','name', 'description',  /* Other fillable attributes */];

    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
