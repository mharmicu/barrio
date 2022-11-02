<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use GregoryDuckworth\Encryptable\EncryptableTrait;
use Maize\Encryptable\Encryptable;

class Blotter extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'case_title',
        'complaint_desc',
        'relief_desc',
    ];

    protected $casts = [
        'case_title' => Encryptable::class,
        'complaint_desc' => Encryptable::class,
        'relief_desc' => Encryptable::class,
    ];

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
