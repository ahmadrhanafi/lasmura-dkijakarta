<?= $this->include('home/pages/layout/header') ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-6">
    <div class="mb-10 md:text-left">
        <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Kartu Tanda Anggota</h1>
        <p class="text-gray-500 text-sm mt-1">Identitas resmi keanggotaan DPD LASMURA DKI Jakarta.</p>
        <div class="h-1 w-20 bg-[#ea7e13] mt-4 md:mx-0 rounded-full"></div>
    </div>

    <div class="flex flex-col lg:flex-row gap-12 items-start">
        <div class="w-full max-w-md mx-auto lg:mx-0 group">
            <div class="relative aspect-[1.586/1] w-full rounded-[2rem] overflow-hidden shadow-2xl transition-transform duration-500 group-hover:scale-[1.02]">
                <div class="absolute inset-0 bg-gradient-to-br from-[#ea7e13] to-[#ec1309]"></div>
                <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>

                <div class="relative w-full max-w-md aspect-[1.586/1] rounded-2xl overflow-hidden shadow-2xl">

                    <img src="<?= base_url('assets/images/kta-template2.png') ?>"
                        class="absolute inset-0 w-full h-full object-cover">

                    <div class="absolute left-[40%] top-[38%] text-white font-bold uppercase text-md">
                        <?= esc($user['nama_lengkap']) ?>
                    </div>

                    <div class="absolute left-[40%] top-[47%] text-white text-xs uppercase font-regular">
                        <?= esc($jabatan['nama_jabatan'] ?? 'Anggota') ?>
                    </div>

                </div>

            </div>
            <p class="text-center text-gray-400 text-xs mt-4 italic font-medium tracking-wide">Tampilan Pratinjau KTA Digital Anda</p>
        </div>

        <div class="flex-1 w-full">
            <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-sm">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-3">
                    <i class="fa-solid fa-id-card text-[#ea7e13]"></i> Informasi Detail
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">
                    <div class="space-y-1">
                        <label class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">NIK</label>
                        <p class="text-gray-900 font-semibold border-b border-gray-50 pb-2"><?= esc($user['nik']) ?></p>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Jenis Kelamin</label>
                        <p class="text-gray-900 font-semibold border-b border-gray-50 pb-2"><?= esc($user['jenis_kelamin'] ?? '-') ?></p>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Tanggal Lahir</label>
                        <p class="text-gray-900 font-semibold border-b border-gray-50 pb-2"><?= esc($user['tanggal_lahir'] ?? '-') ?></p>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Status Keanggotaan</label>
                        <p class="text-green-600 font-bold border-b border-gray-50 pb-2 flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span> Aktif
                        </p>
                    </div>
                </div>

                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <a href="<?= base_url('/anggota/kta/cetak') ?>"
                        class="flex-1 bg-gray-900 hover:bg-black text-white text-center py-4 rounded-2xl font-bold transition-all flex items-center justify-center gap-3 shadow-lg shadow-gray-200">
                        <i class="fa-solid fa-file-pdf text-lg text-red-500"></i>
                        Cetak KTA (PDF)
                    </a>
                    <button onclick="window.print()"
                        class="px-8 py-4 bg-gray-50 hover:bg-gray-100 text-gray-600 rounded-2xl font-bold transition-all border border-gray-200 flex items-center justify-center gap-3">
                        <i class="fa-solid fa-print"></i>
                        Print
                    </button>
                </div>
            </div>

            <div class="mt-6 flex items-start gap-3 px-6 text-gray-400">
                <i class="fa-solid fa-circle-info mt-1"></i>
                <p class="text-xs leading-relaxed italic">
                    Gunakan kartu ini sebagai tanda pengenal resmi dalam kegiatan organisasi. Jika terdapat kesalahan data, silakan hubungi admin kesekretariatan.
                </p>
            </div>
        </div>
    </div>
</main>

<?= $this->include('home/pages/layout/footer') ?>