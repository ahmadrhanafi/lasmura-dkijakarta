<?= $this->include('pages/layout/header') ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-20">
    <div class="mb-10 text-center md:text-left">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Kartu Tanda Anggota</h1>
        <p class="text-gray-500 text-sm mt-1">Identitas resmi keanggotaan DPD LASMURA DKI Jakarta.</p>
        <div class="h-1 w-20 bg-[#ea7e13] mt-4 mx-auto md:mx-0 rounded-full"></div>
    </div>

    <div class="flex flex-col lg:flex-row gap-12 items-start">
        <div class="w-full max-w-md mx-auto lg:mx-0 group">
            <div class="relative aspect-[1.586/1] w-full rounded-[2rem] overflow-hidden shadow-2xl transition-transform duration-500 group-hover:scale-[1.02]">
                <div class="absolute inset-0 bg-gradient-to-br from-[#ea7e13] to-[#ec1309]"></div>
                <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>

                <div class="relative h-full p-6 md:p-8 flex flex-col justify-between text-white">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-black tracking-tighter italic">LASMURA</h2>
                            <p class="text-[8px] uppercase tracking-[0.2em] opacity-80">DKI Jakarta</p>
                        </div>
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center border border-white/30">
                            <i class="fa-solid fa-shield-halved text-xl"></i>
                        </div>
                    </div>

                    <div class="flex gap-5 items-end">
                        <div class="w-24 h-28 bg-gray-200 rounded-lg overflow-hidden border-2 border-white/50 shrink-0">
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['nama_lengkap']) ?>&background=random" class="w-full h-full object-cover">
                        </div>
                        <div class="overflow-hidden">
                            <h3 class="text-lg font-bold leading-tight truncate uppercase"><?= esc($user['nama_lengkap']) ?></h3>
                            <p class="text-[10px] text-orange-200 font-mono tracking-widest mt-1"><?= esc($user['nomor_anggota']) ?></p>
                            <div class="mt-3 py-1 px-3 bg-white/10 backdrop-blur-sm rounded-md border border-white/10 inline-block">
                                <p class="text-[9px] uppercase font-bold tracking-tighter">Anggota Aktif</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center text-gray-400 text-xs mt-4 italic font-medium tracking-wide">Tampilan Pratinjau KTA Digital</p>
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
                        <p class="text-gray-900 font-semibold border-b border-gray-50 pb-2"><?= esc($user['jenis_kelamin'] ?? 'Tidak Diisi') ?></p>
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

<?= $this->include('pages/layout/footer') ?>