<?= $this->include('board/layout/header') ?>

<main class="p-8 max-w-5xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Header Profil -->
        <div class="bg-slate-50/50 px-8 py-8 border-b border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center gap-5">
                <div class="w-20 h-20 bg-white rounded-2xl shadow-sm border border-slate-200 flex items-center justify-center text-slate-400 font-black text-3xl italic uppercase tracking-tighter">
                    <?= substr($anggota['nama_lengkap'], 0, 1) ?>
                </div>
                <div>
                    <h1 class="text-2xl font-black text-slate-800 uppercase tracking-tight leading-none mb-2"><?= esc($anggota['nama_lengkap']) ?></h1>
                    <div class="flex flex-wrap gap-x-4 gap-y-2">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest"><i class="fa-solid fa-id-badge mr-1.5 text-blue-500"></i> ID: <?= esc($anggota['nomor_anggota'] ?? '-') ?></span>
                        <!-- <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest"><i class="fa-solid fa-fingerprint mr-1.5 text-blue-500"></i> NIK: <?= esc($anggota['nik'] ?? '-') ?></span> -->
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest border <?= $anggota['status'] === 'aktif' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-slate-100 text-slate-500 border-slate-200' ?>">
                    <span class="w-1.5 h-1.5 rounded-full mr-2 <?= $anggota['status'] === 'aktif' ? 'bg-emerald-500' : 'bg-slate-400' ?>"></span>
                    <?= esc($anggota['status']) ?>
                </span>
            </div>
        </div>

        <!-- Konten Detail -->
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                <!-- Info Utama -->
                <div class="md:col-span-2 space-y-10">
                    <div>
                        <h3 class="text-[11px] font-black text-blue-600 uppercase tracking-[0.3em] mb-6 flex items-center">
                            <span class="w-8 h-[2px] bg-blue-600 mr-3"></span> Biodata Lengkap
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-8 gap-x-4">
                            <div class="space-y-1">
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest">Jenis Kelamin</label>
                                <p class="text-sm font-bold text-slate-700 uppercase"><?= esc($anggota['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan') ?></p>
                            </div>
                            <div class="space-y-1">
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tanggal Lahir</label>
                                <p class="text-sm font-bold text-slate-700 uppercase"><?= date('d F Y', strtotime($anggota['tanggal_lahir'])) ?></p>
                            </div>
                            <div class="sm:col-span-2 space-y-2">
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest">Alamat Domisili</label>
                                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                                    <p class="text-sm text-slate-600 leading-relaxed italic">"<?= esc($anggota['alamat'] ?? 'Belum ada data alamat') ?>"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kontak & Akses -->
                <div class="space-y-10">
                    <div>
                        <h3 class="text-[11px] font-black text-slate-400 uppercase tracking-[0.3em] mb-6 flex items-center">
                            <span class="w-8 h-[2px] bg-slate-200 mr-3"></span> Kontak
                        </h3>

                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 shrink-0">
                                    <i class="fa-solid fa-envelope text-xs"></i>
                                </div>
                                <div>
                                    <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Email</label>
                                    <p class="text-sm font-bold text-slate-700 lowercase"><?= esc($anggota['email'] ?? '-') ?></p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 shrink-0">
                                    <i class="fa-solid fa-phone text-xs"></i>
                                </div>
                                <div>
                                    <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Nomor HP</label>
                                    <p class="text-sm font-bold text-slate-700 font-mono"><?= esc($anggota['no_hp'] ?? '-') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Action Buttons -->
            <div class="mt-16 pt-8 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                <a href="<?= base_url('/admin/anggota') ?>"
                    class="group text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-blue-600 transition-all flex items-center">
                    <i class="fa-solid fa-chevron-left mr-2 group-hover:-translate-x-1 transition-transform"></i> Kembali ke Daftar
                </a>

                <div class="flex gap-3 w-full sm:w-auto">
                    <a href="<?= base_url('/admin/anggota/edit/' . $anggota['id_user']) ?>"
                        class="flex-1 sm:flex-none text-center px-8 py-3 bg-slate-900 text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 hover:shadow-xl hover:shadow-blue-200 transition-all">
                        <i class="fa-solid fa-user-pen mr-2"></i> Edit Data Anggota
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->include('board/layout/footer') ?>