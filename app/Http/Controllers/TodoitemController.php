<?php

namespace App\Http\Controllers;

use App\Models\Todoitem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TodoitemController extends Controller
{
    public function show(Todoitem $todoitem)
    {
        return view("item.view", [
            "item" => $todoitem,
            "user" => auth()->user()
        ]);
    }

    public function edit(Todoitem $todoitem)
    {
        return view("item.edit", [
            "item" => $todoitem
        ]);
    }

    public function update(Todoitem $todoitem)
    {
        $attributes = request()->validate([
            "name" => "required",
            "text" => "required",
        ]);

        $categories = request()->validate([
            "cat" => ["required", Rule::exists("categories", "id")]
        ]);

        $todoitem->update();

        $todoitem->categories()->sync(Arr::collapse($categories));

        return redirect("/home");
    }


    public function share(Todoitem $todoitem)
    {
        return view("item.share", [
            "item" => $todoitem
        ]);
    }

    public function shareItem(Todoitem $todoitem)
    {
        $users = request()->validate([
            "users" => ["required", Rule::exists("users", "id")]
        ]);

        $array = Arr::collapse($users);
        array_push($array, $todoitem->owner);
        $todoitem->users()->sync($array);

        return redirect("/home");
    }

    public function delete(Todoitem $todoitem)
    {
        return view("item.delete", [
            "item" => $todoitem
        ]);
    }

    public function destroy(Todoitem $todoitem)
    {
        $todoitem->categories()->detach();
        $todoitem->users()->detach();

        $todoitem->delete();

        return redirect("/home");
    }


    public function store()
    {
//        ddd(request()->all());

        $attributes = request()->validate([
            "name" => "required",
            "text" => "required"
        ]);

        $attributes["owner"] = auth()->id();

        $categories = request()->validate([
            "cat" => ["required", Rule::exists("categories", "id")]
        ]);

        $item = Todoitem::create($attributes);

        $item->users()->attach(auth()->user());

        foreach ($categories as $category) {
            $item->categories()->attach($category);
        }


        return redirect("/home");
    }
}
