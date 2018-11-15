<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vrijmibo;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {

        $deelnemers = Vrijmibo::all();
        return view('admin', compact('deelnemers'));
        
    }

    public function admindelete($id)
    {
        
        $deelnemer = Vrijmibo::findOrFail($id)->delete();
        return redirect('admin');
    }
}