<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HotelBooking - Experience Luxury</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        /* Custom styles to override/extend Tailwind and add animations */
        body {
            font-family: "Inter", sans-serif;
            margin: 0;
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .feature-icon {
            animation: float 3s ease-in-out infinite;
        }

        .hotel-card {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
            /* Apply rounded corners to all elements */
            border-radius: 0.5rem;
            /* Equivalent to rounded-lg */
        }

        .hotel-card:hover {
            animation: pulse 0.3s ease-in-out;
        }

        .testimonial-card {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            border-radius: 1rem;
            /* Equivalent to rounded-2xl */
        }

        /* Responsive adjustments for booking form inputs */
        .booking-form-input {
            width: 100%;
            padding: 0.75rem;
            /* p-3 */
            border: 1px solid #d1d5db;
            /* border */
            border-radius: 0.25rem;
            /* rounded */
        }

        /* Ensure all buttons have rounded corners */
        button,
        .btn {
            border-radius: 0.25rem;
            /* Default rounded */
        }

        /* Specific button styles for hover effects */
        .hover\\:bg-blue-50:hover {
            background-color: #eff6ff;
            /* blue-50 */
        }

        .hover\\:bg-blue-700:hover {
            background-color: #1d4ed8;
            /* blue-700 */
        }

        .hover\\:scale-\\[1\\.02\\]:hover {
            transform: scale(1.02);
        }

        .hover\\:-translate-y-2:hover {
            transform: translateY(-0.5rem);
        }

        .hover\\:scale-105:hover {
            transform: scale(1.05);
        }

        .hover\\:underline:hover {
            text-decoration: underline;
        }

        .hover\\:text-blue-400:hover {
            color: #60a5fa;
            /* blue-400 */
        }

        .hover\\:text-pink-400:hover {
            color: #f472b6;
            /* pink-400 */
        }

        .hover\\:text-white:hover {
            color: #ffffff;
        }

        .hover\\:bg-gray-600:hover {
            background-color: #4b5563;
            /* gray-600 */
        }
    </style>
</head>

<body>
    <div class="min-h-screen bg-white overflow-hidden">
        <header class="bg-white shadow-sm">
            <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
                <div class="text-2xl font-playfair text-blue-600">HotelBooking</div>
                <div class="flex gap-4">
                    @auth
                        <a href="{{auth()->user()->role->url}}"
                            class="px-6 py-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition">
                            Home
                        </a>
                        <a href="{{route('user.browse')}}"
                            class="px-6 py-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition">
                            Browse
                        </a>
                    @else
                        <a href="/login"
                            class="px-6 py-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition">
                            Login
                        </a>
                        <a href="{{route('register')}}"
                            class="px-6 py-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition">
                            Sign Up
                        </a>
                        <a href="{{route('user.browse')}}"
                            class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Browse
                        </a>
                    @endauth
                </div>
            </div>
        </header>

        <div class="relative h-[600px] bg-cover bg-center hero-section" style="
          background-image: url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
          transition: background-position-y 0.3s ease-out;
        ">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <h1 class="text-5xl font-playfair mb-4">
                        Experience Luxury at Its Finest
                    </h1>
                    <p class="text-xl mb-8">Best rates guaranteed. Hassle-free booking.</p>
                </div>
            </div>
        </div>

        <div class="relative bg-[#f3f4f6] py-16 skew-y-3">
            <div class="max-w-6xl mx-auto px-4 -skew-y-3">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <i class="fas fa-wifi text-4xl text-blue-600 mb-4 feature-icon"></i>
                        <h3 class="text-xl font-semibold">Free WiFi</h3>
                    </div>
                    <div>
                        <i class="fas fa-swimming-pool text-4xl text-blue-600 mb-4 feature-icon"></i>
                        <h3 class="text-xl font-semibold">Pool Access</h3>
                    </div>
                    <div>
                        <i class="fas fa-concierge-bell text-4xl text-blue-600 mb-4 feature-icon"></i>
                        <h3 class="text-xl font-semibold">Room Service</h3>
                    </div>
                    <div>
                        <i class="fas fa-parking text-4xl text-blue-600 mb-4 feature-icon"></i>
                        <h3 class="text-xl font-semibold">Free Parking</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative bg-white">
            <div class="absolute top-0 left-0 w-full overflow-hidden rotate-180">
                <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                        class="fill-[#f3f4f6]"></path>
                </svg>
            </div>

            <div id="hotel-results-section" class="max-w-6xl mx-auto py-20 px-4">
                <div id="loading-spinner" class="text-center py-8" style="display: none">
                    <i class="fas fa-spinner fa-spin text-4xl text-blue-600"></i>
                </div>
                <div id="hotels-grid" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                </div>
            </div>
        </div>

        <div class="relative py-24 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-purple-700"></div>
            <div class="absolute inset-0">
                <div
                    class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb')] bg-cover bg-center opacity-10">
                </div>
            </div>

            <div class="relative max-w-6xl mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-playfair text-white mb-4">
                        Guest Experiences
                    </h2>
                    <p class="text-gray-200 text-lg">
                        Discover what our guests have to say about their stays
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="testimonial-card backdrop-blur-lg bg-white bg-opacity-10 rounded-2xl p-8 transform hover:-translate-y-2 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="Emma Thompson"
                                class="w-16 h-16 rounded-full object-cover border-2 border-white" />
                            <div class="ml-4">
                                <h3 class="text-white font-semibold">Emma Thompson</h3>
                                <p class="text-gray-300 text-sm">Business Traveler</p>
                            </div>
                        </div>
                        <div class="text-yellow-400 mb-4 flex">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <p class="text-gray-200 italic">
                            "The attention to detail and personalized service exceeded all
                            expectations. A truly luxurious experience."
                        </p>
                    </div>

                    <div
                        class="testimonial-card backdrop-blur-lg bg-white bg-opacity-10 rounded-2xl p-8 transform hover:-translate-y-2 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="Michael Chen"
                                class="w-16 h-16 rounded-full object-cover border-2 border-white" />
                            <div class="ml-4">
                                <h3 class="text-white font-semibold">Michael Chen</h3>
                                <p class="text-gray-300 text-sm">Family Vacation</p>
                            </div>
                        </div>
                        <div class="text-yellow-400 mb-4 flex">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <p class="text-gray-200 italic">
                            "Perfect for our family vacation. The staff went above and beyond
                            to make our stay memorable."
                        </p>
                    </div>

                    <div
                        class="testimonial-card backdrop-blur-lg bg-white bg-opacity-10 rounded-2xl p-8 transform hover:-translate-y-2 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80"
                                alt="Sofia Rodriguez"
                                class="w-16 h-16 rounded-full object-cover border-2 border-white" />
                            <div class="ml-4">
                                <h3 class="text-white font-semibold">Sofia Rodriguez</h3>
                                <p class="text-gray-300 text-sm">Honeymoon Stay</p>
                            </div>
                        </div>
                        <div class="text-yellow-400 mb-4 flex">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <p class="text-gray-200 italic">
                            "An unforgettable honeymoon experience. The romantic touches made
                            it extra special."
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative py-24 bg-gray-50">
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-500 rounded-full opacity-5"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-purple-500 rounded-full opacity-5"></div>
            </div>

            <div class="relative max-w-6xl mx-auto px-4">
                <div class="text-center mb-16">
                    <span class="text-blue-600 text-sm font-semibold tracking-wider uppercase mb-2 block">
                        Limited Time Offers
                    </span>
                    <h2 class="text-4xl font-playfair text-gray-900 mb-4">
                        Exclusive Deals Just For You
                    </h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                        Subscribe to our newsletter and unlock premium offers, early
                        booking advantages, and seasonal discounts.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-[1.02] transition-transform duration-300">
                        <div class="relative h-48">
                            <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d" alt="Luxury Suite"
                                class="w-full h-full object-cover" />
                            <div
                                class="absolute top-4 right-4 bg-red-500 text-white px-4 py-1 rounded-full text-sm font-semibold">
                                Save 25%
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Luxury Suite Package</h3>
                            <p class="text-gray-600 mb-4">
                                Includes breakfast, spa access, and airport transfer
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-blue-600">$299</span>
                                <span class="text-gray-400 line-through">$399</span>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-[1.02] transition-transform duration-300">
                        <div class="relative h-48">
                            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b"
                                alt="Weekend Getaway" class="w-full h-full object-cover" />
                            <div
                                class="absolute top-4 right-4 bg-green-500 text-white px-4 py-1 rounded-full text-sm font-semibold">
                                Save 20%
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Weekend Getaway</h3>
                            <p class="text-gray-600 mb-4">
                                2 nights stay with dinner and spa treatment
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-blue-600">$499</span>
                                <span class="text-gray-400 line-through">$625</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="max-w-3xl mx-auto">
                    <div class="bg-white rounded-2xl shadow-xl p-8 backdrop-blur-lg">
                        <div class="text-center mb-6">
                            <h3 class="text-2xl font-semibold mb-2">
                                Get Premium Offers Directly to Your Inbox
                            </h3>
                            <p class="text-gray-600">
                                Be the first to know about our exclusive deals and special
                                rates.
                            </p>
                        </div>
                        <div class="flex flex-col md:flex-row gap-4">
                            <input type="email" placeholder="Enter your email address"
                                class="flex-1 px-6 py-4 rounded-xl border border-gray-200 focus:outline-none focus:border-blue-500 transition-colors" />
                            <button
                                class="bg-blue-600 text-white px-8 py-4 rounded-xl hover:bg-blue-700 transition-colors duration-300 flex items-center justify-center gap-2">
                                <span>Subscribe Now</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                        <p class="text-gray-500 text-sm text-center mt-4">
                            By subscribing, you agree to our Privacy Policy and Terms of
                            Service
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative py-24 bg-gradient-to-br from-gray-900 to-blue-900 overflow-hidden">
            <div class="absolute inset-0">
                <div
                    class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb')] bg-cover bg-center opacity-5">
                </div>
                <div
                    class="absolute -top-48 -right-48 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20">
                </div>
                <div
                    class="absolute -bottom-48 -left-48 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20">
                </div>
            </div>

            <div class="relative max-w-6xl mx-auto px-4">
                <div class="text-center mb-16">
                    <span class="text-blue-400 text-sm font-semibold tracking-wider uppercase mb-2 block">
                        Testimonials
                    </span>
                    <h2 class="text-4xl font-playfair text-white mb-4">
                        What Our Guests Say
                    </h2>
                    <p class="text-gray-300 text-lg max-w-2xl mx-auto">
                        Real experiences from our valued guests around the world
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-8 transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e" alt="James Wilson"
                                class="w-16 h-16 rounded-full object-cover border-2 border-blue-400" />
                            <div class="ml-4">
                                <h3 class="text-white font-semibold">James Wilson</h3>
                                <p class="text-blue-300 text-sm">New York, USA</p>
                            </div>
                        </div>
                        <div class="text-yellow-400 mb-4 flex">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <p class="text-gray-200 italic mb-4">
                            "The attention to detail in every aspect of our stay was
                            impeccable. A truly five-star experience."
                        </p>
                        <p class="text-blue-300 text-sm">March 2025</p>
                    </div>

                    <div
                        class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-8 transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80" alt="Emily Chen"
                                class="w-16 h-16 rounded-full object-cover border-2 border-blue-400" />
                            <div class="ml-4">
                                <h3 class="text-white font-semibold">Emily Chen</h3>
                                <p class="text-blue-300 text-sm">Singapore</p>
                            </div>
                        </div>
                        <div class="text-yellow-400 mb-4 flex">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <p class="text-gray-200 italic mb-4">
                            "From the moment we arrived, we felt like royalty. The spa
                            services were particularly outstanding."
                        </p>
                        <p class="text-blue-300 text-sm">February 2025</p>
                    </div>

                    <div
                        class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-8 transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d"
                                alt="Marcus Thompson"
                                class="w-16 h-16 rounded-full object-cover border-2 border-blue-400" />
                            <div class="ml-4">
                                <h3 class="text-white font-semibold">Marcus Thompson</h3>
                                <p class="text-blue-300 text-sm">London, UK</p>
                            </div>
                        </div>
                        <div class="text-yellow-400 mb-4 flex">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <p class="text-gray-200 italic mb-4">
                            "Exceptional service, beautiful rooms, and the restaurant
                            exceeded all expectations."
                        </p>
                        <p class="text-blue-300 text-sm">January 2025</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative py-24 bg-gray-50 overflow-hidden">
            <div class="absolute inset-0">
                <div class="absolute top-0 left-0 w-full h-40 bg-gradient-to-b from-gray-100 to-transparent"></div>
                <div class="absolute bottom-0 left-0 w-full h-40 bg-gradient-to-t from-gray-100 to-transparent"></div>
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-100 rounded-full opacity-50 blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-purple-100 rounded-full opacity-50 blur-3xl">
                </div>
            </div>

            <div class="relative max-w-6xl mx-auto px-4">
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="relative h-64 md:h-full">
                            <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d"
                                alt="Luxury Hotel Room" class="absolute inset-0 w-full h-full object-cover" />
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-transparent flex items-center">
                                <div class="p-8">
                                    <h3 class="text-3xl font-playfair text-white mb-4">
                                        Member Exclusive
                                    </h3>
                                    <p class="text-gray-200 text-lg">
                                        Sign up now and get up to 25% off your next luxury stay
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="p-8 md:p-12">
                            <div class="mb-8">
                                <h3 class="text-2xl font-semibold mb-2">
                                    Get Exclusive Offers
                                </h3>
                                <p class="text-gray-600">
                                    Join our newsletter and discover new luxury destinations
                                </p>
                            </div>

                            <form class="space-y-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Full Name
                                    </label>
                                    <input type="text"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                                        placeholder="Enter your name" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Email Address
                                    </label>
                                    <input type="email"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                                        placeholder="Enter your email" />
                                </div>
                                <div>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded text-blue-600" />
                                        <span class="ml-2 text-sm text-gray-600">
                                            I agree to receive promotional emails
                                        </span>
                                    </label>
                                </div>
                                <button
                                    class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700 transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-2">
                                    <span>Subscribe Now</span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </form>

                            <p class="mt-6 text-sm text-gray-500 text-center">
                                By subscribing, you agree to our
                                <a href="#" class="text-blue-600 hover:underline">
                                    Privacy Policy
                                </a>
                                and
                                <a href="#" class="text-blue-600 hover:underline">
                                    Terms of Service
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="relative">
            <div class="absolute top-0 left-0 w-full overflow-hidden">
                <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        class="fill-gray-100"></path>
                </svg>
            </div>

            <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-black pt-20 pb-10">
                <div class="max-w-6xl mx-auto px-4">
                    <div
                        class="flex flex-col md:flex-row justify-between items-center mb-12 border-b border-gray-700 pb-8">
                        <div class="text-3xl font-playfair text-white mb-6 md:mb-0">
                            HotelBooking
                        </div>
                        <div class="flex space-x-6">
                            <a href="#" class="transform hover:scale-110 transition-transform duration-200">
                                <i class="fab fa-facebook text-2xl text-gray-400 hover:text-blue-400"></i>
                            </a>
                            <a href="#" class="transform hover:scale-110 transition-transform duration-200">
                                <i class="fab fa-twitter text-2xl text-gray-400 hover:text-blue-400"></i>
                            </a>
                            <a href="#" class="transform hover:scale-110 transition-transform duration-200">
                                <i class="fab fa-instagram text-2xl text-gray-400 hover:text-pink-400"></i>
                            </a>
                            <a href="#" class="transform hover:scale-110 transition-transform duration-200">
                                <i class="fab fa-linkedin text-2xl text-gray-400 hover:text-blue-400"></i>
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-6">About Us</h3>
                            <p class="text-gray-400 leading-relaxed">
                                Discover luxury and comfort with HotelBooking. We've been
                                creating exceptional stays since 2010, with a commitment to
                                outstanding service and unforgettable experiences.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-white mb-6">
                                Quick Links
                            </h3>
                            <ul class="space-y-3">
                                <li>
                                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                                        Find Hotels
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                                        Special Offers
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                                        Gift Cards
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                                        Rewards Program
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-white mb-6">Contact</h3>
                            <ul class="space-y-3">
                                <li class="flex items-center text-gray-400">
                                    <i class="fas fa-map-marker-alt w-6"></i>
                                    <span>123 Luxury Ave, Suite 4B</span>
                                </li>
                                <li class="flex items-center text-gray-400">
                                    <i class="fas fa-phone w-6"></i>
                                    <span>+1 (555) 123-4567</span>
                                </li>
                                <li class="flex items-center text-gray-400">
                                    <i class="fas fa-envelope w-6"></i>
                                    <span>info@hotelbooking.com</span>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-white mb-6">Newsletter</h3>
                            <p class="text-gray-400 mb-4">
                                Subscribe to get special offers and updates.
                            </p>
                            <div class="flex">
                                <input type="email" placeholder="Your email"
                                    class="bg-gray-700 text-white px-4 py-2 rounded-l outline-none flex-1 focus:bg-gray-600 transition-colors duration-200" />
                                <button
                                    class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700 transition-colors duration-200">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-700 pt-8">
                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <div class="text-gray-400 text-sm mb-4 md:mb-0">
                                © 2025 HotelBooking. All rights reserved.
                            </div>
                            <div class="flex flex-wrap justify-center gap-4 text-sm">
                                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                                    Privacy Policy
                                </a>
                                <span class="text-gray-600">•</span>
                                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                                    Terms of Service
                                </a>
                                <span class="text-gray-600">•</span>
                                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                                    Cookie Policy
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Global state variables
        let selectedDates = {
            checkIn: "",
            checkOut: "",
        };
        let destination = "";
        let suggestions = [];
        let loading = false;
        let hotels = [];

        // DOM elements
        const destinationInput = document.getElementById("destination-input");
        const suggestionsContainer = document.getElementById(
            "suggestions-container",
        );
        const checkInDateInput = document.getElementById("checkin-date");
        const checkOutDateInput = document.getElementById("checkout-date");
        const searchHotelsBtn = document.getElementById("search-hotels-btn");
        const loadingSpinner = document.getElementById("loading-spinner");
        const hotelsGrid = document.getElementById("hotels-grid");

        /**
         * Handles the destination search with autocomplete by fetching suggestions
         * from the Google Place Autocomplete API.
         * @param {string} input - The current input value from the destination field.
         */
        const handleDestinationSearch = async (input) => {
            if (!input) {
                suggestions = [];
                suggestionsContainer.classList.add("hidden");
                suggestionsContainer.innerHTML = "";
                return;
            }

            try {
                const response = await fetch(
                    `/integrations/google-place-autocomplete/autocomplete/json?input=${encodeURIComponent(input)}&radius=500`,
                );
                if (!response.ok) throw new Error("Failed to fetch suggestions");
                const data = await response.json();
                suggestions = data.predictions;
                renderSuggestions();
            } catch (error) {
                console.error("Error fetching suggestions:", error);
                suggestions = [];
                suggestionsContainer.classList.add("hidden");
                suggestionsContainer.innerHTML = "";
            }
        };

        /**
         * Renders the autocomplete suggestions in the suggestions container.
         */
        const renderSuggestions = () => {
            suggestionsContainer.innerHTML = "";
            if (suggestions.length > 0) {
                suggestionsContainer.classList.remove("hidden");
                suggestions.forEach((suggestion) => {
                    const suggestionDiv = document.createElement("div");
                    suggestionDiv.className =
                        "p-2 hover:bg-gray-100 cursor-pointer rounded-md"; /* Added rounded-md */
                    suggestionDiv.textContent = suggestion.description;
                    suggestionDiv.addEventListener("click", () => {
                        destination = suggestion.description;
                        destinationInput.value = destination;
                        suggestions = [];
                        suggestionsContainer.classList.add("hidden");
                        suggestionsContainer.innerHTML = "";
                        searchHotels(destination); // Automatically search when a suggestion is clicked
                    });
                    suggestionsContainer.appendChild(suggestionDiv);
                });
            } else {
                suggestionsContainer.classList.add("hidden");
            }
        };

        /**
         * Searches for hotels based on the provided location.
         * Displays a loading spinner and then renders the hotel results.
         * @param {string} location - The destination to search hotels for.
         */
        const searchHotels = async (location) => {
            loading = true;
            loadingSpinner.style.display = "block";
            hotelsGrid.innerHTML = ""; // Clear previous results
            hotelsGrid.classList.add("hidden"); // Hide grid while loading

            try {
                const response = await fetch(
                    `/integrations/local-business-data/search?query=Hotels in ${encodeURIComponent(location)}`,
                );
                if (!response.ok) throw new Error("Failed to fetch hotels");
                const data = await response.json();
                hotels = data.data;
                renderHotels();
            } catch (error) {
                console.error("Error fetching hotels:", error);
                hotels = []; // Clear hotels on error
                hotelsGrid.innerHTML =
                    '<p class="text-center text-gray-600">Failed to load hotels. Please try again.</p>';
            } finally {
                loading = false;
                loadingSpinner.style.display = "none";
                hotelsGrid.classList.remove("hidden");
            }
        };

        /**
         * Renders the fetched hotel data into the hotels grid.
         */
        const renderHotels = () => {
            hotelsGrid.innerHTML = ""; // Clear existing hotels
            if (hotels.length === 0) {
                hotelsGrid.innerHTML =
                    '<p class="text-center text-gray-600 col-span-full">No hotels found for this destination.</p>';
                return;
            }

            hotels.forEach((hotel, index) => {
                const hotelCard = document.createElement("div");
                hotelCard.className =
                    "hotel-card border rounded-lg overflow-hidden shadow-lg transform hover:pulse"; /* Added hover:pulse */
                hotelCard.style.animationDelay = `${index * 0.1}s`;

                const imageUrl =
                    hotel.photos_sample && hotel.photos_sample[0]
                        ? hotel.photos_sample[0].photo_url
                        : `https://placehold.co/600x400/E0E0E0/333333?text=No+Image`; // Placeholder image

                hotelCard.innerHTML = `
            <img
              src="${imageUrl}"
              alt="${hotel.name}"
              class="w-full h-48 object-cover"
              onerror="this.onerror=null;this.src='https://placehold.co/600x400/E0E0E0/333333?text=Image+Not+Found';"
            />
            <div class="p-4">
              <h3 class="text-xl font-semibold mb-2">${hotel.name}</h3>
              <div class="flex items-center mb-2">
                <div class="text-yellow-400">
                  ${"★".repeat(Math.floor(hotel.rating))}
                  ${"☆".repeat(5 - Math.floor(hotel.rating))}
                </div>
                <span class="ml-2 text-gray-600">
                  (${hotel.review_count || 0} reviews)
                </span>
              </div>
              <p class="text-gray-600 mb-4">${hotel.address || "N/A"}</p>
              <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Book Now
              </button>
            </div>
          `;
                hotelsGrid.appendChild(hotelCard);
            });
        };

        // Event Listeners
        document.addEventListener("DOMContentLoaded", () => {
            // Parallax scroll effect
            window.addEventListener("scroll", () => {
                const scrolled = window.scrollY;
                const heroSection = document.querySelector(".hero-section");
                if (heroSection) {
                    heroSection.style.backgroundPositionY = `${scrolled * 0.5}px`;
                }
            });

            // Destination input with autocomplete
            destinationInput.addEventListener("input", (e) => {
                destination = e.target.value;
                handleDestinationSearch(destination);
            });

            // Close suggestions if clicked outside
            document.addEventListener("click", (e) => {
                if (
                    !suggestionsContainer.contains(e.target) &&
                    e.target !== destinationInput
                ) {
                    suggestionsContainer.classList.add("hidden");
                }
            });

            // Date input handlers
            checkInDateInput.addEventListener("change", (e) => {
                selectedDates.checkIn = e.target.value;
            });

            checkOutDateInput.addEventListener("change", (e) => {
                selectedDates.checkOut = e.target.value;
            });

            // Search Hotels button click
            searchHotelsBtn.addEventListener("click", () => {
                if (destination) {
                    searchHotels(destination);
                } else {
                    // Implement a custom message box instead of alert
                    console.log("Please enter a destination to search for hotels.");
                    // Example of a simple message box (requires CSS for styling)
                    // You would typically create a modal or a toast notification for this.
                    const messageBox = document.createElement('div');
                    messageBox.textContent = "Please enter a destination to search for hotels.";
                    messageBox.style.cssText = `
                position: fixed;
                top: 20px;
                left: 50%;
                transform: translateX(-50%);
                background-color: #f8d7da;
                color: #721c24;
                padding: 15px 20px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                z-index: 1000;
                opacity: 0;
                transition: opacity 0.3s ease-in-out;
            `;
                    document.body.appendChild(messageBox);
                    setTimeout(() => {
                        messageBox.style.opacity = 1;
                    }, 10);
                    setTimeout(() => {
                        messageBox.style.opacity = 0;
                        messageBox.addEventListener('transitionend', () => messageBox.remove());
                    }, 3000);
                }
            });
        });
    </script>
</body>

</html>