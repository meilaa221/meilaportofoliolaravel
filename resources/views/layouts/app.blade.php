<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dian Gita Meilani - Portfolio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e'
                        },
                        secondary: {
                            50: '#fdf4ff',
                            100: '#fae8ff',
                            200: '#f5d0fe',
                            300: '#f0abfc',
                            400: '#e879f9',
                            500: '#d946ef',
                            600: '#c026d3',
                            700: '#a21caf',
                            800: '#86198f',
                            900: '#701a75'
                        },
                        accent: {
                            50: '#fefce8',
                            100: '#fef9c3',
                            200: '#fef08a',
                            300: '#fde047',
                            400: '#facc15',
                            500: '#eab308',
                            600: '#ca8a04',
                            700: '#a16207',
                            800: '#854d0e',
                            900: '#713f12'
                        },
                        dark: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a'
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                        'display': ['Playfair Display', 'serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                    }
                }
            }
        }
    </script>
    
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #0ea5e9, #d946ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .backdrop-blur-sm {
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .bg-pattern {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(217, 70, 239, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(234, 179, 8, 0.05) 0%, transparent 50%);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-100 via-blue-50 to-purple-50 text-dark-800 font-sans min-h-screen">
    <!-- Flash Messages -->
    @if(session('success') || session('error') || session('warning') || session('info'))
        <div id="flashMessage" class="fixed top-20 right-4 z-50 max-w-sm">
            @if(session('success'))
                <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg border-l-4 border-green-700 animate-slide-up">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-3"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif
            
            @if(session('error'))
                <div class="bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg border-l-4 border-red-700 animate-slide-up">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-3"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            
            @if(session('warning'))
                <div class="bg-yellow-500 text-white px-6 py-4 rounded-lg shadow-lg border-l-4 border-yellow-700 animate-slide-up">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle mr-3"></i>
                        <span>{{ session('warning') }}</span>
                    </div>
                </div>
            @endif
            
            @if(session('info'))
                <div class="bg-blue-500 text-white px-6 py-4 rounded-lg shadow-lg border-l-4 border-blue-700 animate-slide-up">
                    <div class="flex items-center">
                        <i class="fas fa-info-circle mr-3"></i>
                        <span>{{ session('info') }}</span>
                    </div>
                </div>
            @endif
        </div>
    @endif

    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md shadow-lg fixed w-full top-0 z-50 border-b border-primary-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="#home" class="text-2xl font-display font-bold gradient-text">
                        Dian Gita Meilani
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-dark-600 hover:text-primary-600 transition duration-300 font-medium">Home</a>
                    <a href="#about" class="text-dark-600 hover:text-primary-600 transition duration-300 font-medium">About</a>
                    <a href="#education" class="text-dark-600 hover:text-primary-600 transition duration-300 font-medium">Education</a>
                    <a href="#projects" class="text-dark-600 hover:text-primary-600 transition duration-300 font-medium">Projects</a>
                    <a href="#skills" class="text-dark-600 hover:text-primary-600 transition duration-300 font-medium">Skills</a>
                    <a href="#contact" class="text-dark-600 hover:text-primary-600 transition duration-300 font-medium">Contact</a>
                    
                    <!-- Authentication Menu -->
                    @auth
                        <div class="relative group">
                            <button class="flex items-center text-dark-600 hover:text-primary-600 transition duration-300 font-medium">
                                <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-secondary-500 rounded-full flex items-center justify-center mr-2">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                {{ auth()->user()->name }}
                                <i class="fas fa-chevron-down ml-2 text-xs"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition duration-300 rounded-t-xl">
                                        <i class="fas fa-tachometer-alt mr-3"></i>
                                        Dashboard
                                    </a>
                                    <a href="{{ route('admin.chat') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition duration-300 relative">
                                        <i class="fas fa-comments mr-3"></i>
                                        Live Chat
                                        @if(isset($unreadCount) && $unreadCount > 0)
                                            <span class="absolute right-2 top-2 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">
                                                {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                                            </span>
                                        @endif
                                    </a>
                                    <hr class="border-gray-200">
                                @else
                                    <div class="px-4 py-3 text-gray-500 text-sm border-b border-gray-200">
                                        <i class="fas fa-user mr-2"></i>
                                        Regular User
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition duration-300 rounded-b-xl">
                                        <i class="fas fa-sign-out-alt mr-3"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('login') }}" class="text-dark-600 hover:text-primary-600 transition duration-300 font-medium">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                            </a>
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-primary-600 to-secondary-600 text-white px-4 py-2 rounded-lg font-medium hover:from-primary-700 hover:to-secondary-700 transition duration-300 transform hover:scale-105">
                                <i class="fas fa-user-plus mr-2"></i>Register
                            </a>
                        </div>
                    @endauth
                </div>
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-dark-600 hover:text-primary-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-md border-t border-primary-100">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#home" class="block px-3 py-2 text-dark-600 hover:text-primary-600 font-medium">Home</a>
                <a href="#about" class="block px-3 py-2 text-dark-600 hover:text-primary-600 font-medium">About</a>
                <a href="#education" class="block px-3 py-2 text-dark-600 hover:text-primary-600 font-medium">Education</a>
                <a href="#projects" class="block px-3 py-2 text-dark-600 hover:text-primary-600 font-medium">Projects</a>
                <a href="#skills" class="block px-3 py-2 text-dark-600 hover:text-primary-600 font-medium">Skills</a>
                <a href="#contact" class="block px-3 py-2 text-dark-600 hover:text-primary-600 font-medium">Contact</a>
                
                <!-- Mobile Authentication Menu -->
                @auth
                    <div class="border-t border-gray-200 pt-2 mt-2">
                        <div class="px-3 py-2">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-secondary-500 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-800">{{ auth()->user()->name }}</span>
                                    <div class="text-xs text-gray-500">
                                        {{ auth()->user()->isAdmin() ? 'Administrator' : 'Regular User' }}
                                    </div>
                                </div>
                            </div>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 text-dark-600 hover:text-primary-600 font-medium">
                                    <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
                                </a>
                                <a href="{{ route('admin.chat') }}" class="flex items-center px-3 py-2 text-dark-600 hover:text-primary-600 font-medium">
                                    <i class="fas fa-comments mr-3"></i>Live Chat
                                </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-3 py-2 text-red-600 hover:text-red-700 font-medium">
                                    <i class="fas fa-sign-out-alt mr-3"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="border-t border-gray-200 pt-2 mt-2">
                        <a href="{{ route('login') }}" class="flex items-center px-3 py-2 text-dark-600 hover:text-primary-600 font-medium">
                            <i class="fas fa-sign-in-alt mr-3"></i>Login
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center px-3 py-2 text-primary-600 hover:text-primary-700 font-medium">
                            <i class="fas fa-user-plus mr-3"></i>Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-dark-800 to-dark-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-2xl font-display font-bold gradient-text mb-4">Dian Gita Meilani</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Fullstack Engineer passionate about creating innovative web solutions and contributing to the tech community.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#about" class="text-gray-300 hover:text-primary-400 transition duration-300">About</a></li>
                        <li><a href="#projects" class="text-gray-300 hover:text-primary-400 transition duration-300">Projects</a></li>
                        <li><a href="#skills" class="text-gray-300 hover:text-primary-400 transition duration-300">Skills</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-primary-400 transition duration-300">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect With Me</h4>
                    <div class="flex space-x-4">
                        <a href="mailto:dgtmeila.a@gmail.com" class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center hover:bg-primary-700 transition duration-300">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-dark-700 rounded-full flex items-center justify-center hover:bg-dark-600 transition duration-300">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition duration-300">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-dark-700 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} Dian Gita Meilani. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.add('hidden');
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('shadow-xl');
            } else {
                nav.classList.remove('shadow-xl');
            }
        });

        // Auto-hide flash messages
        setTimeout(function() {
            const flashMessage = document.getElementById('flashMessage');
            if (flashMessage) {
                flashMessage.style.opacity = '0';
                flashMessage.style.transform = 'translateX(100%)';
                setTimeout(function() {
                    flashMessage.remove();
                }, 300);
            }
        }, 5000);
    </script>

    @include('components.chat-widget')
</body>
</html>
