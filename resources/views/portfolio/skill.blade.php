<!-- Skills Section -->
<section id="skills" class="py-20 bg-gradient-to-br from-secondary-50 via-primary-50 to-accent-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-secondary-100/30 via-primary-100/30 to-accent-100/30"></div>
        <div class="absolute top-16 right-16 w-56 h-56 bg-secondary-200/25 rounded-full blur-3xl"></div>
        <div class="absolute bottom-16 left-16 w-64 h-64 bg-primary-200/25 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 left-1/3 w-48 h-48 bg-accent-200/20 rounded-full blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-gradient-to-r from-primary-100 to-secondary-100 text-primary-700 rounded-full text-sm font-medium mb-4">
                Technical Expertise
            </span>
            <h2 class="text-4xl md:text-5xl font-display font-bold gradient-text mb-6">
                Skills & Technologies
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-primary-500 to-secondary-500 mx-auto mb-6"></div>
            <p class="text-lg text-dark-600 max-w-2xl mx-auto">
                A comprehensive overview of my technical skills and the technologies I work with.
            </p>
        </div>
        
        <!-- Skills Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Frontend Skills -->
            <div class="group bg-white/90 backdrop-blur-sm rounded-3xl shadow-xl hover:shadow-2xl transition duration-500 p-8 border border-white/30 transform hover:-translate-y-2">
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-code text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-display font-bold text-dark-800 mb-2">Frontend Development</h3>
                    <p class="text-dark-500">User Interface & Experience</p>
                </div>
                <ul class="space-y-4">
                    @foreach($data['skills']['frontend'] as $skill)
                        <li class="flex items-center group-hover:translate-x-2 transition-transform duration-300">
                            <div class="w-3 h-3 bg-gradient-to-r from-primary-400 to-primary-600 rounded-full mr-4 flex-shrink-0"></div>
                            <span class="text-dark-700 font-medium">{{ $skill }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Backend Skills -->
            <div class="group bg-white/90 backdrop-blur-sm rounded-3xl shadow-xl hover:shadow-2xl transition duration-500 p-8 border border-white/30 transform hover:-translate-y-2">
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-br from-secondary-500 to-secondary-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-server text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-display font-bold text-dark-800 mb-2">Backend Development</h3>
                    <p class="text-dark-500">Server-side & Database</p>
                </div>
                <ul class="space-y-4">
                    @foreach($data['skills']['backend'] as $skill)
                        <li class="flex items-center group-hover:translate-x-2 transition-transform duration-300">
                            <div class="w-3 h-3 bg-gradient-to-r from-secondary-400 to-secondary-600 rounded-full mr-4 flex-shrink-0"></div>
                            <span class="text-dark-700 font-medium">{{ $skill }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- DevOps Skills -->
            <div class="group bg-white/90 backdrop-blur-sm rounded-3xl shadow-xl hover:shadow-2xl transition duration-500 p-8 border border-white/30 transform hover:-translate-y-2">
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-br from-accent-500 to-accent-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-cogs text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-display font-bold text-dark-800 mb-2">DevOps & Tools</h3>
                    <p class="text-dark-500">Development & Deployment</p>
                </div>
                <ul class="space-y-4">
                    @foreach($data['skills']['devops'] as $skill)
                        <li class="flex items-center group-hover:translate-x-2 transition-transform duration-300">
                            <div class="w-3 h-3 bg-gradient-to-r from-accent-400 to-accent-600 rounded-full mr-4 flex-shrink-0"></div>
                            <span class="text-dark-700 font-medium">{{ $skill }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Experience & Achievements -->
        <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-xl p-8 md:p-12 border border-white/30">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-display font-bold gradient-text mb-4">Experience & Achievements</h3>
                <div class="w-20 h-1 bg-gradient-to-r from-primary-500 to-secondary-500 mx-auto"></div>
            </div>
            
            <!-- Organization Experience -->
            <div class="mb-12">
                <div class="bg-gradient-to-br from-primary-50 to-secondary-50 rounded-2xl p-8 border border-primary-200">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-secondary-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <div class="text-center md:text-left">
                            <h4 class="text-2xl font-display font-bold text-dark-800 mb-2">{{ $data['organization']['name'] }}</h4>
                            <p class="text-lg font-semibold gradient-text mb-4">{{ $data['organization']['role'] }}</p>
                            <p class="text-dark-600 leading-relaxed">{{ $data['organization']['description'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Achievements -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($data['achievements'] as $index => $achievement)
                    <div class="bg-gradient-to-br from-{{ ['accent', 'green'][$index % 2] }}-50 to-{{ ['accent', 'green'][$index % 2] }}-100 rounded-2xl p-6 border border-{{ ['accent', 'green'][$index % 2] }}-200 hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-{{ ['accent', 'green'][$index % 2] }}-500 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-trophy text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-dark-800 mb-2">
                                    @if($index == 0)
                                        International Competition Finalist
                                    @else
                                        Entrepreneurship Achievement
                                    @endif
                                </h5>
                                <p class="text-dark-600 text-sm leading-relaxed">{{ $achievement }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
