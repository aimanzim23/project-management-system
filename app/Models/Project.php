<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'manager_id',
        'start_date',
        'end_date',
        'duration',
        'status',
        'developer_id',
        'description',
        'business_unit_id',
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class);
    }
}
