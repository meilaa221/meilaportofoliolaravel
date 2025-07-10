<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register - Dian Gita Meilani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 500: '#0ea5e9', 600: '#0284c7', 700: '#0369a1' },
                        secondary: { 500: '#d946ef', 600: '#c026d3' }
                    },
                    fontFamily: { 'sans': ['Inter', 'system-ui', 'sans-serif'] }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-primary-50 via-white to-secondary-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-2xl p-8 border border-white/30">
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-secondary-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-plus text-white text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Admin Register</h1>
                <p class="text-gray-600">Create your admin account</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                    @foreach ($errors->all() as $error)
                        <div class="flex items-center mb-2 last:mb-0">
                            <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                            <span class="text-red-700 text-sm">{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300">
                </div>

                <button type="submit" 
                        class="w-full bg-gradient-to-r from-primary-600 to-secondary-600 text-white py-3 px-6 rounded-xl font-semibold hover:from-primary-700 hover:to-secondary-700 transition duration-300 transform hover:scale-105">
                    <i class="fas fa-user-plus mr-2"></i>Create Account
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600">Already have an account? 
                    <a href="{{ route('login') }}" class="text-primary-600 hover:text-primary-700 font-medium">Login here</a>
                </p>
                <a href="{{ route('home') }}" class="inline-block mt-4 text-gray-500 hover:text-gray-700 transition duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Portfolio
                </a>
            </div>
        </div>
    </div>
</body>
</html>
