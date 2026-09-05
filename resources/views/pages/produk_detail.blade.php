@extends('layouts.app')
@section('title', 'Manies Cakery - ' . $produk->nama)

@section('content')
<div class="py-8 max-w-6xl mx-auto">

    <!-- Breadcrumb Navigation -->
    <nav class="flex items-center gap-2 text-xs md:text-sm text-gray-500 mb-8 overflow-x-auto whitespace-nowrap">
        <a href="/" class="hover:text-amber-800 transition">Beranda</a>
        <span>/</span>
        <a href="{{ route('produk.index', '*') }}" class="hover:text-amber-800 transition">Katalog Produk</a>
        <span>/</span>
        <a href="{{ route('produk.index', $produk->kategori) }}" class="hover:text-amber-800 transition font-medium text-gray-700">{{ $produk->kategori }}</a>
        <span>/</span>
        <span class="text-amber-900 font-semibold truncate">{{ $produk->nama }}</span>
    </nav>

    <!-- Main Product Section -->
    <div class="bg-white rounded-3xl p-6 md:p-10 border border-amber-100 shadow-sm grid md:grid-cols-2 gap-8 lg:gap-12 items-start">
        
        <!-- Left Column: Product Image Gallery -->
        <div class="flex flex-col gap-4">
            <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-amber-50/50 border border-amber-100 shadow-inner group">
                <img 
                    src="{{ asset('storage/' . $produk->gambar) }}" 
                    alt="{{ $produk->nama }}" 
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    onerror="this.onerror=null; this.src='{{ asset('assets/banner.png') }}';"
                >
                
                <!-- Floating Badges -->
                <div class="absolute top-4 left-4 flex flex-col gap-2">
                    <span class="px-3 py-1 bg-white/95 backdrop-blur text-amber-900 border border-amber-100 text-xs font-bold rounded-full shadow-sm">
                        {{ $produk->kategori }}
                    </span>
                    @if($produk->favourit)
                        <span class="px-3 py-1 bg-gradient-to-r from-amber-500 to-amber-600 text-white text-xs font-bold rounded-full shadow-md">
                            ★ Menu Favorit
                        </span>
                    @endif
                </div>

                @if(!$produk->status)
                    <div class="absolute inset-0 bg-black/40 backdrop-blur-xs flex items-center justify-center">
                        <span class="px-4 py-2 bg-red-600 text-white font-bold rounded-xl text-sm shadow-lg">
                            Stok Sedang Habis / Nonaktif
                        </span>
                    </div>
                @endif
            </div>

            <!-- Guarantee Highlights -->
            <div class="grid grid-cols-3 gap-2 text-center text-xs text-gray-600 pt-2">
                <div class="p-2.5 bg-amber-50/60 rounded-xl border border-amber-100">
                    <span class="text-base block mb-0.5">🧁</span>
                    <span class="font-semibold text-gray-800">Fresh Baked</span>
                </div>
                <div class="p-2.5 bg-amber-50/60 rounded-xl border border-amber-100">
                    <span class="text-base block mb-0.5">🌿</span>
                    <span class="font-semibold text-gray-800">Bahan Alami</span>
                </div>
                <div class="p-2.5 bg-amber-50/60 rounded-xl border border-amber-100">
                    <span class="text-base block mb-0.5">🚚</span>
                    <span class="font-semibold text-gray-800">Pesan Antar</span>
                </div>
            </div>
        </div>

        <!-- Right Column: Product Info & Order Action -->
        <div class="flex flex-col justify-between h-full">
            <div>
                <!-- Category and Title -->
                <span class="text-xs font-bold text-amber-700 uppercase tracking-wider block mb-1">
                    {{ $produk->kategori }} • Manies Cakery
                </span>
                <h1 class="text-2xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-3">
                    {{ $produk->nama }}
                </h1>

                <!-- Price Tag -->
                <div class="bg-amber-50/80 border border-amber-200/80 rounded-2xl p-4 mb-6 inline-block w-full">
                    <span class="text-xs text-gray-500 font-medium block">Harga Satuan:</span>
                    <span class="text-3xl font-extrabold text-[#493C32]">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </span>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <h3 class="text-xs font-bold text-gray-800 uppercase tracking-wider mb-2">Deskripsi Produk</h3>
                    <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                        {{ $produk->deskripsi }}
                    </p>
                </div>

                <!-- Quantity Selector -->
                <div class="mb-8">
                    <label class="text-xs font-bold text-gray-800 uppercase tracking-wider block mb-2">Jumlah Pesanan</label>
                    <div class="flex items-center gap-3">
                        <div class="inline-flex items-center border border-gray-300 rounded-xl bg-gray-50 overflow-hidden">
                            <button type="button" onclick="changeQty(-1)" class="px-3.5 py-2 text-gray-600 hover:bg-gray-200 text-base font-bold transition">&minus;</button>
                            <input type="number" id="orderQty" value="1" min="1" max="50" onchange="updateWhatsAppLink()" class="w-14 text-center bg-transparent border-none text-sm font-bold text-gray-800 focus:outline-none focus:ring-0">
                            <button type="button" onclick="changeQty(1)" class="px-3.5 py-2 text-gray-600 hover:bg-gray-200 text-base font-bold transition">&plus;</button>
                        </div>
                        <span class="text-xs text-gray-400">Total: <strong id="totalPrice" class="text-gray-800 font-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</strong></span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-100">
                <!-- WhatsApp Order Button -->
                <a 
                    id="waOrderBtn"
                    href="#" 
                    target="_blank" 
                    class="flex-1 inline-flex items-center justify-center gap-2.5 bg-emerald-600 hover:bg-emerald-700 text-white py-3.5 px-6 rounded-2xl font-bold text-sm shadow-md hover:shadow-lg transition-all duration-200 transform active:scale-98"
                >
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 448 512">
                        <path d="M380.9 97.1C339-2.5 231.9-33.8 144.8 6.7C84.7 33.7 44.2 95.1 48.7 161.4c2.2 31.3 11.1 62.1 25.8 89.9L32.8 480l234.5-65.8c24.7 7 50.4 10.7 76.1 10.7c88.7 0 164.5-59.6 185.6-144.6c15.5-64.2-2.7-132.6-56.1-183.2zM229.6 377.4c-32.5-1.5-64.3-9.8-93.1-24.6l-8.2-4.4l-69 19.3l18.4-67.4l-4.3-8.3c-14.5-28-22.1-59.2-22-91.1c.5-102.5 83.8-185.5 186.3-184.9c49.7.2 96.3 19.9 131.3 55c35.2 35.4 54.7 82.2 54.5 131.9c-.4 102.6-83.8 185.4-186.4 185.1zm101.3-138.4c-5.5-2.8-32.6-16.1-37.7-17.9c-5.1-1.9-8.8-2.8-12.6 2.8c-3.7 5.6-14.5 17.9-17.8 21.6c-3.3 3.7-6.6 4.2-12.1 1.4c-33.1-16.5-54.8-29.5-76.6-66.8c-5.8-9.9 5.8-9.2 16.5-30.6c1.8-3.7.9-6.9-.5-9.6c-1.4-2.8-12.6-30.3-17.3-41.5c-4.6-11.2-9.3-9.6-12.6-9.8c-3.2-.2-6.9-.2-10.5-.2s-9.6 1.4-14.6 6.9c-5.1 5.6-19.3 18.9-19.3 46s19.8 53.5 22.5 57.2c2.8 3.7 38.8 59.2 94.1 83.1c13.2 5.7 23.5 9.1 31.5 11.6c13.2 4.2 25.2 3.6 34.7 2.2c10.6-1.6 32.6-13.3 37.2-26.2c4.6-13 4.6-24.1 3.2-26.3c-1.3-2.2-5-3.6-10.5-6.3z"/>
                    </svg>
                    <span>Pesan via WhatsApp</span>
                </a>

                <!-- Instagram Link Button -->
                @if ($produk->link_instagram)
                    <a 
                        href="{{ $produk->link_instagram }}" 
                        target="_blank" 
                        class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-pink-500 via-red-500 to-amber-500 hover:opacity-90 text-white py-3.5 px-5 rounded-2xl font-bold text-sm shadow transition duration-200"
                    >
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.206.056 2.003.24 2.466.403a4.92 4.92 0 011.675 1.085 4.92 4.92 0 011.085 1.675c.163.463.347 1.26.403 2.466.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.056 1.206-.24 2.003-.403 2.466a4.92 4.92 0 01-1.085 1.675 4.92 4.92 0 01-1.675 1.085c-.463.163-1.26.347-2.466.403-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.206-.056-2.003-.24-2.466-.403a4.902 4.902 0 01-2.76-2.76c-.163-.463-.347-1.26-.403-2.466C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.85c.056-1.206.24-2.003.403-2.466a4.902 4.902 0 012.76-2.76c.463-.163 1.26-.347 2.466-.403C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.013 7.052.07 5.775.127 4.828.315 4.003.634 3.148.96 2.44 1.416 1.757 2.1.996 2.862.54 3.57.213 4.425.059 4.94-.127 5.775-.184 7.052-.241 8.332-.254 8.741-.254 12s.013 3.668.07 4.948c.057 1.277.245 2.224.564 3.049.326.855.782 1.563 1.465 2.247.763.762 1.47 1.219 2.325 1.545.825.319 1.772.507 3.049.564 1.28.057 1.689.07 4.948.07s3.668-.013 4.948-.07c1.277-.057 2.224-.245 3.049-.564.855-.326 1.563-.782 2.247-1.465.762-.763 1.219-1.47 1.545-2.325.319-.825.507-1.772.564-3.049.057-1.28.07-1.689.07-4.948s-.013-3.668-.07-4.948c-.057-1.277-.245-2.224-.564-3.049-.326-.855-.782-1.563-1.465-2.247a5.935 5.935 0 00-2.325-1.545c-.825-.319-1.772-.507-3.049-.564C15.668.013 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/>
                        </svg>
                        <span>Instagram</span>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Related Products / Other Categories Section -->
    <div class="mt-16">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Jelajahi Kategori Lainnya</h2>
                <p class="text-sm text-gray-500 mt-1">Temukan aneka kreasi lezat lainnya dari Manies Cakery</p>
            </div>
            <a href="{{ route('produk.index', '*') }}" class="text-xs md:text-sm font-semibold text-amber-800 hover:text-amber-900 flex items-center gap-1">
                <span>Lihat Semua Katalog</span> &rarr;
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 md:gap-6">
            @foreach ([
              ['title' => 'Cake', 'image' => 'produk/Cake-M.png'],
              ['title' => 'Brownies', 'image' => 'produk/Brownies-M.png'],
              ['title' => 'Cookies', 'image' => 'produk/Cookies-M.png'],
              ['title' => 'Hampers', 'image' => 'hampers/Hampers-M.png'],
              ['title' => 'Small Cake', 'image' => 'produk/Small-M.png']
            ] as $item)
            <div class="relative group overflow-hidden rounded-2xl bg-white shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1.5 border border-amber-100/60">
              <a href="{{ route('produk.index', $item['title']) }}" class="block">
                <img src="{{ asset('assets/' . $item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-44 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent flex flex-col justify-end p-4">
                  <h3 class="text-white text-base font-bold uppercase tracking-wide">{{ $item['title'] }}</h3>
                  <span class="text-white/80 text-xs inline-flex items-center gap-1 group-hover:text-amber-300 transition-colors">
                    Lihat Koleksi &rarr;
                  </span>
                </div>
              </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Dynamic WhatsApp Script -->
