<?= $this->include('/home/layout/header') ?>

<section class="max-w-2xl mx-auto bg-white mt-10 p-8 rounded shadow">
    <h2 class="text-2xl font-bold text-red-700 mb-6 text-center">
        Pendaftaran Anggota LASMURA
    </h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/daftar/simpan') ?>" method="post" class="space-y-4">

        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="<?= old('nama_lengkap') ?>" required
                class="w-full mt-1 px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" value="<?= old('username') ?>" required
                class="w-full mt-1 px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">NIK</label>
            <input type="text" name="nik" maxlength="16" value="<?= old('nik') ?>" required
                class="w-full mt-1 px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select name="jenis_kelamin" required
                class="w-full mt-1 px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]">
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" required
                class="w-full mt-1 px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Nomor Handphone</label>
            <input type="text" name="no_hp" value="<?= old('no_hp') ?>" required
                class="w-full mt-1 px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email (Opsional)</label>
            <input type="email" name="email" value="<?= old('email') ?>"
                class="w-full mt-1 px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" rows="4"
                class="w-full mt-1 px-4 py-2 border rounded focus:ring-2 focus:ring-[#b91c1c]"><?= old('alamat') ?></textarea>
        </div>

        <div class="flex items-start">
            <input type="checkbox" name="setuju" value="1" required
                class="mt-1 mr-2 accent-[#b91c1c]">
            <p class="text-sm text-gray-600">
                Saya menyatakan bahwa data yang saya isikan adalah benar dan bersedia
                mengikuti proses seleksi anggota LASMURA.
            </p>
        </div>

        <button type="submit"
            class="w-full bg-[#b91c1c] text-white py-3 rounded font-semibold hover:bg-[#991b1b]">
            Kirim Pendaftaran
        </button>
    </form>
</section>

<?= $this->include('home/layout/footer') ?>