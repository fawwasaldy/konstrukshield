<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Product Header -->
        <div class="flex justify-between items-center py-6 border-b border-gray-200">
            <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
        </div>

        <!-- Product Details -->
        <div class="flex flex-wrap mt-8">
            <!-- Product Image -->
            <div class="w-full md:w-1/2 px-4 mb-8 md:mb-0">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-64 h-auto max-w-lg object-cover rounded-lg shadow-md mx-auto">
            </div>

            <!-- Product Info -->
            <div class="w-full md:w-1/2 px-4">
                <p class="text-gray-500 mb-2">{{ $product->category }}</p>
                <p class="text-2xl font-semibold text-orange-500 mb-4">${{ $product->price }}</p>
                @if($product->discount > 0)
                    <p class="text-sm text-gray-500 line-through mb-4">${{ $product->original_price }}</p>
                @endif
                <p class="mb-6">{{ $product->description }}</p>
                <form id="add-to-cart-form-{{ $product->id }}" action="/cart" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="button" class="w-full bg-green-500 text-white rounded py-3 hover:bg-green-600 transition duration-200" onclick="addToCart({{ $product->id }})">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
