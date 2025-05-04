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
                {{--                 
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rango de Precio</label>
                    <input type="range" wire:model.live="priceRange" min="0" max="1000000" step="10000" 
                           class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                    <div class="text-sm text-gray-600 mt-2">Hasta ₡{{ number_format($priceRange, 0, '.', ',') }}</div>
                </div> 
                --}}
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
</div>