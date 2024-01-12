<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'system_id',
        'manager_id',
        'start_date',
        'end_date',
        'duration',
        'status',
        'description',
        'business_unit_id',
        'methodology',
        'platform',
        'deployment_type',
    ];
    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function developers()
    {
        return $this->belongsToMany(Developer::class);
    }


    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class);
    }

    public function progressReports()
    {
        return $this->hasMany(ProgressReport::class);
    }

    public function system()
    {
        return $this->belongsTo(System::class);
    }
}
