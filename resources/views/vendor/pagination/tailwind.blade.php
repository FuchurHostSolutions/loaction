@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Navigasi Halaman" class="flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
        
        {{-- Mobile Compact View --}}
        <div class="flex items-center justify-between w-full sm:hidden gap-2">
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center gap-1 px-3 py-2 rounded-xl text-xs font-bold text-slate-400 bg-slate-100 border border-slate-200/60 cursor-not-allowed select-none">
                    <svg class="size-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                    <span>Sebelumnya</span>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center gap-1 px-3 py-2 rounded-xl text-xs font-bold text-slate-700 bg-white border border-slate-300 shadow-sm hover:bg-slate-50 hover:text-loaction-600 transition active:scale-95">
                    <svg class="size-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                    <span>Sebelumnya</span>
                </a>
            @endif

            <span class="text-xs font-semibold text-slate-500 whitespace-nowrap">
                Hal <strong class="text-ink font-bold">{{ $paginator->currentPage() }}</strong> / {{ $paginator->lastPage() }}
            </span>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center gap-1 px-3 py-2 rounded-xl text-xs font-bold text-slate-700 bg-white border border-slate-300 shadow-sm hover:bg-slate-50 hover:text-loaction-600 transition active:scale-95">
                    <span>Berikutnya</span>
                    <svg class="size-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                </a>
            @else
                <span class="inline-flex items-center gap-1 px-3 py-2 rounded-xl text-xs font-bold text-slate-400 bg-slate-100 border border-slate-200/60 cursor-not-allowed select-none">
                    <span>Berikutnya</span>
                    <svg class="size-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                </span>
            @endif
        </div>

        {{-- Desktop & Tablet View --}}
        <div class="hidden sm:flex sm:items-center sm:justify-between w-full gap-4">
            {{-- Results counter --}}
            <p class="text-xs text-warm-gray whitespace-nowrap">
                Menampilkan
                @if ($paginator->firstItem())
                    <span class="font-bold text-ink">{{ $paginator->firstItem() }}</span>
                    sampai
                    <span class="font-bold text-ink">{{ $paginator->lastItem() }}</span>
                @else
                    <span class="font-bold text-ink">{{ $paginator->count() }}</span>
                @endif
                dari
                <span class="font-bold text-ink">{{ $paginator->total() }}</span>
                data
            </p>

            {{-- Page Numbers & Nav --}}
            <div class="inline-flex items-center gap-1 bg-slate-50/80 p-1 rounded-2xl border border-slate-200/80">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="grid size-8 place-items-center rounded-xl text-slate-300 cursor-not-allowed" aria-hidden="true">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="grid size-8 place-items-center rounded-xl text-slate-600 hover:text-ink hover:bg-white transition" aria-label="Halaman Sebelumnya">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- Three Dots Separator --}}
                    @if (is_string($element))
                        <span class="px-2 text-slate-400 font-bold text-xs select-none">…</span>
                    @endif

                    {{-- Array of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="grid size-8 place-items-center rounded-xl bg-loaction-500 text-white font-extrabold text-xs shadow-sm">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="grid size-8 place-items-center rounded-xl text-slate-600 hover:text-ink hover:bg-white text-xs font-bold transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="grid size-8 place-items-center rounded-xl text-slate-600 hover:text-ink hover:bg-white transition" aria-label="Halaman Berikutnya">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </a>
                @else
                    <span class="grid size-8 place-items-center rounded-xl text-slate-300 cursor-not-allowed" aria-hidden="true">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif
