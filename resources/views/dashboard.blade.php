<x-app-layout>
    <!-- Banner Section -->
    <div class="bg-cover bg-center text-white text-center py-32 relative"
         style="background-image: url('https://cyanstar.blob.core.windows.net/konstrukshield/Construction+Photography+1.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-5xl font-extrabold tracking-wide">Safety Meets Style</h1>
            <p class="mt-4 text-xl font-light">Explore our premium helmets and safety vests</p>
            <a href="#featured-products"
               class="inline-block mt-6 bg-black hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-lg text-lg font-medium transition">Shop Now</a>
        </div>
    </div>

    <!-- About Section -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">About Us</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">At our store, we believe in providing the highest quality safety gear for professionals and enthusiasts alike. Our helmets and vests are crafted with precision, ensuring maximum protection without compromising on comfort or design.</p>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="featured-products" class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-bold mb-10 text-center text-gray-800">Featured Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($featuredProducts as $product)
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="mt-2 text-sm text-gray-600 line-clamp-3">{{ $product->description }}</p>
                        <p class="mt-4 text-orange-500 font-medium">Rating: {{ $product->rating }} / 5</p>
                        @if($product->discount > 0)
                            <div class="mt-4">
                                <p class="text-lg font-bold text-green-600">Rp{{ number_format($product->price * (1 - $product->discount / 100), 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-400 line-through">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                        @else
                            <p class="mt-4 text-lg font-bold text-green-600">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        @endif
                        <a href="{{ route('products.show', $product->id) }}"
                           class="block mt-6 bg-gray-800 text-white text-center py-2 rounded-lg hover:bg-blue-600 transition-colors duration-300">View Product</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-10">Why Choose Us?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <img src="https://cyanstar.blob.core.windows.net/banner/pngtree-residential-building-under-construction-3d-rendering-with-excavator-and-crane-image_3630005.jpg"
                         alt="High Quality" class="mx-auto mb-4 h-32 w-96 object-cover">
                    <h3 class="text-xl font-semibold text-gray-800">Unmatched Quality</h3>
                    <p class="mt-2 text-gray-600">Our products are built with the best materials to ensure your safety and satisfaction.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <img src="https://cyanstar.blob.core.windows.net/banner/picture1.png"
                         alt="Fast Delivery" class="mx-auto mb-4 h-32 w-96 object-cover">
                    <h3 class="text-xl font-semibold text-gray-800">Fast Delivery</h3>
                    <p class="mt-2 text-gray-600">Get your orders delivered to your doorstep in no time.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <img src="https://cyanstar.blob.core.windows.net/banner/css-on-site-v3-e1648833489119.jpg"
                         alt="Excellent Service" class="mx-auto mb-4 h-32 w-96 object-cover">
                    <h3 class="text-xl font-semibold text-gray-800">Exceptional Support</h3>
                    <p class="mt-2 text-gray-600">Our customer service team is here to help you every step of the way.</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
