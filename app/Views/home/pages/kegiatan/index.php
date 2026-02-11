<?= $this->include('home/pages/layout/header') ?>

<main class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-4xl font-extrabold mb-12">Agenda & Kegiatan</h2>

    <div class="grid md:grid-cols-3 gap-10">
        <?php foreach ($kegiatan as $k): ?>
            <article>
                <img src="<?= base_url('uploads/kegiatan/' . $k['thumbnail']) ?>"
                    class="h-56 w-full object-cover rounded-xl mb-4">

                <span class="text-xs text-orange-600 font-bold">
                    <?= date('d M Y', strtotime($k['tanggal_kegiatan'])) ?>
                </span>

                <h3 class="font-bold text-lg mt-2">
                    <a href="<?= base_url('kegiatan/' . $k['slug']) ?>">
                        <?= esc($k['judul']) ?>
                    </a>
                </h3>

                <p class="text-gray-500 text-sm mt-2 line-clamp-2">
                    <?= esc($k['deskripsi']) ?>
                </p>
            </article>
        <?php endforeach ?>
    </div>

    <div class="mt-16 flex justify-center">
        <?= $pager->links('kegiatan', 'homepage_pagination') ?>
    </div>
</main>

<?= $this->include('home/pages/layout/footer') ?>