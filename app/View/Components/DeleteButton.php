<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Component reusable untuk tombol Delete.
 *
 * Cara pakai di Blade:
 *   <x-delete-button :action="route('product.destroy', $product)" />
 *   <x-delete-button :action="route('product.destroy', $product)"
 *                    label="Hapus"
 *                    confirm-message="Yakin ingin menghapus produk ini?" />
 */
class DeleteButton extends Component
{
    /**
     * URL action form POST (route destroy).
     */
    public string $action;

    /**
     * Teks label tombol (opsional, default: 'Delete').
     */
    public string $label;

    /**
     * Pesan konfirmasi JavaScript sebelum submit (opsional).
     */
    public string $confirmMessage;

    /**
     * Constructor menerima data dari Blade.
     */
    public function __construct(
        string $action,
        string $label = 'Delete',
        string $confirmMessage = 'Yakin ingin menghapus data ini?'
    ) {
        $this->action         = $action;
        $this->label          = $label;
        $this->confirmMessage = $confirmMessage;
    }

    /**
     * Tentukan view yang akan dirender untuk component ini.
     */
    public function render()
    {
        return view('components.delete-button');
    }
}
