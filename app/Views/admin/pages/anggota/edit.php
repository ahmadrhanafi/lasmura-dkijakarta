<?= $this->include('admin/layout/header') ?>

<main class="p-6 max-w-3xl">
    <form method="post"
          action="<?= base_url('admin/anggota/update/'.$anggota['id_user']) ?>"
          class="bg-white rounded shadow p-6 space-y-4">

        <div>
            <label class="text-sm">Nama Lengkap</label>
            <input type="text"
                   name="nama_lengkap"
                   value="<?= esc($anggota['nama_lengkap']) ?>"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="text-sm">Status</label>
            <select name="status"
                    class="w-full border rounded px-3 py-2">
                <option value="aktif" <?= $anggota['status']=='aktif'?'selected':'' ?>>Aktif</option>
                <option value="nonaktif" <?= $anggota['status']=='nonaktif'?'selected':'' ?>>Nonaktif</option>
            </select>
        </div>

        <div class="flex gap-2 pt-4">
            <button class="px-4 py-2 bg-blue-600 text-white rounded">
                Simpan
            </button>

            <a href="<?= base_url('/anggota/detail/'.$anggota['id_user']) ?>"
               class="px-4 py-2 bg-gray-300 rounded">
                Batal
            </a>
        </div>

    </form>
</main>

<?= $this->include('admin/layout/footer') ?>
