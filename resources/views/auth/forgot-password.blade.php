<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Latif</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        rail: { dark: '#0a0a0a', card: '#161616', accent: '#8b5cf6', sweet: '#ec4899' }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-rail-dark text-gray-200 font-sans antialiased flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md p-8 bg-rail-card border border-white/5 rounded-2xl shadow-2xl">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-rail-accent/10 rounded-2xl mb-4">
                <svg class="w-8 h-8 text-rail-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white">Reset Password</h1>
            <p class="text-sm text-gray-400 mt-2">Masukkan secret code untuk reset password Anda.</p>
        </div>

        <!-- Alert Error -->
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="flex-1">
                        @foreach($errors->all() as $error)
                            <p class="text-sm text-red-400">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('password.reset') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Secret Code -->
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">
                    Secret Code <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="secret_code" 
                       value="{{ old('secret_code') }}"
                       required 
                       autofocus
                       inputmode="numeric"
                       pattern="[0-9]*"
                       class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent focus:ring-2 focus:ring-rail-accent/20 outline-none transition placeholder-gray-600 @error('secret_code') border-red-500 @enderror"
                       placeholder="Contoh: 085786858184">
                <p class="text-xs text-gray-500 mt-2">💡 Simpan code ini di tempat aman (password manager, notes, dll)</p>
            </div>

            <!-- Password Baru -->
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">
                    Password Baru <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="password" 
                           name="password" 
                           id="new-password"
                           required
                           class="w-full bg-black/20 border border-white/10 rounded-xl p-3 pr-12 text-white focus:border-rail-accent focus:ring-2 focus:ring-rail-accent/20 outline-none transition placeholder-gray-600"
                           placeholder="Minimal 8 karakter">
                    <button type="button"
                            onclick="toggleNewPassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white transition-colors focus:outline-none">
                        <svg id="new-eye-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <svg id="new-eye-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">
                    Konfirmasi Password <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="password" 
                           name="password_confirmation" 
                           id="confirm-password"
                           required
                           class="w-full bg-black/20 border border-white/10 rounded-xl p-3 pr-12 text-white focus:border-rail-accent focus:ring-2 focus:ring-rail-accent/20 outline-none transition placeholder-gray-600"
                           placeholder="Ketik ulang password baru">
                    <button type="button"
                            onclick="toggleConfirmPassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white transition-colors focus:outline-none">
                        <svg id="confirm-eye-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <svg id="confirm-eye-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-2">
                <a href="{{ route('login') }}" 
                   class="flex-1 py-3 text-center bg-white/5 hover:bg-white/10 text-gray-300 font-medium rounded-xl transition border border-white/10">
                    Batal
                </a>
                <button type="submit"
                        class="flex-1 py-3 bg-gradient-to-r from-rail-accent to-rail-sweet text-white font-bold rounded-xl hover:shadow-lg hover:shadow-purple-500/20 transition">
                    Reset Password
                </button>
            </div>
        </form>

        <!-- Back to Login -->
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-white transition inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Login
            </a>
        </div>

    </div>

    <script>
        function toggleNewPassword() {
            const passwordInput = document.getElementById('new-password');
            const eyeOpen = document.getElementById('new-eye-open');
            const eyeClosed = document.getElementById('new-eye-closed');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }

        function toggleConfirmPassword() {
            const passwordInput = document.getElementById('confirm-password');
            const eyeOpen = document.getElementById('confirm-eye-open');
            const eyeClosed = document.getElementById('confirm-eye-closed');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }
    </script>

</body>
</html>
