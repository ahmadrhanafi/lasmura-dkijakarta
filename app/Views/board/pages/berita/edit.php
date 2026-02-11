<?= $this->include('board/layout/header') ?>

<main class="p-6 space-y-6">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/admin/berita/update/' . $berita['id_berita']) ?>"
        method="post"
        enctype="multipart/form-data"
        class="space-y-6 bg-white p-6 rounded shadow">

        <!-- Judul -->
        <div>
            <label class="block text-sm font-medium mb-1">Judul</label>
            <input type="text" name="judul" required
                value="<?= esc($berita['judul']) ?>"
                class="w-full border px-4 py-2 rounded">
        </div>

        <!-- Ringkasan -->
        <div>
            <label class="block text-sm font-medium mb-1">Ringkasan</label>
            <textarea name="ringkasan" rows="3"
                class="w-full border px-4 py-2 rounded"><?= esc($berita['ringkasan']) ?></textarea>
        </div>

        <!-- Konten -->
        <div>
            <label class="block text-sm font-medium mb-1">Konten</label>
            <textarea name="konten" rows="8" required
                class="w-full border px-4 py-2 rounded"><?= esc($berita['konten']) ?></textarea>
        </div>

        <!-- Thumbnail -->
        <div>
            <label class="block text-sm font-medium mb-1">Thumbnail</label>

            <?php if ($berita['thumbnail']): ?>
                <img src="<?= base_url('uploads/berita/' . $berita['thumbnail']) ?>"
                    class="w-32 mb-2 rounded">
            <?php endif; ?>

            <input type="file" name="thumbnail" accept="image/*"
                class="w-full border rounded p-2">
        </div>

        <!-- Status -->
        <div>
            <label class="block text-sm font-medium mb-1">Status</label>
            <select name="status" class="w-full border px-4 py-2 rounded">
                <option value="draft" <?= $berita['status'] === 'draft' ? 'selected' : '' ?>>Draft</option>
                <option value="publish" <?= $berita['status'] === 'publish' ? 'selected' : '' ?>>Publish</option>
            </select>
        </div>

        <!-- Action -->
        <div class="flex justify-end space-x-4">
            <a href="<?= base_url('/admin/berita') ?>" class="bg-gray-300 px-6 py-2 rounded text-sm text-gray-800">
                Kembali
            </a>

            <button class="bg-[#b91c1c] text-white px-6 py-2 rounded text-sm">
                Update
            </button>
        </div>

    </form>

</main>

<?= $this->include('board/layout/footer') ?>