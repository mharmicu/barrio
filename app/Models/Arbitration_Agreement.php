<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arbitration_Agreement extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'arbitration_agreements';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'agreement_id';
}
