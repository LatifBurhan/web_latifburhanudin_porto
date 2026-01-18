<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Latif</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        rail: { dark: '#0a0a0a', card: '#161616', accent: '#8b5cf6' }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-rail-dark text-gray-200 font-sans antialiased flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-rail-card border border-white/5 rounded-2xl shadow-2xl">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-white">Welcome Back! 👋</h1>
            <p class="text-sm text-gray-400 mt-2">Please login to manage your portfolio.</p>
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none transition placeholder-gray-600"
                    placeholder="admin@example.com">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none transition placeholder-gray-600"
                    placeholder="••••••••">
            </div>

            <button type="submit"
                class="w-full py-3 bg-rail-accent text-white font-bold rounded-xl hover:bg-purple-600 transition shadow-lg shadow-purple-900/20">
                Sign In
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-white transition">← Back to Website</a>
        </div>
    </div>

</body>
</html>
