<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Carrusel de imágenes del producto -->
            <div x-data="{ activeSlide: 0, totalSlides: {{ $product->images->count() }} }" class="aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden relative">
                @if($product->images->count() > 0)
                    <div class="relative w-full h-full">
                        @foreach($product->images as $index => $image)
                            <div x-show="activeSlide === {{ $index }}" class="absolute inset-0 w-full h-full transition-opacity duration-300" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                                <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            </div>
                        @endforeach

                        <!-- Controles de navegación -->
                        @if($product->images->count() > 1)
                            <button @click="activeSlide = (activeSlide - 1 + totalSlides) % totalSlides" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black/50 text-white p-2 rounded-full hover:bg-black/75 focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <button @click="activeSlide = (activeSlide + 1) % totalSlides" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black/50 text-white p-2 rounded-full hover:bg-black/75 focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>

                            <!-- Indicadores -->
                            <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                @foreach($product->images as $index => $image)
                                    <button @click="activeSlide = {{ $index }}" class="w-2 h-2 rounded-full transition-all duration-300" :class="activeSlide === {{ $index }} ? 'bg-white' : 'bg-white/50'"></button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-500">
                        <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
            </div>

            <!-- Información del producto -->
            <div class="space-y-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                
                <div class="flex items-center justify-between">
                    <p class="text-2xl font-semibold text-indigo-600">₡{{ number_format($product->price) }}</p>
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
                    <a href="https://wa.me/50663938400?text=Hola, estoy interesado en el producto: {{ $product->name }}" 
                        target="_blank"
                        class="w-full bg-green-600 text-white px-6 py-3 rounded-md font-medium hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 flex items-center justify-center">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                            <path d="M12 0C5.373 0 0 5.373 0 12c0 6.628 5.373 12 12 12 6.628 0 12-5.373 12-12 0-6.627-5.372-12-12-12zm6.067 16.511c-.272.861-.994 1.577-1.845 1.782-.853.205-1.707.195-2.55.098-1.06-.123-2.034-.424-2.97-.841-2.233-.987-4.115-2.691-5.317-4.739-.767-1.3-1.267-2.764-1.35-4.291-.083-1.527.189-3.049 1.044-4.192.855-1.143 2.122-1.784 3.521-1.784.174 0 .35.015.522.044.172.029.335.117.463.233.128.116.228.271.301.469l1.264 3.032c.073.177.109.362.109.551 0 .189-.036.374-.109.551-.073.177-.177.334-.311.472l-.591.591c-.116.116-.184.268-.184.428 0 .16.068.312.184.428 1.041 1.041 2.283 1.84 3.654 2.374.177.073.362.109.551.109.189 0 .374-.036.551-.109.177-.073.334-.177.472-.311l.591-.591c.116-.116.268-.184.428-.184.16 0 .312.068.428.184l3.032 1.264c.198.073.353.173.469.301.116.128.204.291.233.463.029.172.044.348.044.522 0 1.399-.641 2.666-1.784 3.521z"/>
                        </svg>
                        Contactar por WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>