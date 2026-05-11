<?= $this->include('home/pages/layout/header') ?>

<section class="pt-32 pb-20 bg-slate-50">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-slate-900 mb-4">Dokumen Legalitas</h1>
            <p class="text-slate-500">Transparansi dokumen resmi pendirian dan dasar hukum organisasi.</p>
        </div>

        <div class="grid gap-4">
            <?php
            $docs = [
                [
                    'title' => 'SK Kemenkumham RI',
                    'desc'  => 'Surat Keputusan pengesahan badan hukum organisasi.',
                    'file'  => 'example-sk-kemenkumham.pdf'
                ],
                [
                    'title' => 'AD / ART Organisasi',
                    'desc'  => 'Anggaran Dasar dan Anggaran Rumah Tangga Laskar Muda Hanura.',
                    'file'  => 'example-ad-art-lasmura.pdf'
                ],
                [
                    'title' => 'NPWP Organisasi',
                    'desc'  => 'Nomor Pokok Wajib Pajak atas nama organisasi resmi.',
                    'file'  => 'example-npwp-lasmura.pdf'
                ],
                [
                    'title' => 'SK DPD LASMURA DKI Jakarta',
                    'desc'  => 'Bukti lokasi kantor sekretariat DPD LASMURA DKI Jakarta.',
                    'file'  => 'draft-sk-dpd-lasmura.pdf'
                ],
            ];

            foreach ($docs as $doc): ?>
                <div class="bg-white p-6 rounded-2xl border border-slate-100 flex items-center justify-between hover:shadow-md transition-all">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 bg-orange-100 text-[#ea7e13] rounded-xl flex items-center justify-center text-xl">
                            <i class="fa-solid fa-file-pdf"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800"><?= $doc['title'] ?></h3>
                            <p class="text-xs text-slate-400"><?= $doc['desc'] ?></p>
                        </div>
                    </div>

                    <a href="<?= base_url('assets/docs/' . $doc['file']) ?>"
                        target="_blank"
                        class="text-sm font-bold text-slate-400 hover:text-[#ea7e13] flex items-center gap-2 transition-colors">
                        Lihat <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->include('home/pages/layout/footer') ?>