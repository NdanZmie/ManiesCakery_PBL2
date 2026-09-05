
@extends('layouts.app')
@section('title', 'Manies Cakery - Fresh Homemade Cakes, Brownies & Hampers')
@section('content')

    <!-- Hero Banner Slider -->
    <div class="relative w-full mb-12">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-64 sm:h-80 md:h-96 lg:h-[460px] overflow-hidden rounded-2xl md:rounded-3xl shadow-2xl border border-amber-950/10 bg-[#241C16]">
                @for ($i = 1; $i <= 5; $i++)
                    @php
                        $slider = $sliders[$i - 1] ?? null;
                        $sliderImg = ($slider && $slider->gambar) ? asset('storage/slider/' . $slider->gambar) : asset('assets/banner.png');
                    @endphp
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ $sliderImg }}"
                             class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 brightness-[0.95] transition-transform duration-700 hover:scale-105"
                             alt="Manies Cakery Banner {{ $i }}"
                             onerror="this.src='{{ asset('assets/banner.png') }}'">
                        <!-- Subtle Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/10 pointer-events-none"></div>
                    </div>
                @endfor
            </div>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-2.5 rtl:space-x-reverse bg-black/40 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/10">
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>

            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 md:w-12 md:h-12 rounded-full bg-black/40 backdrop-blur-md border border-white/20 group-hover:bg-[#DFAC6B] group-hover:text-[#241C16] text-white transition-all shadow-lg">
                    <svg class="w-5 h-5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 md:w-12 md:h-12 rounded-full bg-black/40 backdrop-blur-md border border-white/20 group-hover:bg-[#DFAC6B] group-hover:text-[#241C16] text-white transition-all shadow-lg">
                    <svg class="w-5 h-5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <!-- Tombol Edit Slider (Khusus Admin / Superadmin) -->
        @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
            <div class="flex justify-end mt-4">
                <button 
                    id="editSliderButton"
                    data-modal-target="sliderEditModal" 
                    data-modal-toggle="sliderEditModal" 
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-[#DFAC6B] to-[#C9934E] text-[#241C16] px-5 py-2.5 rounded-xl font-bold text-xs shadow-md hover:shadow-lg hover:brightness-105 transition-all"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Kelola Slider Beranda</span>
                </button>
            </div>
        @endif
    </div>

    <!-- Modal Popup untuk Edit Gambar Slider -->
    <div id="sliderEditModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-2xl max-h-full mx-auto mt-10">
            <div class="relative bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
                <!-- Header -->
                <div class="flex items-center justify-between p-5 bg-[#241C16] text-white">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-[#DFAC6B]/20 text-[#DFAC6B] flex items-center justify-center font-bold">
                            🖼️
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-white">Edit Gambar Slider Beranda</h3>
                            <p class="text-xs text-white/70">Upload gambar baru (PNG, JPG, WebP) untuk mengganti banner slide.</p>
                        </div>
                    </div>
                    <button type="button" id="closeModalButton" class="text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-lg text-sm p-2 ms-auto inline-flex items-center transition-colors" data-modal-hide="sliderEditModal">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>

                <!-- Body -->
                <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                    @csrf
                    @method('POST')

                    @for ($i = 1; $i <= 5; $i++)
                        @php
                            $sliderItem = $sliders[$i - 1] ?? null;
                            $thumbImg = ($sliderItem && $sliderItem->gambar) ? asset('storage/slider/' . $sliderItem->gambar) : asset('assets/banner.png');
                        @endphp
                        <div class="flex items-center gap-4 p-3.5 bg-[#FAF7F2] rounded-xl border border-amber-950/10">
                            <!-- Thumbnail Preview -->
                            <div class="w-20 h-14 rounded-lg overflow-hidden bg-stone-900 border border-amber-950/20 shrink-0 shadow-inner">
                                <img src="{{ $thumbImg }}" class="w-full h-full object-cover" alt="Slide {{ $i }}" onerror="this.src='{{ asset('assets/banner.png') }}'">
                            </div>
                            <!-- Input -->
                            <div class="flex-1">
                                <label for="sliderImage{{ $i }}" class="block mb-1 text-xs font-bold text-[#332B25]">
                                    Gambar Slide {{ $i }} <span class="text-gray-400 font-normal">({{ $sliderItem ? $sliderItem->gambar : 'Default' }})</span>
                                </label>
                                <input type="file" id="sliderImage{{ $i }}" name="sliderImage{{ $i }}" accept="image/*"
                                    class="block w-full text-xs text-gray-700 border border-gray-200 rounded-lg cursor-pointer bg-white file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#DFAC6B] file:text-[#241C16] hover:file:bg-[#C9934E] transition-all">
                            </div>
                        </div>
                    @endfor

                    <!-- Footer -->
                    <div class="flex justify-end pt-4 space-x-3 border-t border-gray-100">
                        <button type="button" data-modal-hide="sliderEditModal" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 font-semibold text-xs transition-colors">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#DFAC6B] to-[#C9934E] text-[#241C16] font-bold text-xs shadow-md hover:shadow-lg hover:brightness-105 transition-all">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <section class="flex justify-between items-center">
        <div class="w-1/2 text-center">
            <p class="text-accent font-norican text-5xl capitalize">manies cakery</p><br>
            <p class="text-xl">Toko kue rumahan yang menyajikan berbagai pilihan manisan yang dibuat dengan sepenuh hati. Menyajikan berbagai brownies, kue kering, dan kue-kue istimewa lainnya dengan cita rasa lezat dan tekstur yang sempurna. Kami juga menawarkan kue-kue yang dapat disesuaikan dengan preferensi pribadi Anda, baik untuk ulang tahun, pernikahan, atau perayaan apa pun. Setiap pesanan dibuat segar untuk memastikan kualitas dan kepuasan dalam setiap gigitan.</p>
            <br><br>
            <a href="/about-us" class="bg-secondary px-10 py-2 text-white font-bold tracking-wide uppercase rounded">
            about us</a>
        </div>
        <img src="{{ asset('assets/banner.png') }}" alt="" class="w-120 rounded-2xl">
    </section>
<br><br>
    <section class="flex flex-row-reverse justify-between items-center">
        <div class="w-1/2 text-center">
            <p class="text-accent  text-3xl capitalize">RASAKAN LEZATNYA BAHAN PILIHAN! <br> Temukan Produk Kami</p><br>
            <p class="text-xl">Kami menyediakan berbagai varian kue lengkap dan kekinian, cocok untuk segala moment spesial Anda. Dengan bahan berkualitas dan cita rasa terbaik, kami juga siap memenuhi permintaan khusus sesuai keinginan pelanggan.</p>
            <br><br>
            <a href="{{ route('produk.index', '*') }}" class="italic tracking-wide rounded underline text-xl text-secondary">lihat produk manies cakery -></a>
        </div>
        <img src="{{ asset('assets/produk/cake6.png') }}" alt="" class="w-120 rounded-2xl">
    </section>
    <br>
    <hr class="text-secondary">
    <br>
    <div class="bg-neutral-800 flex items-center justify-center h-20">
        <p class="text-white font-norican text-4xl tracking-wider capitalize">best seller</p>
    </div>
    <br>
    <section class="grid grid-cols-2 grid-rows-2 gap-x-8">
      <div class="relative group overflow-hidden rounded-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform">
        <a href="{{ route('produk.index', 'Cookies') }}">
          <img src="{{ asset('assets/produk/Cookies-M.png') }}" alt="Cookies" class="w-full h-60 object-cover transition-transform duration-500 group-hover:scale-110">
          <div class="hover:bg-black/30 w-full h-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex justify-center items-center flex-col text-center text-white">
            <h2 class="text-5xl">Cookies</h2>
            <span class="transition-transform duration-300 hidden group-hover:inline-block">See More</span>
          </div>
        </a>
      </div>
      <div class="relative group overflow-hidden rounded-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform">
        <a href="{{ route('produk.index', 'Brownies') }}">
          <img src="{{ asset('assets/produk/Brownies-M.png') }}" alt="Brownies" class="w-full h-60 object-cover transition-transform duration-500 group-hover:scale-110">
          <div class="hover:bg-black/30 w-full h-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex justify-center items-center flex-col text-center text-white">
            <h2 class="text-5xl">Brownies</h2>
            <span class="transition-transform duration-300 hidden group-hover:inline-block">See More</span>
          </div>
        </a>
      </div>
      <div class="relative group overflow-hidden rounded-lg shadow-xl hover:shadow-2xl mb-6 transition-all duration-300 transform">
        <a href="{{ route('produk.index', 'Cake') }}">
          <img src="{{ asset('assets/produk/Cake-M.png') }}" alt="Cake" class="w-full h-60 object-cover transition-transform duration-500 group-hover:scale-110">
          <div class="hover:bg-black/30 w-full h-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex justify-center items-center flex-col text-center text-white">
            <h2 class="text-5xl">Cake</h2>
            <span class="transition-transform duration-300 hidden group-hover:inline-block">See More</span>
          </div>
        </a>
      </div>
       <div class="relative group overflow-hidden rounded-lg shadow-xl hover:shadow-2xl mb-6 transition-all duration-300 transform">
        <a href="{{ route('produk.index', 'Hampers') }}">
          <img src="{{ asset('assets/hampers/Hampers-M.png') }}" alt="Hampers" class="w-full h-60 object-cover transition-transform duration-500 group-hover:scale-110">
          <div class="hover:bg-black/30 w-full h-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex justify-center items-center flex-col text-center text-white">
            <h2 class="text-5xl">Hampers</h2>
            <span class="transition-transform duration-300 hidden group-hover:inline-block">See More</span>
          </div>
        </a>
      </div>
    </section>
    
    <br>
    <section class="px-10 py-6 bg-white rounded-xl shadow border-2 border-dashed border-secondary">
        <p class="text-center text-5xl font-norican text-accent capitalize">menu favourite</p>
        <div class="flex justify-between flex-wrap gap-4">
            @forelse ($produkFavorit as $produk)    
            <a href="{{ route('produk.detail', $produk->id) }}">
                <div class="relative group overflow-hidden rounded-full size-70 shadow-xl hover:shadow-2xl hover:scale-90 transition-all duration-300 transform hover:cursor-pointer">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="w-full h-full object-cover brightness-75 transition-transform duration-500 group-hover:scale-110">
                    <div class="w-full h-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex justify-center items-center flex-col text-center text-white">
                        <h2 class="text-xl text-wrap w-50 font-bold capitalize">{{ $produk->nama }}</h2>
                    </div>
                </div>
            </a>
            @empty
            <p class="text-center text-gray-500 w-full py-4">Belum ada produk favorit yang ditampilkan.</p>
            @endforelse
        </div>
    </section>
    <br>
    <hr class="text-secondary">
    <br>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButton = document.getElementById('editSliderButton');
        const sliderEditModal = document.getElementById('sliderEditModal');
        const closeModalButton = document.getElementById('closeModalButton');

        // Pastikan elemen ada
        if (editButton && sliderEditModal && closeModalButton) {
            editButton.addEventListener('click', function() {
                // Tampilkan modal
                sliderEditModal.classList.remove('hidden');
            });

            closeModalButton.addEventListener('click', function() {
                // Sembunyikan modal
                sliderEditModal.classList.add('hidden');
            });
        } else {
            console.error("Edit button or modal elements not found.");
        }
    });
</script>
