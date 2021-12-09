<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DischController extends Controller
{
    public function show(Dish $dish){
        return view('guests.show', compact('dish'));
    }
}
