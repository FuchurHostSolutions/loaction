@extends('admin.layouts.app')

@section('title', 'Tambah Target Audiens')
@section('page_title', 'Tambah Target Audiens')
@section('page_description', 'Tambah segmen audiens baru yang dilayani LoAction')

@section('content')
    <div class="max-w-xl bg-white rounded-3xl p-6 sm:p-8 shadow-sm ring-1 ring-slate-200/80">
        <form method="POST" action="{{ route('admin.audiences.store') }}" class="space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                    Nama Segmen / Judul <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Misal: Mahasiswa & Dewasa Muda" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm font-semibold focus:border-loaction-500 outline-none">
            </div>

            <div>
                <label for="sort_order" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                    Urutan Tampil
                </label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm font-semibold focus:border-loaction-500 outline-none">
            </div>

            <div>
                <label for="text" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                    Deskripsi Penjelasan <span class="text-rose-500">*</span>
                </label>
                <textarea name="text" id="text" rows="4" required placeholder="Jelaskan kebutuhan psikologis segmen ini..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-loaction-500 outline-none">{{ old('text') }}</textarea>
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" checked class="size-4 rounded text-loaction-600">
                <label for="is_active" class="text-xs font-bold text-ink cursor-pointer">Tampilkan di Beranda</label>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-loaction-500 hover:bg-loaction-600 text-white font-bold text-xs shadow-md transition">
                    Simpan Target Audiens
                </button>
                <a href="{{ route('admin.audiences.index') }}" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-ink font-bold text-xs transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
