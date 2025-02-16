<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_of_costume extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_of_company',
        'make-up',
        'number_of_costumes',
        'group_id'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
