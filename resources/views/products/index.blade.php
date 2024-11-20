<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Category Filter and Search Bar -->
        <div class="mb-4 flex items-center justify-between">
            <form action="{{ route('products') }}" method="GET" class="flex items-center">
                <label for="category" class="mr-2 text-sm font-medium text-gray-700">Category:</label>
                <select name="category" id="category" class="border-gray-300 rounded-md shadow-sm">
                    <option value="">All</option>
                    <option value="helmet" {{ request('category') == 'helmet' ? 'selected' : '' }}>Helmet</option>
                    <option value="vest" {{ request('category') == 'vest' ? 'selected' : '' }}>Vest</option>
                </select>
                <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
            </form>
            <form action="{{ route('products') }}" method="GET" class="flex items-center">
                <input type="text" name="search" id="search" placeholder="Search products..." value="{{ request('search') }}" class="border-gray-300 rounded-md shadow-sm">
                <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">Search</button>
            </form>
        </div>

        <div class="grid grid-cols-4 gap-4">
            @foreach($products as $product)
                <div class="border p-4">
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
        <div class="mt-4 flex justify-center">
            @if ($products->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center">
                    {{-- Previous Page Link --}}
                    @if ($products->onFirstPage())
                        <span class="px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md">&laquo;</span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:text-gray-500">&laquo;</a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($products->links()->elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default">{{ $element }}</span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $products->currentPage())
                                    <span class="px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-gray-300 cursor-default">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:text-gray-500">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:text-gray-500">&raquo;</a>
                    @else
                        <span class="px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md">&raquo;</span>
                    @endif
                </nav>
            @endif
        </div>
    </div>
</x-app-layout>
