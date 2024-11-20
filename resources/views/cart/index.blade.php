<!-- resources/views/cart/index.blade.php -->

<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">Your Cart</h1>
        @if($cartItems->count() > 0)
            <form method="POST" action="{{ route('cart.clear') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white rounded py-2 px-4 hover:bg-red-600 mb-4">
                    Clear Cart
                </button>
            </form>
            <table class="table-auto w-full">
                <thead>
                <tr>
                    <th class="px-4 py-2">Product</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @php $totalPrice = 0; @endphp
                @foreach($cartItems as $item)
                    @php
                        $product = $item->product;
                        $itemTotal = $product ? $product->discounted_price * $item->quantity : 0;
                        $totalPrice += $itemTotal;
                    @endphp
                    <tr>
                        <td class="border px-4 py-2">{{ $product ? $product->name : 'Product not found' }}</td>
                        <td class="border px-4 py-2">Rp{{ $product ? number_format($product->discounted_price, 2) : 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $item->quantity }}</td>
                        <td class="border px-4 py-2">Rp{{ number_format($itemTotal, 2) }}</td>
                        <td class="border px-4 py-2">
                            @if($product)
                                <form action="{{ route('cart.increase') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="bg-green-500 text-white rounded px-2 py-1">+</button>
                                </form>
                                <form action="{{ route('cart.decrease') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="bg-red-500 text-white rounded px-2 py-1">-</button>
                                </form>
                                @if($item->quantity == 1)
                                    <form action="{{ route('cart.remove') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="bg-red-500 text-white rounded px-2 py-1">Remove</button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                <h2 class="text-xl font-bold">Total Price: Rp{{ number_format($totalPrice, 2) }}</h2>
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
</x-app-layout>
