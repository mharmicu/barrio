<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Person_Signature extends Model
{
    use HasFactory;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        // Chain fluent methods for configuration options
        ->setDescriptionForEvent(fn(string $eventName) => "Person signature {$eventName}")
        ->useLogName('Account')
        ->logOnlyDirty();
    }
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'person_signature';
    
    public function blotter()
    {
        return $this->belongsTo(Blotter::class);
    }
}
