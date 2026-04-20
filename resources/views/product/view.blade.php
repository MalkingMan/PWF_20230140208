<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            {{-- Judul halaman --}}
            <h2 class="font-bold text-2xl text-white leading-tight">
                Detail Produk
            </h2>

            {{-- Tombol aksi: Edit, Hapus --}}
            <div class="flex items-center gap-3">
                {{-- Edit --}}
                @can('update', $product)
                <a href="{{ route('product.edit', $product) }}"
                    class="inline-flex items-center gap-2 px-4 py-1.5 text-sm font-medium text-yellow-500
                           bg-transparent rounded-lg border border-yellow-500
                           hover:bg-yellow-500 hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>
                @endcan

                {{-- Hapus --}}
                @can('delete', $product)
                <form action="{{ route('product.destroy', $product) }}"
                    method="POST"
                    class="inline"
                    onsubmit="return confirm('Yakin ingin menghapus produk \'{{ $product->name }}\'?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-1.5 text-sm font-medium text-red-500
                               bg-transparent rounded-lg border border-red-500
                               hover:bg-red-500 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete
                    </button>
                </form>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            {{-- Card detail produk --}}
            <div class="rounded-xl border border-gray-600 overflow-hidden bg-transparent">

                <table class="w-full text-sm text-left border-collapse">
                    <tbody>

                        {{-- NAMA PRODUK --}}
                        <tr class="border-b border-gray-600">
                            <td class="px-6 py-3 text-xs font-semibold uppercase tracking-wider
                                       text-gray-400 w-44 align-middle border-r border-gray-600">
                                Nama Produk
                            </td>
                            <td class="px-6 py-3 text-base font-bold text-white">
                                {{ $product->name }}
                            </td>
                        </tr>

                        {{-- JUMLAH (QTY) --}}
                        <tr class="border-b border-gray-600">
                            <td class="px-6 py-3 text-xs font-semibold uppercase tracking-wider
                                       text-gray-400 w-44 align-middle border-r border-gray-600">
                                Jumlah (QTY)
                            </td>
                            <td class="px-6 py-3 text-sm font-medium text-white">
                                @if ($product->qty > 10)
                                {{ $product->qty }} unit — In Stock
                                @elseif ($product->qty > 0)
                                {{ $product->qty }} unit — Low Stock
                                @else
                                0 unit — Habis
                                @endif
                            </td>
                        </tr>

                        {{-- HARGA --}}
                        <tr class="border-b border-gray-600">
                            <td class="px-6 py-3 text-xs font-semibold uppercase tracking-wider
                                       text-gray-400 w-44 align-middle border-r border-gray-600">
                                Harga
                            </td>
                            <td class="px-6 py-3 text-base font-bold text-white">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                        </tr>

                        {{-- PEMILIK --}}
                        <tr class="border-b border-gray-600">
                            <td class="px-6 py-3 text-xs font-semibold uppercase tracking-wider
                                       text-gray-400 w-44 align-middle border-r border-gray-600">
                                Pemilik
                            </td>
                            <td class="px-6 py-3">
                                <p class="font-bold text-white text-sm">
                                    {{ $product->user->name ?? '-' }}
                                </p>
                                <p class="text-sm text-gray-400">
                                    {{ $product->user->email ?? '' }}
                                </p>
                            </td>
                        </tr>

                        {{-- DIBUAT PADA --}}
                        <tr class="border-b border-gray-600">
                            <td class="px-6 py-3 text-xs font-semibold uppercase tracking-wider
                                       text-gray-400 w-44 align-middle border-r border-gray-600">
                                Dibuat Pada
                            </td>
                            <td class="px-6 py-3 text-sm text-gray-300">
                                {{ $product->created_at->format('d M Y, H:i') }}
                            </td>
                        </tr>

                        {{-- DIPERBARUI --}}
                        <tr>
                            <td class="px-6 py-3 text-xs font-semibold uppercase tracking-wider
                                       text-gray-400 w-44 align-middle border-r border-gray-600">
                                Diperbarui
                            </td>
                            <td class="px-6 py-3 text-sm text-gray-300">
                                {{ $product->updated_at->format('d M Y, H:i') }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>