<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }


    /*პასუხისმგებელია ჩვენებაზე გვერდისა */
     public function index(){
        return view('auth.login'); 
    }

  /*პასუხისმგებელია მონაცემთა შენახვაზე, log in */
    public function store(Request $request)
    {

        
        $this->validate($request,
        [
            'email'=>'required|email',
            'password'=>'required',
        ]);

        //თუ მომხმარებელი არ არის დარეგისტრირებული
        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            return back()->with('status', 'არასწორი მონაცემები');
        }

        //$request->remember უნდა ჩავწეროთ აუცილებლად attempt მეთოდში, რათა დავიმახსოვროთ მომხმარებელი
        //ვამოწმებთ ვართ თუ არა დამახსოვრებულები: შევდივართ inspect->application->cookies და თუ არის remember_token გააქტიურებული ე.ი. მუშაობს
        
        return redirect()->route('dashboard');
       
    }
}
