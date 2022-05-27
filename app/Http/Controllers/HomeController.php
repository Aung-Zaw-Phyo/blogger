<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use App\Models\User;
use Illuminate\Http\Request;

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
        $articals = User::find(auth()->id())->articals()->latest()->paginate(5);
        return view('home', [
            'articals'=>$articals,
        ]);
    }
}
