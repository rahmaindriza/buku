<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>PERPUSKU - Login / Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite('resources/css/app.css')

  <script>
    function switchForm(form) {
      document.getElementById('form-login').classList.add('hidden');
      document.getElementById('form-register').classList.add('hidden');
      document.getElementById(`form-${form}`).classList.remove('hidden');
    }

    function togglePassword(id, btn) {
      const input = document.getElementById(id);
      input.type = input.type === "password" ? "text" : "password";
      btn.classList.toggle("text-blue-600");
    }
  </script>
</head>

<body class="bg-[#e4f5fd] min-h-screen flex items-center justify-center px-4 py-10">
  <div class="bg-white rounded-2xl shadow-xl overflow-hidden w-full max-w-5xl flex flex-col md:flex-row">

    <!-- Left: Illustration -->
    <div class="md:w-1/2 hidden md:block bg-white p-6">
      <img src="{{ asset('img/gambar_login.jpeg') }}" alt="Ilustrasi Perpustakaan" class="w-full h-auto object-cover" />
    </div>

    <!-- Right: Form -->
    <div class="w-full md:w-1/2 p-8">

      <!-- Flash -->
      @if(session('error'))
        <div class="bg-red-100 text-red-700 text-sm px-4 py-2 rounded mb-4">{{ session('error') }}</div>
      @endif

      <!-- Login Form -->
      <div id="form-login">
        <h2 class="text-2xl font-bold text-[#0b445e] text-center mb-6">Masuk ke <span class="text-[#248ab9]">PERPUSKU</span></h2>
        <form action="{{ route('login.proses') }}" method="POST">
          @csrf

          <div class="mb-4 relative">
            <label class="block text-sm text-[#0b445e] mb-1">Email</label>
            <div class="relative">
              <span class="absolute left-3 top-2.5 text-gray-400">
                <!-- Icon email -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
              </span>
              <input type="email" name="email" required
                     class="w-full pl-10 pr-4 py-2 border border-[#d7ccc8] rounded-lg focus:ring focus:ring-[#a1887f] focus:outline-none"
                     placeholder="you@example.com" />
            </div>
          </div>

          <div class="mb-6 relative">
            <label class="block text-sm text-[#0b445e] mb-1">Password</label>
            <div class="relative">
              <span class="absolute left-3 top-2.5 text-gray-400">
                <!-- Icon mata -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </span>
              <input type="password" name="password" id="login_password"
                     class="w-full pl-10 pr-10 py-2 border border-[#d7ccc8] rounded-lg focus:ring focus:ring-[#a1887f] focus:outline-none"
                     placeholder="********" required />
              <button type="button" onclick="togglePassword('login_password', this)"
                      class="absolute right-3 top-2.5 text-gray-500">
                <!-- Mata toggle -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 12a3 3 0 01-3 3m0 0a3 3 0 01-3-3m3 3a3 3 0 003-3m0 0a3 3 0 00-3-3m0 0a3 3 0 00-3 3"/>
                </svg>
              </button>
            </div>
          </div>

          <button type="submit"
                  class="w-full bg-[#0b445e] hover:bg-[#0b445e] text-white py-2 rounded-lg transition">Masuk</button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
          Belum punya akun?
          <button onclick="switchForm('register')" class="text-[#0b445e] hover:underline">Daftar di sini</button>
        </p>
      </div>

      <!-- Register Form -->
      <div id="form-register" class="hidden">
        <h2 class="text-2xl font-bold text-[#0b445e] text-center mb-6">Daftar <span class="text-[#247ea8]">PERPUSKU</span></h2>
        <form action="{{ route('register.proses') }}" method="POST">
          @csrf
          <input type="hidden" name="register" value="1"> <!-- penting -->

          <div class="mb-4 relative">
            <label class="block text-sm text-[#0b445e] mb-1">Nama Lengkap</label>
            <div class="relative">
              <span class="absolute left-3 top-2.5 text-gray-400">
                <!-- Icon user -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 018 17h8a4 4 0 012.879 1.196M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
              </span>
              <input type="text" name="name" value="{{ old('name') }}" required
                     class="w-full pl-10 pr-4 py-2 border border-[#d7ccc8] rounded-lg focus:ring focus:ring-[#0b445e] focus:outline-none"
                     placeholder="Nama lengkap" />
            </div>
          </div>

          <div class="mb-4 relative">
            <label class="block text-sm text-[#0b445e] mb-1">Email</label>
            <div class="relative">
              <span class="absolute left-3 top-2.5 text-gray-400">
                <!-- Icon email -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
              </span>
              <input type="email" name="email" value="{{ old('email') }}" required
                     class="w-full pl-10 pr-4 py-2 border border-[#d7ccc8] rounded-lg focus:ring focus:ring-[#0b445e] focus:outline-none"
                     placeholder="you@example.com" />
            </div>
          </div>

          <div class="mb-4 relative">
            <label class="block text-sm text-[#0b445e] mb-1">Password</label>
            <div class="relative">
              <span class="absolute left-3 top-2.5 text-gray-400">
                <!-- Icon password -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 11c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
              </span>
              <input type="password" name="password" id="reg_password"
                     class="w-full pl-10 pr-10 py-2 border border-[#d7ccc8] rounded-lg focus:ring focus:ring-[#a1887f] focus:outline-none"
                     placeholder="********" required />
              <button type="button" onclick="togglePassword('reg_password', this)"
                      class="absolute right-3 top-2.5 text-gray-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 12a3 3 0 01-3 3m0 0a3 3 0 01-3-3m3 3a3 3 0 003-3m0 0a3 3 0 00-3-3m0 0a3 3 0 00-3 3"/>
                </svg>
              </button>
            </div>
          </div>

          <div class="mb-6 relative">
            <label class="block text-sm text-[#0b445e] mb-1">Konfirmasi Password</label>
            <div class="relative">
              <span class="absolute left-3 top-2.5 text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 11c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
              </span>
              <input type="password" name="password_confirmation"
                     class="w-full pl-10 pr-4 py-2 border border-[#d7ccc8] rounded-lg focus:ring focus:ring-[#a1887f] focus:outline-none"
                     placeholder="********" required />
            </div>
          </div>

          <button type="submit"
                  class="w-full bg-[#0b445e] hover:bg-[#0b445e] text-white py-2 rounded-lg transition">Daftar</button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
          Sudah punya akun?
          <button onclick="switchForm('login')" class="text-[#0b445e] font-medium hover:underline">Login di sini</button>
        </p>
      </div>
    </div>
  </div>

  <!-- Auto Switch -->
  <script>
    @if($errors->any() || old('register'))
      switchForm('register');
    @else
      switchForm('login');
    @endif
  </script>
</body>
</html>
