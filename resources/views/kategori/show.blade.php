<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Detail Kategori
            </h2>
            <div class="flex items-center gap-2">
                <a href="{{ route('kategori.index') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    Kembali
                </a>
                <a href="{{ route('kategori.edit', $kategori) }}"
                   class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                    Edit
                </a>
                <form action="{{ route('kategori.destroy', $kategori) }}" method="POST"
                      onsubmit="return confirm('Hapus kategori ini?')" class="inline">
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
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden border border-gray-200 dark:border-gray-700">
                <table class="w-full text-sm text-left">
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider w-40 align-top">Nama Kategori</td>
                            <td class="px-6 py-4 text-lg font-bold text-gray-900 dark:text-gray-100">{{ $kategori->name }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider w-40 align-top">Produk</td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">{{ $kategori->product->name ?? '-' }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider w-40 align-top">Dibuat</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $kategori->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-semibold text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider w-40 align-top">Diperbarui</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $kategori->updated_at->format('d M Y, H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
