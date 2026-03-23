<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Berhasil | LASMURA DKI JAKARTA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .success-card { max-width: 600px; margin: 50px auto; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .nomor-anggota { font-size: 2rem; font-weight: bold; color: #FDBD0D; letter-spacing: 2px; border: 2px dashed #FDBD0D; display: inline-block; padding: 10px 20px; border-radius: 10px; background: #e7f1ff; }
    </style>
</head>
<body>

<div class="container text-center">
    <div class="card success-card p-5">
        <div class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#198754" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
        </div>
        
        <h2 class="mb-3">Pendaftaran Berhasil!</h2>
        <p class="text-muted">Halo <strong><?= $nama ?></strong>, terima kasih telah bergabung di LASMURA DKI Jakarta.</p>
        
        <hr>
        
        <p class="mb-2">Silakan simpan atau screenshot <b>Nomor Anggota</b> Anda:</p>
        <div class="nomor-anggota mb-4">
            <?= $nomor_anggota ?>
        </div>

        <?php if ($email_terkirim) : ?>
            <div class="alert alert-success">
                Konfirmasi juga telah dikirim ke email: <b><?= $email_user ?></b>
            </div>
        <?php else : ?>
            <div class="alert alert-warning">
                <b>Catatan:</b> Kami mengalami kendala pengiriman email konfirmasi, namun data Anda sudah <b>aman tersimpan</b> di sistem kami.
            </div>
        <?php endif; ?>

        <div class="mt-4">
            <a href="<?= base_url('/login') ?>" class="btn btn-primary btn-lg px-5">Login</a>
        </div>
    </div>
    
    <p class="text-muted small">© 2026 LASMURA DKI Jakarta</p>
</div>

</body>
</html>