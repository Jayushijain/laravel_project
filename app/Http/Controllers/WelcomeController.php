<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Listing;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $listings=Listing::all();
        return view('welcome',compact('categories','listings','settings'));
    }
}
