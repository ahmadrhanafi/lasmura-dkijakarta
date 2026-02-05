<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aktivasi Akun | LASMURA DKI JAKARTA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-gradient-lasmura {
            background: linear-gradient(135deg, #ea7e13 0%, #ec1309 100%);
        }
    </style>
</head>

<body class="bg-gradient-lasmura flex items-center justify-center min-h-screen p-4">

    <div class="bg-white/95 backdrop-blur-sm p-8 rounded-3xl shadow-2xl border border-white/20 w-full max-w-md my-8 transition-all">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-[#ea7e13]">
                Aktivasi Akun
            </h2>
            <p class="text-gray-500 text-[10px] mt-2 font-bold uppercase tracking-[0.2em]">
                Lengkapi Data Keanggotaan Anda
            </p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div id="alert-flash" class="flex items-center bg-red-50 text-red-700 p-4 rounded-xl mb-6 text-xs border border-red-100 animate-pulse">
                <i class="fa-solid fa-circle-exclamation text-sm mr-3"></i>
                <span class="font-medium"><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('aktivasi') ?>" class="space-y-5">
            <?= csrf_field() ?>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5 ml-1 uppercase tracking-wider">Username</label>
                <div class="relative flex items-center">
                    <i class="fa-solid fa-user absolute left-4 text-gray-400 text-xs"></i>
                    <input type="text" name="username" required placeholder="Username"
                        class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-[#ea7e13] transition-all bg-gray-50/50">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5 ml-1 uppercase tracking-wider">NIK (Nomor Induk Kependudukan)</label>
                <div class="relative flex items-center">
                    <i class="fa-solid fa-id-card absolute left-4 text-gray-400 text-xs"></i>
                    <input type="text" name="nik" required placeholder="16 Digit NIK"
                        class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-[#ea7e13] transition-all bg-gray-50/50">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5 ml-1 uppercase tracking-wider">Password Baru</label>
                <div class="relative flex items-center">
                    <i class="fa-solid fa-lock absolute left-4 text-gray-400 text-xs"></i>
                    <input type="password" id="password" name="password" required placeholder="••••••••"
                        class="w-full border border-gray-200 rounded-xl pl-10 pr-12 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-[#ea7e13] transition-all bg-gray-50/50">
                    <button type="button" class="toggle-password absolute right-4 text-gray-400 hover:text-[#ec1309] transition-colors" data-target="password">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5 ml-1 uppercase tracking-wider">Konfirmasi Password</label>
                <div class="relative flex items-center">
                    <i class="fa-solid fa-shield absolute left-4 text-gray-400 text-xs"></i>
                    <input type="password" id="password_confirm" name="password_confirm" required placeholder="••••••••"
                        class="w-full border border-gray-200 rounded-xl pl-10 pr-12 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-[#ea7e13] transition-all bg-gray-50/50">
                    <button type="button" class="toggle-password absolute right-4 text-gray-400 hover:text-[#ec1309] transition-colors" data-target="password_confirm">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-gradient-lasmura text-white py-4 rounded-xl font-bold shadow-xl shadow-red-500/30 hover:opacity-90 active:scale-[0.97] transition-all duration-200 mt-2 uppercase tracking-widest">
                Aktifkan Akun
            </button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // 1. Script Toggle Password (Versi Multiple)
            const toggleButtons = document.querySelectorAll('.toggle-password');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    const icon = this.querySelector('i');

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.replace('fa-eye', 'fa-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.replace('fa-eye-slash', 'fa-eye');
                    }
                });
            });

            // 2. Script Auto-Hide Flash Message
            const alert = document.getElementById('alert-flash');
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = "all 0.6s cubic-bezier(0.4, 0, 0.2, 1)";
                    alert.style.opacity = "0";
                    alert.style.transform = "translateY(-10px)";
                    setTimeout(() => alert.remove(), 600);
                }, 5000);
            }
        });
    </script>

</body>

</html>