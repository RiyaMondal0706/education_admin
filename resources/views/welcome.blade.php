<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduAdmin Pro - Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50 font-sans antialiased text-gray-800">

    <div class="flex min-h-screen">

        <!-- ========================================== -->
        <!-- 1. LEFT PANE: BRANDING & VISUALS (Desktop Only) -->
        <!-- ========================================== -->
        <div class="hidden lg:flex lg:w-1/2 bg-slate-900 justify-center items-center relative overflow-hidden p-12">
            <!-- Background Decorative Blobs -->
            <div
                class="absolute top-0 -left-4 w-72 h-72 bg-indigo-700 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob">
            </div>
            <div
                class="absolute bottom-0 right-4 w-72 h-72 bg-emerald-600 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000">
            </div>

            <div class="max-w-md w-full relative z-10 text-center lg:text-left">
                <!-- Logo -->
                <div class="flex items-center gap-3 mb-8 justify-center lg:justify-start">
                    <div class="bg-indigo-600 p-2.5 rounded-xl text-white shadow-lg shadow-indigo-600/30">
                        <i class="fa-solid fa-graduation-cap text-2xl"></i>
                    </div>
                    <span class="text-2xl font-bold tracking-wider text-white">EduAdmin <span
                            class="text-indigo-400">Pro</span></span>
                </div>

                <!-- Tagline -->
                <h1 class="text-4xl font-extrabold text-white tracking-tight leading-tight mb-4">
                    Manage your institution with ease.
                </h1>
                <p class="text-lg text-slate-400 mb-8">
                    An all-in-one portal designed for modern educators to streamline administration, tracking, and
                    student analytics.
                </p>

                <!-- Small feature snippet -->
                <div class="border-t border-slate-800 pt-8 mt-8 grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-white font-semibold text-2xl">99.9%</p>
                        <p class="text-sm text-slate-500">Uptime Guarantee</p>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-2xl">1,200+</p>
                        <p class="text-sm text-slate-500">Institutions Trust Us</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- 2. RIGHT PANE: FORM CONTAINER              -->
        <!-- ========================================== -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-6 sm:p-12 bg-white">
            <div class="w-full max-w-md space-y-8">

                <!-- Mobile Logo / Header -->
                <div class="text-center lg:text-left">
                    <div class="flex items-center gap-2 justify-center lg:justify-start lg:hidden mb-6">
                        <div class="bg-indigo-600 p-2 rounded-lg text-white">
                            <i class="fa-solid fa-graduation-cap text-lg"></i>
                        </div>
                        <span class="text-xl font-bold tracking-wider text-slate-900">EduAdmin</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-950 tracking-tight">Sign in to portal</h2>
                    <p class="text-sm text-gray-500 mt-2">Welcome back! Please enter your details.</p>
                </div>

                <!-- Form -->
                <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <i class="fa-regular fa-envelope"></i>
                            </span>
                            <input id="email" name="email" type="email" required autocomplete="email"
                                placeholder="admin@institution.com"
                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 bg-white placeholder-gray-400 transition-all">
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <a href="#"
                                class="text-xs font-semibold text-indigo-600 hover:text-indigo-500 transition-colors">Forgot
                                password?</a>
                        </div>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input id="password" name="password" type="password" required
                                autocomplete="current-password" placeholder="••••••••"
                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 bg-white placeholder-gray-400 transition-all">
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded cursor-pointer">
                            <label for="remember-me"
                                class="ml-2 block text-sm text-gray-600 cursor-pointer select-none">Remember this
                                device</label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg text-sm transition-all shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Sign In
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative flex py-2 items-center">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink mx-4 text-xs text-gray-400 uppercase tracking-wider font-medium">Or
                        continue with</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>

                <!-- Social Logins -->
                <div class="grid grid-cols-2 gap-4">
                    <button
                        class="flex items-center justify-center gap-2 border border-gray-300 rounded-lg py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fa-brands fa-google text-red-500"></i> Google
                    </button>
                    <button
                        class="flex items-center justify-center gap-2 border border-gray-300 rounded-lg py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fa-brands fa-microsoft text-sky-500"></i> Microsoft
                    </button>
                </div>

                <!-- Footer Support Note -->
                <p class="text-center text-xs text-gray-400 mt-8">
                    Need help logging in? Contact the <a href="#"
                        class="text-indigo-600 underline font-medium hover:text-indigo-500">IT Helpdesk</a>.
                </p>

            </div>
        </div>

    </div>

    <script>
        document.querySelector("form").addEventListener("submit", function(e) {

            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value.trim();

            if (!email) {
                alert("Email is required!");
                e.preventDefault();
                return;
            }

            let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                alert("Enter valid email!");
                e.preventDefault();
                return;
            }

            if (!password) {
                alert("Password is required!");
                e.preventDefault();
                return;
            }

        });
    </script>

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: "{{ session('error') }}"
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}"
            });
        </script>
    @endif

</body>

</html>
