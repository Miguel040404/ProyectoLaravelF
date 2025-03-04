<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prop extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_of_extra',
        'lights',
        'background',
        'confetti',
        // 'group_id'
    ];

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}
