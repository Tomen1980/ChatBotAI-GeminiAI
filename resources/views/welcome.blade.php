@extends('layout.app')

@section('content')

<body class="bg-gray-900 text-white">

    <!-- Navbar -->
    <nav class="bg-gray-900 fixed w-full z-50 top-0">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold">
                <a href="#" class="text-white">AI Chat Assistant</a>
            </div>
            <div class="space-x-4">
                <a href="#features" class="text-gray-300 hover:text-white transition duration-300">Features</a>
                <a href="#about" class="text-gray-300 hover:text-white transition duration-300">About</a>
                <a href="/login" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-400 transition duration-300">Login</a>
                <a href="/register" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-400 transition duration-300">Register</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-indigo-700 min-h-screen flex items-center justify-center relative pt-20">
        <img src="https://source.unsplash.com/1600x900/?technology,ai" alt="AI Technology" class="absolute inset-0 w-full h-full object-cover opacity-40">
        <div class="container mx-auto px-6 z-10 text-center">
            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-4">Experience the Future with <span class="text-blue-300">AI Chat Assistant</span></h1>
            <p class="text-xl md:text-2xl mb-6">Your Intelligent Companion for every conversation.</p>
            <div class="space-x-4">
                <a href="/login" class="bg-blue-500 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:bg-blue-400 transition duration-300">Login</a>
                <a href="/register" class="bg-indigo-500 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:bg-indigo-400 transition duration-300">Register</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Why Choose Our AI Chat Assistant?</h2>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="text-center">
                    <img src="https://plus.unsplash.com/premium_photo-1683120966127-14162cdd0935?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dGVjaG5vbG9neXxlbnwwfHwwfHx8MA%3D%3D" alt="Seamless Integration" class="w-full h-64 object-cover rounded-lg mb-6 shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Seamless Integration</h3>
                    <p class="text-gray-400">Effortlessly integrate our AI into your existing systems to enhance customer engagement and support.</p>
                </div>
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8dGVjaG5vbG9neXxlbnwwfHwwfHx8MA%3D%3D" alt="Advanced Security" class="w-full h-64 object-cover rounded-lg mb-6 shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Advanced Security</h3>
                    <p class="text-gray-400">Your data is protected with cutting-edge security protocols, ensuring privacy and integrity.</p>
                </div>
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHRlY2hub2xvZ3l8ZW58MHx8MHx8fDA%3D" alt="Intuitive Conversations" class="w-full h-64 object-cover rounded-lg mb-6 shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Intuitive Conversations</h3>
                    <p class="text-gray-400">Our AI understands context and nuances, providing natural and meaningful interactions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About the Creator Section -->
    <section id="about" class="py-20 bg-gray-900">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12">About the Creator</h2>
            <div class="flex flex-col md:flex-row items-center justify-center gap-12">
                <div class="w-48 h-48 rounded-full bg-gray-800 overflow-hidden shadow-lg">
                    <img src="/image/dev.jpg" alt="Your Photo" class="w-full h-full object-cover">
                </div>
                <div class="text-center md:text-left">
                    <h3 class="text-2xl font-semibold mb-4">JumantaraDev</h3>
                    <p class="text-gray-400">I'm passionate about creating intuitive and innovative AI-driven solutions that enhance user experiences. With years of experience in AI development, I aim to push the boundaries of what technology can achieve.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-900 py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="text-gray-500 mb-4">&copy; {{ date('Y') }} AI Chat Assistant. All rights reserved.</p>
            <p class="text-gray-500">Crafted with care by <span class="font-semibold text-white">JumantaraDev</span></p>
            <div class="flex justify-center space-x-4 mt-6">
                <a href="#" class="text-gray-500 hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.36 6.64A9 9 0 015 18.36l-2.09.69.69-2.09A9 9 0 1118.36 6.64z" />
                    </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7.24V6a2 2 0 00-2-2h-1.24A12 12 0 005.24 4H4a2 2 0 00-2 2v1.24A12 12 0 004 18.76V20a2 2 0 002 2h1.24A12 12 0 0018.76 20H20a2 2 0 002-2v-1.24A12 12 0 0020 7.24z" />
                    </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l9 3-9-18-9 18 9-3z" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>

</body>

@endsection