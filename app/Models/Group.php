<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_group',
        'number_of_people',
        'place',
        'author_id',
        'dressing_room_id',
        'performances_id',
        'props_id',
        'type_of_costumes_id',
    ];


    public function dressing_rooms(): BelongsTo
    {
        return $this->belongsTo(Dressing_room::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function type_of_costumes(): BelongsTo
    {
        return $this->belongsTo(Type_of_costume::class);
    }

    public function performances(): BelongsTo
    {
        return $this->belongsTo(Performan::class);
    }

    public function props(): BelongsTo
    {
        return $this->belongsTo(Prop::class);
    }
}


// <?php
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\HasMany;

// class Group extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'name',
//         'type_group',
//         'number_of_people',
//         'place',
//         'author_id', // Asegúrate de que esté incluido para la asignación masiva
//     ];


//     public function dressing_rooms(): HasMany
//     {
//         return $this->hasMany(Dressing_room::class);
//     }

//     public function author(): BelongsTo
//     {
//         return $this->belongsTo(Author::class);
//     }

//     public function type_of_costumes(): HasMany
//     {
//         return $this->hasMany(Type_of_costume::class);
//     }

//     public function performances(): HasMany
//     {
//         return $this->hasMany(Performan::class);
//     }

//     public function props(): HasMany
//     {
//         return $this->hasMany(Prop::class);
//     }
// }
