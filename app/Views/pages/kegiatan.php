<?= $this->include('pages/layout/header') ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16">
    
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-[10px] sm:text-xs text-gray-400 uppercase tracking-[0.2em] font-bold">
            <li>
                <a href="<?= base_url('/') ?>" class="hover:text-[#ea7e13] transition-colors">Beranda</a>
            </li>
            <li>
                <i class="fa-solid fa-chevron-right text-[8px] opacity-40"></i>
            </li>
            <li class="text-[#ea7e13]">Kegiatan</li>
        </ol>
    </nav>

    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Kegiatan Terbaru</h2>
            <p class="text-gray-500 mt-3 text-sm md:text-base max-w-2xl">Dokumentasi langkah nyata dan agenda strategis DPD LASMURA DKI Jakarta dalam mengabdi untuk masyarakat.</p>
            <div class="h-1.5 w-24 bg-gradient-to-r from-[#ea7e13] to-[#ec1309] mt-6 rounded-full shadow-sm"></div>
        </div>
        
        <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0">
            <span class="px-5 py-2 bg-[#ea7e13] text-white text-xs font-bold rounded-xl whitespace-nowrap shadow-lg shadow-orange-500/20">Semua</span>
            <span class="px-5 py-2 bg-white border border-gray-100 text-gray-500 text-xs font-bold rounded-xl whitespace-nowrap hover:border-[#ea7e13] transition-all cursor-pointer">Internal</span>
            <span class="px-5 py-2 bg-white border border-gray-100 text-gray-500 text-xs font-bold rounded-xl whitespace-nowrap hover:border-[#ea7e13] transition-all cursor-pointer">Sosial</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

        <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-50 flex flex-col">
            <div class="relative h-64 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?q=80&w=2070"
                    alt="Kegiatan"
                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-1000">
                
                <div class="absolute top-5 left-5 bg-white/80 backdrop-blur-md px-4 py-2 rounded-2xl shadow-sm border border-white/20">
                    <span class="block text-[14px] font-black text-gray-900 leading-none text-center">24</span>
                    <span class="block text-[8px] font-bold text-[#ea7e13] uppercase tracking-widest text-center mt-1">Jan 2026</span>
                </div>
            </div>

            <div class="p-8 flex-grow flex flex-col">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-[#ea7e13] transition-colors duration-300 line-clamp-2 leading-snug">
                    Rapat Konsolidasi Wilayah Tingkat Provinsi DKI Jakarta
                </h3>
                <p class="text-gray-500 text-sm mt-4 line-clamp-3 flex-grow leading-relaxed">
                    Pembahasan mengenai program kerja strategis LASMURA untuk tahun 2026 yang bertempat di Jakarta Pusat guna memperkuat sinergi antar kader.
                </p>

                <div class="mt-8 pt-6 border-t border-gray-50 flex items-center justify-between">
                    <div class="flex items-center text-gray-400">
                        <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center mr-3 group-hover:bg-orange-50 transition-colors">
                            <i class="fa-solid fa-location-dot text-[10px] group-hover:text-[#ea7e13]"></i>
                        </div>
                        <span class="text-[11px] font-bold uppercase tracking-wider">Jakarta Pusat</span>
                    </div>
                    <a href="#" class="w-10 h-10 rounded-xl bg-gray-900 text-white flex items-center justify-center hover:bg-[#ea7e13] transition-all group/btn shadow-lg active:scale-90">
                        <i class="fa-solid fa-arrow-right text-xs group-hover/btn:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-50 flex flex-col">
            <div class="relative h-64 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?q=80&w=2069"
                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-1000">
                
                <div class="absolute top-5 left-5 bg-white/80 backdrop-blur-md px-4 py-2 rounded-2xl shadow-sm border border-white/20">
                    <span class="block text-[14px] font-black text-gray-900 leading-none text-center">15</span>
                    <span class="block text-[8px] font-bold text-[#ea7e13] uppercase tracking-widest text-center mt-1">Jan 2026</span>
                </div>
            </div>

            <div class="p-8 flex-grow flex flex-col">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-[#ea7e13] transition-colors duration-300 line-clamp-2 leading-snug">
                    Bakti Sosial & Pembagian Sembako Masyarakat Pesisir
                </h3>
                <p class="text-gray-500 text-sm mt-4 line-clamp-3 flex-grow leading-relaxed">
                    Aksi nyata LASMURA dalam membantu meringankan beban masyarakat di wilayah Jakarta Utara sebagai wujud kepedulian sosial organisasi.
                </p>

                <div class="mt-8 pt-6 border-t border-gray-50 flex items-center justify-between">
                    <div class="flex items-center text-gray-400">
                        <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center mr-3 group-hover:bg-orange-50 transition-colors">
                            <i class="fa-solid fa-location-dot text-[10px] group-hover:text-[#ea7e13]"></i>
                        </div>
                        <span class="text-[11px] font-bold uppercase tracking-wider">Jakarta Utara</span>
                    </div>
                    <a href="#" class="w-10 h-10 rounded-xl bg-gray-900 text-white flex items-center justify-center hover:bg-[#ea7e13] transition-all group/btn shadow-lg active:scale-90">
                        <i class="fa-solid fa-arrow-right text-xs group-hover/btn:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-20 flex justify-center">
        <nav class="flex items-center gap-3 bg-white p-2 rounded-2xl border border-gray-100 shadow-sm">
            <a href="#" class="w-12 h-12 flex items-center justify-center rounded-xl bg-gray-50 text-gray-400 hover:bg-[#ea7e13] hover:text-white transition-all">
                <i class="fa-solid fa-chevron-left text-xs"></i>
            </a>
            <a href="#" class="w-12 h-12 flex items-center justify-center rounded-xl bg-[#ea7e13] text-white shadow-xl shadow-orange-500/40 font-black text-sm">1</a>
            <a href="#" class="w-12 h-12 flex items-center justify-center rounded-xl bg-white text-gray-600 hover:border-[#ea7e13] hover:text-[#ea7e13] font-bold text-sm transition-all border border-transparent">2</a>
            <a href="#" class="w-12 h-12 flex items-center justify-center rounded-xl bg-gray-50 text-gray-400 hover:bg-[#ea7e13] hover:text-white transition-all">
                <i class="fa-solid fa-chevron-right text-xs"></i>
            </a>
        </nav>
    </div>
</main>

<?= $this->include('pages/layout/footer') ?>