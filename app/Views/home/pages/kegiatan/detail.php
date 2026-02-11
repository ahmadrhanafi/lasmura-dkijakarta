<?= $this->include('home/pages/layout/header') ?>

<main class="max-w-4xl mx-auto px-4 py-16">

    <img src="<?= base_url('uploads/kegiatan/' . $kegiatan['thumbnail']) ?>"
        class="rounded-2xl mb-8">

    <h1 class="text-4xl font-extrabold mb-4">
        <?= esc($kegiatan['judul']) ?>
    </h1>

    <div class="text-sm text-gray-500 mb-6">
        <?= date('d M Y', strtotime($kegiatan['tanggal_kegiatan'])) ?> •
        <?= esc($kegiatan['lokasi']) ?> •
        <?= esc($kegiatan['nama_lengkap']) ?>
    </div>

    <div class="prose max-w-none">
        <?= $kegiatan['konten'] ?>
    </div>

</main>

<?= $this->include('home/pages/layout/footer') ?>