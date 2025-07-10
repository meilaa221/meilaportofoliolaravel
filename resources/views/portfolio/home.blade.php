<!-- Hero/Home Section -->
<section id="home" class="min-h-screen bg-gradient-to-br from-primary-100 via-secondary-50 to-accent-50 flex items-center py-20 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute inset-0 bg-gradient-to-br from-primary-100/80 via-secondary-50/80 to-accent-50/80"></div>
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-20 right-20 w-64 h-64 bg-primary-200/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-80 h-80 bg-secondary-200/30 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-accent-200/20 rounded-full blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Text Content -->
            <div class="text-center lg:text-left animate-slide-up">
                <div class="mb-6">
                    <span class="inline-block px-4 py-2 bg-gradient-to-r from-primary-100 to-secondary-100 text-primary-700 rounded-full text-sm font-medium mb-4">
                        👋 Hello, I'm
                    </span>
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-display font-bold mb-4">
                        <span class="gradient-text">{{ $data['profile']['name'] }}</span>
                    </h1>
                    <h2 class="text-2xl md:text-3xl font-semibold text-dark-600 mb-6">
                        {{ $data['profile']['title'] }}
                    </h2>
                </div>
                
                <p class="text-lg text-dark-500 leading-relaxed mb-8 max-w-2xl">
                    {{ $data['profile']['bio'] }}
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 mb-8">
                    <div class="flex items-center text-dark-600">
                        <div class="w-2 h-2 bg-primary-500 rounded-full mr-3"></div>
                        <i class="fas fa-map-marker-alt mr-2 text-primary-500"></i>
                        <span>{{ $data['profile']['location'] }}</span>
                    </div>
                    <div class="flex items-center text-dark-600">
                        <div class="w-2 h-2 bg-secondary-500 rounded-full mr-3"></div>
                        <i class="fas fa-envelope mr-2 text-secondary-500"></i>
                        <span>{{ $data['profile']['email'] }}</span>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#contact" class="group bg-gradient-to-r from-primary-600 to-secondary-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-primary-700 hover:to-secondary-700 transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <i class="fas fa-paper-plane mr-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                        Get In Touch
                    </a>
                    <a href="#projects" class="bg-white text-primary-600 px-8 py-4 rounded-xl font-semibold hover:bg-primary-50 transition duration-300 border-2 border-primary-200 hover:border-primary-300 shadow-lg hover:shadow-xl">
                        <i class="fas fa-eye mr-2"></i>
                        View My Work
                    </a>
                </div>
            </div>
            
            <!-- Photo Section -->
            <div class="flex justify-center lg:justify-end animate-fade-in">
                <div class="relative">
                    <!-- Main Photo Container -->
                    <div class="relative w-80 h-80 md:w-96 md:h-96">
                        <!-- Background Decorations -->
                        <div class="absolute -top-4 -left-4 w-full h-full bg-gradient-to-br from-primary-200 to-secondary-200 rounded-3xl transform rotate-6 animate-float"></div>
                        <div class="absolute -bottom-4 -right-4 w-full h-full bg-gradient-to-br from-accent-200 to-primary-200 rounded-3xl transform -rotate-3"></div>
                        
                        <!-- Photo Container -->
                        <div class="relative w-full h-full bg-gradient-to-br from-primary-100 to-secondary-100 rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                            <img src="/img/meila1.jpg" alt="Dian Gita Meilani" class="w-full h-full object-cover">
                        </div>

                        
                        <!-- Floating Elements -->
                        <div class="absolute -top-2 -right-2 w-12 h-12 bg-gradient-to-br from-accent-400 to-accent-500 rounded-full flex items-center justify-center shadow-lg animate-float" style="animation-delay: 0.5s;">
                            <i class="fas fa-code text-white text-sm"></i>
                        </div>
                        <div class="absolute -bottom-2 -left-2 w-10 h-10 bg-gradient-to-br from-secondary-400 to-secondary-500 rounded-full flex items-center justify-center shadow-lg animate-float" style="animation-delay: 1s;">
                            <i class="fas fa-laptop text-white text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Section -->
        <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-primary-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-dark-800">{{ $data['education']['gpa'] }}</h3>
                <p class="text-dark-500 font-medium">Current GPA</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-secondary-100 to-secondary-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-project-diagram text-secondary-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-dark-800">{{ count($data['projects']) }}+</h3>
                <p class="text-dark-500 font-medium">Projects</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-accent-100 to-accent-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-trophy text-accent-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-dark-800">2+</h3>
                <p class="text-dark-500 font-medium">Achievements</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-code text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-dark-800">10+</h3>
                <p class="text-dark-500 font-medium">Technologies</p>
            </div>
        </div>
    </div>
</section>
