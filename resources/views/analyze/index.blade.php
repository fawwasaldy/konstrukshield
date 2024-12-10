<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">Analyze Workplace Safety</h1>
        <form action="{{ route('analyze.result') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                <div class="border border-gray-300 bg-white rounded-md shadow-sm p-4 cursor-pointer" onclick="document.getElementById('image').click()">
                    <img id="image-preview" src="#" alt="Image Preview" class="hidden w-1/5 h-auto mx-auto">
                    <p id="image-placeholder" class="text-gray-500">Click to upload an image</p>
                </div>
            </div>
            <div class="mb-4 flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Analyze</button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.previewImage = function(event) {
                const input = event.target;
                const preview = document.getElementById('image-preview');
                const placeholder = document.getElementById('image-placeholder');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                        placeholder.style.display = 'none';
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>
    <style>
        #image-preview {
            display: none;
            max-width: 100%;
            height: auto;
        }
    </style>
</x-app-layout>
