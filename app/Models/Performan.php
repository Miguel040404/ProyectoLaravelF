<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Performan extends Model
{
    use HasFactory;

    protected $table = 'performen';

    protected $fillable = [
        'date_performan',
        'day_performan',
        'stage_performan',
        // 'group_id',
    ];

    // public function groups(): HasMany
    // {
    //     return $this->hasMany(Group::class);
    // }
}
