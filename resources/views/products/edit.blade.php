<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-2xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Edit Product</h1>
            <a href="{{ route('product.index') }}"
               class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
                ← Back to List
            </a>
        </div>

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <p class="font-semibold mb-2">Please fix the following errors:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('product.update', $product->id) }}"
              class="bg-white shadow-md rounded-lg p-6 space-y-5">
            @csrf
            @method('put')

            <div>
                <label class="block text-gray-700 font-medium mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Quantity</label>
                <input type="text" name="qty" value="{{ old('qty', $product->qty) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('qty') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Price</label>
                <input type="text" name="price" value="{{ old('price', $product->price) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('price') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Description</label>
                <input type="text" name="description" value="{{ old('description', $product->description) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex space-x-3 pt-2">
                <button type="submit"
                        class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition font-medium">
                    Update Product
                </button>
                <a href="{{ route('product.index') }}"
                   class="px-5 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</body>
</html>