@extends('layouts.master')

@section('title', 'Home')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- AOS Animation Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

<!-- Tailwind CSS (CDN for development) -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
    :root {
        --primary: #56CD58;
        --secondary: #3DA63F;
        /* Darker green for secondary */
        --primary-hover: #45A647;
        /* Even darker green for hover states */
        --primary-light: #7EE580;
        /* Lighter green for additional use */
    }

    /* Dark mode styles */
    .dark {
        color-scheme: dark;
    }

    .dark body {
        background-color: var(--dark-bg);
        color: #56CD58;
    }

    /* Custom gradient text */
    .gradient-text {
        background: linear-gradient(to right, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    /* Replace all blue colors with green */
    .text-blue-500,
    .text-blue-600,
    .text-blue-700 {
        color: var(--primary) !important;
    }

    .bg-blue-500,
    .bg-blue-600,
    .bg-blue-700 {
        background-color: var(--primary) !important;
    }

    .border-blue-500,
    .border-blue-600,
    .border-blue-700 {
        border-color: var(--primary) !important;
    }

    /* Hover states for blue colors */
    .hover\:text-blue-500:hover,
    .hover\:text-blue-600:hover,
    .hover\:text-blue-700:hover,
    .hover\:text-purple-700:hover {
        color: var(--primary-hover) !important;
    }

    .hover\:bg-blue-500:hover,
    .hover\:bg-blue-600:hover,
    .hover\:bg-blue-700:hover,
    .hover\:bg-purple-700:hover {
        background-color: var(--primary-hover) !important;
    }

    .hover\:border-blue-500:hover,
    .hover\:border-blue-600:hover,
    .hover\:border-blue-700:hover {
        border-color: var(--primary-hover) !important;
    }

    /* Focus states */
    .focus\:text-blue-500:focus,
    .focus\:text-blue-600:focus,
    .focus\:text-blue-700:focus {
        color: var(--primary) !important;
    }

    .focus\:bg-blue-500:focus,
    .focus\:bg-blue-600:focus,
    .focus\:bg-blue-700:focus {
        background-color: var(--primary) !important;
    }

    .focus\:border-blue-500:focus,
    .focus\:border-blue-600:focus,
    .focus\:border-blue-700:focus {
        border-color: var(--primary) !important;
    }

    /* Custom classes for consistent theming */
    .btn-primary {
        background-color: var(--primary);
        color: white;
        border: 1px solid var(--primary);
    }

    .btn-primary:hover {
        background-color: var(--primary-hover);
        border-color: var(--primary-hover);
    }

    .btn-outline-primary {
        color: var(--primary);
        border: 1px solid var(--primary);
        background-color: transparent;
    }

    .btn-outline-primary:hover {
        background-color: var(--primary);
        color: white;
    }

    /* Links and interactive elements */
    a:not(.no-style) {
        color: var(--primary);
        text-decoration: none;
    }

    a:not(.no-style):hover {
        color: var(--primary-hover);
    }

    /* Form elements */
    input:focus,
    textarea:focus,
    select:focus {
        border-color: var(--primary) !important;
        box-shadow: 0 0 0 3px rgba(86, 205, 88, 0.1) !important;
    }

    /* Override any remaining blue colors */
    .text-indigo-600,
    .text-indigo-500,
    .text-sky-500,
    .text-sky-600,
    .text-cyan-500,
    .text-cyan-600 {
        color: var(--primary) !important;
    }

    .bg-indigo-600,
    .bg-indigo-500,
    .bg-sky-500,
    .bg-sky-600,
    .bg-cyan-500,
    .bg-cyan-600 {
        background-color: var(--primary) !important;
    }

    /* Add this to your CSS to ensure the heart stays white on green background */
    .bg-primary .fa-heart.text-white,
    .bg-primary .fa-heart.no-green {
        color: white !important;
    }

    /* Ensure the background circle stays green */
    .bg-primary-heart {
        background-color: var(--primary) !important;
    }
</style>

@section('content')
<section class="home">
    <video class="video-slide  active" src="https://videos.pexels.com/video-files/4101244/4101244-uhd_2732_1440_25fps.mp4" autoplay muted loop></video>
    <video class="video-slide" src="https://videos.pexels.com/video-files/7424128/7424128-uhd_2560_1440_30fps.mp4" autoplay muted loop></video>
    <video class="video-slide" src="https://videos.pexels.com/video-files/4098651/4098651-uhd_2732_1440_25fps.mp4" autoplay muted loop></video>
    <video class="video-slide" src="https://videos.pexels.com/video-files/4101227/4101227-uhd_2732_1440_25fps.mp4" autoplay muted loop></video>

    <div class="content  active">
        <h1>Life<br />Problems</h1>
        <p>
            You may be going through a new phase in your life, or having problems
            with a close relationship, or you just want to simply problem-solve a
            difficult situation. The idea of counseling is to have a third party
            who is outside of your circle of friends and family who can give you
            an objective.
        </p>
        <a href="#">Read More</a>
    </div>

    <div class="content">
        <h1>Family<br />Counseling</h1>
        <p>
            Family therapy (also referred to as family counseling, family systems
            therapy, marriage and family therapy, couple and family therapy) is a
            branch of psychotherapy focused on families and couples in intimate
            relationships to nurture change and development.
        </p>
        <a href="#">Read More</a>
    </div>

    <div class="content">
        <h1>Marriage<br />Counseling</h1>
        <p>
            Marriage counseling focuses on relationships and marriages. It's also
            commonly referred to as couples therapy or marriage therapy. Marriage
            counselors are trained and certified to help couples diagnose
            relationship problems and develop practical solutions.
        </p>
        <a href="#">Read More</a>
    </div>

    <div class="content">
        <h1>Work<br />Stress</h1>
        <p>
            A counsellor can help you understand why you feel stressed and find
            strategies that can help you learn how to cope with stress. “Talking
            to a counsellor helps us go back to basics about how we are feeling
            when we're stressed, and why.
        </p>
        <a href="#">Read More</a>
    </div>

    <div class="media-icons">
        <a href="https://www.facebook.com/21stgenerationMw?_rdr"> <i class="fab fa-facebook"></i></a>
        <a href="https://www.instagram.com/21st_gen_/"> <i class="fab fa-instagram"></i></a>
        <a href="https://x.com/21st_Gen_"> <i class="fab fa-twitter"></i></a>
        <a href="https://www.linkedin.com/authwall?trk=gf&trkInfo=AQEAeskq1NjPmAAAAZXS9Glg94difudHILF9vv031FZmhlWF5dD_7o09hDdh4KDa2AuryvKWsKSfbOt8y8wnP3tvkpEEzgyRMwsgXrhiI1NfcHyVrZOI1Oibdyoj8nkkmZzyr8s=&original_referer=https://linktr.ee/&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Ftwenty-first-generation-00ab30305%3Futm_source%3Dshare%26utm_campaign%3Dshare_via%26utm_content%3Dprofile%26utm_medium%3Dandroid_app"> <i class="fab fa-linkedin"></i></a>
        <a href="https://www.tiktok.com/@21st_gen_"> <i class="fab fa-tiktok"></i></a>
    </div>
    <div class="slider-navigation">
        <div class="nav-btn active"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
    </div>
</section>
<!-- About Section -->
<section class="py-20 bg-white dark:bg-gray-900" id="about">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center" data-aos="fade-up">
            <div class="relative">
                <div class="w-full h-96 bg-gradient-to-br from-primary to-secondary rounded-2xl overflow-hidden shadow-2xl">
                    <img alt="Therapist consulting with client" class="w-full h-full object-cover object-center" src="https://images.pexels.com/photos/4101143/pexels-photo-4101143.jpeg?auto=compress&cs=tinysrgb&w=600" />
                </div>
                <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-primary-heart rounded-full flex items-center justify-center shadow-xl">
                    <i class="fas fa-heart text-white text-4xl no-green"></i>
                </div>
            </div>
            <div>
                <h2 class="text-3xl md:text-4xl font-display font-bold mb-6 gradient-text">About Our Practice</h2>
                <p class="text-lg mb-6">
                    Mind & Wellness is dedicated to providing compassionate mental health services that empower individuals to overcome challenges and achieve emotional well-being. Our team of licensed therapists brings years of experience and specialized training to support your unique journey.
                </p>
                <p class="text-lg mb-8">
                    We believe in a holistic approach to mental health that addresses the mind, body, and spirit. Our evidence-based practices are tailored to meet your specific needs and goals, providing you with the tools to create lasting positive change in your life.
                </p>
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">
                        <h3 class="font-bold text-primary mb-2">Experience</h3>
                        <p class="text-sm">15+ Years • 5000+ Sessions • Specialized Training</p>
                    </div>
                    <div class="p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">
                        <h3 class="font-bold text-secondary mb-2">Approach</h3>
                        <p class="text-sm">Evidence-Based • Compassionate • Client-Centered</p>
                    </div>
                </div>
                <a class="inline-flex items-center text-primary font-medium hover:text-primary-hover transition-colors" href="#team">
                    Meet Our Team <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-gray-50 dark:bg-gray-800" id="services">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-display font-bold mb-4 gradient-text">Our Services</h2>
            <p class="text-lg max-w-2xl mx-auto">Comprehensive mental health support tailored to your unique needs</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow group" data-aos="zoom-in" data-aos-delay="0">
                <div class="relative overflow-hidden">
                    <img alt="Individual Therapy" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.pexels.com/photos/806427/pexels-photo-806427.jpeg?auto=compress&cs=tinysrgb&w=600" />
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="w-16 h-16 bg-primary rounded-full flex items-center justify-center hover:bg-primary-hover transition-colors">
                            <i class="fas fa-info text-white text-xl"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Individual Therapy</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">One-on-one sessions tailored to your personal needs and goals</p>
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <i class="fas fa-user text-primary"></i>
                            <i class="fas fa-brain text-primary"></i>
                            <i class="fas fa-heart text-primary"></i>
                        </div>
                        <a class="text-sm font-medium text-primary hover:text-primary-hover transition-colors" href="#">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow group" data-aos="zoom-in" data-aos-delay="100">
                <div class="relative overflow-hidden">
                    <img alt="Couples Therapy" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.pexels.com/photos/2821220/pexels-photo-2821220.jpeg?auto=compress&cs=tinysrgb&w=600" />
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="w-16 h-16 bg-primary rounded-full flex items-center justify-center hover:bg-primary-hover transition-colors">
                            <i class="fas fa-info text-white text-xl"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Couples & Marriage Counseling</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Strengthen your relationship and improve communication</p>
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <i class="fas fa-users text-primary"></i>
                            <i class="fas fa-comments text-primary"></i>
                            <i class="fas fa-hand-holding-heart text-primary"></i>
                        </div>
                        <a class="text-sm font-medium text-primary hover:text-primary-hover transition-colors" href="#">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow group" data-aos="zoom-in" data-aos-delay="200">
                <div class="relative overflow-hidden">
                    <img alt="Group Therapy" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.pexels.com/photos/7006256/pexels-photo-7006256.jpeg?auto=compress&cs=tinysrgb&w=600" />
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="w-16 h-16 bg-primary rounded-full flex items-center justify-center hover:bg-primary-hover transition-colors">
                            <i class="fas fa-info text-white text-xl"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Group Therapy</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Connect with others and grow through shared experiences</p>
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <i class="fas fa-user-friends text-primary"></i>
                            <i class="fas fa-hands-helping text-primary"></i>
                            <i class="fas fa-users text-primary"></i>
                        </div>
                        <a class="text-sm font-medium text-primary hover:text-primary-hover transition-colors" href="#">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16 text-center">
            <a class="inline-flex items-center px-6 py-3 border border-primary text-primary dark:text-white rounded-full font-medium hover:bg-primary hover:text-white transition-colors" href="#">
                View All Services <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Resources Section -->
<section class="py-20 bg-white dark:bg-gray-900" id="resources">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-display font-bold mb-4 gradient-text">Mental Health Resources</h2>
            <p class="text-lg max-w-2xl mx-auto">Educational materials and self-help tools to support your wellbeing</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="relative group overflow-hidden rounded-lg" data-aos="fade-up" data-aos-delay="0">
                <img alt="Anxiety Management" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.pexels.com/photos/4483102/pexels-photo-4483102.jpeg?auto=compress&cs=tinysrgb&w=600" />
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold mb-2">Anxiety Management</h3>
                        <p class="text-sm">Techniques for calming your mind</p>
                    </div>
                </div>
            </div>
            <div class="relative group overflow-hidden rounded-lg" data-aos="fade-up" data-aos-delay="50">
                <img alt="Depression Resources" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.pexels.com/photos/7004950/pexels-photo-7004950.jpeg?auto=compress&cs=tinysrgb&w=600" />
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold mb-2">Depression Resources</h3>
                        <p class="text-sm">Finding hope and healing</p>
                    </div>
                </div>
            </div>
            <div class="relative group overflow-hidden rounded-lg" data-aos="fade-up" data-aos-delay="100">
                <img alt="Mindfulness Practices" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.pexels.com/photos/159211/headache-pain-pills-medication-159211.jpeg?auto=compress&cs=tinysrgb&w=600" />
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold mb-2">Mindfulness Practices</h3>
                        <p class="text-sm">Living in the present moment</p>
                    </div>
                </div>
            </div>
            <div class="relative group overflow-hidden rounded-lg" data-aos="fade-up" data-aos-delay="150">
                <img alt="Stress Reduction" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.pexels.com/photos/6936081/pexels-photo-6936081.jpeg?auto=compress&cs=tinysrgb&w=600" />
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold mb-2">Stress Reduction</h3>
                        <p class="text-sm">Methods to relieve daily tension</p>
                    </div>
                </div>
            </div>
            <div class="relative group overflow-hidden rounded-lg" data-aos="fade-up" data-aos-delay="200">
                <img alt="Self-Care Guides" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.pexels.com/photos/7005332/pexels-photo-7005332.jpeg?auto=compress&cs=tinysrgb&w=600" />
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold mb-2">Self-Care Guides</h3>
                        <p class="text-sm">Prioritizing your wellbeing</p>
                    </div>
                </div>
            </div>
            <div class="relative group overflow-hidden rounded-lg" data-aos="fade-up" data-aos-delay="250">
                <img alt="Relationship Building" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.pexels.com/photos/8378728/pexels-photo-8378728.jpeg?auto=compress&cs=tinysrgb&w=600" />
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold mb-2">Relationship Building</h3>
                        <p class="text-sm">Creating healthy connections</p>
                    </div>
                </div>
            </div>
            <div class="relative group overflow-hidden rounded-lg" data-aos="fade-up" data-aos-delay="300">
                <img alt="Trauma Recovery" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.pexels.com/photos/32240617/pexels-photo-32240617/free-photo-of-inspirational-text-on-pink-watercolor-background.jpeg?auto=compress&cs=tinysrgb&w=600" />
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold mb-2">Trauma Recovery</h3>
                        <p class="text-sm">Pathways to healing past wounds</p>
                    </div>
                </div>
            </div>
            <div class="relative group overflow-hidden rounded-lg" data-aos="fade-up" data-aos-delay="350">
                <img alt="Crisis Support" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.pexels.com/photos/3958406/pexels-photo-3958406.jpeg?auto=compress&cs=tinysrgb&w=600s" />
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold mb-2">Crisis Support</h3>
                        <p class="text-sm">Help when you need it most</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-12 text-center">
            <a class="inline-flex items-center text-primary font-medium hover:text-primary-hover transition-colors" href="#">
                Access More Resources <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-16 bg-gradient-to-r from-primary to-secondary text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-display font-bold mb-4">Stay Connected</h2>
        <p class="text-lg mb-8 max-w-2xl mx-auto">Subscribe to our newsletter for mental health tips, resources, and updates on our services</p>
        <form class="max-w-md mx-auto flex">
            <input class="flex-grow px-4 py-3 rounded-l-lg focus:outline-none text-gray-900" placeholder="Your email address" type="email" />
            <button class="px-6 py-3 bg-white text-primary font-medium rounded-r-lg hover:bg-gray-100 transition-colors" type="submit">
                Subscribe
            </button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-400 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-white text-lg font-medium mb-4">Mind & Wellness</h3>
                <p class="mb-4">Professional Mental Health Services</p>
                <div class="flex space-x-4 justify-content-center">
                    <a class="hover:text-white transition-colors" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="hover:text-white transition-colors" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="hover:text-white transition-colors" href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="hover:text-white transition-colors" href="#">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a class="hover:text-white transition-colors" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-white text-lg font-medium mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a class="hover:text-white transition-colors" href="#">Home</a></li>
                    <li><a class="hover:text-white transition-colors" href="#about">About Us</a></li>
                    <li><a class="hover:text-white transition-colors" href="#services">Services</a></li>
                    <li><a class="hover:text-white transition-colors" href="#resources">Resources</a></li>
                    <li><a class="hover:text-white transition-colors" href="#contact">Contact</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white text-lg font-medium mb-4">Our Services</h3>
                <ul class="space-y-2">
                    <li><a class="hover:text-white transition-colors" href="#">Individual Therapy</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Couples Counseling</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Family Therapy</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Group Sessions</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white text-lg font-medium mb-4">Legal</h3>
                <ul class="space-y-2">
                    <li><a class="hover:text-white transition-colors" href="#">Privacy Policy</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Terms of Service</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">HIPAA Compliance</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-12 pt-8 text-center">
            <p>© 2025 Youth Minds Connect. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- AOS Animation JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    // Initialize AOS
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            once: true,
        });

        // Video slider functionality
        const videos = document.querySelectorAll('.video-slide');
        const contents = document.querySelectorAll('.content');
        const navBtns = document.querySelectorAll('.nav-btn');
        let currentSlide = 0;

        // Function to update the active slide
        function updateSlide(index) {
            // Remove active class from all videos, contents and nav buttons
            videos.forEach(video => video.classList.remove('active'));
            contents.forEach(content => content.classList.remove('active'));
            navBtns.forEach(btn => btn.classList.remove('active'));

            // Add active class to current video, content and nav button
            videos[index].classList.add('active');
            contents[index].classList.add('active');
            navBtns[index].classList.add('active');

            currentSlide = index;
        }

        // Add click event listeners to navigation buttons
        navBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                updateSlide(index);
            });
        });

        // Auto play slider
        function autoPlaySlider() {
            const nextSlide = (currentSlide + 1) % videos.length;
            updateSlide(nextSlide);
        }

        // Start auto play
        const sliderInterval = setInterval(autoPlaySlider, 5000);

        // Stop auto play on hover
        const homeSection = document.querySelector('.home');
        if (homeSection) {
            homeSection.addEventListener('mouseenter', () => {
                clearInterval(sliderInterval);
            });

            homeSection.addEventListener('mouseleave', () => {
                clearInterval(sliderInterval);
                setInterval(autoPlaySlider, 5000);
            });
        }

        // Dark mode toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        if (darkModeToggle) {
            darkModeToggle.addEventListener('click', () => {
                document.documentElement.classList.toggle('dark');

                // Store preference in localStorage
                if (document.documentElement.classList.contains('dark')) {
                    localStorage.setItem('darkMode', 'enabled');
                } else {
                    localStorage.setItem('darkMode', 'disabled');
                }
            });

            // Check for saved preference
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.documentElement.classList.add('dark');
            }
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Adjust for header height
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>
@endsection
@section('stlyes')

@endsection