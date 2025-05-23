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
            <h2 class="mt-6 text-3xl font-bold text-white">Create Your Account</h2>
            <p class="mt-2 text-sm text-gray-300">
                Sign up to start your luxury experience
            </p>
        </div>

        <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-8 shadow-2xl">

            <form id="registration-form" class="space-y-6" method="POST" action="{{ route('register') }}">
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

                {{-- Full Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-200 mb-2">
                        Full Name
                    </label>
                    <input name="name" type="text" id="name" required value="{{ old('name') }}"
                        class="w-full px-4 py-3 rounded-xl bg-white bg-opacity-10 border @error('name') border-red-500 @else border-gray-300 @enderror border-opacity-20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Enter your full name" />
                    @error('name')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
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

                {{-- Password --}}
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

                {{-- Confirm Password --}}
                <div>
                    <label for="confirm-password" class="block text-sm font-medium text-gray-200 mb-2">
                        Confirm Password
                    </label>
                    <input name="password_confirmation" type="password" id="confirm-password" required
                        class="w-full px-4 py-3 rounded-xl bg-white bg-opacity-10 border border-gray-300 border-opacity-20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Confirm your password" />
                    {{-- No error block needed for password_confirmation as it's usually validated with password --}}
                </div>

                {{-- Submit Button --}}
                <button type="submit" id="submit-button"
                    class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700 transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-user-plus" id="button-icon"></i>
                    <span id="button-text">Register</span>
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
            Already have an account?
            <a href="{{route('login')}}" class="font-medium text-blue-300 hover:text-blue-200 transition-colors">
                Sign in here
            </a>
        </p>
    </div>
</div>
@endsection