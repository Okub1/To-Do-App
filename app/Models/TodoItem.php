<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class TodoItem extends Model
{
    use HasFactory;

    protected $guarded = [];

//    protected $fillable = [
//        "name",
//        "text"
//    ];

    private $owner_id;
    private $is_done;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query) {
        if (request("name")) {
            $query->where("name", "like", "%" . request("name") . "%")
                ->orWhere("text", "like", "%" . request("name") . "%");
        }

        if (request("cat")) {
//            ddd(request("cat"));
            $categories = request()->validate([
                "cat" => [Rule::exists("categories", "id")]
            ]);

//            ddd(Arr::collapse($categories));
        }
    }
}
