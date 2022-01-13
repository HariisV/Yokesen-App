<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $user = User::paginate(20);
        $search = "";
        $orderKey = "";

        return view('home', compact('user','search','orderKey'));
    }
    public function search(Request $request){
        $search = $request->search;
        $orderKey = $request->order;

        $order = explode("-", $orderKey);
        $user = User::where('name', 'like', "%". $search . "%")
                      ->orWhere('email', 'like', "%". $search . "%")
                      ->orderBy($order[0],$order[1])
                      ->paginate(20);
        return view('home', compact('user','search','orderKey'));
    }

    public function profile(){
        return view('profile');
    }
}
