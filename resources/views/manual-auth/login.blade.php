<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Login</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white  shadow-md rounded px-6 py-6 w-full max-w-sm">
        <h1 class="font-bold text-center text-gray-900 mb-4">Form Login</h1>
        {{-- @if (session('error'))
        <div class="border rounded lg p-4 bg-red-300 text-center">{{ session('error') }}</div>
        @endif --}}
        <form action="{{ route('loginProses') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="" class="block text-gray-900 font-bold mb-2">Email</label>
                <input type="text" name="email"  value="{{ old('email') }}"placeholder="Masukkan email..."
                    class="w-full px-3 py-2 border border-gray-300 rounded ">
                    @error('email')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
            </div>
            <div class="mb-4">
                <label for="" class="block text-gray-900 font-bold mb-2">Password</label>
                <input type="password" name="password"  placeholder="Masukkan Password.."
                    class="w-full px-3 py-2 border border-gray-300 rounded ">
                    @error('password')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
            </div>

                <button type="submit" class="bg-blue-500 text-white py-2 rounded w-full
                hover:bg-blue-600">Login</button>
            </form>
    </div>
    @include('sweetalert::alert')

</body>
</html>
