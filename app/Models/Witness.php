<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Witness extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'witnesses';

    public function blotter()
    {
        return $this->belongsTo(Blotter::class);
    }

    public function witness()
    {
        return $this->belongsTo(Witness::class);
    }
}
