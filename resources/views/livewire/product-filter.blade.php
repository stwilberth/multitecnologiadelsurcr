<div class="bg-gray-100 min-h-screen">
    <!-- Cabecera -->
    <header class="bg-[#204E60] py-6">
        <div class="container mx-auto px-4">
            <h1 class="text-white text-3xl font-sans font-bold text-center">MULTITECNOLOGÍA DEL SUR</h1>
        </div>
    </header>

    <!-- Diseño en V -->
    <div class="relative overflow-hidden bg-[#204E60] h-32">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[#4CAF50] transform -skew-y-6"></div>
            <div class="absolute inset-0 bg-[#8BC34A] transform skew-y-6 translate-y-12"></div>
        </div>
    </div>

    <!-- Filtros y Productos -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold text-[#1A3A4A] mb-6">Filtrar Productos</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Selector de Categoría -->
                <div>
                    <label class="block text-sm font-medium text-[#1A3A4A] mb-2">Categoría</label>
                    <select wire:model.live="category" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-[#4CAF50] focus:ring-[#4CAF50]">
                        <option value="">Todas las categorías</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Selector de Subcategoría -->
                <div>
                    <label class="block text-sm font-medium text-[#1A3A4A] mb-2">Subcategoría</label>
                    <select wire:model.live="subcategory" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-[#4CAF50] focus:ring-[#4CAF50]">
                        <option value="">Todas las subcategorías</option>
                        @foreach($subcategories as $subcat)
                            <option value="{{ $subcat->id }}">{{ $subcat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Rango de Precio -->
                <div>
                    <label class="block text-sm font-medium text-[#1A3A4A] mb-2">Rango de Precio</label>
                    <input type="range" wire:model.live="priceRange" min="0" max="10000" step="100" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                    <div class="text-sm text-gray-600 mt-1">Hasta ${{ number_format($priceRange, 2) }}</div>
                </div>
            </div>
        </div>

        <!-- Grid de Productos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-[#1A3A4A] mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-[#4CAF50] font-bold">${{ number_format($product->price, 2) }}</span>
                            <span class="text-sm text-gray-500">{{ $product->category->name }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>

    <!-- Información de Contacto -->
    <footer class="bg-[#204E60] text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-center md:text-left mb-6 md:mb-0">
                    <h2 class="text-2xl font-bold mb-2">Ricardo García</h2>
                    <p class="flex items-center justify-center md:justify-start mb-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        6387-3989
                    </p>
                    <p class="flex items-center justify-center md:justify-start mb-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        ventas@multitecnologiadelsurcr.com
                    </p>
                </div>
                <a href="https://wa.me/50663938400" class="bg-[#8BC34A] hover:bg-[#4CAF50] text-white font-bold py-3 px-6 rounded-full flex items-center transition duration-300">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    WhatsApp: 6393-8400
                </a>
            </div>
        </div>
    </footer>
</div>