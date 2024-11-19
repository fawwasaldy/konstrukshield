<x-app-layout>
    <!-- Banner Section -->
    <div class="bg-blue-500 text-white text-center py-32" style="background-image: url('https://cyanstar.blob.core.windows.net/banner/joseph-barrientos-4qSb_FWhHKs-unsplash.jpg'); background-size: cover; background-position: center;">
        <h1 class="text-4xl font-bold">Welcome to Our Store</h1>
        <p class="mt-4 text-lg">Discover our exclusive collection of products</p>
    </div>

    <!-- Featured Products Section -->
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-6">Featured Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredProducts as $product)
                <div class="border border-gray-200 rounded-lg overflow-hidden shadow-lg flex flex-col">
                    <div class="h-72 overflow-hidden">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col flex-grow justify-end">
                        <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                        <p class="text-gray-500">{{ $product->rating }}</p>
                        <div class="flex justify-between items-center py-4">
                            <span class="text-lg font-semibold text-orange-500">${{ $product->discount_price }}</span>
                            @if($product->discount > 0)
                                <span class="text-sm text-gray-500 line-through">{{ $product->price }}</span>
                            @endif
                        </div>
                        <a href="{{ route('products.show', $product->id) }}" class="w-full bg-blue-500 text-white rounded py-2 hover:bg-blue-600 text-center">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
