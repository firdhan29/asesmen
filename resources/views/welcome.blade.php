<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quranic Assessment</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS (via CDN for quick preview, but Vite is configured below) -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Livewire Styles -->
        @livewireStyles
        <style>
            body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
        </style>
    </head>
    <body class="antialiased min-h-screen">
        
        <nav class="bg-indigo-600 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <span class="text-white text-xl font-bold">Quranic Assessment App</span>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            @livewire('batch-assessment')
        </main>

        <!-- Livewire Scripts -->
        @livewireScripts
    </body>
</html>
