<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center gap-2">
                    <span>Selamat datang kembali, <strong>{{ Auth::user()->name }}</strong>! Anda saat ini login dengan Role:</span>
                    <span class="px-3 py-1 text-xs font-bold uppercase rounded-full {{ Auth::user()->role === 'admin' ? 'bg-indigo-100 text-indigo-700' : 'bg-gray-100 text-gray-700' }}">
                        {{ Auth::user()->role }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
