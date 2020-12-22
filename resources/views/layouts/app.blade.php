<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Posty</title>
</head>

<body class="bg-gray-200">
    <nav class="p-5 bg-indigo-600 flex justify-between mb-6">

        <ul class="flex items-center">
            <li class="p-3">
                <img src="{{ asset('img/logotype.min.svg') }}" alt="">
            </li>
            <li class="p-3">
                <a href="" class="text-white">Home</a>
            </li>
            <li class="p-3">
                <a href="{{ route('dashboard') }}" class="text-white">DashBoard</a>
            </li>
            <li class="p-3">
                <a href="" class="text-white">Posts</a>
            </li>
        </ul>
        <ul class="flex items-center">
            @auth
                <li class="p-3">
                    <a href="" class="text-white">Nishanthan</a>
                </li>
                <li class="p-3">
                    <a href="" class="text-white">Logout</a>
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
