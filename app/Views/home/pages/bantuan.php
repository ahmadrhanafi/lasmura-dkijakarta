<?= $this->include('home/pages/layout/header') ?>

<div class="min-h-screen bg-slate-50 pb-12">
    <div class="bg-indigo-700 py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Ada yang bisa kami bantu?</h1>
            <p class="text-indigo-100 mb-8">Cari panduan atau jawaban instan untuk kendala Anda di sistem LASMURA.</p>
            
            <div class="relative max-w-xl mx-auto">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" placeholder="Ketik kata kunci (misal: aktivasi, login, berkas)..." 
                       class="w-full pl-12 pr-4 py-4 rounded-2xl shadow-xl border-none outline-none focus:ring-2 focus:ring-[#ea7e13] transition-all">
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 -mt-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                    <i class="fa-solid fa-book-open text-xl"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-2">Panduan Pengguna</h3>
                <p class="text-sm text-slate-500">Pelajari cara menggunakan fitur lengkap di dashboard.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-amber-600 group-hover:text-white transition-all">
                    <i class="fa-solid fa-shield-halved text-xl"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-2">Keamanan Akun</h3>
                <p class="text-sm text-slate-500">Tips menjaga kerahasiaan data dan reset kata sandi.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                    <i class="fa-solid fa-circle-check text-xl"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-2">Status Aktivasi</h3>
                <p class="text-sm text-slate-500">Cek syarat dan ketentuan agar akun segera disetujui.</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8">
            <h2 class="text-2xl font-bold text-slate-800 mb-8 flex items-center gap-2">
                <i class="fa-solid fa-circle-question text-indigo-600"></i>
                Pertanyaan Populer
            </h2>

            <div class="space-y-4">
                <details class="group border-b border-slate-100 pb-4" open>
                    <summary class="flex items-center justify-between font-semibold text-slate-700 cursor-pointer list-none">
                        <span>Berapa lama proses aktivasi akun anggota?</span>
                        <span class="transition group-open:rotate-180">
                            <i class="fa-solid fa-chevron-down text-sm"></i>
                        </span>
                    </summary>
                    <p class="text-slate-500 mt-3 text-sm leading-relaxed">
                        Proses verifikasi dokumen oleh admin LASMURA DKI Jakarta biasanya memakan waktu maksimal 1x24 jam pada hari kerja. Pastikan dokumen yang diunggah terbaca dengan jelas.
                    </p>
                </details>

                <details class="group border-b border-slate-100 pb-4">
                    <summary class="flex items-center justify-between font-semibold text-slate-700 cursor-pointer list-none">
                        <span>Bagaimana jika saya lupa kata sandi?</span>
                        <span class="transition group-open:rotate-180">
                            <i class="fa-solid fa-chevron-down text-sm"></i>
                        </span>
                    </summary>
                    <p class="text-slate-500 mt-3 text-sm leading-relaxed">
                        Anda dapat mengeklik tombol "Lupa Password" di halaman login. Sistem akan mengirimkan tautan pemulihan ke alamat email yang terdaftar.
                    </p>
                </details>

                <details class="group border-b border-slate-100 pb-4">
                    <summary class="flex items-center justify-between font-semibold text-slate-700 cursor-pointer list-none">
                        <span>Apakah data saya aman di platform ini?</span>
                        <span class="transition group-open:rotate-180">
                            <i class="fa-solid fa-chevron-down text-sm"></i>
                        </span>
                    </summary>
                    <p class="text-slate-500 mt-3 text-sm leading-relaxed">
                        Kami menggunakan enkripsi tingkat tinggi untuk melindungi data pribadi anggota. Informasi Anda hanya digunakan untuk kepentingan administrasi internal LASMURA.
                    </p>
                </details>
            </div>
        </div>

        <div class="mt-12 text-center">
            <p class="text-slate-600 mb-6">Tidak menemukan jawaban? Hubungi kami langsung.</p>
            <div class="inline-flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/6285777930178" class="flex items-center gap-2 bg-[#25D366] text-white px-8 py-3 rounded-full font-bold hover:opacity-90 transition shadow-lg shadow-emerald-100">
                    <i class="fa-brands fa-whatsapp text-xl"></i>
                    WhatsApp Support
                </a>
                <a href="mailto:lasmuradkijakarta@gmail.com" class="flex items-center gap-2 bg-slate-800 text-white px-8 py-3 rounded-full font-bold hover:bg-slate-900 transition shadow-lg shadow-slate-200">
                    <i class="fa-solid fa-envelope"></i>
                    Email Resmi
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->include('home/pages/layout/footer') ?>