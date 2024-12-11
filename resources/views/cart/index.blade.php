<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-6">Your Cart</h1>

        @if($cartItems->count() > 0)
            <!-- Clear Cart Button -->
            <div class="flex justify-end mb-6">
                <form method="POST" action="{{ route('cart.clear') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-700 transition">
                        Clear Cart
                    </button>
                </form>
            </div>

            <!-- Cart Items Table -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <table class="w-full table-auto text-left">
                    <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="px-6 py-3 text-sm font-medium uppercase">Product</th>
                        <th class="px-6 py-3 text-sm font-medium uppercase">Price</th>
                        <th class="px-6 py-3 text-sm font-medium uppercase">Quantity</th>
                        <th class="px-6 py-3 text-sm font-medium uppercase">Total</th>
                        <th class="px-6 py-3 text-sm font-medium uppercase text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @php $totalPrice = 0; @endphp
                    @foreach($cartItems as $item)
                        @php
                            $product = $item->product;
                            $itemTotal = $product ? $product->discounted_price * $item->quantity : 0;
                            $totalPrice += $itemTotal;
                        @endphp
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-4">
                                    <span class="text-gray-800 font-semibold">{{ $product ? $product->name : 'Product not found' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">Rp{{ $product ? number_format($product->discounted_price, 2) : 'N/A' }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $item->quantity }}</td>
                            <td class="px-6 py-4 text-gray-600">Rp{{ number_format($itemTotal, 2) }}</td>
                            <td class="px-6 py-4 text-center">
                                @if($product)
                                    <form action="{{ route('cart.increase') }}" method="POST" class="inline-block">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded-md shadow hover:bg-green-600">
                                            +
                                        </button>
                                    </form>
                                    <form action="{{ route('cart.decrease') }}" method="POST" class="inline-block">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded-md shadow hover:bg-yellow-600">
                                            -
                                        </button>
                                    </form>
                                    @if($item->quantity == 1)
                                        <form action="{{ route('cart.remove') }}" method="POST" class="inline-block">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md shadow hover:bg-red-600">
                                                Remove
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Total Price Section -->
            <div class="flex justify-between items-center mt-6 bg-gray-50 p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-gray-800">Total Price:</h2>
                <span class="text-2xl font-extrabold text-gray-900">Rp{{ number_format($totalPrice, 2) }}</span>
            </div>
        @else
            <p class="text-gray-500 text-lg">Your cart is empty.</p>
        @endif
    </div>
</x-app-layout>
