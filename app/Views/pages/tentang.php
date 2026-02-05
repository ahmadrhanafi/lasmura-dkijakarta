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
            <li class="text-[#ea7e13]">Tentang Kami</li>
        </ol>
    </nav>
    
    <div class="relative w-full h-[300px] md:h-[400px] rounded-[3rem] overflow-hidden mb-16 shadow-2xl">
        <img src="https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?q=80&w=2070" 
             class="w-full h-full object-cover grayscale brightness-50" alt="Tentang Kami">
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
                Tentang <span class="text-[#ea7e13]">LASMURA</span>
            </h2>
            <p class="text-gray-200 max-w-2xl text-sm md:text-base leading-relaxed">
                Membangun semangat kepemudaan yang progresif, inovatif, dan berintegritas untuk masa depan DKI Jakarta yang lebih baik.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
        
        <div class="space-y-6">
            <div>
                <h3 class="text-2xl font-bold text-gray-900 tracking-tight">Sejarah Singkat</h3>
                <div class="h-1.5 w-16 bg-[#ea7e13] mt-2 rounded-full"></div>
            </div>
            <div class="space-y-4 text-gray-600 leading-relaxed text-base">
                <p>
                    <span class="font-bold text-gray-900">LASMURA (Laskar Muda Hanura)</span> DKI Jakarta hadir sebagai wadah perjuangan generasi muda dalam mengawal aspirasi rakyat di wilayah Ibu Kota. Kami percaya bahwa perubahan besar dimulai dari gerakan pemuda yang terorganisir dan memiliki visi yang jelas.
                </p>
                <p>
                    Berdiri dengan semangat gotong royong, kami terus bertransformasi menjadi organisasi yang adaptif terhadap perkembangan teknologi dan dinamika sosial masyarakat Jakarta.
                </p>
            </div>
            
            <div class="grid grid-cols-2 gap-4 pt-4">
                <div class="bg-gray-50 p-8 rounded-[2.5rem] border border-gray-100 text-center hover:bg-white hover:shadow-xl transition-all duration-300 group">
                    <span class="block text-4xl font-black text-[#ea7e13] group-hover:scale-110 transition-transform tracking-tighter">10+</span>
                    <span class="text-[10px] text-gray-400 uppercase font-black tracking-widest mt-1">Kecamatan</span>
                </div>
                <div class="bg-gray-50 p-8 rounded-[2.5rem] border border-gray-100 text-center hover:bg-white hover:shadow-xl transition-all duration-300 group">
                    <span class="block text-4xl font-black text-[#ea7e13] group-hover:scale-110 transition-transform tracking-tighter">500+</span>
                    <span class="text-[10px] text-gray-400 uppercase font-black tracking-widest mt-1">Anggota</span>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#ea7e13] to-[#ec1309] p-8 md:p-14 rounded-[3.5rem] text-white shadow-xl shadow-orange-500/20 relative overflow-hidden group">
            <div class="relative z-10 space-y-12">
                <div>
                    <h4 class="text-lg font-black mb-4 flex items-center gap-3 uppercase tracking-wider">
                        <i class="fa-solid fa-eye text-orange-200"></i> VISI
                    </h4>
                    <p class="text-orange-50 text-xl leading-relaxed italic font-medium">
                        "Menjadi garda terdepan perubahan pemuda Jakarta yang mandiri, cerdas secara politik, dan bermanfaat bagi kesejahteraan masyarakat."
                    </p>
                </div>

                <div>
                    <h4 class="text-lg font-black mb-6 flex items-center gap-3 uppercase tracking-wider">
                        <i class="fa-solid fa-rocket text-orange-200"></i> MISI
                    </h4>
                    <ul class="space-y-5 text-orange-50">
                        <li class="flex items-start gap-4">
                            <span class="bg-white/20 w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold">1</span>
                            <span class="text-sm md:text-base leading-snug">Meningkatkan literasi politik dan kepemimpinan bagi generasi muda di Jakarta.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="bg-white/20 w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold">2</span>
                            <span class="text-sm md:text-base leading-snug">Menjalankan aksi sosial nyata yang menyentuh langsung kebutuhan warga.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="bg-white/20 w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold">3</span>
                            <span class="text-sm md:text-base leading-snug">Membangun jejaring ekonomi kreatif antar anggota LASMURA.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-28 text-center">
        <h3 class="text-3xl font-black text-gray-900 mb-16 tracking-tight">Nilai-Nilai Kami</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            
            <div class="p-10 rounded-[2.5rem] bg-white border border-gray-100 hover:shadow-2xl transition-all duration-500 group hover:-translate-y-2">
                <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-[#ea7e13] transition-all duration-500 group-hover:rotate-6">
                    <i class="fa-solid fa-handshake text-[#ea7e13] text-2xl group-hover:text-white"></i>
                </div>
                <h5 class="font-black text-lg text-gray-800 mb-3 tracking-tighter">Integritas</h5>
                <p class="text-gray-500 text-sm leading-relaxed">Menjunjung tinggi kejujuran dan etika dalam setiap tindakan organisasi.</p>
            </div>
            
            <div class="p-10 rounded-[2.5rem] bg-white border border-gray-100 hover:shadow-2xl transition-all duration-500 group hover:-translate-y-2">
                <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-[#ea7e13] transition-all duration-500 group-hover:rotate-6">
                    <i class="fa-solid fa-lightbulb text-[#ea7e13] text-2xl group-hover:text-white"></i>
                </div>
                <h5 class="font-black text-lg text-gray-800 mb-3 tracking-tighter">Inovatif</h5>
                <p class="text-gray-500 text-sm leading-relaxed">Selalu mencari solusi kreatif untuk menghadapi tantangan kota Jakarta.</p>
            </div>

            <div class="p-10 rounded-[2.5rem] bg-white border border-gray-100 hover:shadow-2xl transition-all duration-500 group hover:-translate-y-2">
                <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-[#ea7e13] transition-all duration-500 group-hover:rotate-6">
                    <i class="fa-solid fa-users text-[#ea7e13] text-2xl group-hover:text-white"></i>
                </div>
                <h5 class="font-black text-lg text-gray-800 mb-3 tracking-tighter">Solidaritas</h5>
                <p class="text-gray-500 text-sm leading-relaxed">Mempererat tali persaudaraan antar pemuda tanpa membedakan latar belakang.</p>
            </div>
            
        </div>
    </div>
</main>

<?= $this->include('pages/layout/footer') ?>