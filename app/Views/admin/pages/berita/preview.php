<?= $this->include('admin/layout/header') ?>

<main class="p-6 space-y-6">

    <article class="bg-white p-8 rounded shadow">
        <div>
            <?php if ($berita['thumbnail']): ?>
                <img src="<?= base_url('uploads/berita/' . $berita['thumbnail']) ?>"
                    class="w-auto h-100 object-cover rounded mb-4">
            <?php else: ?>
                <span class="text-xs text-gray-400">—</span>
            <?php endif; ?>
        </div>

        <h3 class="text-2xl font-bold text-gray-800">
            <?= esc($berita['judul']) ?>
        </h3>

        <div class="text-sm text-gray-500 mb-6">
            <small>Ditulis oleh <b><?= esc($berita['nama_lengkap']) ?></b> •
            <?= date('d M Y', strtotime($berita['created_at'])) ?></small>
        </div>

        <div class="prose max-w-none">
            <?= $berita['konten'] ?>
        </div>
    </article>

    <div class="flex gap-2 justify-end items-center">
        <a href="<?= base_url('/admin/berita') ?>"
            class="bg-gray-200 px-4 py-2 rounded text-sm hover:bg-gray-300">
            Kembali
        </a>

        <a href="<?= base_url('/admin/berita/export-pdf/' . $berita['slug']) ?>"
            class="bg-red-600 text-white px-4 py-2 rounded text-sm hover:bg-red-700">
            <i class="fa-solid fa-file-pdf mr-1"></i> Export PDF
        </a>
    </div>
</main>

<?= $this->include('admin/layout/footer') ?>