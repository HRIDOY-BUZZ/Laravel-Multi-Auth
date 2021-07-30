<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        $list =  User::all();
        return view('adminHome',['list'=>$list]);
    }

    public function unapproved()
    {
        return view('unapproved');
    }

    public function accept($id)
    {
        DB::table('users')->where('id',$id)->update([
            'is_approved'=> true
        ]);
        // $list =  User::all();
        // return view('adminHome',['list'=>$list]);
        return redirect()->route('admin.home');
    }
    public function decline($id)
    {
        DB::table('users')->where('id',$id)->delete();
        $list =  User::all();
        return view('adminHome',['list'=>$list]);
    }
}
