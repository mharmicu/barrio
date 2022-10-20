<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Blotter extends Model
{
    use HasFactory;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        // Chain fluent methods for configuration options
        ->setDescriptionForEvent(fn(string $eventName) => "Blotter case {$eventName}")
        ->useLogName('Blotter Case')
        ->logOnlyDirty();
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blotter_report';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'case_no';

    public function incident_case()
    {
        return $this->hasOne(Incident_Case::class);
    }

    public function person()
    {
        return $this->hasOne(Person::class);
    }

    public function case_involved()
    {
        return $this->hasOne(Case_Involved::class);
    }
}
