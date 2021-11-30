<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
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

    public function scopeFilter($query)
    {
        if (request("name")) {
            $query->where("name", "like", "%" . request("name") . "%")
                ->orWhere("text", "like", "%" . request("name") . "%");
        }

        if (request("cat")) {
            $categories = request()->validate([
                "cat" => [Rule::exists("categories", "id")]
            ]);

            $query->wherehas("categories", function ($q) use ($categories) {
                $q->whereIn("id", $categories["cat"]);
            });
        }

        if (request("shared")) {
            switch (request("shared")) {
                case 0:
                    // (empty)
                    break;
                case 1:
                    // By me
                    $query->where("owner_id", auth()->user()->id);
                    break;
                case 2:
                    // With me
                    $query->where("owner_id", "<>", auth()->user()->id)
                    ->where("user_id", auth()->user()->id);
                    break;
            }
        }

        if (request("status")) {
            switch (request("status")) {
                case 0:
                    // (empty)
                    break;
                case 1:
                    // Done
                    $query->where("is_done", 1);
                    break;
                case 2:
                    // Ongoing
                    $query->where("is_done", 0);
                    break;
            }
        }
    }
}
