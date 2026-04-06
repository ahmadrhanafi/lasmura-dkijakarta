<?= $this->include('home/pages/layout/header') ?>

<section class="pt-32 pb-20 bg-slate-50">
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white rounded-[2.5rem] shadow-xl overflow-hidden border border-slate-100">
            <div class="p-10 md:p-16 text-center">
                <div class="w-20 h-20 bg-red-100 text-[#ec1309] rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                </div>
                <h1 class="text-3xl font-bold text-slate-900 mb-4">Layanan Advokasi Warga</h1>
                <p class="text-slate-500 mb-10 leading-relaxed">Kami siap mendengarkan dan membantu menyampaikan aspirasi serta permasalahan Anda kepada pihak terkait. Layanan ini tidak dipungut biaya.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                    <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100">
                        <h4 class="font-bold text-slate-800 mb-2">Bantuan Hukum</h4>
                        <p class="text-xs text-slate-500 italic">Konsultasi masalah hukum ringan untuk warga kurang mampu.</p>
                    </div>
                    <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100">
                        <h4 class="font-bold text-slate-800 mb-2">Aspirasi Kebijakan</h4>
                        <p class="text-xs text-slate-500 italic">Penyampaian keluhan fasilitas publik di wilayah DKI Jakarta.</p>
                    </div>
                </div>

                <div class="mt-12">
                    <a href="https://wa.me/yournumber" class="bg-[#25D366] text-white px-8 py-4 rounded-full font-bold flex items-center justify-center gap-3 hover:scale-105 transition-transform">
                        <i class="fa-brands fa-whatsapp text-xl"></i> Hubungi Center Advokasi
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('home/pages/layout/footer') ?>