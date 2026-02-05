<?= $this->include('pages/layout/header') ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16">
    
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-[10px] sm:text-xs text-gray-400 uppercase tracking-[0.15em] font-bold">
            <li>
                <a href="<?= base_url('/') ?>" class="hover:text-[#ea7e13] transition-colors">Beranda</a>
            </li>
            <li>
                <i class="fa-solid fa-chevron-right text-[8px] opacity-50"></i>
            </li>
            <li class="text-[#ea7e13]">Kabar Terkini</li>
        </ol>
    </nav>

    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Kabar Terkini</h2>
            <p class="text-gray-500 mt-2 text-sm md:text-base">Update informasi dan berita seputar LASMURA DKI Jakarta.</p>
            <div class="h-1.5 w-24 bg-gradient-to-r from-[#ea7e13] to-[#ec1309] mt-5 rounded-full shadow-sm"></div>
        </div>

        <div class="relative w-full md:w-80 group">
            <input type="text" placeholder="Cari berita..."
                class="w-full pl-12 pr-4 py-3 bg-white border border-gray-200 rounded-2xl focus:ring-4 focus:ring-orange-500/10 focus:border-[#ea7e13] outline-none transition-all text-sm shadow-sm group-hover:border-gray-300">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm group-focus-within:text-[#ea7e13] transition-colors"></i>
        </div>
    </div>

    <div class="group relative w-full h-[450px] md:h-[550px] rounded-[3rem] overflow-hidden mb-16 shadow-2xl border border-gray-100">
        <img src="https://images.unsplash.com/photo-1540910419892-f39a62a1bf26?q=80&w=2070"
            class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-1000 ease-in-out">

        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-90"></div>

        <div class="absolute bottom-0 left-0 p-8 md:p-16 w-full lg:w-3/4">
            <div class="flex items-center gap-4 mb-6">
                <span class="bg-[#ea7e13] text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-[0.2em] shadow-lg shadow-orange-600/20">Headline</span>
                <span class="text-gray-300 text-xs font-bold tracking-wider"><i class="fa-regular fa-calendar-check mr-2 text-[#ea7e13]"></i> 27 JANUARI 2026</span>
            </div>
            <h3 class="text-2xl md:text-5xl font-black text-white mb-6 leading-tight group-hover:text-orange-400 transition-colors duration-500">
                Gebrakan Baru LASMURA DKI Jakarta dalam Mendukung UMKM Lokal di Ibu Kota
            </h3>
            <p class="text-gray-300 text-sm md:text-lg line-clamp-2 mb-8 opacity-80 font-medium max-w-2xl">
                Ketua LASMURA DKI menyampaikan visi strategis tahun 2026 untuk memperkuat basis ekonomi anggota melalui kolaborasi digital dan akses permodalan...
            </p>
            <a href="#" class="inline-flex items-center gap-3 bg-white text-black px-8 py-4 rounded-2xl font-black text-sm uppercase tracking-wider hover:bg-[#ea7e13] hover:text-white transition-all active:scale-95 shadow-xl shadow-black/20">
                Baca Selengkapnya <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 md:gap-12">

        <article class="group">
            <div class="relative h-64 rounded-[2.5rem] overflow-hidden mb-6 shadow-lg border border-gray-100 bg-gray-100">
                <img src="https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?q=80&w=2070"
                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700">
                <div class="absolute top-5 right-5 bg-white/95 backdrop-blur-md px-4 py-1.5 rounded-xl text-[10px] font-black text-gray-800 tracking-widest shadow-sm">
                    POLITIK
                </div>
            </div>
            <div class="px-2">
                <div class="flex items-center gap-3 mb-4 text-[11px] font-bold text-gray-400 uppercase tracking-[0.15em]">
                    <span class="text-[#ea7e13]">Admin</span>
                    <span class="w-1.5 h-1.5 bg-gray-200 rounded-full"></span>
                    <span>10 Jan 2026</span>
                </div>
                <h4 class="text-xl font-bold text-gray-800 leading-snug group-hover:text-[#ea7e13] transition-colors line-clamp-2 mb-3">
                    Kunjungan Kerja ke Balai Kota, LASMURA Bahas Isu Kepemudaan
                </h4>
                <p class="text-gray-500 text-sm line-clamp-2 leading-relaxed opacity-90">
                    Pertemuan ini menghasilkan beberapa poin kesepakatan mengenai pelatihan kepemimpinan bagi pemuda di wilayah DKI Jakarta...
                </p>
            </div>
        </article>

        <article class="group">
            <div class="relative h-64 rounded-[2.5rem] overflow-hidden mb-6 shadow-lg border border-gray-100 bg-gray-100">
                <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?q=80&w=2070"
                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700">
                <div class="absolute top-5 right-5 bg-white/95 backdrop-blur-md px-4 py-1.5 rounded-xl text-[10px] font-black text-gray-800 tracking-widest shadow-sm">
                    SOSIAL
                </div>
            </div>
            <div class="px-2">
                <div class="flex items-center gap-3 mb-4 text-[11px] font-bold text-gray-400 uppercase tracking-[0.15em]">
                    <span class="text-[#ea7e13]">Admin</span>
                    <span class="w-1.5 h-1.5 bg-gray-200 rounded-full"></span>
                    <span>05 Jan 2026</span>
                </div>
                <h4 class="text-xl font-bold text-gray-800 leading-snug group-hover:text-[#ea7e13] transition-colors line-clamp-2 mb-3">
                    Lasmura Berbagi: Aksi Donor Darah Serentak di 5 Wilayah Kota
                </h4>
                <p class="text-gray-500 text-sm line-clamp-2 leading-relaxed opacity-90">
                    Bekerjasama dengan PMI DKI Jakarta, kegiatan ini berhasil mengumpulkan ratusan kantong darah dari kader muda Hanura...
                </p>
            </div>
        </article>

    </div>

    <div class="mt-20 flex justify-center">
        <nav class="flex items-center gap-3 bg-white p-2 rounded-2xl border border-gray-100 shadow-sm">
            <a href="#" class="w-12 h-12 flex items-center justify-center rounded-xl bg-gray-50 border border-transparent text-gray-400 hover:bg-[#ea7e13] hover:text-white transition-all group">
                <i class="fa-solid fa-arrow-left text-xs group-hover:-translate-x-1 transition-transform"></i>
            </a>
            <a href="#" class="w-12 h-12 flex items-center justify-center rounded-xl bg-[#ea7e13] text-white shadow-xl shadow-orange-500/40 font-black text-sm">1</a>
            <a href="#" class="w-12 h-12 flex items-center justify-center rounded-xl bg-white border border-gray-100 text-gray-600 hover:border-[#ea7e13] hover:text-[#ea7e13] font-bold text-sm transition-all">2</a>
            <a href="#" class="w-12 h-12 flex items-center justify-center rounded-xl bg-gray-50 border border-transparent text-gray-400 hover:bg-[#ea7e13] hover:text-white transition-all group">
                <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
            </a>
        </nav>
    </div>
</main>

<?= $this->include('pages/layout/footer') ?>