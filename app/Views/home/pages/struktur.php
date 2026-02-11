<?= $this->include('home/pages/layout/header') ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16">

    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-[10px] sm:text-xs text-gray-400 uppercase tracking-[0.2em] font-bold">
            <li><a href="<?= base_url('/') ?>" class="hover:text-[#ea7e13]">Beranda</a></li>
            <li><i class="fa-solid fa-chevron-right text-[8px] opacity-40"></i></li>
            <li class="text-[#ea7e13]">Struktur Organisasi</li>
        </ol>
    </nav>

    <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight uppercase">Struktur Organisasi</h2>
        <p class="text-gray-500 mt-3 max-w-xl mx-auto text-xs md:text-sm px-4 leading-relaxed">
            Dewan Pimpinan Daerah Laskar Muda Hanura (LASMURA) Provinsi DKI Jakarta Periode 2025 - 2030.
        </p>
        <div class="h-1.5 w-20 bg-gradient-to-r from-[#ea7e13] to-[#ec1309] mt-6 mx-auto rounded-full shadow-sm"></div>
    </div>

    <div class="mb-16">
        <div class="flex items-center space-x-4 mb-8">
            <h3 class="text-lg font-black uppercase tracking-widest text-gray-400 shrink-0">Dewan Pembina</h3>
            <div class="h-px bg-gray-200 w-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-3 bg-white border-2 border-[#ea7e13] p-6 rounded-3xl text-center shadow-lg">
                <span class="text-[#ea7e13] text-[9px] font-black uppercase tracking-widest block mb-1">Ketua Dewan Pembina</span>
                <h4 class="text-xl font-bold text-gray-900">Dr. (C) H. Peronata Taufik Fatah, SE</h4>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                <h4 class="text-sm font-bold text-gray-900">Pramono Anung Wibowo</h4>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                <h4 class="text-sm font-bold text-gray-900">Rano Karno</h4>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                <h4 class="text-sm font-bold text-gray-900">Brigjen (Purn) TNI Samuel P Hehakaya</h4>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                <h4 class="text-sm font-bold text-gray-900">Mardjulis Noer</h4>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                <h4 class="text-sm font-bold text-gray-900">Pitto Fransino Latuheru</h4>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                <h4 class="text-sm font-bold text-gray-900">Nina Hazalina Nasution</h4>
            </div>
        </div>
    </div>

    <div class="mb-20">
        <div class="flex items-center space-x-4 mb-8">
            <h3 class="text-lg font-black uppercase tracking-widest text-gray-400 shrink-0">Dewan Penasihat</h3>
            <div class="h-px bg-gray-200 w-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-3 bg-white border-2 border-[#ea7e13] p-6 rounded-3xl text-center shadow-lg">
                <span class="text-[#ea7e13] text-[9px] font-black uppercase tracking-widest block mb-1">Ketua Dewan Penasihat</span>
                <h4 class="text-xl font-bold text-gray-900">Serfasius Sembaya Manek SH. MH</h4>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                <h4 class="text-sm font-bold text-gray-900">H. Peronata Taufik Fatah, SE</h4>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                <h4 class="text-sm font-bold text-gray-900">Anastasia Rotikan</h4>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                <h4 class="text-sm font-bold text-gray-900">Rizky Datuk</h4>
            </div>
        </div>
    </div>

    <div class="flex items-center space-x-4 mb-8">
        <h3 class="text-lg font-black uppercase tracking-widest text-gray-400 shrink-0">Dewan Pimpinan Daerah</h3>
        <div class="h-px bg-gray-200 w-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-24 items-center mb-12 md:mb-20 pt-2 relative">
        <div class="absolute top-15 left-1/4 right-1/4 h-[2px] bg-gray-200 hidden mt-7 md:block"></div>

        <div class="group flex z-10 md:flex-col items-center md:text-center bg-white p-6 md:p-8 rounded-[2rem] shadow-md border border-gray-100 hover:border-[#ea7e13] transition-all">
            <div class="md:ml-0 text-center w-full">
                <p class="text-[#ea7e13] font-bold text-[9px] md:text-[10px] uppercase tracking-widest mt-1.5 px-3 py-1 bg-gray-50 rounded-full inline-block">Ketua DPD</p>
                <h4 class="text-lg md:text-xl font-bold text-gray-900">Baskara Azhar Prayuda, S.Pd, M.Pd</h4>
            </div>
        </div>

        <div class="group flex z-10 md:flex-col items-center md:text-center bg-white p-6 md:p-8 rounded-[2rem] shadow-md border border-gray-100 hover:border-[#ea7e13] transition-all">
            <div class="md:ml-0 text-center w-full">
                <p class="text-[#ea7e13] font-bold text-[9px] md:text-[10px] uppercase tracking-widest mt-1.5 px-3 py-1 bg-gray-50 rounded-full inline-block">Wakil Ketua DPD</p>
                <h4 class="text-lg md:text-xl font-bold text-gray-900">Irsan Prasasti, S.H</h4>
            </div>
        </div>

        <div class="absolute top-20 left-1/2 -translate-x-1/2 w-[2px] h-40 bg-gray-200 hidden md:block"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-24 max-w-4xl mx-auto mb-16 md:mb-24 relative pt-0 md:pt-10">
        <div class="absolute top-0 left-1/4 right-1/4 h-[2px] bg-gray-200 hidden mt-7 md:block"></div>
        <div class="absolute top-0 left-1/4 w-[2px] h-40 bg-gray-200 hidden mt-7 md:block"></div>
        <div class="absolute top-0 right-1/4 w-[2px] h-40 bg-gray-200 hidden mt-7 md:block"></div>

        <div class="group flex z-10 mt-28 md:flex-col items-center md:text-center bg-white p-6 md:p-8 rounded-[2rem] shadow-md border border-gray-100 hover:border-[#ea7e13] transition-all">
            <div class="md:ml-0 text-center w-full">
                <p class="text-[#ea7e13] font-bold text-[9px] md:text-[10px] uppercase tracking-widest mt-1.5 px-3 py-1 bg-gray-50 rounded-full inline-block">Sekretaris DPD</p>
                <h4 class="text-lg md:text-xl font-bold text-gray-900">Anyar Djulianto</h4>
            </div>
        </div>

        <div class="group flex z-10 mt-28 md:flex-col items-center md:text-center bg-white p-6 md:p-8 rounded-[2rem] shadow-md border border-gray-100 hover:border-[#ea7e13] transition-all">
            <div class="md:ml-0 text-center w-full">
                <p class="text-[#ea7e13] font-bold text-[9px] md:text-[10px] uppercase tracking-widest mt-1.5 px-3 py-1 bg-gray-50 rounded-full inline-block">Bendahara DPD</p>
                <h4 class="text-lg md:text-xl font-bold text-gray-900">Ahmad Syarifah, S.H</h4>
            </div>
        </div>
    </div>

    <div class="relative pt-12 mt-8 border-t border-dashed border-gray-300">
        <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-white border border-gray-300 px-8 py-1">
            <h5 class="text-gray-400 font-black text-[10px] uppercase tracking-[0.4em] whitespace-nowrap">
                Wakil Ketua Bidang
            </h5>
        </div>

        <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
            <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">OKK</p>
                <h4 class="text-sm md:text-base font-bold text-gray-900">Aminudin</h4>
            </div>
            <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Pemenangan Pemilu</p>
                <h4 class="text-sm md:text-base font-bold text-gray-900">Haydar Ghifari Ahmad, S.Pd</h4>
            </div>
            <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Strategi & Ideologi</p>
                <h4 class="text-sm md:text-base font-bold text-gray-900">Angles Firnanda, S.Pd</h4>
            </div>
            <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Hukum & Advokasi</p>
                <h4 class="text-sm md:text-base font-bold text-gray-900">Eko Ritwanto</h4>
            </div>
            <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Media Sosial</p>
                <h4 class="text-sm md:text-base font-bold text-gray-900">Moh Irham, M.Pd</h4>
            </div>
            <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Ekonomi Kreatif</p>
                <h4 class="text-sm md:text-base font-bold text-gray-900">Dzulhendri</h4>
            </div>
            <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">HAL & OKP</p>
                <h4 class="text-sm md:text-base font-bold text-gray-900">Ahmad Arsul Munir, S.Pd</h4>
            </div>
        </div>

        <div class="relative pt-12 mt-16 border-t border-dashed border-gray-300">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-white border border-gray-300 px-8 py-1">
                <h5 class="text-gray-400 font-black text-[10px] uppercase tracking-[0.4em] whitespace-nowrap">
                    Wakil Sekretaris DPD
                </h5>
            </div>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Wakil Sekretaris (1)</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Saleman Kelrey</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Wakil Sekretaris (2)</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Dinda Harum Faradilla, S.Pd</h4>
                </div>
            </div>
        </div>

        <div class="relative pt-12 mt-16 border-t border-dashed border-gray-300">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-white border border-gray-300 px-8 py-1">
                <h5 class="text-gray-400 font-black text-[10px] uppercase tracking-[0.4em] whitespace-nowrap">
                    Wakil Bendahara DPD
                </h5>
            </div>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Wakil Bendahara (1)</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Zidan Ahyar</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Wakil Bendahara (2)</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Hilda Nurfadlya, S.E</h4>
                </div>
            </div>
        </div>

        <div class="relative mt-16 text-center bg-white border border-gray-300 px-8 py-1">
            <h5 class="text-gray-400 font-black text-[10px] uppercase tracking-[0.4em] whitespace-nowrap">
                Departemen-departemen
            </h5>
        </div>

        <section class="mt-16">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 max-w-7xl mx-auto">
                <!-- DEPARTEMEN CARD -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-lg transition">

                    <!-- Nama Departemen -->
                    <h3 class="text-xs font-black uppercase tracking-widest text-gray-400 text-center mb-6">
                        Organisasi, Kaderisasi<br>dan Keanggotaan
                    </h3>

                    <!-- Ketua -->
                    <div class="text-center mb-4">
                        <p class="text-[#ea7e13] text-[9px] font-black uppercase tracking-widest">
                            Ketua
                        </p>
                        <h4 class="text-sm font-bold text-gray-900">
                            Falah Arrahman, S.Sos
                        </h4>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-dashed border-gray-200 my-4"></div>

                    <!-- Anggota -->
                    <ul class="space-y-3 text-center">
                        <li>
                            <p class="text-[8px] uppercase font-black text-gray-400">Anggota</p>
                            <p class="text-sm font-semibold text-gray-900">Muhammad Sofyan</p>
                        </li>
                        <li>
                            <p class="text-[8px] uppercase font-black text-gray-400">Anggota</p>
                            <p class="text-sm font-semibold text-gray-900">Umar Falih</p>
                        </li>
                        <li>
                            <p class="text-[8px] uppercase font-black text-gray-400">Anggota</p>
                            <p class="text-sm font-semibold text-gray-900">Muhammad Reza Rosyid</p>
                        </li>
                    </ul>

                </div>
                <!-- END DEPARTEMEN CARD -->
            </div>
        </section>


        <div class="relative pt-12">
            <h3 class="text-xs text-center font-black uppercase tracking-widest text-gray-400 mb-12">Departemen: <br> Hukum, HAM dan Advokasi</h3>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto mb-6">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Ketua</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Khisol Syarif Ansori</h4>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Sandi Aditia Putra</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Arifansyah</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Nursupriani Sallo, S.H</h4>
                </div>
            </div>
        </div>

        <div class="relative pt-12">
            <h3 class="text-xs text-center font-black uppercase tracking-widest text-gray-400 mb-12">Departemen: <br> Ekonomi Kreatif dan UMKM</h3>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto mb-6">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Ketua</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Muhammad Subkhi, S.Pd</h4>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Rizal</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Ismak</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Rizal Riyadi</h4>
                </div>
            </div>
        </div>

        <div class="relative pt-12">
            <h3 class="text-xs text-center font-black uppercase tracking-widest text-gray-400 mb-12">Departemen: <br> IT dan Media Komunikasi</h3>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto mb-6">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Ketua</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Ridwan Yudistira</h4>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Zahratul Carisa</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Muhammad Mansyur Maulana, S.Pd</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Ridwan</h4>
                </div>
            </div>
        </div>

        <div class="relative pt-12">
            <h3 class="text-xs text-center font-black uppercase tracking-widest text-gray-400 mb-12">Departemen: <br> Milenial dan Sport Activity</h3>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto mb-6">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Ketua</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Zaidan Muazhzom</h4>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Wil Datun Naimah</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Muhamad Aldi</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Mukti</h4>
                </div>
            </div>
        </div>

        <div class="relative pt-12">
            <h3 class="text-xs text-center font-black uppercase tracking-widest text-gray-400 mb-12">Departemen: <br> Pemberdayaan Perempuan dan Perlindungan Anak</h3>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto mb-6">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Ketua</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Melianda Putri</h4>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Mutiara Farnanda</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Caswati</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Piki Ramadhoni</h4>
                </div>
            </div>
        </div>

        <div class="relative pt-12">
            <h3 class="text-xs text-center font-black uppercase tracking-widest text-gray-400 mb-12">Departemen: <br> Kesehatan dan Gizi</h3>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto mb-6">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Ketua</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Muhammad Wildan, S.Pd</h4>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Dina Susanthi, S.Pd</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">M. Rizal Dewangga</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Rona Prihastini, S.Pd</h4>
                </div>
            </div>
        </div>

        <div class="relative pt-12">
            <h3 class="text-xs text-center font-black uppercase tracking-widest text-gray-400 mb-12">Departemen: <br> Keagamaan dan Sosial</h3>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto mb-6">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Ketua</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Wisnu Herlambang</h4>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Ahmad Saifuz Zaman</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Sopian</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Muhammad Qodri</h4>
                </div>
            </div>
        </div>

        <div class="relative pt-12">
            <h3 class="text-xs text-center font-black uppercase tracking-widest text-gray-400 mb-12">Departemen: <br> Seni dan Budaya</h3>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto mb-6">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Ketua</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Afriadi</h4>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Fajlu Rahman, S.H</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Seadil Nur Rohmad</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Abdul Rohim</h4>
                </div>
            </div>
        </div>

        <div class="relative pt-12">
            <h3 class="text-xs text-center font-black uppercase tracking-widest text-gray-400 mb-12">Departemen: <br> Pertanian, Kelautan dan Perikanan</h3>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto mb-6">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Ketua</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Deni Ahmad Fauzan</h4>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Ibnu Kusaeri</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Beni Aprilian</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Bagus Sigit</h4>
                </div>
            </div>
        </div>

        <div class="relative pt-12">
            <h3 class="text-xs text-center font-black uppercase tracking-widest text-gray-400 mb-12">Departemen: <br> Hubungan Masyarakat dan Hubungan Antar Lembaga</h3>

            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto mb-6">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-[#ea7e13] text-[8px] md:text-[9px] font-black uppercase tracking-widest mb-1">Ketua</p>
                    <h4 class="text-sm md:text-base font-bold text-gray-900">Asep Muslihudin, S.Pd</h4>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl mx-auto">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Fikri Gozali, S.Pd</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Asep Samsudin, S.Pd</h4>
                </div>
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 text-center transition-all hover:shadow-lg hover:border-[#ea7e13] w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)]">
                    <p class="text-gray-400 text-[8px] font-black uppercase mb-1">Anggota</p>
                    <h4 class="text-sm font-bold text-gray-900">Romdhoni</h4>
                </div>
            </div>
        </div>
</main>

<?= $this->include('home/pages/layout/footer') ?>