<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <title>Posty</title>
</head>

<body class="bg-gray-200">
    <nav class="p-5 bg-indigo-600 flex justify-between mb-6">

        <ul class="flex items-center">
            <li class="p-3">
                <img src="{{ asset('img/logotype.min.svg') }}" alt="">
            </li>
            <li class="p-3">
                <a href="{{ route('home') }}" class="text-white">Home</a>
            </li>
            <li class="p-3">
                <a href="{{ route('dashboard') }}" class="text-white">DashBoard</a>
            </li>
            <li class="p-3">
                <a href="{{ route('posts') }}" class="text-white">Posts</a>
            </li>
        </ul>
        <ul class="flex items-center">
            @auth
                <li class="p-3">
                    <a href="{{ route("user.posts",auth()->user())}}" class="text-white">{{ auth()->user()->name}}</a>
                </li>
                <li class="p-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="p-3 text-white" type="submit" >Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li class="p-3">
                    <a href="{{ route('login') }}" class="text-white">Login</a>
                </li>
                <li class="p-3">
                    <a href="{{ route('register') }}" class="text-white">Register</a>
                </li>
            @endguest
        </ul>
    </nav>

    @yield('content')
</body>

</html>
