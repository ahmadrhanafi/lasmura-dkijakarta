<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= esc($berita['judul']) ?></title>
    
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.6;
        }

        h1 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .meta {
            font-size: 11px;
            color: #555;
            margin-bottom: 20px;
        }

        .content {
            text-align: justify;
        }
    </style>
</head>

<body>

    <div style="text-align: center; margin-bottom: 30px;">
        <h1 style="font-family: 'serif'; font-size: 24px; text-transform: uppercase; margin-bottom: 5px; line-height: 1.2;">
            <?= esc($berita['judul']) ?>
        </h1>
        <hr style="width: 50%; border: 0.5px solid #ccc;">
    </div>

    <div style="width: 100%; text-align: center; margin-bottom: 25px;">
        <div style="display: inline-block; width: 60%;">
            <?php if (!empty($berita['thumbnail']) && file_exists(FCPATH . 'uploads/berita/' . $berita['thumbnail'])): ?>
                <img src="data:image/png;base64,<?= base64_encode(file_get_contents(FCPATH . 'uploads/berita/' . $berita['thumbnail'])) ?>"
                    style="width: 100%; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <?php else: ?>
                <div style="padding: 20px; border: 1px solid #eee; background: #f9f9f9; color: #999; font-size: 11px; font-style: italic;">
                    (Gambar tidak tersedia)
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div style="text-align: right; margin-bottom: 30px; font-size: 12px; color: #333; font-style: italic; line-height: 1.5;">
        Ditulis oleh <strong><?= esc($berita['nama_lengkap']) ?></strong><br>
        <?= date('d F Y', strtotime($berita['created_at'])) ?>
    </div>

    <div style="text-align: justify; font-family: 'serif'; font-size: 13px; line-height: 1.6; color: #1a1a1a;">
        <?= $berita['konten'] ?>
    </div>

</body>

</html>