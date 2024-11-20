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
                    <th class="px-4 py-2">Class ID</th>
                    <th class="px-4 py-2">Class Name</th>
                    <th class="px-4 py-2">Confidence</th>
                    <th class="px-4 py-2">XMin</th>
                    <th class="px-4 py-2">XMax</th>
                    <th class="px-4 py-2">YMin</th>
                    <th class="px-4 py-2">YMax</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($predictions as $prediction)
                    <tr>
                        <td class="border px-4 py-2">{{ $prediction['class_id'] }}</td>
                        <td class="border px-4 py-2">{{ $prediction['class_name'] }}</td>
                        <td class="border px-4 py-2">{{ $prediction['confidence'] }}</td>
                        <td class="border px-4 py-2">{{ $prediction['xmin'] }}</td>
                        <td class="border px-4 py-2">{{ $prediction['xmax'] }}</td>
                        <td class="border px-4 py-2">{{ $prediction['ymin'] }}</td>
                        <td class="border px-4 py-2">{{ $prediction['ymax'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mb-4">
            <h2 class="text-2xl font-bold mb-2">Message</h2>
            <p>{{ $message }}</p>
            @if ($link)
                <a href="{{ $link }}" class="text-blue-500 underline">Go to Products</a>
            @endif
        </div>
    </div>
</x-app-layout>
