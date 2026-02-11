<?= $this->include('board/layout/header') ?>

<!-- Content -->
<main class="p-6 space-y-6">

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-gray-500 text-sm">Total Anggota</h3>
            <p class="text-3xl font-bold text-[#b91c1c]">12</p>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-gray-500 text-sm">Total Pendaftar</h3>
            <p class="text-3xl font-bold text-[#b91c1c]">85</p>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-gray-500 text-sm">Total Berita</h3>
            <p class="text-3xl font-bold text-[#b91c1c]">12</p>
        </div>

    </div>

    <!-- Info -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold mb-2 text-gray-700">
            Informasi Sistem
        </h2>
        <p class="text-gray-600 text-sm">
            Dashboard ini digunakan oleh administrator untuk mengelola data anggota,
            pendaftaran, kegiatan, dan berita LASMURA DKI Jakarta.
        </p>
    </div>

</main>

<?= $this->include('board/layout/footer') ?>