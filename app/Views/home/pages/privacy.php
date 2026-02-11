<?= $this->include('home/pages/layout/header') ?>

<div class="min-h-screen bg-slate-50 py-12 px-4">
    <div class="max-w-4xl mx-auto">
        
        <nav class="flex mb-5 text-sm text-slate-500" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li><a href="<?= base_url('/') ?>" class="hover:text-indigo-600">Beranda</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px] mx-2"></i></li>
                <li class="font-bold text-slate-800">Kebijakan Privasi</li>
            </ol>
        </nav>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="bg-indigo-700 p-8 md:p-12 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-full mb-4 text-white">
                    <i class="fa-solid fa-user-shield text-3xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-white">Kebijakan Privasi</h1>
                <p class="text-indigo-100 mt-2">Komitmen LASMURA DKI Jakarta dalam melindungi data pribadi Anda.</p>
            </div>

            <div class="p-8 md:p-12 text-slate-600 leading-relaxed space-y-8 text-sm md:text-base">
                
                <section>
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-[#ea7e13] rounded-full"></span>
                        Pendahuluan
                    </h2>
                    <p>
                        Privasi Anda adalah hal yang sangat penting bagi kami. Kebijakan Privasi ini menjelaskan bagaimana **LASMURA DKI Jakarta** mengumpulkan, menggunakan, melindungi, dan mengelola informasi pribadi yang Anda berikan melalui platform aplikasi kami.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-[#ea7e13] rounded-full"></span>
                        Data yang Kami Kumpulkan
                    </h2>
                    <p class="mb-3">Kami mengumpulkan informasi identitas pribadi untuk keperluan validasi keanggotaan, antara lain:</p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li><strong>Identitas Diri:</strong> Nama lengkap, NIK, dan tempat tanggal lahir sesuai KTP.</li>
                        <li><strong>Informasi Kontak:</strong> Alamat email aktif dan nomor telepon (WhatsApp).</li>
                        <li><strong>Data Administrasi:</strong> Dokumen foto KTP atau Kartu Anggota untuk proses verifikasi sistem.</li>
                    </ul>
                </section>

                <section class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-indigo-600 rounded-full"></span>
                        Penggunaan Informasi
                    </h2>
                    <p class="mb-3">Data yang Anda berikan akan digunakan untuk:</p>
                    <ul class="list-decimal pl-5 space-y-2">
                        <li>Memproses verifikasi akun Anggota baru.</li>
                        <li>Mengirimkan notifikasi penting terkait administrasi LASMURA.</li>
                        <li>Meningkatkan keamanan sistem dari akses yang tidak sah.</li>
                        <li>Mempermudah pendataan anggota secara digital dan terpusat.</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-[#ea7e13] rounded-full"></span>
                        Keamanan Data
                    </h2>
                    <p>
                        Kami menerapkan standar keamanan teknis menggunakan enkripsi data untuk memastikan informasi Anda tidak disalahgunakan, diakses tanpa izin, atau diubah oleh pihak yang tidak berwenang. Namun, perlu diingat bahwa tidak ada metode transmisi data internet yang 100% aman.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-[#ea7e13] rounded-full"></span>
                        Hak Anda atas Data
                    </h2>
                    <p>
                        Anda memiliki hak untuk meminta pembaruan data, perbaikan informasi yang tidak akurat, atau penghapusan akun jika Anda sudah tidak lagi menjadi bagian dari organisasi, sesuai dengan prosedur administrasi yang berlaku di LASMURA DKI Jakarta.
                    </p>
                </section>

                <div class="pt-8 border-t border-slate-100 text-center">
                    <p class="text-sm text-slate-400">Terakhir diperbarui: <strong>11 Februari 2026</strong></p>
                    <p class="text-sm text-slate-400 mt-1">Versi Dokumen: 1.0-PRIVACY</p>
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-center">
            <a href="<?= base_url('bantuan') ?>" class="text-indigo-600 font-semibold hover:underline flex items-center gap-2">
                <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Pusat Bantuan
            </a>
        </div>
    </div>
</div>

<?= $this->include('home/pages/layout/footer') ?>