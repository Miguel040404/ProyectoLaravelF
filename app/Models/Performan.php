<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performan extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_performan',
        'day_performan',
        'stage_performan',
        'group_id',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
