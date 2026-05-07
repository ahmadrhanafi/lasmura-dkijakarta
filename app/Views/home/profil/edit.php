<?= $this->include('home/pages/layout/header') ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16">

    <div class="mb-10">
        <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Edit Profil</h1>
        <p class="text-gray-500 mt-1 text-sm">Perbarui informasi diri dan pengaturan akun Anda.</p>
        <div class="h-1 w-20 bg-[#ea7e13] mt-4 md:mx-0 rounded-full"></div>
    </div>

    <form action="<?= base_url('anggota/profil/update') ?>" method="post"
        class="bg-white rounded-[2rem] border border-gray-100 p-6 md:p-10 shadow-2xl shadow-gray-200/50 space-y-12">

        <?= csrf_field() ?>

        <section>
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-orange-50 text-[#ea7e13] rounded-2xl flex items-center justify-center shadow-inner">
                    <i class="fa-solid fa-user-gear text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Informasi Akun</h3>
                    <p class="text-xs text-gray-400">Data login dan identitas utama</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-600 ml-1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="<?= esc($user['nama_lengkap']) ?>"
                        class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-orange-100 focus:border-[#ea7e13] transition-all duration-300 outline-none text-gray-700"
                        placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-600 ml-1">Username</label>
                    <input type="text" name="username" value="<?= old('username', esc($user['username'])) ?>"
                        class="w-full px-5 py-4 rounded-2xl border <?= session('errors.username') ? 'border-red-500' : 'border-gray-200' ?> bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-orange-100 focus:border-[#ea7e13] transition-all duration-300 outline-none text-gray-700"
                        placeholder="Username" required>

                    <?php if (session('errors.username')) : ?>
                        <p class="text-red-500 text-xs mt-1 ml-1 font-medium italic">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i> <?= session('errors.username') ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label class="block text-sm font-bold text-gray-600 ml-1">Alamat Email</label>
                    <input type="email" name="email" value="<?= esc($user['email'] ?? '') ?>"
                        class="w-full px-5 py-4 rounded-2xl rounded-2xl border border-gray-200 bg-gray-200/50 cursor-not-allowed text-gray-500 outline-none"
                        placeholder="nama@email.com" readonly>
                </div>
            </div>
        </section>

        <hr class="border-gray-100">

        <section>
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center shadow-inner">
                    <i class="fa-solid fa-id-card-alt text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Biodata Lengkap</h3>
                    <p class="text-xs text-gray-400">Identitas dan data kontak anggota</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-600 ml-1">Nomor Anggota</label>
                    <input type="text" name="nomor_anggota" value="<?= esc($user['nomor_anggota'] ?? '') ?>"
                        class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-200/50 cursor-not-allowed text-gray-500 outline-none"
                        readonly>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-600 ml-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                        class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-orange-100 focus:border-[#ea7e13] transition-all duration-300 outline-none text-gray-700 appearance-none" required>
                        <option value="" disabled <?= empty($user['jk_asli']) ? 'selected' : '' ?>>-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" <?= ($user['jk_asli'] ?? '') === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?= ($user['jk_asli'] ?? '') === 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-600 ml-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="<?= esc($user['tanggal_lahir'] ?? '') ?>"
                        class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-orange-100 focus:border-[#ea7e13] transition-all duration-300 outline-none text-gray-700">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-600 ml-1">No. WhatsApp</label>
                    <input type="text" name="no_hp" value="<?= esc($user['no_hp'] ?? '') ?>"
                        class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-orange-100 focus:border-[#ea7e13] transition-all duration-300 outline-none text-gray-700"
                        placeholder="0812xxx">
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label class="block text-sm font-bold text-gray-600 ml-1">Alamat Domisili</label>
                    <textarea name="alamat" rows="4"
                        class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-orange-100 focus:border-[#ea7e13] transition-all duration-300 outline-none text-gray-700 resize-none"><?= esc($user['alamat'] ?? '') ?></textarea>
                </div>
            </div>
        </section>

        <div class="flex flex-col sm:flex-row justify-end items-center gap-4 pt-8 border-t border-gray-100">
            <a href="<?= base_url('anggota/profil') ?>"
                class="w-full sm:w-auto text-center px-8 py-4 rounded-2xl border-2 border-gray-400 text-gray-400 font-bold hover:text-gray-600 transition-all">
                Batalkan
            </a>
            <button type="submit"
                class="w-full sm:w-auto px-10 py-4 bg-[#ea7e13] text-white rounded-2xl font-black shadow-xl shadow-orange-100 hover:bg-[#d16d0d] hover:-translate-y-1 active:scale-95 transition-all duration-300">
                Simpan Perubahan
            </button>
        </div>

    </form>
</main>

<script>
    const usernameInput = document.querySelector('input[name="username"]');
    const updateBtn = document.querySelector('button[type="submit"]');

    const msgLabel = document.createElement('p');
    msgLabel.className = 'text-xs mt-1 ml-1 font-medium italic';
    usernameInput.parentNode.appendChild(msgLabel);

    usernameInput.addEventListener('input', function() {
        const username = this.value.trim();

        if (username === "") {
            msgLabel.innerHTML = `<i class="fa-solid fa-circle-exclamation mr-1"></i> Username tidak boleh kosong atau cuma spasi!`;
            msgLabel.className = 'text-xs mt-1 ml-1 font-medium italic text-red-500';
            usernameInput.classList.add('border-red-500');
            updateBtn.disabled = true;
            return;
        }

        usernameInput.classList.remove('border-red-500', 'border-green-500', 'border-gray-200');
        usernameInput.classList.add('border-blue-400');

        msgLabel.innerHTML = `<i class="fa-solid fa-spinner fa-spin mr-1"></i> Mengecek...`;
        msgLabel.className = 'text-xs mt-1 ml-1 font-medium italic text-blue-500';

        if (username.length < 3) {
            msgLabel.textContent = "Username terlalu pendek...";
            msgLabel.className = 'text-xs mt-1 ml-1 font-medium italic text-gray-400';
            return;
        }

        fetch('<?= base_url('anggota/check-username') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: 'username=' + encodeURIComponent(username)
            })
            .then(response => response.json())
            .then(data => {
                usernameInput.classList.remove('border-blue-400');

                if (data.status === 'taken') {
                    msgLabel.innerHTML = `<i class="fa-solid fa-circle-xmark mr-1"></i> ${data.message}`;
                    msgLabel.className = 'text-xs mt-1 ml-1 font-medium italic text-red-500 animate-pulse'; // Kasih efek kedip dikit
                    usernameInput.classList.replace('border-gray-200', 'border-red-500');

                    updateBtn.disabled = true;
                    updateBtn.classList.add('opacity-50', 'cursor-not-allowed');
                } else {
                    msgLabel.innerHTML = `<i class="fa-solid fa-circle-check mr-1"></i> ${data.message}`;
                    msgLabel.className = 'text-xs mt-1 ml-1 font-medium italic text-green-500';
                    usernameInput.classList.replace('border-red-500', 'border-green-500');

                    updateBtn.disabled = false;
                    updateBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                }
            })
            .catch(error => {
                msgLabel.textContent = "Gagal mengecek server...";
                msgLabel.className = 'text-xs mt-1 ml-1 font-medium italic text-gray-500';
            });

    });
</script>

<?= $this->include('home/pages/layout/footer') ?>