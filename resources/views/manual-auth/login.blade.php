<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PERPUSKU - Login / Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script>
        function switchForm(form) {
            document.getElementById('form-login').classList.add('hidden');
            document.getElementById('form-register').classList.add('hidden');
            if (form === 'login') {
                document.getElementById('form-login').classList.remove('hidden');
            } else {
                document.getElementById('form-register').classList.remove('hidden');
            }
        }
    </script>
</head>
<body class="bg-gradient-to-r from-blue-200 to-purple-200 min-h-screen flex items-center justify-center px-4">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-md overflow-hidden">
        {{-- Flash Message --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-700 text-sm px-4 py-2">{{ session('error') }}</div>
        @endif

        {{-- Login Form --}}
        <div id="form-login" class="p-6">
            <h2 class="text-xl font-bold text-center text-blue-600 mb-4">Login ke PERPUSKU</h2>
          
            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Masuk</button>
            </form>
            <p class="text-center text-sm text-gray-600 mt-4">
                Belum punya akun?
                <button onclick="switchForm('register')" class="text-blue-600 hover:underline">Daftar di sini</button>
            </p>
        </div>

        {{-- Register Form --}}
        <div id="form-register" class="p-6 hidden">
            <h2 class="text-xl font-bold text-center text-green-600 mb-4">Daftar Anggota Baru</h2>
            <form action="{{ route('register.proses') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Daftar</button>
            </form>
            <p class="text-center text-sm text-gray-600 mt-4">
                Sudah punya akun?
                <button onclick="switchForm('login')" class="text-green-600 hover:underline">Login di sini</button>
            </p>
        </div>
    </div>

    <script>switchForm('login');</script>
</body>
</html>
