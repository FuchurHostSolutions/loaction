@extends('admin.layouts.app')

@section('title', 'Tambah Layanan Baru')
@section('page_title', 'Tambah Layanan Baru')
@section('page_description', 'Formulir penambahan area layanan psikologi baru')

@section('content')
    <div class="max-w-2xl bg-white rounded-3xl p-6 sm:p-8 shadow-sm ring-1 ring-slate-200/80">
        <form method="POST" action="{{ route('admin.services.store') }}" class="space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                    Judul Layanan <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm font-semibold focus:border-loaction-500 outline-none">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="icon" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Icon (Emoji / Simbol)
                    </label>
                    <input type="text" name="icon" id="icon" value="{{ old('icon', '✨') }}" placeholder="✨ / 🧠 / 💼" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm font-semibold focus:border-loaction-500 outline-none">
                </div>
                <div>
                    <label for="sort_order" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Urutan Tampil
                    </label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm font-semibold focus:border-loaction-500 outline-none">
                </div>
            </div>

            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                    Deskripsi Ringkas <span class="text-rose-500">*</span>
                </label>
                <textarea name="description" id="description" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-loaction-500 outline-none">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="items" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                    Daftar Sub-Item Layanan (1 baris per item)
                </label>
                <textarea name="items" id="items" rows="4" placeholder="Konseling Individu&#10;Tes IQ & Minat Bakat&#10;Psikotes Rekrutmen" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm font-mono focus:border-loaction-500 outline-none">{{ old('items') }}</textarea>
                <span class="text-[0.7rem] text-slate-400 mt-1 block">Tuliskan tiap cakupan layanan di baris terpisah.</span>
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" checked class="size-4 rounded text-loaction-600">
                <label for="is_active" class="text-xs font-bold text-ink cursor-pointer">Tampilkan layanan ini di website</label>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-loaction-500 hover:bg-loaction-600 text-white font-bold text-xs shadow-md transition">
                    Simpan Layanan
                </button>
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-ink font-bold text-xs transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
