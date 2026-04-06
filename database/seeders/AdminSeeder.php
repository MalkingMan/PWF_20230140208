<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Ubah user pertama menjadi admin.
     */
    public function run(): void
    {
        // Ubah user pertama menjadi admin
        $user = User::first();

        if ($user) {
            $user->update(['role' => 'admin']);
            $this->command->info("User '{$user->name}' telah diubah menjadi admin.");
        } else {
            $this->command->warn('Tidak ada user ditemukan. Silakan register terlebih dahulu.');
        }
    }
}
