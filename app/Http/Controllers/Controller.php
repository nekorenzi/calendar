<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function calendar () 
    {
        return view('calendar');
    }
}
