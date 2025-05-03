<div class="min-h-screen bg-gray-100">

    <!-- Filtros y Productos -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" id="productos">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Panel de Filtros -->
            <div class="bg-white p-8 rounded-xl shadow-lg h-fit border border-gray-100">
                <h2 class="text-2xl font-bold text-[#1A3A4A] mb-8">Filtrar Productos</h2>
                
                <!-- Filtro de Categorías -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Categoría</label>
                    <select wire:model.live="category" class="w-full border-2 border-gray-200 rounded-lg py-2.5 px-4 text-gray-700 focus:ring-2 focus:ring-[#4CAF50] focus:border-transparent transition-all duration-300">
                        <option value="">Todas las categorías</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Filtro de Subcategorías -->
                @if(count($subcategories) > 0)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subcategoría</label>
                    <select wire:model.live="subcategory" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#4CAF50] focus:border-[#4CAF50]">
                        <option value="">Todas las subcategorías</option>
                        @foreach($subcategories as $subcat)
                            <option value="{{ $subcat->id }}">{{ $subcat->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                <!-- Filtro de Rango de Precio -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rango de Precio</label>
                    <input type="range" wire:model.live="priceRange" min="0" max="1000000" step="10000" 
                           class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                    <div class="text-sm text-gray-600 mt-2">Hasta ₡{{ number_format($priceRange, 0, '.', ',') }}</div>
                </div>
            </div>

            <!-- Grid de Productos -->
            <div class="md:col-span-3">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($products as $product)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                                     class="w-full h-56 object-cover hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-56 bg-gray-100 flex items-center justify-center">
                                    <span class="text-gray-400">Sin imagen</span>
                                </div>
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-[#1A3A4A] mb-3 hover:text-[#204E60] transition-colors duration-300">{{ $product->name }}</h3>
                                <p class="text-gray-600 text-sm mb-6 leading-relaxed">{{ Str::limit($product->description, 120) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-[#4CAF50] text-lg font-bold">₡{{ number_format($product->price, 0, '.', ',') }}</span>
                                    <a href="/productos/{{ $product->slug }}" class="bg-[#204E60] text-white px-6 py-2.5 rounded-lg hover:bg-[#1A3A4A] transition-all duration-300 font-medium text-sm shadow-md hover:shadow-lg">
                                        Ver Detalles
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-500">No se encontraron productos</p>
                        </div>
                    @endforelse
                </div>

                <!-- Paginación -->
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </main>

    <!-- Sección de Contacto -->
    <section id="contacto" class="bg-gradient-to-br from-[#1A3A4A] to-[#204E60] py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-white text-center mb-16 tracking-wide">Contacto</h2>
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
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-white/20">
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
                </div>
            </div>
        </div>
    </section>
</div>