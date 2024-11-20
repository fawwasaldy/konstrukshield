<x-app-layout>
    {{--    @dd($products)--}}

    {{--    @section('content')--}}
    <div class="container">
        <div class="grid grid-cols-3 gap-4">
            @foreach($products as $product)
                <div class="border p-4">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                    <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p class="text-green-600 font-bold">${{ number_format($product->price, 2) }}</p>
                    <form action="/cart" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2 block text-center">Add to Cart</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    {{--    @endsection--}}

</x-app-layout>
