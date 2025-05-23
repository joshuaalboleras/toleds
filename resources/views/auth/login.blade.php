@extends("layouts.auth")
@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 to-blue-900 flex items-center justify-center p-4">
    <div class="absolute inset-0 overflow-hidden">
        <div
            class="absolute -top-48 -right-48 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20">
        </div>
        <div
            class="absolute -bottom-48 -left-48 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20">
        </div>
        <div
            class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb')] bg-cover bg-center opacity-5">
        </div>
    </div>

    <div class="max-w-md w-full relative">
        <div class="text-center mb-8">
            <a href="/" class="text-3xl font-playfair text-white hover:text-blue-300 transition-colors">
                HotelBooking
            </a>
            <h2 class="mt-6 text-3xl font-bold text-white">Welcome Back</h2>
            <p class="mt-2 text-sm text-gray-300">Sign in to access your account</p>
        </div>

        <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-8 shadow-2xl">
            <form id="login-form" class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf

                {{-- Global error message block --}}
                @if($errors->any())
                    <div id="error-message"
                        class="bg-red-500 bg-opacity-20 backdrop-blur-lg text-white p-4 rounded-xl text-sm">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Email Field --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-200 mb-2">
                        Email Address
                    </label>
                    <input name="email" type="email" id="email" required value="{{ old('email') }}"
                        class="w-full px-4 py-3 rounded-xl bg-white bg-opacity-10 border @error('email') border-red-500 @else border-gray-300 @enderror border-opacity-20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Enter your email" />
                    @error('email')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password Field --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-200 mb-2">
                        Password
                    </label>
                    <input name="password" type="password" id="password" required
                        class="w-full px-4 py-3 rounded-xl bg-white bg-opacity-10 border @error('password') border-red-500 @else border-gray-300 @enderror border-opacity-20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Enter your password" />
                    @error('password')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember-me" name="remember"
                            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                        <label for="remember-me" class="ml-2 block text-sm text-gray-200">
                            Remember me
                        </label>
                    </div>
                    <a href="#" class="text-sm font-medium text-blue-300 hover:text-blue-200 transition-colors">
                        Forgot password?
                    </a>
                </div>

                {{-- Submit Button --}}
                <button type="submit" id="submit-button"
                    class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700 transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-sign-in-alt" id="button-icon"></i>
                    <span id="button-text">Sign In</span>
                </button>
            </form>


            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300 border-opacity-20"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-transparent text-gray-300">
                            Or continue with
                        </span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <button
                        class="flex items-center justify-center px-4 py-2 border border-gray-300 border-opacity-20 rounded-xl text-sm font-medium text-gray-200 bg-white bg-opacity-10 hover:bg-opacity-20 transition-all">
                        <i class="fab fa-google mr-2"></i>
                        Google
                    </button>
                    <button
                        class="flex items-center justify-center px-4 py-2 border border-gray-300 border-opacity-20 rounded-xl text-sm font-medium text-gray-200 bg-white bg-opacity-10 hover:bg-opacity-20 transition-all">
                        <i class="fab fa-facebook-f mr-2"></i>
                        Facebook
                    </button>
                </div>
            </div>
        </div>

        <p class="mt-8 text-center text-sm text-gray-300">
            Don't have an account?
            <a href="{{route('register')}}" class="font-medium text-blue-300 hover:text-blue-200 transition-colors">
                Sign up for free
            </a>
        </p>
    </div>
</div>
@endsection