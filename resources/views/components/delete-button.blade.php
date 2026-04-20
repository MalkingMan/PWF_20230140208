{{--
    Component: Delete Button
    ========================
    Digunakan untuk menampilkan tombol Delete yang mengirim request DELETE
    melalui form POST (karena HTML tidak mendukung method DELETE secara langsung).

    Props:
    - $action         : URL action form (route destroy) — wajib
    - $label          : Teks label tombol (opsional, default: 'Delete')
    - $confirmMessage : Pesan konfirmasi JS (opsional)

    Contoh pemakaian:
    <x-delete-button :action="route('product.destroy', $product)" />
    <x-delete-button :action="route('product.destroy', $product)"
                     label="Hapus"
                     confirm-message="Yakin hapus produk ini?" />

    Catatan penting:
    - Menggunakan form POST karena HTML form tidak mendukung method DELETE.
    - @csrf       → token keamanan Laravel (wajib ada di setiap form POST).
    - @method('DELETE') → memberi tahu Laravel bahwa ini adalah request DELETE.
    - onsubmit    → konfirmasi JavaScript sebelum form dikirim.
--}}

<form action="{{ $action }}"
      method="POST"
      class="inline"
      onsubmit="return confirm('{{ $confirmMessage }}')">

    {{-- Token keamanan CSRF (wajib!) --}}
    @csrf

    {{-- Spoofing method DELETE karena HTML hanya mendukung GET dan POST --}}
    @method('DELETE')

    <button type="submit"
            title="{{ $label }}"
            {{ $attributes->merge([
                'class' => 'inline-flex items-center gap-1.5 px-3 py-1.5
                            bg-red-100 text-red-700 text-xs font-semibold
                            rounded-lg border border-red-200
                            hover:bg-red-200 hover:text-red-800
                            dark:bg-red-500/10 dark:text-red-400 dark:border-red-500/30
                            dark:hover:bg-red-500/20
                            transition duration-150 ease-in-out'
            ]) }}>

        {{-- Ikon tempat sampah (Delete) --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                     a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4
                     a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>

        {{ $label }}
    </button>
</form>
