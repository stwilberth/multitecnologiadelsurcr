<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

                <!-- Sección de Contacto -->
    <section id="contacto" class="bg-gradient-to-br from-[#1A3A4A] to-[#204E60] py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start">
                <div class="text-white bg-white/5 p-8 rounded-2xl backdrop-blur-sm">
                    <h3 class="text-2xl font-bold mb-8 tracking-wide">Información de Contacto</h3>
                    <div class="space-y-6">
                        <p class="flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            Teléfono: 6387-3989
                        </p>
                        <p class="flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Email: ventas@multitecnologiadelsurcr.com
                        </p>
                        <p class="flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            WhatsApp: 6393-8400
                        </p>
                    </div>
                </div>
{{--                 <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-white/20">
                    <form class="space-y-8">
                        <div>
                            <label class="block text-sm font-semibold text-white mb-3">Nombre</label>
                            <input type="text" class="w-full bg-white/5 border-2 border-white/10 rounded-lg py-3 px-4 text-white placeholder-white/50 focus:ring-2 focus:ring-[#8BC34A] focus:border-transparent transition-all duration-300" placeholder="Tu nombre completo">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-white mb-3">Email</label>
                            <input type="email" class="w-full bg-white/5 border-2 border-white/10 rounded-lg py-3 px-4 text-white placeholder-white/50 focus:ring-2 focus:ring-[#8BC34A] focus:border-transparent transition-all duration-300" placeholder="tu@email.com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-white mb-3">Mensaje</label>
                            <textarea rows="4" class="w-full bg-white/5 border-2 border-white/10 rounded-lg py-3 px-4 text-white placeholder-white/50 focus:ring-2 focus:ring-[#8BC34A] focus:border-transparent transition-all duration-300" placeholder="¿En qué podemos ayudarte?"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-[#8BC34A] text-white py-4 px-8 rounded-lg font-semibold hover:bg-[#4CAF50] transform hover:-translate-y-1 transition-all duration-300 shadow-lg hover:shadow-xl">
                            Enviar Mensaje
                        </button>
                    </form>
                </div> --}}
            </div>
        </div>
    </section>
        </div>
    </body>
</html>
