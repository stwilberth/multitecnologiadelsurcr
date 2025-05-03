<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Imagen del producto (placeholder por ahora) -->
            <div class="aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                <div class="w-full h-full flex items-center justify-center text-gray-500">
                    <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>

            <!-- Información del producto -->
            <div class="space-y-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                
                <div class="flex items-center justify-between">
                    <p class="text-2xl font-semibold text-indigo-600">${{ number_format($product->price, 2) }}</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $product->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $product->status ? 'Disponible' : 'No disponible' }}
                    </span>
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <h3 class="text-lg font-medium text-gray-900">Descripción</h3>
                    <p class="mt-2 text-gray-600">{{ $product->description }}</p>
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <h3 class="text-lg font-medium text-gray-900">Detalles</h3>
                    <dl class="mt-2 space-y-2">
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Categoría:</dt>
                            <dd class="text-gray-900">{{ $product->category->name }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Subcategoría:</dt>
                            <dd class="text-gray-900">{{ $product->subcategory->name }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Marca:</dt>
                            <dd class="text-gray-900">{{ $product->brand->name }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <button type="button" class="w-full bg-indigo-600 text-white px-6 py-3 rounded-md font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Agregar al carrito
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>