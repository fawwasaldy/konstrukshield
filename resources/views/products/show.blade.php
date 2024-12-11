<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Product Header -->
        <div class="flex justify-between items-center py-6 border-b border-gray-300">
            <h1 class="text-4xl font-bold text-gray-800">{{ $product->name }}</h1>
        </div>

        <!-- Product Details -->
        <div class="flex flex-wrap mt-8 bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Product Image -->
            <div class="w-full md:w-1/2 p-4 bg-gray-100 flex items-center justify-center">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-64 h-auto max-w-lg object-cover rounded-lg shadow-md">
            </div>

            <!-- Product Info -->
            <div class="w-full md:w-1/2 p-6">
                <p class="text-gray-500 mb-2 text-lg">Category: <span class="text-gray-800 font-medium">{{ $product->category }}</span></p>
                <p class="text-3xl font-bold text-orange-500 mb-4">Price: Rp{{ number_format($product->price ) }}</p>
                @if($product->discount > 0)
                    <p class="text-sm text-gray-500 line-through mb-2">Original Price: ${{ number_format($product->price / (1 - $product->discount / 100), 2) }}</p>
                    <p class="text-green-600 font-semibold text-lg mb-4">Discount: {{ $product->discount }}%</p>
                @endif
                <p class="text-gray-700 text-lg mb-4">Rating:
                    <span class="text-yellow-500">
                        {{'★'}}{{ str_repeat('★', $product->rating) }}{{ str_repeat('☆', 5 - $product->rating) }}
                    </span>
                </p>
                <p class="text-gray-700 mb-6 leading-relaxed">{{ $product->description }}</p>
                <form id="update-cart-form-{{ $product->id }}" action="{{ route('cart.update') }}" method="POST" class="mt-4 flex items-center">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" id="quantity-{{ $product->id }}" name="quantity" value="{{ $cartQuantity ?? 1 }}">
                    <div class="flex items-center space-x-4">
                        <button type="button" class="bg-red-500 text-white rounded-lg py-2 px-4 hover:bg-red-600 transition duration-200" onclick="updateQuantity({{ $product->id }}, 'decrease')">-</button>
                        <span id="display-quantity-{{ $product->id }}" class="text-lg font-semibold text-gray-700">{{ $cartQuantity ?? 1 }}</span>
                        <button type="button" class="bg-green-500 text-white rounded-lg py-2 px-4 hover:bg-green-600 transition duration-200" onclick="updateQuantity({{ $product->id }}, 'increase')">+</button>
                    </div>
                    <button type="submit" class="bg-gray-800 text-white rounded-lg py-2 px-6 ml-6 hover:bg-blue-700 transition duration-200 shadow-md">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function updateQuantity(productId, action) {
            const quantityInput = document.getElementById(`quantity-${productId}`);
            const displayQuantity = document.getElementById(`display-quantity-${productId}`);
            let quantity = parseInt(quantityInput.value);

            if (action === 'increase') {
                quantity++;
            } else if (action === 'decrease' && quantity > 1) {
                quantity--;
            }

            quantityInput.value = quantity;
            displayQuantity.textContent = quantity;
        }
    </script>
</x-app-layout>
