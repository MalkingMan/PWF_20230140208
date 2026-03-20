<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Daftar Produk
            </h2>
            <a href="{{ route('product.create') }}"
               class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                + Tambah Produk
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg dark:bg-green-900/30 dark:border-green-700 dark:text-green-300 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3 w-10">#</th>
                            <th class="px-6 py-3">Nama Produk</th>
                            <th class="px-6 py-3 text-center w-32">Qty</th>
                            <th class="px-6 py-3 text-right w-40">Harga</th>
                            <th class="px-6 py-3 w-36">Pemilik</th>
                            <th class="px-6 py-3 text-center w-56">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($products as $index => $product)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4 text-gray-400">{{ $products->firstItem() + $index }}</td>

                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">
                                    {{ $product->name }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if ($product->qty > 10)
                                        <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-400">
                                            {{ $product->qty }} In Stock
                                        </span>
                                    @elseif ($product->qty > 0)
                                        <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700 dark:bg-yellow-900/40 dark:text-yellow-400">
                                            {{ $product->qty }} Low Stock
                                        </span>
                                    @else
                                        <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-400">
                                            Habis
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right font-medium text-gray-900 dark:text-gray-100">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                    {{ $product->user->name ?? '-' }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center space-x-2">
                                        <a href="{{ route('product.show', $product) }}"
                                           class="px-3 py-1 text-xs font-medium rounded bg-blue-100 text-blue-700 hover:bg-blue-200 dark:bg-blue-900/40 dark:text-blue-400 dark:hover:bg-blue-900/60 whitespace-nowrap">
                                            View
                                        </a>
                                        <a href="{{ route('product.edit', $product) }}"
                                           class="px-3 py-1 text-xs font-medium rounded bg-yellow-100 text-yellow-700 hover:bg-yellow-200 dark:bg-yellow-900/40 dark:text-yellow-400 dark:hover:bg-yellow-900/60 whitespace-nowrap">
                                            Edit
                                        </a>
                                        <form action="{{ route('product.destroy', $product) }}" method="POST"
                                              onsubmit="return confirm('Hapus produk ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-3 py-1 text-xs font-medium rounded bg-red-100 text-red-700 hover:bg-red-200 dark:bg-red-900/40 dark:text-red-400 dark:hover:bg-red-900/60 whitespace-nowrap">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                    Belum ada produk.
                                    <a href="{{ route('product.create') }}" class="text-blue-500 hover:underline ml-1">Tambah sekarang</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($products->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
