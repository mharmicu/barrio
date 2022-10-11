<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amicable_Settlement extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'amicable_settlements';

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'settlement_id';
}
