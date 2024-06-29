<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class HomeController extends Controller
{
    public function index()
    {
        $animales = Animal::all();
        return view('home', compact('animales'));
    }
}
