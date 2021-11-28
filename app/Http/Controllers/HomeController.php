<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        ddd(request("name"));
        // filtering

        $items = auth()->user()->todos();

        if (request("name")) {
            $items->where("name", "like", "%" . request("name") . "%")
            ->orWhere("text", "like", "%" . request("name") . "%");
        }

        if (request("cat")) {
            ddd(request("cat"));
            // todo
        }


        return view('home', [
            "user" => auth()->user(),
            "items" => $items->latest()->paginate(10)
        ]);
    }
}
