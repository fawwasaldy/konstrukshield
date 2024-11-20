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
                <p class="text-gray-500 mb-2">Category: {{ $product->category }}</p>
                <p class="text-2xl font-semibold text-orange-500 mb-4">Price: ${{ $product->price }}</p>
                @if($product->discount > 0)
                    <p class="text-sm text-gray-500 line-through mb-4">Original Price: ${{ $product->price / (1 - $product->discount / 100) }}</p>
                    <p class="text-green-600 font-bold mb-4">Discount: {{ $product->discount }}%</p>
                @endif
                <p class="text-gray-500 mb-4">Rating: {{ $product->rating }} / 5</p>
                <p class="mb-6">Description: {{ $product->description }}</p>
                <form id="update-cart-form-{{ $product->id }}" action="{{ route('cart.update') }}" method="POST" class="mt-4 flex items-center">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" id="quantity-{{ $product->id }}" name="quantity" value="{{ $cartQuantity ?? 1 }}">
                    <button type="button" class="bg-red-500 text-white rounded py-2 px-4 hover:bg-red-600 transition duration-200" onclick="updateQuantity({{ $product->id }}, 'decrease')">-</button>
                    <span id="display-quantity-{{ $product->id }}" class="mx-4">{{ $cartQuantity ?? 1 }}</span>
                    <button type="button" class="bg-green-500 text-white rounded py-2 px-4 hover:bg-green-600 transition duration-200" onclick="updateQuantity({{ $product->id }}, 'increase')">+</button>
                    <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 ml-4 hover:bg-blue-600 transition duration-200">Add to Cart</button>
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
            } else if (action === 'decrease' && quantity > 0) {
                quantity--;
            }

            quantityInput.value = quantity;
            displayQuantity.textContent = quantity;
        }
    </script>
</x-app-layout>
