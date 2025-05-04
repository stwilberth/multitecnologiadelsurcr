<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-[#204E60] shadow-lg sticky top-0 z-50 p-2">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo y Título -->
                <div class="shrink-0 flex items-center">
                    <a href="/" class="flex items-center">
                        <span class="text-2xl font-bold text-white ml-2">MULTITECNOLOGÍA DEL SUR</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:ms-10 sm:flex">
                    <a href="/" class="text-white hover:text-[#8BC34A] transition-colors duration-300 font-medium">Productos</a>
                    <a href="/contacto" class="text-white hover:text-[#8BC34A] transition-colors duration-300 font-medium">Contacto</a>
                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-[#8BC34A]" wire:navigate>
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            {{--             
            @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-[#8BC34A] focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                    <a href="{{ route('login') }}" class="text-white hover:text-[#8BC34A] transition-colors duration-300 font-medium">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="text-white hover:text-[#8BC34A] transition-colors duration-300 font-medium">Registrarse</a>
                </div>
            @endauth --}}

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-[#8BC34A] focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#204E60] border-t border-[#8BC34A]/20">
        <div class="pt-2 pb-3 space-y-1">
            <a href="/" class="block px-4 py-2 text-white hover:text-[#8BC34A] transition-colors duration-300">Productos</a>
            <a href="/contacto" class="block px-4 py-2 text-white hover:text-[#8BC34A] transition-colors duration-300">Contacto</a>
            {{--            
            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-[#8BC34A]" wire:navigate>
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endauth 
            --}}
        </div>

        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-[#8BC34A]/20">
                <div class="px-4">
                    <div class="font-medium text-base text-white" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                    <div class="font-medium text-sm text-[#8BC34A]">{{ auth()->user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    {{-- 
                    <x-responsive-nav-link :href="route('profile')" class="text-white hover:text-[#8BC34A]" wire:navigate>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <button wire:click="logout" class="w-full text-start">
                        <x-responsive-nav-link class="text-white hover:text-[#8BC34A]">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button> --}}
                </div>
            </div>
        @else
            <div class="pt-4 pb-1 border-t border-[#8BC34A]/20">
                <div class="space-y-1">{{-- 
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-white hover:text-[#8BC34A] transition-colors duration-300">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-white hover:text-[#8BC34A] transition-colors duration-300">Registrarse</a>
                    --}}
                </div> 
            </div>
        @endauth
    </div>
</nav>
