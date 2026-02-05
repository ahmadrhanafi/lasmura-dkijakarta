    <?php $errors = session()->getFlashdata('errors'); ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="icon" type="image/svg+xml" href="<?= base_url('assets/favicon/lasmura.jpg') ?>">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>

    <body class="bg-[#ea7e13]/20">

        <section class="max-w-4xl mx-4 sm:mx-auto bg-white my-12 rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <div class="py-2 px-6 my-6 text-center">
                <h2 class="text-3xl font-extrabold mb-2 text-[#ea7e13] tracking-tight">
                    Pendaftaran Anggota
                </h2>
                <a href="<?= base_url('/') ?>" class="text-gray-500 mt-4 text-sm font-medium uppercase tracking-widest">
                    LASMURA DKI JAKARTA
                </a>
            </div>

            <div class="px-10 text-center">
                <hr class="border-0 h-[1px] bg-gray-200">
            </div>

            <div class="p-6 sm:p-10">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="flex items-center bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-xl mb-8 animate-bounce">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-bold"><?= session()->getFlashdata('success') ?></span>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="flex items-center bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-xl mb-8">
                        <i class="fa-solid fa-circle-exclamation text-sm mr-3"></i>
                        <span class="text-sm font-bold">
                            <?php
                            $pesan = session()->getFlashdata('error');
                            if (is_array($pesan)) {
                                echo implode(', ', $pesan);
                            } else {
                                echo $pesan;
                            }
                            ?>
                        </span>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('/daftar/simpan') ?>" method="post" class="space-y-6">
                    <?= csrf_field() ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" maxlength="16" value="<?= old('nama_lengkap') ?>" placeholder="e.g. Budi Santoso"
                                class="w-full px-4 py-3 bg-gray-50 border rounded-xl transition-all outline-none
        <?= isset($errors['nama_lengkap']) ? 'border-red-500 ring-4 ring-red-500/10' : 'border-gray-200 focus:border-[#ea7e13] focus:ring-4 focus:ring-orange-500/10' ?>">
                            <?php if (isset($errors['nama_lengkap'])): ?>
                                <p class="text-red-500 text-xs mt-1 ml-1 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation"></i> <?= $errors['nama_lengkap'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Username</label>
                            <input type="text" name="username" maxlength="12" value="<?= old('username') ?>" placeholder="e.g. budi, budisantoso123, budi_lasmura"
                                class="w-full px-4 py-3 bg-gray-50 border rounded-xl transition-all outline-none
        <?= isset($errors['username']) ? 'border-red-500 ring-4 ring-red-500/10' : 'border-gray-200 focus:border-[#ea7e13] focus:ring-4 focus:ring-orange-500/10' ?>">
                            <?php if (isset($errors['username'])): ?>
                                <p class="text-red-500 text-xs mt-1 ml-1 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation"></i> <?= $errors['username'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">NIK (16 Digit)</label>
                            <input type="text" name="nik" maxlength="16" value="<?= old('nik') ?>" placeholder="371XXXXXXXXXXXXX"
                                class="w-full px-4 py-3 bg-gray-50 border rounded-xl transition-all outline-none
        <?= isset($errors['nik']) ? 'border-red-500 ring-4 ring-red-500/10' : 'border-gray-200 focus:border-[#ea7e13] focus:ring-4 focus:ring-orange-500/10' ?>">
                            <?php if (isset($errors['nik'])): ?>
                                <p class="text-red-500 text-xs mt-1 ml-1 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation"></i> <?= $errors['nik'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Jenis Kelamin</label>
                            <select name="jenis_kelamin"
                                class="w-full px-4 py-3 bg-gray-50 border rounded-xl transition-all outline-none appearance-none
        <?= isset($errors['jenis_kelamin']) ? 'border-red-500 ring-4 ring-red-500/10' : 'border-gray-200 focus:border-[#ea7e13] focus:ring-4 focus:ring-orange-500/10 focus:bg-white' ?>">
                                <option value="">-- Pilih --</option>
                                <option value="L" <?= old('jenis_kelamin') == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="P" <?= old('jenis_kelamin') == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                            <?php if (isset($errors['jenis_kelamin'])): ?>
                                <p class="text-red-500 text-xs mt-1 ml-1 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation"></i> <?= $errors['jenis_kelamin'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Nomor Handphone</label>
                            <input type="text" name="no_hp" maxlength="16" value="<?= old('no_hp') ?>" placeholder="0812XXXXXXXX"
                                class="w-full px-4 py-3 bg-gray-50 border rounded-xl transition-all outline-none
        <?= isset($errors['no_hp']) ? 'border-red-500 ring-4 ring-red-500/10' : 'border-gray-200 focus:border-[#ea7e13] focus:ring-4 focus:ring-orange-500/10' ?>">
                            <?php if (isset($errors['no_hp'])): ?>
                                <p class="text-red-500 text-xs mt-1 ml-1 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation"></i> <?= $errors['no_hp'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="<?= old('tanggal_lahir') ?>" required
                                class="w-full px-4 py-3 bg-gray-50 border rounded-xl transition-all outline-none
        <?= isset($errors['tanggal_lahir']) ? 'border-red-500 ring-4 ring-red-500/10' : 'border-gray-200 focus:border-[#ea7e13] focus:ring-4 focus:ring-orange-500/10' ?>">
                            <?php if (isset($errors['tanggal_lahir'])): ?>
                                <p class="text-red-500 text-xs mt-1 ml-1 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation"></i> <?= $errors['tanggal_lahir'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Email (Opsional)</label>
                            <input type="email" name="email" value="<?= old('email') ?>" placeholder="alamat@email.com"
                                class="w-full px-4 py-3 bg-gray-50 border rounded-xl transition-all outline-none
        <?= isset($errors['email']) ? 'border-red-500 ring-4 ring-red-500/10' : 'border-gray-200 focus:border-[#ea7e13] focus:ring-4 focus:ring-orange-500/10' ?>">
                            <?php if (isset($errors['email'])): ?>
                                <p class="text-red-500 text-xs mt-1 ml-1 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation"></i> <?= $errors['email'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Alamat Domisili</label>
                            <textarea name="alamat" rows="3"
                                placeholder="Jl. Contoh No. 123, Kelurahan..."
                                class="w-full px-4 py-3 bg-gray-50 border rounded-xl transition-all outline-none resize-none 
        <?= isset($errors['alamat']) ? 'border-red-500 ring-4 ring-red-500/10' : 'border-gray-200 focus:border-[#ea7e13] focus:ring-4 focus:ring-orange-500/10' ?>"><?= old('alamat') ?></textarea>
                            <?php if (isset($errors['alamat'])): ?>
                                <p class="text-red-500 text-xs mt-1 ml-1 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation"></i> <?= $errors['alamat'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="flex items-start bg-gray-50 p-4 rounded-2xl border border-dashed border-gray-300">
                        <div class="flex items-center h-5 mt-1">
                            <input type="checkbox" name="setuju" value="1" required
                                class="w-5 h-5 text-[#ea7e13] border-gray-300 rounded focus:ring-[#ea7e13] accent-[#ea7e13]">
                        </div>
                        <div class="ml-3 text-sm">
                            <label class="text-gray-600 leading-relaxed">
                                Dengan ini saya menyatakan bahwa seluruh data yang diberikan adalah benar dan akurat.
                                Saya bersedia mematuhi seluruh tahapan serta ketentuan dari proses seleksi anggota yang dilakukan oleh LASMURA DKI Jakarta.
                            </label>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-[#ea7e13] to-[#ec1309] text-white py-4 rounded-2xl font-bold text-lg shadow-lg shadow-orange-600/30 hover:opacity-90 active:scale-[0.98] transition-all duration-200 uppercase tracking-wider">
                        Kirim Pendaftaran
                    </button>
                </form>
            </div>
        </section>

        <script>
            const numericInputs = ['nik', 'no_hp'];
            numericInputs.forEach(name => {
                const input = document.querySelector(`input[name="${name}"]`);
                if (input) {
                    input.addEventListener('input', function() {
                        this.value = this.value.replace(/[^0-9]/g, '');
                    });
                }
            });
        </script>

        <?= $this->include('home/layout/footer') ?>