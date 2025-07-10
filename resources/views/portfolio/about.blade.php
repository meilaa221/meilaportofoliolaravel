<!-- About Section -->
<section id="about" class="py-20 bg-gradient-to-br from-slate-50 via-primary-50 to-secondary-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-primary-100/50 to-secondary-100/50"></div>
        <div class="absolute top-10 right-10 w-32 h-32 bg-primary-200/40 rounded-full blur-2xl"></div>
        <div class="absolute bottom-10 left-10 w-40 h-40 bg-secondary-200/40 rounded-full blur-2xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-gradient-to-r from-primary-100 to-secondary-100 text-primary-700 rounded-full text-sm font-medium mb-4">
                About Me
            </span>
            <h2 class="text-4xl md:text-5xl font-display font-bold gradient-text mb-6">
                Get to Know Me Better
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-primary-500 to-secondary-500 mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Photo Section -->
            <div class="flex justify-center lg:justify-start">
                <div class="relative">
                    <div class="w-80 h-96 md:w-96 md:h-[450px] relative">
                        <!-- Background Decoration -->
                        <div class="absolute inset-0 bg-gradient-to-br from-primary-200 via-secondary-200 to-accent-200 rounded-3xl transform rotate-3"></div>
                        
                        <!-- Photo Container -->
                        <div class="relative w-full h-full bg-gradient-to-br from-primary-100 to-secondary-100 rounded-3xl overflow-hidden shadow-2xl border-4 border-white transform -rotate-2 hover:rotate-0 transition-transform duration-500">
                            <img src="/img/meila1.jpg" alt="Dian Gita Meilani" class="w-full h-full object-cover">
                        </div>

                        
                        <!-- Floating Badge -->
                        <div class="absolute -bottom-4 -right-4 bg-white rounded-2xl p-4 shadow-xl border border-primary-100">
                            <div class="text-center">
                                <div class="text-2xl font-bold gradient-text">4th</div>
                                <div class="text-sm text-dark-500">Semester</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Content Section -->
            <div class="space-y-8">
                <div>
                    <h3 class="text-3xl font-display font-bold text-dark-800 mb-6">
                        Hello, I'm <span class="gradient-text">{{ $data['profile']['name'] }}</span>
                    </h3>
                    <p class="text-lg text-dark-600 leading-relaxed mb-6">
                        {{ $data['profile']['bio'] }}
                    </p>
                </div>
                
                <!-- Info Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-8 md:p-12 mb-12 border border-white/20">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-primary-500 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-graduation-cap text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-dark-800">Education</h4>
                                <p class="text-sm text-dark-600">{{ $data['education']['major'] }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-8 md:p-12 mb-12 border border-white/20">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-secondary-500 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-code text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-dark-800">Specialization</h4>
                                <p class="text-sm text-dark-600">Fullstack Development</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-8 md:p-12 mb-12 border border-white/20">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-accent-500 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-dark-800">Location</h4>
                                <p class="text-sm text-dark-600">{{ $data['profile']['location'] }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-8 md:p-12 mb-12 border border-white/20">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-star text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-dark-800">GPA</h4>
                                <p class="text-sm text-dark-600">{{ $data['education']['gpa'] }}/4.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- CTA Button -->
                <div class="pt-6">
                    <a href="#contact" class="inline-flex items-center bg-gradient-to-r from-primary-600 to-secondary-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-primary-700 hover:to-secondary-700 transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Let's Connect
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
