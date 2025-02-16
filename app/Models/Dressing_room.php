<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dressing_room extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_of_dressing_rooms',
        'capacity_of_dressing_rooms',
        'group_id'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
