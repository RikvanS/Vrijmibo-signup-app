<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vrijmibo;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        $users = User::all();
        $deelnemers = Vrijmibo::all();
        return view('admin', compact('deelnemers', 'users'));
        
    }

    public function admindelete($id)
    {
        
        $deelnemer = Vrijmibo::findOrFail($id)->delete();
        return redirect('admin');
    }
}