<?= $this->include('auth/layout/header') ?>

    <div class="absolute inset-0 bg-black/50 z-0"></div>

    <div class="relative z-10 bg-white/90 backdrop-blur-md p-8 rounded-3xl shadow-2xl border border-white/20 w-full max-w-sm transition-all duration-300 hover:shadow-orange-500/10">
        
        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-[#ea7e13]">
                Login
            </h2>
            <p class="text-gray-500 text-xs mt-2 font-medium uppercase tracking-widest">
                LASMURA DKI JAKARTA
            </p>
            <hr class="my-5 border-gray-300/50">
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="js-flash-alert flex items-center bg-red-50/90 text-red-700 p-4 rounded-xl mb-6 text-xs border border-red-100 animate-pulse">
                <i class="fa-solid fa-circle-exclamation text-sm mr-3"></i>
                <span class="font-bold"><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="js-flash-alert flex items-center bg-green-50/90 text-green-700 p-4 rounded-xl mb-6 text-xs border border-green-100 animate-bounce">
                <i class="fa-solid fa-check text-sm mr-3"></i>
                <span class="font-bold"><?= session()->getFlashdata('success') ?></span>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/login') ?>" method="post" class="space-y-5">
            <?= csrf_field() ?>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5 ml-1">Username</label>
                <input type="text" name="username" required
                    placeholder="Masukkan username"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-orange-500/20 focus:border-[#ea7e13] transition-all bg-white/50 focus:bg-white">
            </div>

            <div class="relative">
                <label class="block text-sm font-bold text-gray-700 mb-1.5 ml-1">Password</label>
                <div class="relative flex items-center">
                    <input type="password" id="password" name="password"
                        placeholder="••••••••"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 pr-12 focus:outline-none focus:ring-4 focus:ring-orange-500/20 focus:border-[#ea7e13] transition-all bg-white/50 focus:bg-white">

                    <button type="button" id="togglePassword" class="absolute right-4 text-gray-400 hover:text-[#ea7e13] transition-colors focus:outline-none">
                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
                <p class="text-[10px] text-gray-400 mt-2 ml-1 italic font-medium">*Kosongkan jika belum aktivasi akun</p>
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-r from-[#ea7e13] to-[#ec1309] text-white py-3.5 rounded-xl font-bold shadow-lg shadow-orange-600/30 hover:opacity-90 active:scale-[0.98] transition-all duration-200 uppercase text-sm tracking-wider">
                Masuk ke Akun
            </button>
        </form>

        <div class="text-center mt-8">
            <a href="<?= base_url('/') ?>" class="text-gray-500 hover:text-[#ea7e13] text-sm font-bold transition-colors inline-flex items-center gap-2">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>

<?= $this->include('auth/layout/footer') ?>