<?php

namespace App\Http\Controllers;

use App\Models\Post;
//use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
         $posts = Post::paginate(2);

         return view('posts.index', [
             'posts' => $posts
         ]);
    
    }

    public function store(Request $request)
    {
        /* 1) იმისათვის რომ დავაყენოთ პოსტები, ჯერ ვქმნით მოდელს Post თავისი მიგრაციითა და ფაქტორით
        2) migration ფაილში შევქმენით ორი ცხრილი, რომელიც პასუხისმგებელია  $table->foreignId('user_id')->constrained()->onDelete('cascade');// თუ წავშლით მომხმარებელს,მაშინ ავტომატურად წაიშლება მისი ყველა პოსტი onDelete
            $table->text('body'); - პოსტების მოცულობა
        3) ვარკვევთ მოდელებს Post.php და User.php შორის ურთიერკავშირს, ამიტომ გვინდა ამ ფუნქციაში და ან კონტროლერში ვალიდაცია
        */
       //გაიყვანეთ მოთხოვნები($request-ს რატომაც ვწერთ ვალიდაციაშო), რომლითაც შეგიძლიათ ამოიღოთ ყველა ინფორმაცია
        $this->validate($request,[
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));
        
         return back();  
         
     
    }
}
