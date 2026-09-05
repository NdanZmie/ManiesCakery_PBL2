<!-- 
    Nama  : Fatra Syahreza
    NIM   : 3312411031
    Kelas : IF 2A Malam
-->

@extends('layouts.app')
@section('title', 'Manies Cakery - About Us')
@section('content')

<!-- Button kecil fixed di kiri atas -->
<!--   -->

    <!-- Main Section -->
    <div class="max-w-5xl mx-auto px-6 md:px-12 py-8 space-y-16">
        <!-- About Us -->
            <div>
                <div class="flex items-center mb-4">
                    <span class="inline-block w-16 h-px bg-amber-950 mr-3"></span>
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-amber-950">About Us</h3>
                </div>

                <div class="flex flex-col md:flex-row md:items-center md:gap-x-12 gap-y-8">
                    {{-- Kiri --}}
                    <div class="md:w-1/2">
                        <p class="text-2xl font-semibold leading-snug">
                            {!! $about->about_left ?? '<span class="text-gray-400 italic">[Konten kosong]</span>' !!}
                        </p>
                    </div>

                    {{-- Kanan --}}
                    <div class="md:w-1/2">
                        <p class="text-l leading-relaxed">
                            {!! $about->about_right ?? '<span class="text-gray-400 italic">[Konten kosong]</span>' !!}
                        </p>
                    </div>
                </div>
                <!-- Role Authentication -->
                @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                <div class="mt-4 text-right">
                    <button onclick="toggleModal('aboutModal')" class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                        Edit
                    </button>
                </div>
                @endif
            </div>

            <!-- Our Philosophy -->
            <div>
                <div class="flex items-center mb-4">
                    <span class="inline-block w-16 h-px bg-amber-950 mr-3"></span>
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-amber-950">Our Philosophy</h3>
                </div>

                <div class="flex flex-col md:flex-row md:items-center md:gap-x-12 gap-y-8">
                    {{-- Left --}}
                    <div class="md:w-1/2">
                        <p class="text-3xl font-semibold leading-snug">
                            {!! $about->philosophy_left ?? '<span class="text-gray-400 italic">[Konten kosong]</span>' !!}
                        </p>
                    </div>

                    {{-- Right --}}
                    <div class="md:w-1/2">
                        <p class="text-base leading-relaxed">
                            {!! $about->philosophy_right ?? '<span class="text-gray-400 italic">[Konten kosong]</span>' !!}
                        </p>
                    </div>
                </div>
                <!-- Role Authentication -->
                @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                <div class="mt-4 text-right">
                    <button onclick="toggleModal('philosophyModal')" class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                        Edit
                    </button>
                </div>
                @endif
            </div>
        </div>

        <!-- Modal: About Us -->
        <div id="aboutModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-white/30 backdrop-blur-sm dark:bg-white/10 h-screen" onclick="closeModalOnClickOutside(event, 'aboutModal')">
            <div class="bg-white w-full max-w-2xl p-6 rounded-lg shadow-lg" onclick="event.stopPropagation()">
                <h2 class="text-lg font-bold mb-4">Edit About Us</h2>
                <form action="{{ route('about.update.about', $about->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Section Kiri</label>
                        <textarea name="about_left" rows="4" class="w-full border rounded px-3 py-2">{{ old('about_left', $about->about_left) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Section Kanan</label>
                        <textarea name="about_right" rows="4" class="w-full border rounded px-3 py-2">{{ old('about_right', $about->about_right) }}</textarea>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="toggleModal('aboutModal')" class="cursor-pointer bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded text-sm">Batal</button>
                        <button type="submit" class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal: Our Philosophy -->
        <div id="philosophyModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-white/30 backdrop-blur-sm dark:bg-white/10 h-screen" onclick="closeModalOnClickOutside(event, 'philosophyModal')">
            <div class="bg-white w-full max-w-2xl p-6 rounded-lg shadow-lg" onclick="event.stopPropagation()">
                <h2 class="text-lg font-bold mb-4">Edit Our Philosophy</h2>
                <form action="{{ route('about.update.philosophy', $about->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Philosophy Kiri</label>
                        <textarea name="philosophy_left" rows="4" class="w-full border rounded px-3 py-2">{{ old('philosophy_left', $about->philosophy_left) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Philosophy Kanan</label>
                        <textarea name="philosophy_right" rows="4" class="w-full border rounded px-3 py-2">{{ old('philosophy_right', $about->philosophy_right) }}</textarea>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="toggleModal('philosophyModal')" class="cursor-pointer bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded text-sm">Batal</button>
                        <button type="submit" class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="max-w-5xl mx-auto px-6 md:px-12 py-8 space-y-16">
            <div class="grid grid-cols-6 grid-rows-4 gap-4 max-w-5xl w-full h-[700px]">

                @foreach ($galeriItems as $index => $item)
                    @php
                        // Posisi grid tanpa border
                        $gridClass = match($index) {
                            0 => 'col-start-1 col-span-2 row-start-1 row-span-2 items-center justify-center',
                            1 => 'col-span-2 row-span-2',
                            2 => 'col-span-2 row-span-2', 
                            3 => 'col-start-1 col-span-2 row-start-3 row-span-1 flex items-center justify-center',
                            4 => 'col-start-3 col-span-1 row-start-3 row-span-1 flex items-center justify-center',
                            5 => 'col-start-3 col-span-2 row-start-3 row-span-1 flex items-center justify-center',
                            default => '',
                        };

                        $imgClass = match($index) {
                            0 => 'w-50 h-65 object-cover rounded-4xl shadow-md',
                            1 => 'w-80 h-45 object-cover rounded-4xl shadow-md',
                            2 => 'w-75 h-103 object-cover rounded-4xl shadow-md mr-4',
                            3 => 'w-70 h-35 object-cover rounded-2xl shadow-md mb-45',
                            4 => 'w-60 h-40 object-cover rounded-2xl shadow-md mb-50 mr-2',
                            5 => 'w-40 h-40 object-cover rounded-2xl shadow-md mb-80 ml-34',
                            default => '',
                        };
                    @endphp

                    <div class="{{ $gridClass }}">
                        @if ($item->galeri && file_exists(public_path('storage/' . $item->galeri)))
                            <img src="{{ asset('storage/' . $item->galeri) }}" alt="Image {{ $index + 1 }}" class="{{ $imgClass }}" />
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">
                                Belum ada gambar
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <!-- Role Auth -->
            @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                <div class="text-center mt-[-300px]">
                    <button onclick="toggleModal('imageModal')" class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                        Edit Gambar
                    </button>
                </div>
            @endif
        </div>

        <!-- Modal Edit Gambar -->
        <div id="imageModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-white/30 backdrop-blur-sm dark:bg-white/10 h-screen" onclick="closeModalOnClickOutside(event, 'imageModal')">
            <div class="relative w-full max-w-2xl h-full md:h-auto" onclick="event.stopPropagation()">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow border border-gray-200">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Edit Galeri Gambar
                        </h3>
                        <button type="button" onclick="toggleModal('imageModal')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <form action="{{ route('about.update.galeri') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                        @csrf
                        @method('PUT')

                        @for ($i = 0; $i < 6; $i++)
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="image{{ $i }}">Gambar {{ $i + 1 }}</label>
                                <input type="file" name="images[]" id="image{{ $i }}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            </div>
                        @endfor

                        <!-- Modal footer -->
                        <div class="flex justify-end pt-4">
                            <button type="submit" class="cursor-pointer text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
function toggleModal(id) {
    const modal = document.getElementById(id);
    modal.classList.toggle('hidden');
}

function closeModalOnClickOutside(event, modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
}
</script>
