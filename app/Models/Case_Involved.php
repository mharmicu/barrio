<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Case_Involved extends Model
{
    use HasFactory;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        // Chain fluent methods for configuration options
        ->setDescriptionForEvent(fn(string $eventName) => "Case involved {$eventName}")
        ->useLogName('Blotter Case')
        ->logOnlyDirty();
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'case_involved';
    
    public function blotter()
    {
        return $this->belongsTo(Blotter::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
