<?= $this->include('admin/layout/header') ?>

<main class="p-6 max-w-3xl">
    <div class="bg-white rounded shadow p-6 space-y-4">

        <div>
            <label class="text-sm text-gray-500">Nama Lengkap</label>
            <p class="font-semibold"><?= esc($anggota['nama_lengkap']) ?></p>
        </div>

        <div>
            <label class="text-sm text-gray-500">NIK</label>
            <p><?= esc($anggota['nik']) ?></p>
        </div>

       

        <div>
            <label class="text-sm text-gray-500">Status</label>
            <span class="px-3 py-1 text-xs rounded
                <?= $anggota['status'] === 'aktif'
                    ? 'bg-green-100 text-green-700'
                    : 'bg-red-100 text-red-700' ?>">
                <?= ucfirst($anggota['status']) ?>
            </span>
        </div>

        <div class="pt-4 flex gap-2">
            <a href="<?= base_url('/admin/anggota') ?>"
               class="px-4 py-2 bg-gray-300 rounded text-sm">
                Kembali
            </a>

            <a href="<?= base_url('/anggota/edit/'.$anggota['id_user']) ?>"
               class="px-4 py-2 bg-blue-600 text-white rounded text-sm">
                Edit Anggota
            </a>
        </div>

    </div>
</main>

<?= $this->include('admin/layout/footer') ?>
