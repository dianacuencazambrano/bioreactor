<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BioreactorController extends Controller
{
    public function onEngine(){
        return 1;
    }

    public function offEngine(){
        return 0;
    }
    
}
