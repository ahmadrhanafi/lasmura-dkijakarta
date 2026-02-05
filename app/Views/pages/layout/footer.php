<footer class="bg-slate-900 text-white mt-18 border-t-4 border-[#ea7e13]">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">

            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="bg-white p-1.5 rounded-lg shadow-md">
                        <img src="<?= base_url('assets/logo/lasmura.png') ?>" class="w-8 h-8" alt="Logo">
                    </div>
                    <span class="font-extrabold text-xl tracking-tighter">LASMURA</span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed mb-6 text-justify">
                    Wadah kaderisasi pemuda Partai Hanura di wilayah DKI Jakarta untuk mencetak pemimpin yang cerdas dan berintegritas.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#ea7e13] transition-colors">
                        <i class="fa-brands fa-instagram text-lg"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#ea7e13] transition-colors">
                        <i class="fa-brands fa-facebook-f text-lg"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#ea7e13] transition-colors">
                        <i class="fa-brands fa-x-twitter text-lg"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="font-bold text-lg mb-6 border-b border-slate-800 pb-2">Navigasi</h4>
                <ul class="space-y-4 text-slate-400 text-sm">
                    <li><a href="<?= base_url('/') ?>" class="hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Kegiatan Terbaru</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Berita Terkini</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Struktur Organisasi</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-lg mb-6 border-b border-slate-800 pb-2">Keanggotaan</h4>
                <ul class="space-y-4 text-slate-400 text-sm">
                    <li><a href="<?= base_url('/daftar') ?>" class="hover:text-white transition-colors">Pendaftaran Online</a></li>
                    <li><a href="<?= base_url('/login') ?>" class="hover:text-white transition-colors">Login Anggota</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Alur Aktivasi Akun</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Bantuan/FAQ</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-lg mb-6 border-b border-slate-800 pb-2">Kontak</h4>
                <ul class="space-y-4 text-slate-400 text-sm mb-6">
                    <li class="flex items-start space-x-3">
                        <i class="fa-solid fa-location-dot mt-1 text-[#ea7e13]"></i>
                        <span>Jl. Proklamasi No.81, Pegangsaan, Menteng, Jakarta Pusat.</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i class="fa-solid fa-envelope text-[#ea7e13]"></i>
                        <span>info@lasmuradki.or.id</span>
                    </li>
                </ul>

                <div class="w-full h-40 rounded-xl overflow-hidden border border-slate-800 grayscale hover:grayscale-0 transition-all duration-500 shadow-lg">
                    <iframe
                        src="https://maps.google.com/maps?q=-6.202745452372377, 106.87268977994442&hl=id&z=15&output=embed"
                        class="w-full h-full border-0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <a href="https://maps.app.goo.gl/uXmR8v2y2bH2hS7K8" target="_blank" class="inline-block mt-3 text-[11px] text-[#ea7e13] hover:underline uppercase font-bold tracking-widest">
                    Buka di Google Maps <i class="fa-solid fa-arrow-up-right-from-square ml-1"></i>
                </a>
            </div>
        </div>

        <div class="mt-16 pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center text-slate-500 text-xs">
            <p>&copy; 2026 Laskar Muda Hanura DKI Jakarta. All rights reserved.</p>
            <div class="mt-4 md:mt-0 flex space-x-6">
                <a href="#" class="hover:text-white">Privacy Policy</a>
                <a href="#" class="hover:text-white">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

</body>

</html>