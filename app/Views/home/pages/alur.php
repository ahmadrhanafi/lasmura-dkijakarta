<?= $this->include('home/pages/layout/header') ?>

<div class="min-h-screen bg-slate-50 py-12 px-4">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-slate-800">Alur Aktivasi Akun</h1>
            <p class="text-slate-600 mt-2">Ikuti langkah-langkah berikut untuk mengaktifkan akun Anggota Lasmura Anda.</p>
        </div>

        <div class="relative">
            <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full border-l-2 border-dashed border-slate-300"></div>

            <div class="space-y-12">
                <div class="relative flex flex-col md:flex-row items-center group">
                    <div class="flex-1 md:text-right md:pr-12 mb-4 md:mb-0">
                        <h3 class="text-xl font-bold text-slate-800">Pendaftaran Akun</h3>
                        <p class="text-sm text-slate-600">Isi formulir pendaftaran dengan data diri yang valid sesuai KTP.</p>
                    </div>
                    <div class="z-10 flex items-center justify-center w-12 h-12 bg-indigo-600 text-white rounded-full shadow-lg font-bold">1</div>
                    <div class="flex-1 md:pl-12 mt-4 md:mt-0">
                        <span class="text-xs font-semibold uppercase tracking-wider text-indigo-500">Tahap Awal</span>
                    </div>
                </div>

                <div class="relative flex flex-col md:flex-row-reverse items-center group">
                    <div class="flex-1 md:text-left md:pl-12 mb-4 md:mb-0">
                        <h3 class="text-xl font-bold text-slate-800">Verifikasi Email</h3>
                        <p class="text-sm text-slate-600">Cek kotak masuk email Anda dan klik tombol verifikasi yang kami kirimkan.</p>
                    </div>
                    <div class="z-10 flex items-center justify-center w-12 h-12 bg-[#ea7e13] text-white rounded-full shadow-lg font-bold">2</div>
                    <div class="flex-1 md:text-right md:pr-12 mt-4 md:mt-0">
                        <span class="text-xs font-semibold uppercase tracking-wider text-[#ea7e13]">Validasi Data</span>
                    </div>
                </div>

                <div class="relative flex flex-col md:flex-row items-center group">
                    <div class="flex-1 md:text-right md:pr-12 mb-4 md:mb-0">
                        <h3 class="text-xl font-bold text-slate-800">Review Admin</h3>
                        <p class="text-sm text-slate-600">Tim Admin Lasmura DKI Jakarta akan melakukan validasi dokumen dalam 1x24 jam.</p>
                    </div>
                    <div class="z-10 flex items-center justify-center w-12 h-12 bg-slate-800 text-white rounded-full shadow-lg font-bold">3</div>
                    <div class="flex-1 md:pl-12 mt-4 md:mt-0">
                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Proses Kurasi</span>
                    </div>
                </div>

                <div class="relative flex flex-col md:flex-row-reverse items-center group">
                    <div class="flex-1 md:text-left md:pl-12 mb-4 md:mb-0">
                        <h3 class="text-xl font-bold text-emerald-600">Akun Aktif!</h3>
                        <p class="text-sm text-slate-600">Selamat! Akun Anda sudah bisa digunakan untuk mengakses layanan Lasmura.</p>
                    </div>
                    <div class="z-10 flex items-center justify-center w-12 h-12 bg-emerald-500 text-white rounded-full shadow-lg font-bold">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="flex-1 md:text-right md:pr-12 mt-4 md:mt-0">
                        <span class="text-xs font-semibold uppercase tracking-wider text-emerald-500">Selesai</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-16 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm text-center">
            <h4 class="font-bold text-slate-800">Butuh bantuan aktivasi?</h4>
            <p class="text-sm text-slate-500 mb-4">Hubungi tim support kami jika mengalami kendala teknis.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="https://wa.me/6285777930178" class="inline-flex items-center justify-center px-6 py-2 bg-emerald-500 text-white rounded-full font-semibold hover:bg-emerald-600 transition shadow-md">
                    <i class="fa-brands fa-whatsapp mr-2"></i> WhatsApp Admin
                </a>
                <a href="mailto:lasmuradkijakarta@gmail.com" class="inline-flex items-center justify-center px-6 py-2 bg-slate-100 text-slate-700 rounded-full font-semibold hover:bg-slate-200 transition">
                    <i class="fa-solid fa-envelope mr-2"></i> Kirim Email
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->include('home/pages/layout/footer') ?>