<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vrijmibo;

class VMBController extends Controller
{
    public function home() {

        $deelnemers = Vrijmibo::all();


        return view('welcome', compact('deelnemers'));
    }

    public function create() {
        return view('create');
    }

    public function store() {

        $vrijmibo = vrijmibo::firstOrCreate(['naam' => auth()->user()->name]);


        $vrijmibo->save();

        return redirect('/');
    }
}
