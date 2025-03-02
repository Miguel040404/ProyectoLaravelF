<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_group',
        'number_of_people',
        'place',
        'author_id'
    ];

    public function dressing_rooms()
    {
        return $this->hasMany(Dressing_room::class);
    }

    // public function authors()
    // {
    //     return $this->hasMany(Author::class);
    // }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function type_of_costumes()
    {
        return $this->hasMany(Type_of_costume::class);
    }

    public function performen ()
    {
        return $this->hasMany(Performan::class);
    }

    public function props ()
    {
        return $this->hasMany(Prop::class);
    }

}
