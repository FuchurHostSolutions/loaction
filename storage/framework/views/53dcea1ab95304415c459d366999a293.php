

<?php $__env->startSection('title', 'Layanan | LoAction — Biro Psikologi Terapan'); ?>
<?php $__env->startSection('meta_description', 'Layanan psikologi LoAction meliputi personal care, pendidikan, industri & organisasi, dan uji kompetensi SDM.'); ?>

<?php $__env->startSection('content'); ?>

    
    <section class="relative isolate overflow-hidden bg-[radial-gradient(ellipse_at_20%_50%,rgba(79,174,143,.12),transparent_50%),linear-gradient(180deg,#f2fbf6_0%,#ffffff_100%)] py-16 lg:py-20">
        <div class="section-container text-center reveal">
            <p class="eyebrow justify-center">Layanan Kami</p>
            <h1 class="heading-2 mx-auto max-w-3xl !text-4xl lg:!text-5xl">Layanan Psikologi yang Tepat untuk Setiap Kebutuhan</h1>
            <p class="mx-auto mt-5 max-w-2xl text-base text-slate-600 lg:text-lg">Empat area layanan utama LoAction dirancang untuk menjawab kebutuhan personal, pendidikan, organisasi, dan uji kompetensi secara profesional.</p>
        </div>
    </section>

    <div class="section-divider"></div>

    
    <section class="section-pad bg-white">
        <div class="section-container">
            <div class="grid gap-8 lg:gap-10">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <article class="grid items-center gap-8 rounded-[2rem] border border-loaction-100/80 bg-gradient-to-br from-[#fdfcfa] to-cream p-7 shadow-sm transition hover:shadow-card reveal lg:grid-cols-[0.4fr_1fr] lg:p-10 <?php echo e($index % 2 === 1 ? 'lg:direction-rtl' : ''); ?>">
                        
                        <div class="text-center lg:text-left">
                            <div class="mx-auto grid size-20 place-items-center rounded-3xl bg-gradient-to-br from-loaction-100 to-loaction-50 text-4xl text-loaction-700 ring-1 ring-loaction-200/50 lg:mx-0">
                                <?php echo e($service['icon']); ?>

                            </div>
                            <h2 class="mt-5 text-2xl font-black text-ink lg:text-3xl"><?php echo e($service['title']); ?></h2>
                            <p class="mt-3 text-sm leading-7 text-slate-600"><?php echo e($service['description']); ?></p>
                        </div>

                        
                        <div>
                            <h3 class="mb-4 text-xs font-black uppercase tracking-[0.15em] text-loaction-600">Cakupan Layanan</h3>
                            <div class="grid gap-3 sm:grid-cols-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $service['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <div class="flex items-start gap-3 rounded-xl bg-white p-4 ring-1 ring-loaction-100/60">
                                        <span class="mt-0.5 shrink-0 text-loaction-500">
                                            <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                                        </span>
                                        <span class="text-sm font-bold text-slate-700"><?php echo e($item->name); ?></span>
                                    </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                            <a href="<?php echo e(route('kontak')); ?>" class="mt-6 inline-flex items-center gap-2 rounded-full bg-loaction-700 px-5 py-3 text-sm font-black text-white shadow-md transition hover:-translate-y-1 hover:bg-loaction-800 hover:shadow-lg">
                                <?php echo e($service['cta']); ?>

                                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </article>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>


    
    <section class="section-pad bg-loaction-900 text-white">
        <div class="section-container text-center reveal">
            <h2 class="text-3xl font-black tracking-tight md:text-4xl">Butuh Layanan yang Spesifik?</h2>
            <p class="mx-auto mt-4 max-w-xl text-base text-white/75 lg:text-lg">Hubungi LoAction untuk mendiskusikan kebutuhan Anda. Kami akan merancang program yang sesuai.</p>
            <a href="<?php echo e(route('kontak')); ?>" class="mt-7 inline-flex items-center gap-2 rounded-full bg-honey px-7 py-4 text-sm font-black uppercase tracking-wide text-loaction-900 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                Hubungi Kami
            </a>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\fuchur\loaction\resources\views/pages/layanan.blade.php ENDPATH**/ ?>