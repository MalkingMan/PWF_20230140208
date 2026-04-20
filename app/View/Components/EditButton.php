<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Component reusable untuk tombol Edit.
 *
 * Cara pakai di Blade:
 *   <x-edit-button :url="route('product.edit', $product)" />
 *   <x-edit-button :url="route('product.edit', $product)" label="Ubah" />
 */
class EditButton extends Component
{
    /**
     * URL tujuan halaman edit.
     */
    public string $url;

    /**
     * Teks label tombol (opsional, default: 'Edit').
     */
    public string $label;

    /**
     * Constructor menerima data dari Blade.
     */
    public function __construct(string $url, string $label = 'Edit')
    {
        $this->url   = $url;
        $this->label = $label;
    }

    /**
     * Tentukan view yang akan dirender untuk component ini.
     */
    public function render()
    {
        return view('components.edit-button');
    }
}
