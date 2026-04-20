{{--
    Component: Edit Button
    =====================
    Digunakan untuk menampilkan tombol Edit yang mengarah ke halaman form edit.

    Props:
    - $url   : URL tujuan halaman edit (wajib)
    - $label : Teks label tombol (opsional, default: 'Edit')

    Contoh pemakaian:
    <x-edit-button :url="route('product.edit', $product)" />
    <x-edit-button :url="route('product.edit', $product)" label="Ubah Data" />
--}}

<a href="{{ $url }}"
   title="{{ $label }}"
   class="inline-flex items-center gap-1.5 px-3 py-1.5
          bg-yellow-100 text-yellow-700 text-xs font-semibold
          rounded-lg border border-yellow-200
          hover:bg-yellow-200 hover:text-yellow-800
          dark:bg-yellow-500/10 dark:text-yellow-400 dark:border-yellow-500/30
          dark:hover:bg-yellow-500/20
          transition duration-150 ease-in-out">

    {{-- Ikon pensil (Edit) --}}
    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5
                 m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
    </svg>

    {{ $label }}
</a>
