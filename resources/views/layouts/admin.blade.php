<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

    @stack('styles')
</head>

<body>




    <div class="flex h-screen bg-[#f8fafc]">
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden hidden"></div>

        <div id="sidebar"
            class="fixed md:relative z-30 h-full transition-all duration-300 ease-in-out transform -translate-x-full md:translate-x-0 w-64 bg-[#1e293b] text-white shadow-xl">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-between p-6 border-b border-gray-700">
                    <h1
                        class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">
                        Admin Panel
                    </h1>
                    <button id="close-sidebar-btn" class="md:hidden text-gray-300 hover:text-white">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <nav class="flex-1 p-4 space-y-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-4 py-3 text-gray-300 hover:text-white hover:bg-[#2d3a4f] rounded-lg transition-all duration-200">
                        <i class="fas fa-home w-6"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.rooms') }}"
                        class="flex items-center px-4 py-3 text-gray-300 hover:text-white hover:bg-[#2d3a4f] rounded-lg transition-all duration-200">
                        <i class="fas fa-bed w-6"></i> {{-- Room icon --}}
                        <span>Rooms</span>
                    </a>
                    <a href="{{ route('admin.bookings.index') }}"
                        class="flex items-center px-4 py-3 text-gray-300 hover:text-white hover:bg-[#2d3a4f] rounded-lg transition-all duration-200">
                        <i class="fas fa-check-circle w-6"></i>
                        <span>Approved Bookings</span>
                    </a>

                    <a href="{{ route('admin.bookings.pending') }}"
                        class="flex items-center px-4 py-3 text-gray-300 hover:text-white hover:bg-[#2d3a4f] rounded-lg transition-all duration-200">
                        <i class="fas fa-hourglass-half w-6"></i>
                        <span>Pending Bookings</span>
                    </a>

                </nav>

                <div class="p-4 border-t border-gray-700">
                    <div class="flex items-center space-x-3 text-sm">
                        <div class="w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center">
                            <i class="fas fa-user text-gray-300"></i>
                        </div>
                        <div>
                            <p class="text-gray-300">Admin User</p>
                            <p class="text-gray-500 text-xs">admin@example.com</p>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <button id="open-sidebar-btn" class="text-gray-500 hover:text-gray-600 focus:outline-none">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800 hidden md:block">
                            Dashboard Overview
                        </h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i class="fas fa-bell text-xl"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i class="fas fa-search text-xl"></i>
                        </button>
                        <div class="h-8 w-[1px] bg-gray-200"></div>
                        <button class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                <i class="fas fa-user"></i>
                            </div>
                        </button>
                    </div>
                </div>
            </header>

            @hasSection('content')
                @yield('content')
            @endif
        </div>
    </div>



    @stack('scripts')
    <script src="{{asset('js/admin-rooms.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="{{asset('js/admin-sidebar.js')}}"></script>
    <script>
        // Customize Toastr to match your theme
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right", // Top-right position
            "timeOut": "5000", // 5 seconds timeout
            "extendedTimeOut": "1000", // 1 second after mouse hover
            "toastClass": "bg-gray-800 text-white shadow-lg rounded-lg", // Custom background and rounded corners
            "messageClass": "font-semibold text-sm", // Custom message font size and weight
            "closeClass": "text-gray-300 hover:text-white", // Close button color
        };

        // Display Toastr notifications if session has a message
        @if (session('message'))
            toastr.success("{{ session('message') }}", "Success");
        @elseif (session('error'))
            toastr.error("{{ session('error') }}", "Error");
        @endif

        @if (!empty($errors->all()))
            @foreach ($errors->all() as $error)
                toastr.error("{{$error}}", "Error");
            @endforeach
        @else

        @endif


    </script>
</body>

</html>