<script>
    const unitPrice = {{ $produk->harga }};
    const productName = "{{ addslashes($produk->nama) }}";

    function changeQty(delta) {
        const input = document.getElementById('orderQty');
        let current = parseInt(input.value) || 1;
        current = Math.max(1, Math.min(50, current + delta));
        input.value = current;
        updateWhatsAppLink();
    }

    function updateWhatsAppLink() {
        const qty = parseInt(document.getElementById('orderQty').value) || 1;
        const total = unitPrice * qty;
        
        // Update total display
        document.getElementById('totalPrice').innerText = 'Rp ' + total.toLocaleString('id-ID');

        // Construct WA message
        const message = "Halo Manies Cakery 👋\n\n" +
            "Saya ingin memesan:\n" +
            "🧁 Produk: " + productName + "\n" +
            "🔢 Jumlah: " + qty + " pcs\n" +
            "💰 Estimasi Total: Rp " + total.toLocaleString('id-ID') + "\n\n" +
            "Mohon konfirmasi ketersediaan & jadwal pengirimannya ya. Terima kasih! 😊";

        const waUrl = "https://wa.me/6289665314602?text=" + encodeURIComponent(message);
        document.getElementById('waOrderBtn').href = waUrl;
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', updateWhatsAppLink);
</script>

@endsection