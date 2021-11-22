<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todoitem extends Model
{
    use HasFactory;

    protected $guarded = [];

//    protected $fillable = [
//        "name",
//        "text"
//    ];

    private $owner;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }
}
