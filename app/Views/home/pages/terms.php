<?= $this->include('home/pages/layout/header') ?>

<div class="min-h-screen bg-slate-50 py-12 px-4">
    <div class="max-w-4xl mx-auto">
        
        <nav class="flex mb-5 text-sm text-slate-500" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li><a href="<?= base_url('/') ?>" class="hover:text-[#ea7e13]">Beranda</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px] mx-2"></i></li>
                <li class="font-bold text-slate-800">Syarat & Ketentuan</li>
            </ol>
        </nav>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="bg-slate-800 p-8 md:p-12 text-center border-b-4 border-[#ea7e13]">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-full mb-4 text-white">
                    <i class="fa-solid fa-file-contract text-3xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-white">Syarat & Ketentuan</h1>
                <p class="text-slate-400 mt-2">Aturan penggunaan layanan digital LASMURA DKI Jakarta.</p>
            </div>

            <div class="p-8 md:p-12 text-slate-600 leading-relaxed space-y-8 text-sm md:text-base">
                
                <section>
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2 text-indigo-700">
                        1. Ketentuan Umum
                    </h2>
                    <p>
                        Dengan mendaftar dan menggunakan aplikasi ini, Anda setuju untuk mematuhi semua peraturan yang ditetapkan oleh **LASMURA DKI Jakarta**. Layanan ini disediakan untuk mempermudah koordinasi dan administrasi keanggotaan secara digital.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2 text-indigo-700">
                        2. Kelayakan Pengguna
                    </h2>
                    <p class="mb-3">Untuk menjadi pengguna terverifikasi, Anda harus:</p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>Merupakan anggota resmi atau calon anggota LASMURA yang sah.</li>
                        <li>Memiliki identitas kependudukan (KTP) yang berlaku.</li>
                        <li>Memberikan informasi yang jujur, akurat, dan terbaru dalam formulir pendaftaran.</li>
                    </ul>
                </section>

                <section class="bg-amber-50 p-6 rounded-2xl border border-amber-100">
                    <h2 class="text-xl font-bold text-amber-800 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        3. Akun dan Keamanan
                    </h2>
                    <p class="mb-3 text-amber-900/80">Keamanan akun adalah tanggung jawab bersama:</p>
                    <ul class="list-decimal pl-5 space-y-2 text-amber-900/80 font-medium">
                        <li>Anda dilarang memberikan akses akun kepada pihak lain.</li>
                        <li>Kami berhak membekukan akun jika ditemukan aktivitas mencurigakan.</li>
                        <li>Segera lapor kepada Admin jika Anda mendapati akses tidak sah pada akun Anda.</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2 text-indigo-700">
                        4. Larangan Penggunaan
                    </h2>
                    <p class="mb-3">Pengguna dilarang keras untuk:</p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>Melakukan tindakan *hacking*, *spamming*, atau merusak infrastruktur digital LASMURA.</li>
                        <li>Mengunggah dokumen palsu atau memanipulasi identitas diri.</li>
                        <li>Menyebarkan konten yang mengandung SARA atau ujaran kebencian di dalam platform.</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2 text-indigo-700">
                        5. Perubahan Ketentuan
                    </h2>
                    <p>
                        LASMURA DKI Jakarta berhak mengubah syarat dan ketentuan ini sewaktu-waktu. Perubahan akan diinformasikan melalui notifikasi di dalam aplikasi atau melalui email terdaftar. Penggunaan layanan secara berkelanjutan setelah perubahan dianggap sebagai persetujuan terhadap ketentuan baru.
                    </p>
                </section>

                <div class="pt-8 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4 text-slate-400 text-xs">
                    <p>Terakhir diperbarui: 11 Februari 2026</p>
                    <p class="font-mono bg-slate-100 px-2 py-1 rounded">DOC-ID: LAS/TOS/2026-001</p>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white p-6 rounded-2xl border shadow-sm text-center">
            <p class="text-slate-600 text-sm">Dengan menekan tombol <strong>Daftar/Setuju</strong>, Anda dianggap telah memahami seluruh aturan di atas.</p>
        </div>
    </div>
</div>

<?= $this->include('home/pages/layout/footer') ?>