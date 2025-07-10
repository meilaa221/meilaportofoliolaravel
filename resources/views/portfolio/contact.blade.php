<!-- Contact Section -->
<section id="contact" class="py-20 bg-gradient-to-br from-primary-600 via-secondary-600 to-primary-700 text-white relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute inset-0 bg-gradient-to-br from-primary-600/90 to-secondary-600/90"></div>
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full animate-float"></div>
        <div class="absolute bottom-20 right-20 w-24 h-24 bg-white/10 rounded-full animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white/10 rounded-full animate-float" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-white/20 text-white rounded-full text-sm font-medium mb-4 glass-effect">
                Let's Connect
            </span>
            <h2 class="text-4xl md:text-5xl font-display font-bold mb-6 text-white">
                Get In Touch
            </h2>
            <div class="w-24 h-1 bg-white mx-auto mb-6"></div>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                Ready to bring your ideas to life? Let's discuss your next project and create something amazing together.
            </p>
        </div>
        
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Info -->
                <div class="space-y-8">
                    <div>
                        <h3 class="text-3xl font-display font-bold mb-8 text-white">Let's Start a Conversation</h3>
                        <p class="text-blue-100 text-lg leading-relaxed mb-8">
                            I'm always excited to work on new projects and collaborate with amazing people. 
                            Whether you have a project in mind or just want to say hello, I'd love to hear from you!
                        </p>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="flex items-center group">
                            <div class="w-14 h-14 glass-effect rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-envelope text-2xl text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white text-lg">Email</h4>
                                <a href="mailto:{{ $data['profile']['email'] }}" class="text-blue-100 hover:text-white transition duration-300 text-lg">
                                    {{ $data['profile']['email'] }}
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-center group">
                            <div class="w-14 h-14 glass-effect rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-phone text-2xl text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white text-lg">Phone</h4>
                                <a href="tel:{{ $data['profile']['phone'] }}" class="text-blue-100 hover:text-white transition duration-300 text-lg">
                                    {{ $data['profile']['phone'] }}
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-center group">
                            <div class="w-14 h-14 glass-effect rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-map-marker-alt text-2xl text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white text-lg">Location</h4>
                                <p class="text-blue-100 text-lg">{{ $data['profile']['location'] }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="pt-8">
                        <h4 class="text-xl font-semibold text-white mb-6">Follow Me</h4>
                        <div class="flex space-x-4">
                            <!-- GitHub -->
                            <a href="https://github.com/meilaa221" target="_blank" class="w-12 h-12 glass-effect rounded-xl flex items-center justify-center hover:bg-white/20 transition duration-300 transform hover:scale-110">
                                <i class="fab fa-github text-white"></i>
                            </a>

                            <!-- WhatsApp -->
                            <a href="https://wa.me/6289674366444" target="_blank" class="w-12 h-12 glass-effect rounded-xl flex items-center justify-center hover:bg-white/20 transition duration-300 transform hover:scale-110">
                                <i class="fab fa-whatsapp text-white"></i>
                            </a>

                            <!-- Instagram -->
                            <a href="https://instagram.com/dgtmeila._" target="_blank" class="w-12 h-12 glass-effect rounded-xl flex items-center justify-center hover:bg-white/20 transition duration-300 transform hover:scale-110">
                                <i class="fab fa-instagram text-white"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="glass-effect rounded-3xl p-8 border border-white/20">
                    <h3 class="text-2xl font-display font-bold text-white mb-8">Send Me a Message</h3>
                    
                    <!-- Success Message -->
                    <div id="successMessage" class="hidden mb-6 p-4 bg-green-500/20 border border-green-400/30 rounded-xl">
                        <div class="flex items-center text-green-100">
                            <i class="fas fa-check-circle mr-3"></i>
                            <span id="successText">Thank you for your message! I will get back to you soon.</span>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="errorMessage" class="hidden mb-6 p-4 bg-red-500/20 border border-red-400/30 rounded-xl">
                        <div class="flex items-center text-red-100">
                            <i class="fas fa-exclamation-circle mr-3"></i>
                            <span id="errorText">Please check your input and try again.</span>
                        </div>
                    </div>

                    <form id="contactForm" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-white font-medium mb-2">First Name *</label>
                                <input type="text" name="first_name" required
                                       class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-white/50 transition duration-300"
                                       placeholder="John">
                                <div class="error-message text-red-200 text-sm mt-1 hidden"></div>
                            </div>
                            <div>
                                <label class="block text-white font-medium mb-2">Last Name *</label>
                                <input type="text" name="last_name" required
                                       class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-white/50 transition duration-300"
                                       placeholder="Doe">
                                <div class="error-message text-red-200 text-sm mt-1 hidden"></div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-white font-medium mb-2">Email Address *</label>
                            <input type="email" name="email" required
                                   class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-white/50 transition duration-300"
                                   placeholder="john.doe@example.com">
                            <div class="error-message text-red-200 text-sm mt-1 hidden"></div>
                        </div>
                        <div>
                            <label class="block text-white font-medium mb-2">Subject *</label>
                            <input type="text" name="subject" required
                                   class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-white/50 transition duration-300"
                                   placeholder="Project Discussion">
                            <div class="error-message text-red-200 text-sm mt-1 hidden"></div>
                        </div>
                        <div>
                            <label class="block text-white font-medium mb-2">Message *</label>
                            <textarea rows="5" name="message" required
                                      class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-white/50 resize-none transition duration-300"
                                      placeholder="Tell me about your project or just say hello!"></textarea>
                            <div class="error-message text-red-200 text-sm mt-1 hidden"></div>
                        </div>
                        <button type="submit" id="submitBtn"
                                class="w-full bg-white text-primary-600 px-8 py-4 rounded-xl font-semibold hover:bg-blue-50 transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed">
                            <span id="submitText">
                                <i class="fas fa-paper-plane mr-2"></i>Send Message
                            </span>
                            <span id="loadingText" class="hidden">
                                <i class="fas fa-spinner fa-spin mr-2"></i>Sending...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const loadingText = document.getElementById('loadingText');
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');
    const successText = document.getElementById('successText');
    const errorText = document.getElementById('errorText');

    contactForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Clear previous messages and errors
        hideMessages();
        clearErrors();

        // Disable submit button
        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        loadingText.classList.remove('hidden');

        try {
            const formData = new FormData(contactForm);
            const data = Object.fromEntries(formData);

            const response = await fetch('/contact/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
                showSuccess(result.message);
                contactForm.reset();
            } else {
                if (result.errors) {
                    showFieldErrors(result.errors);
                }
                showError(result.message);
            }

        } catch (error) {
            console.error('Contact form error:', error);
            showError('Sorry, there was an error sending your message. Please try again later.');
        } finally {
            // Re-enable submit button
            submitBtn.disabled = false;
            submitText.classList.remove('hidden');
            loadingText.classList.add('hidden');
        }
    });

    function showSuccess(message) {
        successText.textContent = message;
        successMessage.classList.remove('hidden');
        successMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function showError(message) {
        errorText.textContent = message;
        errorMessage.classList.remove('hidden');
        errorMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function hideMessages() {
        successMessage.classList.add('hidden');
        errorMessage.classList.add('hidden');
    }

    function showFieldErrors(errors) {
        Object.keys(errors).forEach(field => {
            const input = contactForm.querySelector(`[name="${field}"]`);
            if (input) {
                const errorDiv = input.parentNode.querySelector('.error-message');
                if (errorDiv) {
                    errorDiv.textContent = errors[field][0];
                    errorDiv.classList.remove('hidden');
                    input.classList.add('border-red-400');
                }
            }
        });
    }

    function clearErrors() {
        const errorDivs = contactForm.querySelectorAll('.error-message');
        const inputs = contactForm.querySelectorAll('input, textarea');
        
        errorDivs.forEach(div => {
            div.classList.add('hidden');
            div.textContent = '';
        });

        inputs.forEach(input => {
            input.classList.remove('border-red-400');
        });
    }
});
</script>
