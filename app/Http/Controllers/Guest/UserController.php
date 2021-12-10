<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){
        return view('guests.show', compact('user'));
    }
}
