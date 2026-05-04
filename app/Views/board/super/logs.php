<?= $this->include('board/layout/header') ?>

<!-- Tambahkan wrapper utama dengan overflow-x-hidden untuk mencegah scroll body -->
<div class="max-w-full overflow-x-hidden p-4 md:p-6 space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="min-w-0"> <!-- min-w-0 mencegah flex child meluap -->
            <h1 class="text-xl md:text-2xl font-bold text-slate-800 truncate">Log Aktivitas Sistem</h1>
            <p class="text-xs md:text-sm text-slate-500">Pantau seluruh riwayat perubahan dan aktivitas admin.</p>
        </div>
        <div class="flex-shrink-0">
            <form action="<?= base_url('admin/logs/cleanup') ?>" method="post"
                onsubmit="return confirm('Hapus log lama?')">
                <button class="w-full md:w-auto flex items-center justify-center gap-2 bg-red-50 text-red-600 border border-red-200 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-red-100 transition shadow-sm">
                    <i class="fa-solid fa-trash-can text-xs"></i>
                    <span>Bersihkan Log</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl border shadow-sm overflow-hidden max-w-full">

        <!-- Filter Section -->
        <div class="p-4 border-b bg-slate-50">
            <form method="get" id="filterForm" class="flex flex-col lg:flex-row lg:items-center gap-3">
                <div class="grid grid-cols-2 lg:flex items-center gap-2 flex-grow">
                    <input type="date" name="from" value="<?= esc($filter['from'] ?? '') ?>"
                        class="text-sm border rounded-lg px-3 py-2 bg-white outline-none focus:ring-2 focus:ring-[#d66a0c] shadow-sm w-full">
                    <input type="date" name="to" value="<?= esc($filter['to'] ?? '') ?>"
                        class="text-sm border rounded-lg px-3 py-2 bg-white outline-none focus:ring-2 focus:ring-[#d66a0c] shadow-sm w-full">
                </div>

                <select name="modul" class="text-sm border rounded-lg px-3 py-2 bg-white outline-none focus:ring-2 focus:ring-[#d66a0c] shadow-sm w-full lg:w-[250px]">
                    <option value="">-- Semua Modul --</option>
                    <?php
                    $moduls = ['dashboard', 'penerimaan anggota', 'anggota lasmura', 'pengelolaan berita', 'kegiatan lasmura', 'struktur organisasi', 'manajemen admin'];
                    foreach ($moduls as $m): ?>
                        <option value="<?= $m ?>" <?= ($filter['modul'] ?? '') == $m ? 'selected' : '' ?>><?= ucwords($m) ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="flex gap-2">
                    <button type="submit" class="flex-1 lg:flex-none bg-slate-800 text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-slate-900 transition">
                        Filter
                    </button>
                    <?php if (!empty($filter['from']) || !empty($filter['modul'])): ?>
                        <a href="<?= base_url('admin/logs') ?>" class="flex items-center justify-center bg-slate-200 text-slate-600 px-4 py-2 rounded-lg text-sm hover:bg-slate-300">
                            <i class="fa-solid fa-rotate-left"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <!-- Bagian Penting: Kontainer Scroll Tabel -->
        <div class="w-full overflow-x-auto bg-white">
            <table class="w-full text-sm text-left border-collapse min-w-[800px]"> <!-- min-w memaksa tabel punya lebar minimal agar bisa di-scroll di dalam div ini -->
                <thead class="bg-white border-b text-slate-600 uppercase text-[10px] font-bold tracking-wider">
                    <tr>
                        <th class="px-6 py-4 w-32">Waktu</th>
                        <th class="px-6 py-4 w-40">Pengguna</th>
                        <th class="px-6 py-4 w-32 text-center">Modul</th>
                        <th class="px-6 py-4">Aktivitas</th>
                        <th class="px-6 py-4 w-28">IP Address</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach ($logs as $log): ?>
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="block font-bold text-slate-700 text-[11px]"><?= date('d/m/Y', strtotime($log['created_at'])) ?></span>
                                <span class="text-[10px] text-slate-400 font-mono"><?= date('H:i', strtotime($log['created_at'])) ?> WIB</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-bold text-slate-700 uppercase text-[10px] block truncate max-w-[120px]"><?= esc($log['nama_lengkap']) ?></span>
                                <span class="text-[9px] text-slate-400 italic"><?= strtoupper($log['role']) ?></span>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <span class="px-2 py-0.5 rounded text-[9px] font-black bg-indigo-50 text-indigo-600 border border-indigo-100 uppercase">
                                    <?= esc($log['modul']) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-slate-600 text-[11px] leading-tight italic line-clamp-2">
                                    <?= esc($log['aksi']) ?>
                                </p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-mono text-[10px] text-slate-400">
                                <?= $log['ip_address'] ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <!-- Footer / Pagination -->
        <div class="px-6 py-4 bg-slate-50 border-t flex flex-col sm:flex-row items-center justify-between gap-4">
            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                Showing <?= count($logs) ?> logs
            </span>
            <div class="pagination-custom scale-90 sm:scale-100">
                <?= $pager->links('logs', 'admin_pagination') ?>
            </div>
        </div>
    </div>
</div>

<?= $this->include('board/layout/footer') ?>