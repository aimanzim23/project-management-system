<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'developer_id',
        'date',
        'status',
        'description',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
