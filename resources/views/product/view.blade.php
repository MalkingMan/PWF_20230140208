<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Detail Produk
            </h2>
            <div class="flex items-center gap-2">
                <a href="{{ route('product.index') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    Kembali
                </a>
                <a href="{{ route('product.edit', $product) }}"
                   class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                    Edit
                </a>
                <form action="{{ route('product.destroy', $product) }}" method="POST"
                      onsubmit="return confirm('Hapus produk ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                <table class="w-full text-sm text-left">
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider w-40 align-top">Nama Produk</td>
                            <td class="px-6 py-4 text-lg font-bold text-gray-900 dark:text-gray-100">{{ $product->name }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider w-40 align-top">Jumlah (Qty)</td>
                            <td class="px-6 py-4">
                                @if ($product->qty > 10)
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-400">
                                        {{ $product->qty }} unit — In Stock
                                    </span>
                                @elseif ($product->qty > 0)
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700 dark:bg-yellow-900/40 dark:text-yellow-400">
                                        {{ $product->qty }} unit — Low Stock
                                    </span>
                                @else
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-400">
                                        0 unit — Habis
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider w-40 align-top">Harga</td>
                            <td class="px-6 py-4 text-lg font-bold text-gray-900 dark:text-gray-100">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider w-40 align-top">Pemilik</td>
                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $product->user->name ?? '-' }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $product->user->email ?? '' }}</p>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider w-40 align-top">Dibuat Pada</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $product->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-semibold text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider w-40 align-top">Diperbarui</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $product->updated_at->format('d M Y, H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
