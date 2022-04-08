<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']); // რატომ ვწერთ ასეთი ფორმით ამ კონტროლერში?
    }

    public function index()
    {
       // dd(auth()->user()->posts);//ვამოწმებთ მართლა დარეგისტრირდა თუ არა

        return view('dashboard');
    }
}
