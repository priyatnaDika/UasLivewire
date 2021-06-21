<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title ="dashboard2";
        return view('dashboard2',compact('title'));
    }
}