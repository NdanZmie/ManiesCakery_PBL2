@php
    $hargaFormat = number_format($produk->harga, 0, ',', '.');
    $pesanWa = "Halo Manies Cakery 👋\n\nSaya ingin memesan produk berikut:\n🧁 Nama: {$produk->nama}\n💰 Harga: Rp {$hargaFormat}\n\nMohon info ketersediaan & cara pemesanan. Terima kasih!";
    $waLink = 'https://wa.me/6289665314602?text=' . urlencode($pesanWa);
@endphp

<div 
    class="card-container relative bg-white rounded-2xl overflow-hidden border border-amber-100/80 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group {{ $produk->status ? '' : 'opacity-60 bg-gray-50' }}"
    onclick="handleCardClick(this)"
>
    <!-- Hidden Checkbox for Admin Mode -->
    <input type="checkbox" name="selected_products[]" value="{{ $produk->id }}" class="hidden card-checkbox">

    <!-- Card Top: Media & Floating Badges -->
    <div class="relative w-full h-48 overflow-hidden bg-amber-50">
        <a href="{{ route('produk.detail', $produk->id) }}" class="card-link block w-full h-full">
            <img 
                src="{{ asset('storage/' . $produk->gambar) }}" 
                alt="{{ $produk->nama }}" 
                class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                onerror="this.onerror=null; this.src='{{ asset('assets/banner.png') }}';"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </a>

        <!-- Floating Category Badge (Top Left) -->
        <div class="absolute top-3 left-3 z-10">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/95 text-amber-900 shadow-sm border border-amber-100 backdrop-blur-sm">
                {{ $produk->kategori }}
            </span>
        </div>

        <!-- Floating Status / Favorite Badge (Top Right) -->
        <div class="absolute top-3 right-3 z-10 flex flex-col gap-1 items-end">
            @if (!$produk->status)
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold bg-red-600 text-white shadow-sm">
                    Nonaktif
                </span>
            @elseif ($produk->favourit)
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-500 text-white shadow-md">
                    <span>★</span> Favorit
                </span>
            @endif
        </div>

        <!-- Selected Checkmark for Admin Edit Mode -->
        <div class="absolute top-3 right-3 hidden selected-check z-20">
            <div class="w-7 h-7 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-lg border-2 border-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Card Body -->
    <div class="p-4 flex flex-col flex-grow justify-between">
        <div>
            <!-- Title -->
            <a href="{{ route('produk.detail', $produk->id) }}" class="card-link block group-hover:text-amber-800 transition-colors">
                <h3 class="font-bold text-gray-900 text-base leading-snug line-clamp-1" title="{{ $produk->nama }}">
                    {{ $produk->nama }}
                </h3>
            </a>

            <!-- Description -->
            <p class="text-xs text-gray-500 mt-1 line-clamp-2 leading-relaxed min-h-[32px]">
                {{ $produk->deskripsi }}
            </p>
        </div>

        <!-- Price and Action Area -->
        <div class="mt-4 pt-3 border-t border-gray-100">
            <div class="flex items-center justify-between gap-2">
                <div>
                    <span class="text-[10px] uppercase font-semibold text-gray-400 block tracking-wider">Harga</span>
                    <span class="text-lg font-extrabold text-[#493C32]">
                        Rp {{ $hargaFormat }}
                    </span>
                </div>

                <!-- Action Button Group -->
                <div class="flex items-center gap-1.5">
                    <!-- WhatsApp Quick Order -->
                    <a 
                        href="{{ $waLink }}" 
                        target="_blank" 
                        title="Pesan via WhatsApp"
                        class="card-link p-2 bg-emerald-50 hover:bg-emerald-600 text-emerald-600 hover:text-white rounded-xl transition-all duration-200 shadow-sm border border-emerald-200/60 flex items-center justify-center"
                    >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 448 512">
                            <path d="M380.9 97.1C339-2.5 231.9-33.8 144.8 6.7C84.7 33.7 44.2 95.1 48.7 161.4c2.2 31.3 11.1 62.1 25.8 89.9L32.8 480l234.5-65.8c24.7 7 50.4 10.7 76.1 10.7c88.7 0 164.5-59.6 185.6-144.6c15.5-64.2-2.7-132.6-56.1-183.2zM229.6 377.4c-32.5-1.5-64.3-9.8-93.1-24.6l-8.2-4.4l-69 19.3l18.4-67.4l-4.3-8.3c-14.5-28-22.1-59.2-22-91.1c.5-102.5 83.8-185.5 186.3-184.9c49.7.2 96.3 19.9 131.3 55c35.2 35.4 54.7 82.2 54.5 131.9c-.4 102.6-83.8 185.4-186.4 185.1zm101.3-138.4c-5.5-2.8-32.6-16.1-37.7-17.9c-5.1-1.9-8.8-2.8-12.6 2.8c-3.7 5.6-14.5 17.9-17.8 21.6c-3.3 3.7-6.6 4.2-12.1 1.4c-33.1-16.5-54.8-29.5-76.6-66.8c-5.8-9.9 5.8-9.2 16.5-30.6c1.8-3.7.9-6.9-.5-9.6c-1.4-2.8-12.6-30.3-17.3-41.5c-4.6-11.2-9.3-9.6-12.6-9.8c-3.2-.2-6.9-.2-10.5-.2s-9.6 1.4-14.6 6.9c-5.1 5.6-19.3 18.9-19.3 46s19.8 53.5 22.5 57.2c2.8 3.7 38.8 59.2 94.1 83.1c13.2 5.7 23.5 9.1 31.5 11.6c13.2 4.2 25.2 3.6 34.7 2.2c10.6-1.6 32.6-13.3 37.2-26.2c4.6-13 4.6-24.1 3.2-26.3c-1.3-2.2-5-3.6-10.5-6.3z"/>
                        </svg>
                    </a>

                    <!-- Detail Link -->
                    <a 
                        href="{{ route('produk.detail', $produk->id) }}" 
                        class="card-link inline-flex items-center gap-1 px-3 py-1.5 bg-[#493C32] hover:bg-[#342b23] text-white text-xs font-semibold rounded-xl transition duration-200 shadow-sm"
                    >
                        <span>Detail</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay when selected in admin edit mode -->
    <div class="absolute inset-0 bg-blue-500/20 hidden selected-overlay rounded-2xl ring-2 ring-blue-600 pointer-events-none"></div>
</div>
