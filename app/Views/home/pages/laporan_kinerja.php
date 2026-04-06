<?= $this->include('home/pages/layout/header') ?>

<section class="pt-32 pb-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h1 class="text-3xl font-bold text-slate-900 mb-10">Laporan Kinerja Pengurus</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="p-8 rounded-[2rem] bg-slate-900 text-white relative overflow-hidden group">
                <div class="relative z-10">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-orange-400">Annual Report</span>
                    <h2 class="text-2xl font-bold mt-2 mb-4">Laporan Tahunan 2025</h2>
                    <p class="text-slate-400 text-sm mb-8 leading-relaxed">Rangkuman seluruh kegiatan sosial, politik, dan pengembangan kader selama periode satu tahun berjalan.</p>
                    <a href="#" class="inline-flex items-center gap-2 font-bold text-sm bg-white/10 hover:bg-white/20 px-6 py-3 rounded-full transition-all">
                        Unduh Laporan (PDF) <i class="fa-solid fa-download"></i>
                    </a>
                </div>
                <i class="fa-solid fa-chart-bar absolute -bottom-10 -right-10 text-white/5 text-[12rem] rotate-12 group-hover:rotate-0 transition-transform duration-700"></i>
            </div>

            <div class="p-8 rounded-[2rem] border border-slate-100 bg-slate-50 relative overflow-hidden group">
                <div class="relative z-10">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Program Report</span>
                    <h2 class="text-2xl font-bold mt-2 mb-4 text-slate-800">Realisasi Program Kerja</h2>
                    <p class="text-slate-500 text-sm mb-8 leading-relaxed">Status ketercapaian program kerja strategis DPD LASMURA DKI Jakarta di tingkat wilayah.</p>
                    <a href="#" class="inline-flex items-center gap-2 font-bold text-sm border border-slate-200 px-6 py-3 rounded-full hover:bg-white transition-all text-slate-700">
                        Lihat Progress <i class="fa-solid fa-list-check"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('home/pages/layout/footer') ?>