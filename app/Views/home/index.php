<?= $this->include('home/layout/header') ?>

<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-slate-900">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?auto=format&fit=crop&q=80" 
             class="w-full h-full object-cover opacity-50" alt="Background">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-transparent to-slate-900/90"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-20 text-center relative z-10">
        
        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 tracking-tight leading-[1.1]">
            Muda, Cerdas, <br>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-orange-400 to-red-500">
                Berintegritas
            </span>
        </h1>
        
        <p class="text-sm md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
            Bergabunglah bersama Laskar Muda Hanura DKI Jakarta. Wadah perjuangan pemuda untuk membawa perubahan nyata melalui hati nurani.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
    <a href="<?= base_url('/daftar') ?>" 
       class="bg-gradient-lasmura text-white 
              px-3 py-3 text-sm        /* Ukuran Mobile */
              sm:px-8 sm:py-4 sm:text-lg /* Ukuran Desktop (sm ke atas) */
              rounded-full font-bold shadow-2xl shadow-orange-600/20 hover:scale-105 transition-all duration-300 text-center">
       Gabung Sekarang
    </a>
    
    <a href="<?= base_url('/tentang') ?>" 
       class="bg-white/10 backdrop-blur-md border border-white/20 text-white 
              px-3 py-3 text-sm        /* Ukuran Mobile */
              sm:px-8 sm:py-4 sm:text-lg /* Ukuran Desktop (sm ke atas) */
              rounded-full font-bold hover:bg-white/20 transition-all text-center">
       Pelajari Selanjutnya
    </a>
</div>
    </div>

    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-white/50 animate-bounce">
        <i class="fa-solid fa-chevron-down text-xl"></i>
    </div>
</section>

<section id="tentang" class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="md:w-1/2">
                <div class="inline-block px-4 py-1.5 mb-4 rounded-full bg-orange-100 text-[#ea7e13] font-bold text-xs uppercase tracking-widest">
                    Tentang Kami
                </div>
                <h2 class="text-2xl md:text-4xl font-bold text-gray-900 mb-6 leading-snug">
                    Gerakan Pemuda Pelopor <br> <span class="text-[#ec1309]">Hati Nurani Rakyat</span>
                </h2>
                <p class="text-gray-600 leading-relaxed text-md mb-6 text-justify">
                    Laskar Muda Hanura (LASMURA) merupakan organisasi sayap pemuda Partai Hanura
                    yang berperan strategis dalam kaderisasi dan pengembangan kepemimpinan generasi muda.
                </p>
                <p class="text-gray-600 leading-relaxed text-md text-justify">
                    Kami hadir di DKI Jakarta sebagai garda terdepan untuk menghimpun potensi kaum muda, 
                    membekali mereka dengan integritas, serta mempersiapkan pemimpin yang responsif terhadap dinamika sosial politik.
                </p>
            </div>
            <div class="md:w-1/2 relative">
                <div class="bg-gradient-to-tr from-gray-200 to-gray-100 h-80 w-full rounded-3xl shadow-inner flex items-center justify-center border-4 border-white overflow-hidden">
                    <i class="fa-solid fa-users text-gray-300 text-8xl"></i>
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-2xl hidden md:block">
                    <div class="text-[#ec1309] font-bold text-2xl tracking-tighter">1000+</div>
                    <div class="text-gray-400 text-xs uppercase font-bold tracking-widest">Kader Aktif</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Visi & Misi Strategis</h2>
            <div class="h-1.5 w-24 bg-gradient-to-r from-[#ea7e13] to-[#ec1309] mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-[#ea7e13] mb-6 group-hover:bg-[#ea7e13] group-hover:text-white transition-colors">
                    <i class="fa-solid fa-shield-halved text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Integritas Tinggi</h3>
                <p class="text-gray-500 leading-relaxed">Membangun karakter kader muda yang jujur, disiplin, dan setia pada nilai-nilai Hati Nurani Rakyat.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                <div class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center text-[#ec1309] mb-6 group-hover:bg-[#ec1309] group-hover:text-white transition-colors">
                    <i class="fa-solid fa-bolt text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Partisipasi Politik</h3>
                <p class="text-gray-500 leading-relaxed">Meningkatkan kesadaran dan partisipasi aktif generasi muda dalam menentukan arah kebijakan politik nasional.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                <div class="w-14 h-14 bg-gray-50 rounded-2xl flex items-center justify-center text-gray-700 mb-6 group-hover:bg-gray-800 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-flag text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Garda Terdepan</h3>
                <p class="text-gray-500 leading-relaxed">Menjadi pilar utama perjuangan Partai Hanura dalam memenangkan aspirasi rakyat di wilayah DKI Jakarta.</p>
            </div>
        </div>
    </div>
</section>

<?= $this->include('home/layout/footer') ?>