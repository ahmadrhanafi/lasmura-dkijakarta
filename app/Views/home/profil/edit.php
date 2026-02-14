<?= $this->include('home/pages/layout/header') ?>

<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16">

    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-[10px] sm:text-xs text-gray-400 uppercase tracking-[0.15em] font-bold">
            <li>
                <a href="<?= base_url('/') ?>" class="hover:text-[#ea7e13]">Beranda</a>
            </li>
            <li><i class="fa-solid fa-chevron-right text-[8px] opacity-50"></i></li>
            <li>
                <a href="<?= base_url('anggota/profil') ?>" class="hover:text-[#ea7e13]">Profil Saya</a>
            </li>
            <li><i class="fa-solid fa-chevron-right text-[8px] opacity-50"></i></li>
            <li class="text-[#ea7e13]">Edit Profil</li>
        </ol>
    </nav>

    <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Edit Profil Anggota</h1>

    <form action="<?= base_url('anggota/profil/update') ?>" method="post"
        class="bg-white rounded-[2.5rem] border border-gray-100 p-8 shadow-sm space-y-10">

        <?= csrf_field() ?>

        <!-- AKUN -->
        <section>
            <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-3">
                <span class="w-10 h-10 bg-orange-50 text-[#ea7e13] rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-user-shield"></i>
                </span>
                Akun
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap"
                        value="<?= esc($user['nama_lengkap']) ?>"
                        class="form-input" required>
                </div>

                <div>
                    <label class="form-label">Username</label>
                    <input type="text" name="username"
                        value="<?= esc($user['username']) ?>"
                        class="form-input" required>
                </div>

                <div>
                    <label class="form-label">Email</label>
                    <input type="email" name="email"
                        value="<?= esc($user['email'] ?? '') ?>"
                        class="form-input">
                </div>
            </div>
        </section>

        <!-- BIODATA -->
        <section>
            <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-3">
                <span class="w-10 h-10 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-address-card"></i>
                </span>
                Biodata
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik"
                        value="<?= esc($user['nik']) ?>"
                        class="form-input" readonly>
                </div>

                <div>
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-input" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" <?= ($user['jenis_kelamin'] ?? '') === 'Laki-laki' ? 'selected' : '' ?>>
                            Laki-laki
                        </option>
                        <option value="Perempuan" <?= ($user['jenis_kelamin'] ?? '') === 'Perempuan' ? 'selected' : '' ?>>
                            Perempuan
                        </option>
                    </select>
                </div>

                <div>
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir"
                        value="<?= esc($user['tanggal_lahir'] ?? '') ?>"
                        class="form-input">
                </div>

                <div>
                    <label class="form-label">No. HP</label>
                    <input type="text" name="no_hp"
                        value="<?= esc($user['no_hp'] ?? '') ?>"
                        class="form-input">
                </div>

                <div class="md:col-span-2">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" rows="3"
                        class="form-input"><?= esc($user['alamat'] ?? '') ?></textarea>
                </div>
            </div>
        </section>

        <!-- ACTION -->
        <div class="flex justify-end gap-3 pt-6">
            <a href="<?= base_url('anggota/profil') ?>"
                class="px-6 py-3 bg-gray-200 rounded-xl font-bold text-gray-700">
                Batal
            </a>
            <button type="submit"
                class="px-6 py-3 bg-[#ea7e13] text-white rounded-xl font-bold shadow-lg shadow-orange-200">
                Simpan Perubahan
            </button>
        </div>

    </form>
</main>

<?= $this->include('home/pages/layout/footer') ?>