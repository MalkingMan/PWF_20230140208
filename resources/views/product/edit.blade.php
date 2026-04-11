<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('product.index') }}"
               class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition">
                ← Kembali
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Produk') }}: {{ $product->name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="mb-6 px-4 py-3 bg-red-100 border border-red-400 text-red-700 rounded-lg dark:bg-red-900 dark:border-red-600 dark:text-red-300">
                            <p class="font-semibold mb-1">Terdapat kesalahan input:</p>
                            <ul class="list-disc list-inside text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form Update --}}
                    <form action="{{ route('product.update', $product) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        {{-- Nama Produk --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Nama Produk <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                   value="{{ old('name', $product->name) }}"
                                   placeholder="Contoh: Laptop Asus ROG"
                                   class="w-full px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                          border-gray-300 dark:border-gray-600
                                          @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Quantity --}}
                        <div>
                            <label for="qty" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Jumlah (Qty) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="qty" name="qty"
                                   value="{{ old('qty', $product->qty) }}"
                                   min="0"
                                   placeholder="Contoh: 50"
                                   class="w-full px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                          border-gray-300 dark:border-gray-600
                                          @error('qty') border-red-500 @enderror">
                            @error('qty')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Harga --}}
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Harga (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="price" name="price"
                                   value="{{ old('price', $product->price) }}"
                                   min="0"
                                   step="0.01"
                                   placeholder="Contoh: 15000000"
                                   class="w-full px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                          border-gray-300 dark:border-gray-600
                                          @error('price') border-red-500 @enderror">
                            @error('price')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Pemilik --}}
                        <div>
                            <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Pemilik (Owner) <span class="text-red-500">*</span>
                            </label>
                            <select id="user_id" name="user_id"
                                    class="w-full px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                                           bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                           border-gray-300 dark:border-gray-600
                                           @error('user_id') border-red-500 @enderror">
                                <option value="">-- Pilih Pemilik --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('user_id', $product->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tombol Update & Batal --}}
                        <div class="flex items-center gap-3 pt-2">
                            <button type="submit"
                                    class="px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                                Perbarui Produk
                            </button>
                            <a href="{{ route('product.index') }}"
                               class="px-6 py-2 bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                                Batal
                            </a>
                        </div>
                    </form>

                    {{-- Form Hapus — TERPISAH dari form update --}}
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <form action="{{ route('product.destroy', $product) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition">
                                Hapus Produk
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
