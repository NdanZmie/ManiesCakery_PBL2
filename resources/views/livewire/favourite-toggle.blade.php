<div class="inline-flex items-center">
    <button 
        wire:click="toggleFavourite" 
        wire:loading.attr="disabled"
        type="button"
        title="{{ $isFavourite ? 'Klik untuk menghapus dari Menu Favorit Beranda' : 'Klik untuk menampilkan sebagai Menu Favorit di Beranda' }}"
        class="cursor-pointer inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold transition-all duration-200 active:scale-95 shadow-sm {{ $isFavourite ? 'bg-amber-100 text-amber-900 border border-amber-300 hover:bg-amber-200 hover:shadow-amber-500/20' : 'bg-gray-100 text-gray-500 border border-gray-200 hover:bg-amber-50 hover:text-amber-800 hover:border-amber-200' }}"
    >
        <span wire:loading.remove>
            @if ($isFavourite)
                <span class="text-amber-500 text-sm">⭐</span>
                <span>Favorit (Beranda)</span>
            @else
                <span class="text-gray-400 text-sm">☆</span>
                <span>Jadikan Favorit</span>
            @endif
        </span>
        
        <span wire:loading class="inline-flex items-center gap-1 text-amber-800">
            <svg class="animate-spin h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="text-[11px]">Memproses...</span>
        </span>
    </button>
</div>
