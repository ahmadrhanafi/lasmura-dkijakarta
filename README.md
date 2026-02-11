# LASMURA DKI JAKARTA - Management Information System

## Apa itu Website LASMURA DKI JAKARTA?

Situs LASMURA DKI JAKARTA adalah situs manajemen digital terintegrasi berbasis web yang dirancang untuk mengelola data operasional, administrasi anggota, dan pencetakan kartu tanda anggota sebagai sistem pelayanan internal organisasi LASMURA di wilayah DKI Jakarta.
Website ini fokus pada efisiensi alur kerja admin, pencetakan kartu anggota, transparansi data secara dinamis, dan kemudahan aksesibilitas.

## Fitur Utama

- Dashboard Executive			: Visualisasi `data real-time` terkait statistik anggota dan status sistem.
- Manajemen Pengguna (User Management)	: Sistem kontrol akses berbasis peran `(Role-Based Access Control)` yang mencakup Super Admin, Admin, dan Anggota.
- Pengaturan Sistem Dinamis		: Konfigurasi aplikasi mulai dari mode maintenance, manajemen cache, hingga kebijakan keamanan.
- Log Aktivitas & Audit Trail		: Pencatatan otomatis setiap tindakan penting dalam sistem untuk menjaga integritas data.
- Optimasi Performa			: Integrasi `Tailwind CSS` untuk antarmuka yang responsif dan ringan, serta sistem pagination cerdas untuk menangani data besar.

## Stack Teknologi

Aplikasi ini dibangun menggunakan teknologi mutakhir untuk menjamin skalabilitas:  
- Backend	: PHP 8 dengan [CodeIgniter 4](https://codeigniter.com)
- Frontend	: [Tailwind CSS](https://tailwindcss.com/) & JavaScript (Vanilla)
- Database	: [MySQL](https://www.mysql.com)
- Icons		: [FontAwesome 6](https://fontawesome.com)
- Local Serve	: [Laragon](https://laragon.org)

## Kontribusi

Proyek ini dikembangkan secara eksklusif untuk kebutuhan internal LASMURA DKI JAKARTA. Kontribusi luar saat ini terbatas, namun saran dan pelaporan bug dapat dikirimkan melalui tim pengembang internal.

## Lisensi

Distribusi dan penggunaan aplikasi ini diatur di bawah kebijakan internal LASMURA DKI JAKARTA. **Penggunaan tanpa izin untuk tujuan komersial di luar organisasi dilarang keras**.

* Developed by radicreative.  
**email:** radicreative.id@gmail.com

**Note :**  
*After hosting* must be into `SSH server` to write this path:  
`0 3 * * * /usr/bin/php /home/username/project/spark logs:cleanup`



# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
