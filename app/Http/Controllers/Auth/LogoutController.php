<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        //მომხმარებელი რომ გამოვა, დაბრუნდეს მთავარ-ჰოუმ გვეrdze
        auth()->logout();

        return redirect()->route('home');
    }
}
