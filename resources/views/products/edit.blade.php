<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-lg">
        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

            <!-- Header (amber for edit) -->
            <div class="bg-amber-500 px-6 py-4 flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-white">Edit Product</h1>
                    <p class="text-amber-100 text-xs mt-0.5">Update the product details</p>
                </div>
                <a href="{{ route('product.index') }}"
                   class="text-amber-100 hover:text-white text-sm transition">
                    ← Back
                </a>
            </div>

            <form method="post" action="{{ route('product.update', ['product' => $product]) }}" class="p-6 space-y-4">
                @csrf
                @method('PUT')

                @if($errors->any())
                    <div class="p-3 bg-red-50 border-l-4 border-red-500 text-red-700 rounded text-sm">
                        <p class="font-semibold mb-1">Please fix the following:</p>
                        <ul class="list-disc list-inside text-xs">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                        Product Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}"
                           class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800
                                  focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                    @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Qty + Price side by side -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Quantity <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="qty" value="{{ old('qty', $product->qty) }}"
                               class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800
                                      focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                        @error('qty') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Price (₱) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                               class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800
                                      focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                        @error('price') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Description</label>
                    <textarea name="description" rows="3"
                              class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800
                                     focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition resize-none">{{ old('description', $product->description) }}</textarea>
                    @error('description') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                    <a href="{{ route('product.index') }}"
                       class="px-5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-800
                              bg-slate-100 hover:bg-slate-200 rounded-lg transition">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold
                                   rounded-lg shadow-sm hover:shadow transition">
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>