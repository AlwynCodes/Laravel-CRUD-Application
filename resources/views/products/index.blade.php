<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Products</h1>
            <a href="{{ route('product.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition font-medium">
                + Add Product
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Name</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Qty</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Price</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Description</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-gray-800">{{ $product->id }}</td>
                            <td class="px-4 py-3 text-gray-800 font-medium">{{ $product->name }}</td>
                            <td class="px-4 py-3 text-gray-800">{{ $product->qty }}</td>
                            <td class="px-4 py-3 text-gray-800">{{ $product->price }}</td>
                            <td class="px-4 py-3 text-gray-600 text-sm">{{ $product->description }}</td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route('product.edit', $product->id) }}"
                                   class="inline-block px-3 py-1 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600 transition">
                                    Edit
                                </a>
                                <form action="{{ route('product.destroy', $product->id) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-block px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                No products yet. Click "Add Product" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>