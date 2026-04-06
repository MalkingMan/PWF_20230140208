<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-start">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
                    Product List
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your product inventory</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('product.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-500 text-white text-sm font-semibold rounded-lg hover:bg-indigo-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Product
                </a>
                <a href="#"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-500 text-white text-sm font-semibold rounded-lg hover:bg-emerald-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Export Data
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg dark:bg-green-900/30 dark:border-green-700 dark:text-green-300 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden border border-gray-200 dark:border-gray-700">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider w-16">#</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider w-36">Quantity</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider w-40">Price</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider w-36">Owner</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-center w-36">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $index => $product)
                            <tr class="border-b border-gray-100 dark:border-gray-700/50 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                                {{-- # --}}
                                <td class="px-6 py-4 text-gray-400 dark:text-gray-500">
                                    {{ $products->firstItem() + $index }}
                                </td>

                                {{-- Name --}}
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">
                                    {{ $product->name }}
                                </td>

                                {{-- Quantity Badge --}}
                                <td class="px-6 py-4">
                                    @if ($product->qty > 10)
                                        <span class="inline-flex items-center justify-center w-10 h-7 rounded-md text-xs font-bold bg-emerald-500/20 text-emerald-400">
                                            {{ $product->qty }}
                                        </span>
                                    @elseif ($product->qty > 0)
                                        <span class="inline-flex items-center justify-center w-10 h-7 rounded-md text-xs font-bold bg-red-500/20 text-red-400">
                                            {{ $product->qty }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center justify-center w-10 h-7 rounded-md text-xs font-bold bg-gray-500/20 text-gray-400">
                                            0
                                        </span>
                                    @endif
                                </td>

                                {{-- Price --}}
                                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>

                                {{-- Owner --}}
                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                    {{ $product->user->name ?? '-' }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-3">
                                        {{-- View --}}
                                        <a href="{{ route('product.show', $product) }}" title="View"
                                           class="text-gray-400 hover:text-blue-400 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        {{-- Edit --}}
                                        @can('update', $product)
                                        <a href="{{ route('product.edit', $product) }}" title="Edit"
                                           class="text-gray-400 hover:text-yellow-400 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        @endcan

                                        {{-- Delete --}}
                                        @can('delete', $product)
                                        <form action="{{ route('product.destroy', $product) }}" method="POST"
                                              onsubmit="return confirm('Hapus produk ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete"
                                                    class="text-gray-400 hover:text-red-400 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endcan
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
