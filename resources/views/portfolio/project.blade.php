<!-- Projects Section -->
<section id="projects" class="py-20 bg-gradient-to-br from-slate-100 via-primary-50 to-secondary-50 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-64 h-64 bg-primary-200/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-20 w-72 h-72 bg-secondary-200/20 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-accent-200/15 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-gradient-to-r from-primary-100 to-secondary-100 text-primary-700 rounded-full text-sm font-medium mb-4">
                My Work
            </span>
            <h2 class="text-4xl md:text-5xl font-display font-bold gradient-text mb-6">
                Featured Projects
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-primary-500 to-secondary-500 mx-auto mb-6"></div>
            <p class="text-lg text-dark-600 max-w-2xl mx-auto">
                Here are some of my recent projects that showcase my skills and passion for web development.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($data['projects'] as $index => $project)
                <div class="group bg-white/90 backdrop-blur-sm rounded-3xl shadow-xl hover:shadow-2xl transition duration-500 transform hover:-translate-y-2 border border-white/30 overflow-hidden">
                    <!-- Project Image -->
                    <div class="h-48 relative overflow-hidden">
                        <img src="/img/meila{{ $index + 2 }}.jpg" alt="Project {{ $index + 1 }}" class="w-full h-full object-cover">
                        
                        <!-- Project Number Badge -->
                        <div class="absolute top-4 left-4 w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg">
                            <span class="text-{{ ['primary', 'secondary', 'accent', 'green'][$index % 4] }}-600 font-bold text-lg">{{ $index + 1 }}</span>
                        </div>
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                            Completed
                        </div>
                    </div>

                    
                    <!-- Project Content -->
                    <div class="p-8">
                        <h3 class="text-2xl font-display font-bold text-dark-800 mb-4 group-hover:text-{{ ['primary', 'secondary', 'accent', 'green'][$index % 4] }}-600 transition-colors duration-300">
                            {{ $project['title'] }}
                        </h3>
                        <p class="text-dark-600 mb-6 leading-relaxed">
                            {{ $project['description'] }}
                        </p>
                        
                        <!-- Tech Stack -->
                        <div class="mb-6">
                            <h4 class="text-sm font-semibold text-dark-700 mb-3 uppercase tracking-wide">Tech Stack</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($project['tech_stack'] as $techIndex => $tech)
                                    <span class="bg-gradient-to-r from-{{ ['primary', 'secondary', 'accent', 'green'][$techIndex % 4] }}-100 to-{{ ['primary', 'secondary', 'accent', 'green'][$techIndex % 4] }}-200 text-{{ ['primary', 'secondary', 'accent', 'green'][$techIndex % 4] }}-700 px-3 py-1 rounded-full text-sm font-medium border border-{{ ['primary', 'secondary', 'accent', 'green'][$techIndex % 4] }}-300">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Project Footer -->
                        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                            <div class="flex items-center text-dark-500">
                                <i class="fas fa-calendar mr-2"></i>
                                <span class="text-sm">2024</span>
                            </div>
                            <div class="flex space-x-3">
                                <button class="bg-gradient-to-r from-{{ ['primary', 'secondary', 'accent', 'green'][$index % 4] }}-500 to-{{ ['primary', 'secondary', 'accent', 'green'][$index % 4] }}-600 text-white px-4 py-2 rounded-xl text-sm font-medium hover:from-{{ ['primary', 'secondary', 'accent', 'green'][$index % 4] }}-600 hover:to-{{ ['primary', 'secondary', 'accent', 'green'][$index % 4] }}-700 transition duration-300 transform hover:scale-105">
                                    <i class="fas fa-eye mr-2"></i>View Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- View All Projects Button -->
        <div class="text-center mt-12">
            <a href="#contact" class="inline-flex items-center bg-gradient-to-r from-primary-600 to-secondary-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-primary-700 hover:to-secondary-700 transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                <i class="fas fa-folder-open mr-2"></i>
                Discuss Your Project
            </a>
        </div>
    </div>
</section>
