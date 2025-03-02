<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_of_author',
        'number_of_authors',
    ];

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}



// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Author extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'name_of_author',
//         'number_of_authors',
//         'group_id',
//     ];

//     public function groups()
//     {
//         return $this->belongsTo(Group::class);
//     }
// }
