@extends('layouts.app')
@section('title', 'Manies Cakery - Catalog')

@section('content')
<div class="py-8 min-h-screen">
    <div class="flex justify-between">
        <div class="flex items-center justify-start -mb-px">
            <span class="inline-block w-16 h-px bg-amber-950 mr-3"></span>
            <h3 class="uppercase tracking-widest text-amber-950 -mb-px font-bold">Our Products</h3>
        </div>
    </div>

    <br>

    <div class="flex justify-between flex-wrap gap-2">
            <a href="{{ route('produk.index', '*') }}" class="p-4 w-50 flex justify-center items-center rounded-md shadow font-semibold uppercase text-sm tracking-widest {{ $selectedCategories === '*' ? 'bg-accent text-white' : 'bg-white text-accent border border-accent' }}">
                    All
            </a>
        @foreach ($categories as $k)
            <a href="{{ route('produk.index', $k->nama) }}" class="p-4 w-50 flex justify-center items-center rounded-md shadow font-semibold uppercase text-sm tracking-widest {{ $selectedCategories === $k->nama ? 'bg-accent text-white' : 'bg-white text-accent border border-accent' }}">
                {{ $k->nama }}
            </a>
        @endforeach
    </div>

    <br><hr><br>

    <form method="POST" action="{{ route('produk.toggle-status') }}" id="cardStatusForm">
        @csrf
        <input type="hidden" name="action" id="cardActionType">

        @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))                          
        <div class="flex justify-between mb-6">
            <div class="flex gap-2">
                <button
                    type="button"
                    onclick="enterEditMode()"
                    id="editModeBtn"
                    class="flex items-center gap-2 px-4 py-2 border border-yellow-500 text-yellow-600 hover:bg-yellow-500 hover:text-white transition rounded-md font-semibold shadow-sm">
                    Edit Katalog
                </button>

                <button
                    type="button"
                    onclick="exitEditMode()"
                    id="cancelEditBtn"
                    class="hidden flex items-center gap-2 px-4 py-2 border border-gray-400 text-gray-600 hover:bg-gray-100 transition rounded-md font-semibold shadow-sm"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Batal
                </button>
            </div>
        </div>
        @endif


        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach ($products as $produk)
                @if (!Auth::check())
                    {{-- Belum login, tampilkan hanya produk yang aktif --}}
                    @if ($produk->status)
                        @include('components.catalogcard', ['produk' => $produk])
                    @endif

                @elseif (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                    {{-- Admin bisa lihat semua produk --}}
                    @include('components.catalogcard', ['produk' => $produk])

                @else
                    {{-- User login biasa (bukan admin), hanya lihat produk aktif --}}
                    @if ($produk->status)
                        @include('components.catalogcard', ['produk' => $produk])
                    @endif
                @endif
            @endforeach

        </div>

        <div class="edit-target hidden fixed bottom-6 right-6 rounded-xl shadow-lg p-3 flex gap-2 z-50">
            <button 
                type="submit" 
                onclick="setCardAction('enable')" 
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition hover:cursor-pointer">
                Enable
            </button>

            <button 
                type="submit" 
                onclick="setCardAction('disable')" 
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition hover:cursor-pointer">
                Disable
            </button>
        </div>
    </form>
</div>

<!-- Modal Tambah Catalog -->
<div id="new-catalog" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/50">
    <div class="relative w-full max-w-2xl p-4">
        <div class="bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Tambah Catalog</h3>
                <button type="button" data-modal-hide="new-catalog" class="text-gray-400 hover:text-gray-900">
                    ✖
                </button>
            </div>

            <div class="p-4 overflow-y-auto max-h-64">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="sticky top-0 bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">Produk ID</th>
                            <th class="px-4 py-2">Nama Produk</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $item->id }}</td>
                            <td class="px-4 py-2">{{ $item->nama }}</td>
                            <td class="px-4 py-2">
                                <a href="#" onclick="toggleStatus(this)" class="text-green-600 hover:underline">
                                    {{ $item->status ? 'Aktif' : 'Nonaktif' }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end p-4 border-t">
                <button data-modal-hide="new-catalog" type="button" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kembali</button>
            </div>
        </div>
    </div>
</div>


<script>
    let editMode = false;

    function enterEditMode() {
        editMode = true;

        // Tampilkan elemen untuk mode edit
        document.querySelectorAll('.edit-target').forEach(el => el.classList.remove('hidden'));
        document.getElementById('editModeBtn').classList.add('hidden');
        document.getElementById('cancelEditBtn').classList.remove('hidden');

        // Nonaktifkan semua link ke produk
        document.querySelectorAll('.card-link').forEach(el => {
            el.classList.add('pointer-events-none', 'select-none');
        });
    }

    function exitEditMode() {
        editMode = false;

        // Sembunyikan elemen mode edit
        document.querySelectorAll('.edit-target').forEach(el => el.classList.add('hidden'));
        document.getElementById('editModeBtn').classList.remove('hidden');
        document.getElementById('cancelEditBtn').classList.add('hidden');

        // Reset semua checkbox
        document.querySelectorAll('.card-checkbox').forEach(cb => cb.checked = false);
        document.querySelectorAll('.selected-overlay').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.selected-check').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.card-container').forEach(card => card.classList.remove('ring-2', 'ring-blue-500'));

        // Aktifkan kembali link ke produk
        document.querySelectorAll('.card-link').forEach(el => {
            el.classList.remove('pointer-events-none', 'select-none');
        });
    }

    function handleCardClick(card) {
        if (!editMode) return; // kalau bukan mode edit, jangan toggle checkbox

        const checkbox = card.querySelector('.card-checkbox');
        const overlay = card.querySelector('.selected-overlay');
        const checkmark = card.querySelector('.selected-check');

        checkbox.checked = !checkbox.checked;

        if (checkbox.checked) {
            overlay.classList.remove('hidden');
            checkmark.classList.remove('hidden');
            card.classList.add('ring-2', 'ring-blue-500');
        } else {
            overlay.classList.add('hidden');
            checkmark.classList.add('hidden');
            card.classList.remove('ring-2', 'ring-blue-500');
        }
    }

    function setCardAction(action) {
        document.getElementById('cardActionType').value = action;
    }

    document.getElementById('cardStatusForm').addEventListener('submit', function(e) {
        const checked = document.querySelectorAll('.card-checkbox:checked');
        if (checked.length === 0) {
            e.preventDefault();
            alert('Pilih minimal satu produk dulu, ya!');
        }
    });
</script>


@endsection
