@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" id="name" name="name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                        placeholder="Name" value="{{ old("name")}}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" id="username" name="username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
                        placeholder="Username" value="{{ old("username")}}">
                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" id="email" name="email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                        placeholder="email" value="{{ old("email")}}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                        placeholder="password" value="">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password Afain</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Password confirmation" value="">
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
