<!-- Education Section -->
<section id="education" class="py-20 bg-gradient-to-br from-primary-50 via-slate-50 to-secondary-50 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-0 right-0 w-72 h-72 bg-gradient-to-br from-primary-200/30 to-secondary-200/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-br from-accent-200/30 to-primary-200/30 rounded-full blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-gradient-to-r from-primary-100 to-secondary-100 text-primary-700 rounded-full text-sm font-medium mb-4">
                Academic Journey
            </span>
            <h2 class="text-4xl md:text-5xl font-display font-bold gradient-text mb-6">
                Education & Learning
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-primary-500 to-secondary-500 mx-auto"></div>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <!-- Main Education Card -->
            <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-2xl p-8 md:p-12 mb-12 border border-white/30">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    <!-- University Logo/Icon -->
                    <div class="flex-shrink-0">
                        <div class="w-24 h-24 bg-gradient-to-br from-primary-500 to-secondary-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-university text-white text-3xl"></i>
                        </div>
                    </div>
                    
                    <!-- Education Info -->
                    <div class="flex-1 text-center md:text-left">
                        <h3 class="text-3xl font-display font-bold text-dark-800 mb-2">
                            {{ $data['education']['university'] }}
                        </h3>
                        <p class="text-xl font-semibold gradient-text mb-3">
                            {{ $data['education']['major'] }}
                        </p>
                        <p class="text-dark-600 mb-4">{{ $data['education']['period'] }}</p>
                        
                        <!-- GPA Badge -->
                        <div class="inline-flex items-center bg-gradient-to-r from-accent-100 to-accent-200 px-6 py-3 rounded-2xl border border-accent-300">
                            <i class="fas fa-medal text-accent-600 mr-3"></i>
                            <span class="font-bold text-accent-700">GPA: {{ $data['education']['gpa'] }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Academic Description -->
                <div class="mt-8 p-6 bg-gradient-to-r from-primary-50 to-secondary-50 rounded-2xl border border-primary-200">
                    <h4 class="text-lg font-semibold text-dark-800 mb-3">Academic Focus</h4>
                    <p class="text-dark-600 leading-relaxed">
                        Currently pursuing a Bachelor's degree in Information Technology with a focus on software development, 
                        web technologies, and system integration. The program emphasizes both theoretical foundations and 
                        practical application of modern IT solutions.
                    </p>
                </div>
            </div>
            
            <!-- Relevant Courses -->
            <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-xl p-8 border border-white/30">
                <h3 class="text-2xl font-display font-bold text-dark-800 mb-8 text-center">
                    Relevant Coursework
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($data['education']['relevant_courses'] as $index => $course)
                        <div class="group bg-gradient-to-br from-{{ ['primary', 'secondary', 'accent', 'green'][$index % 4] }}-50 to-{{ ['primary', 'secondary', 'accent', 'green'][$index % 4] }}-100 p-6 rounded-2xl border border-{{ ['primary', 'secondary', 'accent', 'green'][$index % 4] }}-200 hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-{{ ['primary', 'secondary', 'accent', 'green'][$index % 4] }}-500 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-book text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-dark-800 group-hover:text-{{ ['primary', 'secondary', 'accent', 'green'][$index % 4] }}-700 transition-colors duration-300">
                                        {{ $course }}
                                    </h4>
                                    <p class="text-sm text-dark-500">Core Subject</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
