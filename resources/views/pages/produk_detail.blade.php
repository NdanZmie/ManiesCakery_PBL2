@extends('layouts.app')
@section('title', 'Manies Cakery - Detail Produk')
@section('content')

<div class="py-10">
    <div class="flex w-full gap-5">
        <div class="flex flex-col">
            <div class="min-w-70 rounded-xl overflow-hidden h-80 shadow-md border">
                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Custom Matcha" class="object-cover w-full h-full">
            </div>
            <br>
        </div>
        <div class="flex flex-col">
            <p class="text-2xl font-bold capitalize text-accent">{{ $produk->nama }}</p>
            <p>{{ $produk->deskripsi }}</p>
            <br>
            <p class="text-2xl font-bold capitalize text-secondary">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
            <br>
            <div class="flex gap-4 mt-4">
                {{-- <a href="{{ $produk->link_instagram }}" target="_blank"
                  class="flex items-center gap-5 bg-secondary py-4 px-4 text-white rounded-lg">
                    <!-- Icon Instagram -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="size-6">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.206.056 2.003.24 2.466.403a4.92 4.92 0 011.675 1.085 4.92 4.92 0 011.085 1.675c.163.463.347 1.26.403 2.466.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.056 1.206-.24 2.003-.403 2.466a4.92 4.92 0 01-1.085 1.675 4.92 4.92 0 01-1.675 1.085c-.463.163-1.26.347-2.466.403-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.206-.056-2.003-.24-2.466-.403a4.902 4.902 0 01-2.76-2.76c-.163-.463-.347-1.26-.403-2.466C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.85c.056-1.206.24-2.003.403-2.466a4.902 4.902 0 012.76-2.76c.463-.163 1.26-.347 2.466-.403C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.013 7.052.07 5.775.127 4.828.315 4.003.634 3.148.96 2.44 1.416 1.757 2.1.996 2.862.54 3.57.213 4.425.059 4.94-.127 5.775-.184 7.052-.241 8.332-.254 8.741-.254 12s.013 3.668.07 4.948c.057 1.277.245 2.224.564 3.049.326.855.782 1.563 1.465 2.247.763.762 1.47 1.219 2.325 1.545.825.319 1.772.507 3.049.564 1.28.057 1.689.07 4.948.07s3.668-.013 4.948-.07c1.277-.057 2.224-.245 3.049-.564.855-.326 1.563-.782 2.247-1.465.762-.763 1.219-1.47 1.545-2.325.319-.825.507-1.772.564-3.049.057-1.28.07-1.689.07-4.948s-.013-3.668-.07-4.948c-.057-1.277-.245-2.224-.564-3.049-.326-.855-.782-1.563-1.465-2.247a5.935 5.935 0 00-2.325-1.545c-.825-.319-1.772-.507-3.049-.564C15.668.013 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/>
                    </svg>
                    <span>lihat di instagram</span>
                </a> --}}
                <a
                  @if ($produk->link_instagram)
                    href="{{ $produk->link_instagram }}"
                    target="_blank"
                  @else
                    href="#"
                    data-modal-target="noLinkModal"
                    data-modal-toggle="noLinkModal"
                  @endif
                  class="flex items-center gap-5 bg-secondary py-4 px-4 text-white rounded-lg hover:bg-secondary/80 transition"
                >
                  <!-- Icon Instagram -->
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg" class="size-6">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.206.056 2.003.24 2.466.403a4.92 4.92 0 011.675 1.085 4.92 4.92 0 011.085 1.675c.163.463.347 1.26.403 2.466.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.056 1.206-.24 2.003-.403 2.466a4.92 4.92 0 01-1.085 1.675 4.92 4.92 0 01-1.675 1.085c-.463.163-1.26.347-2.466.403-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.206-.056-2.003-.24-2.466-.403a4.902 4.902 0 01-2.76-2.76c-.163-.463-.347-1.26-.403-2.466C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.85c.056-1.206.24-2.003.403-2.466a4.902 4.902 0 012.76-2.76c.463-.163 1.26-.347 2.466-.403C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.013 7.052.07 5.775.127 4.828.315 4.003.634 3.148.96 2.44 1.416 1.757 2.1.996 2.862.54 3.57.213 4.425.059 4.94-.127 5.775-.184 7.052-.241 8.332-.254 8.741-.254 12s.013 3.668.07 4.948c.057 1.277.245 2.224.564 3.049.326.855.782 1.563 1.465 2.247.763.762 1.47 1.219 2.325 1.545.825.319 1.772.507 3.049.564 1.28.057 1.689.07 4.948.07s3.668-.013 4.948-.07c1.277-.057 2.224-.245 3.049-.564.855-.326 1.563-.782 2.247-1.465.762-.763 1.219-1.47 1.545-2.325.319-.825.507-1.772.564-3.049.057-1.28.07-1.689.07-4.948s-.013-3.668-.07-4.948c-.057-1.277-.245-2.224-.564-3.049-.326-.855-.782-1.563-1.465-2.247a5.935 5.935 0 00-2.325-1.545c-.825-.319-1.772-.507-3.049-.564C15.668.013 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/>
                  </svg>
                  <span>lihat di instagram</span>
                </a>
                <div id="noLinkModal" tabindex="-1" aria-hidden="true"
                  class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto inset-0 max-h-full bg-black/20">
                  <div class="relative w-full max-w-md max-h-full m-auto">
                    <div class="relative bg-white rounded-lg shadow">
                      <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 text-red-500 w-12 h-12" fill="none" stroke="currentColor"
                          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">
                          Maaf, link Instagram belum tersedia.
                        </h3>
                        <button data-modal-hide="noLinkModal" type="button"
                          class="bg-primary hover:bg-primary/90 focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                          Tutup
                        </button>
                      </div>
                    </div>
                  </div>
                </div>


                
            <!-- link whatsapp -->
            @php
                  $hargaFormat = number_format($produk->harga, 0, ',', '.');

                  $pesan = "Halo Manies Cakery 👋\n\n" .
                          "Saya ingin melakukan pemesanan produk berikut:\n\n" .
                          "Nama Pembeli    : \n" .
                          "🧁 Nama Produk : {$produk->nama}\n" .
                          "💰 Harga       : Rp {$hargaFormat}\n" .
                          "🔢 Jumlah      : \n" .
                          "📅 Tanggal Kirim : \n" .
                          "📍 Alamat Pengiriman :\n" .
                          "(isi di sini)\n\n" .
                          "🧾 Catatan Tambahan:\n" .
                          "-\n\n" .
                          "Mohon konfirmasi ketersediaan dan total pembayaran ya. Terima kasih 😊";

                  $linkWa = 'https://wa.me/6289665314602?text=' . urlencode($pesan);
              @endphp


            <a href="{{ $linkWa }}" target="_blank" class="flex items-center gap-5 bg-secondary py-4 px-4 text-white rounded-lg">
              <!-- Icon WhatsApp -->
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 448 512">
                  <path d="M380.9 97.1C339-2.5 231.9-33.8 144.8 6.7C84.7 33.7 44.2 95.1 48.7 161.4c2.2 31.3 11.1 62.1 25.8 89.9L32.8 480l234.5-65.8c24.7 7 50.4 10.7 76.1 10.7c88.7 0 164.5-59.6 185.6-144.6c15.5-64.2-2.7-132.6-56.1-183.2zM229.6 377.4c-32.5-1.5-64.3-9.8-93.1-24.6l-8.2-4.4l-69 19.3l18.4-67.4l-4.3-8.3c-14.5-28-22.1-59.2-22-91.1c.5-102.5 83.8-185.5 186.3-184.9c49.7.2 96.3 19.9 131.3 55c35.2 35.4 54.7 82.2 54.5 131.9c-.4 102.6-83.8 185.4-186.4 185.1zm101.3-138.4c-5.5-2.8-32.6-16.1-37.7-17.9c-5.1-1.9-8.8-2.8-12.6 2.8c-3.7 5.6-14.5 17.9-17.8 21.6c-3.3 3.7-6.6 4.2-12.1 1.4c-33.1-16.5-54.8-29.5-76.6-66.8c-5.8-9.9 5.8-9.2 16.5-30.6c1.8-3.7.9-6.9-.5-9.6c-1.4-2.8-12.6-30.3-17.3-41.5c-4.6-11.2-9.3-9.6-12.6-9.8c-3.2-.2-6.9-.2-10.5-.2s-9.6 1.4-14.6 6.9c-5.1 5.6-19.3 18.9-19.3 46s19.8 53.5 22.5 57.2c2.8 3.7 38.8 59.2 94.1 83.1c13.2 5.7 23.5 9.1 31.5 11.6c13.2 4.2 25.2 3.6 34.7 2.2c10.6-1.6 32.6-13.3 37.2-26.2c4.6-13 4.6-24.1 3.2-26.3c-1.3-2.2-5-3.6-10.5-6.3z"/>
              </svg>
              <span>Chat Via WhatsApp</span>
            </a>
            </div>
        </div>
    </div>
    <br>
    <hr class="border-2 border-[#493C32]">
    <br>
    <div class="text-5xl font-bold text-secondary font-norican">Produk lainnya</div>
    <div class="py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 w-full">
        <!-- Item Start -->
        @foreach ([
          ['title' => 'Cake', 'image' => 'Cake-M.png'],
          ['title' => 'Brownies', 'image' => 'Brownies-M.png'],
          ['title' => 'Cookies', 'image' => 'Cookies-M.png'],
          ['title' => 'Hampers', 'image' => 'Hampers-M.png'],
          ['title' => 'Small Cake', 'image' => 'Small-M.png']
        ] as $item)
        <div class="relative group overflow-hidden rounded-2xl bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
          <a href="{{ route('produk.index', $item['title']) }}">
            <!-- Background blur -->
            <img src="{{ asset('assets/' . $item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
      
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/30 to-black/60 group-hover:backdrop-blur-sm transition-all duration-500"></div>
      
            <!-- Content Overlay -->
            <div class="absolute bottom-0 w-full p-4 text-center">
              <h2 class="text-white text-2xl font-bold tracking-wide uppercase drop-shadow-md">{{ $item['title'] }}</h2>
              <span class="mt-2 inline-block px-4 py-1 text-sm text-white border border-white rounded-full bg-white/10 hover:bg-white/20 transition-colors duration-300">See More</span>
            </div>
          </a>
        </div>
        @endforeach
      </div>
</div>
@endsection