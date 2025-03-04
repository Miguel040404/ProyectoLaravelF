<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dressing_room extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_of_dressing_rooms',
        'capacity_of_dressing_rooms',
    ];

    //belongto
    public function group(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}
