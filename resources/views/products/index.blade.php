<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Category Filter and Search Bar -->
        <div class="mb-4 flex flex-wrap items-center justify-between gap-4">
            <form action="{{ route('products') }}" method="GET" class="flex items-center gap-2">
                <label for="category" class="text-sm font-medium text-gray-700">Category:</label>
                <select name="category" id="category" class="border-gray-300 rounded-md shadow-sm focus:ring-gray-800 focus:border-gray-800">
                    <option value="">All</option>
                    <option value="helmet" {{ request('category') == 'helmet' ? 'selected' : '' }}>Helmet</option>
                    <option value="vest" {{ request('category') == 'vest' ? 'selected' : '' }}>Vest</option>
                </select>
                <button type="submit" class="ml-2 bg-gray-800 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Filter</button>
            </form>
            <form action="{{ route('products') }}" method="GET" class="flex items-center gap-2">
                <input type="text" name="search" id="search" placeholder="Search products..." value="{{ request('search') }}" class="border-gray-300 rounded-md shadow-sm focus:ring-gray-800 focus:border-gray-800">
                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Search</button>
            </form>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-bold text-gray-900">{{ $product->name }}</h2>
                        <p class="text-sm text-gray-600 line-clamp-2">{{ $product->description }}</p>
                        <p class="text-orange-500 font-medium mt-2">Rating: {{ $product->rating }} / 5</p>
                        @if($product->discount > 0)
                            <p class="text-green-600 font-bold">Rp{{ number_format($product->price * (1 - $product->discount / 100), 0, ',', '.') }}</p>
                            <p class="text-gray-500 line-through">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        @else
                            <p class="text-green-600 font-bold">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        @endif
                        <a href="{{ route('products.show', $product->id) }}" class="mt-4 block bg-gray-800 text-white text-center py-2 rounded hover:bg-blue-600 transition">Show Product</a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            @if ($products->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center space-x-1">
                    {{-- Previous Page Link --}}
                    @if ($products->onFirstPage())
                        <span class="px-3 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded-l">&laquo;</span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l hover:bg-gray-100">&laquo;</a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($products->links()->elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span class="px-4 py-2 text-sm font-medium text-gray-500">{{ $element }}</span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $products->currentPage())
                                    <span class="px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-gray-300">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-100">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r hover:bg-gray-100">&raquo;</a>
                    @else
                        <span class="px-3 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded-r">&raquo;</span>
                    @endif
                </nav>
            @endif
        </div>
    </div>
</x-app-layout>
