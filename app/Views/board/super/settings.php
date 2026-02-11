<?= $this->include('board/layout/header') ?>

<div class="p-6 space-y-6">
    <h1 class="ttext-2xl font-bold text-slate-800">Pengaturan Sistem</h1>

    <?php if (session()->getFlashdata('error') || session()->getFlashdata('success')): ?>
        <div class="js-flash-alert mb-6 overflow-hidden rounded-xl border shadow-sm transition-all duration-500">
            <?php if ($msg = session()->getFlashdata('error')): ?>
                <div class="flex items-center bg-red-50 border-l-4 border-red-500 p-4">
                    <i class="fa-solid fa-triangle-exclamation text-red-500 mr-3"></i>
                    <span class="text-red-800 text-sm font-medium"><?= $msg ?></span>
                </div>
            <?php endif; ?>
            <?php if ($msg = session()->getFlashdata('success')): ?>
                <div class="flex items-center bg-emerald-50 border-l-4 border-emerald-500 p-4">
                    <i class="fa-solid fa-circle-check text-emerald-500 mr-3"></i>
                    <span class="text-emerald-800 text-sm font-medium"><?= $msg ?></span>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- ================== UMUM ================== -->
    <div class="bg-white rounded-xl border shadow-sm">
        <div class="px-6 py-4 border-b font-semibold text-slate-700">
            ⚙️ Pengaturan Umum
        </div>
        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="text-sm font-medium">Nama Aplikasi</label>
                <input type="text"
                    class="mt-1 w-full border rounded-lg px-3 py-2"
                    value="LASMURA DKI Jakarta" disabled>
            </div>

            <div>
                <label class="text-sm font-medium">Mode Aplikasi</label>
                <select class="mt-1 w-full border rounded-lg px-3 py-2">
                    <option>Production</option>
                    <option>Maintenance</option>
                </select>
            </div>
        </div>
    </div>

    <!-- ================== LOG AKTIVITAS ================== -->
    <form action="<?= base_url('admin/pengaturan/save') ?>" method="post"
        class="bg-white rounded-xl shadow border p-6 space-y-4">

        <div>
            <label class="block font-semibold mb-1">
                Retensi Log Aktivitas (hari)
            </label>
            <input type="number"
                name="log_retention_days"
                min="1"
                value="<?= esc($retention) ?>"
                class="w-full border rounded px-3 py-2">
            <small class="text-slate-500">
                Log akan dihapus otomatis setelah melewati jumlah hari ini
            </small>
        </div>

        <button class="bg-slate-800 text-white px-4 py-2 rounded">
            Simpan Pengaturan
        </button>
    </form>

    <!-- ================== INFO SISTEM ================== -->
    <div class="bg-white rounded-xl border shadow-sm">
        <div class="px-6 py-4 border-b font-semibold text-slate-700">
            ℹ️ Informasi Sistem
        </div>
        <div class="bg-slate-100 rounded-xl p-6 text-slate-600 border border-dashed border-slate-300">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                <div><strong>Environment:</strong> <?= ENVIRONMENT ?></div>
                <div><strong>PHP Version:</strong> <?= phpversion() ?></div>
                <div><strong>Server:</strong> <?= $_SERVER['SERVER_SOFTWARE'] ?></div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('board/layout/footer') ?>