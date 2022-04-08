<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;//უკვე იმპორტირებულია მოთხოვნა
use App\Models\User;//მოდელი უნდა დავაიმპორტოთ, შემოვიტანოთ
use Illuminate\Support\Facades\Hash;//გაარკვიე ზუსტი ფუნქცია

class RegisterController extends Controller
{
    public function __construct()//რატომ კონსტრუქტორი?
    {
        $this->middleware(['guest']);/*ვიძახებ შუამავალს, რათა როცა მე უკვე დარეგისტრირებული ვიქნები
         აღარ შემეძლოს კიდევ რეგისტრაციის გვერდზე გადასვლა
         თუმცა ეს გვაბრუნებს მთავარ-home გვერდზე და ამიტომ RouteServiceProvider-ში უნდა 
         გადავიდეთ და შევცვალოთ მთავარ გვერდზე დაბრუნების კონსტანტი */
    }


    public function index()
        {
            return view('auth.register');
        }

    public function store(Request $request)//აუცილებლად გვჭირდება მოთხოვნა ვალიდაციისას
    {
        //1.მოთხოვნის ვალიდაცია.validate request. Validation
        //2.შევინახოთ მომხმარებლის მონაცემები.Store the user,register
        //3.შევიყვანოთ მომხმარებელი.sign the user in 
        //4.მომხმარებლის გადამისამართება ზევით.  Redirect
        //1)
        $this->validate($request,
        [
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
        ]);//პასუხისმგებელია, რომ არ დარჩეს შეუვსებელი ველი
        //2)
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);// პასუხისმგებელია მომხმარებლის მონაცემებზე

        //4)
        auth()->attempt($request->only('email','password'));//attempt შესვლის ფუნქცია

        //3)როცა დარეგისტრირდება user სად გადავამისამართოთ
        return redirect()->route('dashboard');/* ჩვენ ასეც შეგვეძლო დაგვეწერა
        return redirect(/dashboard); მაგრამ როუტით ჯობია ასე დავწეროთ რომ თუ ვინიცობაა და 
        შეიცვალა ადგილი დაშბორდმა, ის მაინც იმუშავებს ასეთი ფორმით დაწერილი პლიუს
        როუტებშიც დავარქმევთ დაშბორდს */
        // ^
        // |ეს არის რეგისტრაცია, მაგრამ არა შესვლა(Sign in)



        //ახლა ვნახოთ Sign in როგორ ხდება

        //auth()->user();//აბრუნებს user-ის მოდელს,მომხმარებელი შევიდა და მიიღო user მოდელი
    
    }
}
