<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Person extends Model
{
    use HasFactory;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        // Chain fluent methods for configuration options
        ->setDescriptionForEvent(fn(string $eventName) => "Person {$eventName}")
        ->useLogName('Account')
        ->logOnlyDirty();
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'person';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'person_id';

    public function blotter()
    {
        return $this->belongsTo(Blotter::class);
    }

    public function case_involved()
    {
        return $this->belongsTo(Case_Involved::class);
    }
}
