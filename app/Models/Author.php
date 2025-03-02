<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_of_author',
        'number_of_authors',
        'group_id',
    ];

    public function groups()
    {
        return $this->belongsTo(Group::class);
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
//         // 'group_id',
//     ];
    
//     public function groups()
//     {
//         return $this->hasMany(Group::class, 'author_id');
//     }
    
// }