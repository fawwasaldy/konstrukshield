<x-app-layout>
    <!-- Banner Section -->
    <div class="bg-blue-500 text-white text-center py-32" style="background-image: url('https://cyanstar.blob.core.windows.net/konstrukshield/Construction+Photography+1.jpg'); background-size: cover; background-position: center;">
        <h1 class="text-4xl font-bold">Welcome to Our Store</h1>
        <p class="mt-4 text-lg">Discover our exclusive collection of products</p>
    </div>

    <!-- Featured Products Section -->
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-6 text-center">Featured Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredProducts as $product)
                <div class="border p-4 mx-auto">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                    <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p class="text-orange-500">Rating: {{ $product->rating }} / 5</p>
                    @if($product->discount > 0)
                        <p class="text-green-600 font-bold">Rp{{ number_format($product->price * (1 - $product->discount / 100), 0, ',', '.') }}</p>
                        <p class="text-gray-500 line-through">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    @else
                        <p class="text-green-600 font-bold">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    @endif
                    <a href="{{ route('products.show', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 mt-2 block text-center rounded">Show Product</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
