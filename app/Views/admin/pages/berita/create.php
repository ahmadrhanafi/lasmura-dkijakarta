<?= $this->include('admin/layout/header') ?>

<!-- Content -->
<main class="p-6 space-y-6">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/admin/berita/simpan') ?>"
        method="post"
        enctype="multipart/form-data"
        class="space-y-6 bg-white p-6 rounded shadow">

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Thumbnail Berita
            </label>

            <input type="file" name="thumbnail" accept="image/*"
                class="w-full border rounded p-2">

            <p class="text-xs text-gray-500 mt-1">
                JPG / PNG, max 2MB
            </p>
        </div>

        <!-- Judul -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Judul Berita
            </label>
            <input type="text" name="judul" required
                class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]">
        </div>

        <!-- Ringkasan -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Ringkasan
            </label>
            <textarea name="ringkasan" rows="3"
                class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]"></textarea>
        </div>

        <!-- Konten -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Konten Berita
            </label>
            <textarea name="konten" rows="8" required
                class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]"></textarea>
        </div>

        <!-- Status -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Status
            </label>
            <select name="status"
                class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]">
                <option value="draft">Draft</option>
                <option value="publish">Publish</option>
            </select>
        </div>

        <!-- Action -->
        <div class="flex justify-between">
            <a href="<?= base_url('/admin/berita') ?>"
                class="px-4 py-2 text-sm text-gray-600 hover:underline">
                ← Kembali
            </a>

            <button type="submit"
                class="bg-[#b91c1c] text-white text-sm px-3 py-1 rounded hover:bg-[#991b1b]">
                Simpan Berita
            </button>
        </div>

    </form>

</main>

<?= $this->include('admin/layout/footer') ?>