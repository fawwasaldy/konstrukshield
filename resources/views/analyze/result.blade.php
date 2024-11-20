<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">Analyze Workplace Safety</h1>
        <div class="mb-4">
            <h2 class="text-2xl font-bold mb-2">Analyzed Image</h2>
            <img src="{{ asset('storage/' . $decodedImagePath) }}" alt="Analyzed Image" class="w-1/5 mx-auto">
        </div>
        <div class="mb-4">
            <h2 class="text-2xl font-bold mb-2">Predictions</h2>
            <table class="table-auto w-full">
                <thead>
                <tr>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Count</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="border px-4 py-2">Person</td>
                    <td class="border px-4 py-2">{{ $personCount }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">Helmet</td>
                    <td class="border px-4 py-2">{{ $helmetCount }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">Vest</td>
                    <td class="border px-4 py-2">{{ $vestCount }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="mb-4">
            <h2 class="text-2xl font-bold mb-2">Message</h2>
            <p>{{ $message }}</p>
            @if ($link)
                <a href="{{ $link }}" class="bg-blue-500 text-white px-4 py-2 mt-2 block text-center rounded">Go to Products</a>
            @endif
        </div>
    </div>
</x-app-layout>
