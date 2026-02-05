<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak KTA <?= esc($user['nama_lengkap']) ?> | LASMURA DKI JAKARTA</title>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 8.5cm;
            height: 5.5cm;
            overflow: hidden;
            /* Mengunci konten agar tidak meluber */
        }

        @page {
            size: 8.5cm 5.5cm;
            margin: 0;
        }

        .kta-box {
            width: 8.5cm;
            height: 5.5cm;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            position: relative;
            /* Pastikan tidak ada border luar yang menambah dimensi */
            border: none;
        }

        /* Accent Header */
        .card-header {
            background: linear-gradient(90deg, #ea7e13 0%, #ec1309 100%);
            padding: 8px 15px;
            color: white;
            display: table;
            width: 100%;
            box-sizing: border-box;
        }

        .logo-text {
            display: table-cell;
            vertical-align: middle;
        }

        .logo-text h1 {
            margin: 0;
            font-size: 14px;
            letter-spacing: 1px;
            font-weight: 900;
        }

        .logo-text p {
            margin: 0;
            font-size: 6px;
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0.9;
        }

        /* Body Card */
        .card-body {
            padding: 10px 15px;
            position: relative;
        }

        .photo-space {
            float: left;
            width: 1.8cm;
            height: 2.3cm;
            background: #eee;
            border: 1px solid #ea7e13;
            border-radius: 4px;
            margin-right: 12px;
            overflow: hidden;
        }

        .photo-space img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .data-space {
            float: left;
            width: 4.5cm;
        }

        .field {
            margin-bottom: 4px;
        }

        .label {
            font-size: 6px;
            color: #888;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 1px;
        }

        .value {
            font-size: 9px;
            color: #111;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Watermark Background */
        .watermark {
            position: absolute;
            right: -10px;
            bottom: -10px;
            font-size: 60px;
            color: #f3f4f6;
            z-index: -1;
            font-weight: bold;
            transform: rotate(-20deg);
        }

        /* Footer & QR */
        .card-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 8px 15px;
            background: #f9fafb;
            border-top: 1px solid #eee;
            box-sizing: border-box;
        }

        .id-number {
            font-family: 'Courier New', Courier, monospace;
            font-size: 10px;
            color: #ea7e13;
            font-weight: bold;
        }

        .qr-code {
            position: absolute;
            right: 15px;
            bottom: 8px;
            width: 35px;
            height: 35px;
            background: #fff;
            padding: 2px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <div class="kta-box">
        <div class="watermark">LASMURA</div>

        <div class="card-header">
            <div class="logo-text">
                <h1>LASMURA</h1>
                <p>DPD DKI JAKARTA</p>
            </div>
        </div>

        <div class="card-body">
            <div class="photo-space">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['nama_lengkap']) ?>&size=150" alt="Foto">
            </div>

            <div class="data-space">
                <div class="field">
                    <div class="label">Nama Lengkap</div>
                    <div class="value"><?= esc($user['nama_lengkap']) ?></div>
                </div>
                <div class="field">
                    <div class="label">NIK</div>
                    <div class="value"><?= esc($user['nik']) ?></div>
                </div>
                <div class="field">
                    <div class="label">TTL</div>
                    <div class="value"><?= esc($user['tanggal_lahir'] ?? '-') ?></div>
                </div>
                <div class="field">
                    <div class="label">Jenis Kelamin</div>
                    <div class="value"><?= esc($user['jenis_kelamin'] ?? '-') ?></div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="id-number"><?= esc($user['nomor_anggota']) ?></div>
            <div class="qr-code">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= $user['nomor_anggota'] ?>" style="width:100%">
            </div>
        </div>
    </div>

</body>

</html>