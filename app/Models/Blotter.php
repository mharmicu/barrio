<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blotter extends Model
{
    use HasFactory;

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
