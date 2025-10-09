<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Tailwind CDN for quick styling -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">MyApp</h1>
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
        </div>
    </nav>

    <header class="bg-blue-600 text-white py-20 text-center">
        <h2 class="text-4xl font-bold mb-4">Welcome to MyApp</h2>
        <p class="text-lg">Experience secure registration and validation flows</p>
    </header>

    <main class="container mx-auto px-4 py-12 space-y-16">

        <!-- Registration Section -->
        <section id="registration" class="bg-white p-8 rounded shadow">
            <h3 class="text-2xl font-semibold mb-4">Registration</h3>
            <p class="mb-4">Sign up to access the private validation system.</p>
            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Register Now</a>
        </section>

        <!-- Public Validation Section -->
        <section id="public-validation" class="bg-white p-8 rounded shadow">
            <h3 class="text-2xl font-semibold mb-4">Public Validation</h3>
            <p class="mb-4">Use our public validation tool.</p>
            <a href="{{ route('public.validation.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Validate Publicly</a>
        </section>

        <!-- Private Validation Section -->
        <section id="private-validation" class="bg-white p-8 rounded shadow">
            <h3 class="text-2xl font-semibold mb-4">Private Validation</h3>
            <p class="mb-4">Log in to access secure private validation features.</p>
            <a href="{{ route('private.validation.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">Access Private Validation</a>
        </section>

    </main>

    <footer class="text-center text-sm text-gray-500 py-6">
        &copy; {{ date('Y') }} MyApp. All rights reserved.
    </footer>

</body>
</html>
