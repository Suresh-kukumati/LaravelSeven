<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request){
        if($request->has('image')){
            User::uploadAvtar($request->image);
            //$request->session()->flash('message','Uploaded successfully !');
            return redirect()->back()->with('message','Uploaded successfully !');
        }
        //$request->session()->flash('error','Failed to upload image');
        return redirect()->back()->with('error','Failed to upload image');
        //User::find(1)->update(['avtar' => $fileName]);
        //php artisan storage:link
        //$request->image->storage('image','public');
        //$request->image->storeAs('image',$fileName,'public');

    }
}
