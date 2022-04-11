<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Posty</title>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            @auth
                <li>
                    <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a><!---
                dashboard აჩვენებს დარეგისტრირებული მომხმარებლის მონაცემებს, ამიტომ გვჭირდება ამ
                როუტს გავუწეროთ შუამავალი, იგივე middleware
                -->
                </li>
                <li>
                    <a href="{{ route('posts') }}" class="p-3">Post</a>
                </li>
            @endauth
        </ul>

        <ul class="flex items-center">
            @auth <!---  თუ მომხმარებელი დარეგისტრირებულია(if user is signed in show me this)--->
            <li>
                <a href="" class="p-3">{{  auth()->user()->name }}</a><!--- ამ სახით უკავშირდება user ობიექტს, რომელიც უკავშირდება მონაცემთა ბაზას და ბეჭდავს მხოლოდ სახელს---->
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="p-3 inline">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
            </li>
            @endauth

            @guest <!--- if he is not signed in show me this, @ ეს უბრალოდ blade-ის სინტაქსია ----->
                <li>
                    <a href="{{ route('login') }}" class="p-3">Log in</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endguest
        </ul>

<!-- ასევე გვაქვს მეორე და უკეთესი(ალბათ) ვარიანტი, if else-ის ნაცვლად იქნება auth და guest

            @auth
                 <li>
                <a href="" class="p-3">Nikoloz Jibladze</a>
            </li>
            <li>
                <a href="" class="p-3">Log out</a>
            </li>
            @endauth

            @guest
              <li>
                <a href="" class="p-3">Log in</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="p-3">Register</a>
            </li>
            @endguest
--->
    </nav>
    @yield('content')

</body>
</html>