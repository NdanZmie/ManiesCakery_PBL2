
@extends('layouts.app')
@section('title', 'Manies Cakery - Home')
@section('content')

<br>

    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
      <div class="relative h-100 overflow-hidden rounded-lg md:h-130">
    @for ($i = 1; $i <= 5; $i++)
        @php
            $slider = $sliders[$i - 1] ?? null;
        @endphp
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            @if ($slider && $slider->gambar)
                <img src="{{ asset('storage/slider/' . $slider->gambar) }}"
                     class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                     alt="Slider {{ $i }}">
            @else
                <img src="{{ asset('assets/default.png') }}"
                     class="absolute block w-full h-full object-cover opacity-40 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                     alt="Default Slider {{ $i }}">
            @endif
        </div>
    @endfor
</div>
        <!-- Slider indicators -->
         <div class="absolute z-40 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
<br><br>

    <!-- Tombol Edit di bawah slider -->
    <div class="flex justify-end mb-4">
        @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
    <div class="flex justify-end mb-4">
        <button data-modal-target="sliderEditModal" data-modal-toggle="sliderEditModal" class="bg-blue-500 text-white px-4 py-2 rounded">
            Edit Slider
        </button>
    </div>
@endif
    </div>

    <!-- Modal Popup untuk Edit Gambar Slider -->
    <!-- Modal Edit Slider (Flowbite compatible) -->
<div id="sliderEditModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-black/50">
  <div class="relative w-full max-w-2xl h-full md:h-auto mx-auto mt-20">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <!-- Header -->
      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          Edit Gambar Slider
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ms-auto inline-flex items-center" data-modal-hide="sliderEditModal">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
          <span class="sr-only">Close</span>
        </button>
      </div>

      <!-- Body -->
      <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
    @csrf
    @method('POST')

    @for ($i = 1; $i <= 5; $i++)
        <div>
            <label for="sliderImage{{ $i }}" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Gambar Slider {{ $i }}</label>
            <input type="file" id="sliderImage{{ $i }}" name="sliderImage{{ $i }}" accept="image/*"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
        </div>
    @endfor

    <!-- Footer -->
    <div class="flex justify-end pt-4 space-x-2 border-t border-gray-200 dark:border-gray-600">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">
            Simpan
        </button>
        <button type="button" data-modal-hide="sliderEditModal" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded">
            Tutup
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
