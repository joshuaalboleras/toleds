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
    
    <style>
        /* Custom font import */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @stack('styles')
</head>
<body class="font-sans antialiased min-h-screen bg-[#f8f9fa]">

    <nav class="bg-[#1e2837] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-2">
                    <span class="text-[#4d7cfe] text-xl font-semibold">
                        Hotel 
                    </span>
                    <span class="text-[#a688fa] text-xl font-semibold">
                        De Kamagong
                    </span>
                </div>
                <div class="flex space-x-8">
                    <a href="{{route('user.browse')}}" class="text-gray-300 hover:text-white">
                        Rooms
                    </a>
                    <a href="{{route('user.dashboard')}}" class="text-gray-300 hover:text-white">
                        Amenities
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white">
                        Contact
                    </a>
                    @auth
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="text-gray-300 hover:text-white">Logout</button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{route('login')}}">Login</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    

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
