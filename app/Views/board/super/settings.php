<?= $this->include('board/layout/header') ?>

<div class="max-w-full overflow-x-hidden p-4 md:p-6 space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl md:text-2xl font-bold text-slate-800">Pengaturan Sistem</h1>
            <p class="text-xs md:text-sm text-slate-500">Kelola konfigurasi dasar aplikasi dan pemeliharaan data.</p>
        </div>
    </div>

    <!-- Alert Section -->
    <?php if (session()->getFlashdata('error') || session()->getFlashdata('success')): ?>
        <div class="js-flash-alert mb-6 overflow-hidden rounded-xl border shadow-sm transition-all duration-500">
            <?php if ($msg = session()->getFlashdata('error')): ?>
                <div class="flex items-center bg-red-50 border-l-4 border-red-500 p-4">
                    <i class="fa-solid fa-triangle-exclamation text-red-500 mr-3"></i>
                    <span class="text-red-800 text-xs md:text-sm font-medium"><?= $msg ?></span>
                </div>
            <?php endif; ?>
            <?php if ($msg = session()->getFlashdata('success')): ?>
                <div class="flex items-center bg-emerald-50 border-l-4 border-emerald-500 p-4">
                    <i class="fa-solid fa-circle-check text-emerald-500 mr-3"></i>
                    <span class="text-emerald-800 text-xs md:text-sm font-medium"><?= $msg ?></span>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left Column: Form Settings -->
        <div class="lg:col-span-2 space-y-6">

            <!-- ================== UMUM ================== -->
            <div class="bg-white rounded-xl border shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b bg-slate-50 flex items-center gap-2">
                    <i class="fa-solid fa-sliders text-slate-400"></i>
                    <span class="font-bold text-slate-700 uppercase text-xs tracking-wider">Pengaturan Umum</span>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Nama Aplikasi</label>
                        <div class="relative">
                            <input type="text"
                                class="w-full border bg-slate-50 border-slate-200 rounded-lg px-4 py-2.5 text-sm text-slate-500 font-semibold focus:outline-none"
                                value="LASMURA DKI Jakarta" disabled>
                            <i class="fa-solid fa-lock absolute right-3 top-3 text-slate-300 text-xs"></i>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Mode Aplikasi</label>
                        <select class="w-full border border-slate-200 rounded-lg px-3 py-2.5 text-sm font-medium outline-none focus:ring-2 focus:ring-[#d66a0c] focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="production">Production</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- ================== LOG AKTIVITAS ================== -->
            <form action="<?= base_url('admin/pengaturan/save') ?>" method="post" class="bg-white rounded-xl shadow-sm border overflow-hidden">
                <div class="px-6 py-4 border-b bg-slate-50 flex items-center gap-2">
                    <i class="fa-solid fa-clock-rotate-left text-slate-400"></i>
                    <span class="font-bold text-slate-700 uppercase text-xs tracking-wider">Keamanan & Log</span>
                </div>
                <div class="p-6 space-y-5">
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700">
                            Retensi Log Aktivitas
                        </label>
                        <div class="flex items-center gap-3">
                            <div class="relative flex-grow max-w-[200px]">
                                <input type="number"
                                    name="log_retention_days"
                                    min="1"
                                    value="<?= esc($retention) ?>"
                                    class="w-full border border-slate-200 rounded-lg pl-4 pr-12 py-2.5 text-sm font-mono outline-none focus:ring-2 focus:ring-[#d66a0c] shadow-sm">
                                <span class="absolute right-3 top-2.5 text-xs font-bold text-slate-400">HARI</span>
                            </div>
                        </div>
                        <p class="text-[11px] text-slate-400 leading-relaxed italic">
                            <i class="fa-solid fa-circle-info mr-1"></i>
                            Log akan dihapus otomatis secara permanen setelah melewati batas hari yang ditentukan untuk menjaga performa database.
                        </p>
                    </div>

                    <div class="pt-4 border-t flex justify-end">
                        <button class="w-full md:w-auto bg-slate-800 text-white px-8 py-2.5 rounded-lg text-sm font-bold hover:bg-slate-900 transition-all shadow-md active:scale-95">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Right Column: System Info -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl border shadow-sm overflow-hidden sticky top-6">
                <div class="px-6 py-4 border-b bg-slate-50 flex items-center gap-2">
                    <i class="fa-solid fa-server text-slate-400"></i>
                    <span class="font-bold text-slate-700 uppercase text-xs tracking-wider">Informasi Server</span>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b border-slate-50 pb-3">
                            <span class="text-[11px] font-bold text-slate-500 uppercase">Environment</span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-black bg-emerald-50 text-emerald-600 border border-emerald-100"><?= ENVIRONMENT ?></span>
                        </div>
                        <div class="flex justify-between items-center border-b border-slate-50 pb-3">
                            <span class="text-[11px] font-bold text-slate-500 uppercase">PHP Version</span>
                            <span class="text-xs font-mono text-slate-700 font-bold"><?= phpversion() ?></span>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-[11px] font-bold text-slate-500 uppercase">Server Software</span>
                            <span class="text-[11px] font-mono text-slate-600 bg-slate-50 p-2 rounded border truncate" title="<?= $_SERVER['SERVER_SOFTWARE'] ?>">
                                <?= $_SERVER['SERVER_SOFTWARE'] ?>
                            </span>
                        </div>
                    </div>

                    <div class="mt-8 p-4 bg-amber-50 border border-amber-100 rounded-lg">
                        <div class="flex gap-3">
                            <i class="fa-solid fa-shield-halved text-amber-500 mt-1"></i>
                            <div>
                                <h4 class="text-xs font-bold text-amber-800 uppercase tracking-tight">Catatan Keamanan</h4>
                                <p class="text-[10px] text-amber-700 mt-1 leading-normal text-justify">
                                    Pastikan melakukan backup database secara rutin sebelum mengubah pengaturan retensi log atau mode aplikasi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('board/layout/footer') ?>