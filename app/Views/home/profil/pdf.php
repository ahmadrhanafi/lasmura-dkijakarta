<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak KTA <?= esc($user['nama_lengkap']) ?> | LASMURA DKI JAKARTA</title>
    <link rel="icon" type="image/svg+xml" href="<?= base_url('assets/favicon/lasmura.jpg') ?>">

    <style>
        html,

        body {
            margin: 0;
            padding: 0;
            width: 8.5cm;
            height: 5.5cm;
            font-family: 'Poppins', sans-serif;
        }

        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            src: url("<?= FCPATH ?>assets/fonts/poppins/Poppins-Regular.ttf") format("truetype");
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
            border: none;
        }

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

        .card-body {
            padding: 10px 15px;
            position: relative;
        }

        .page-break {
            page-break-after: always;
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

    <!-- ===================== DEPAN ===================== -->
    <div class="kta-box page-break">

        <img src="<?= $frontImage ?>"
            style="position:absolute; top:0; left:0; width:8.5cm; height:5.5cm;">

    </div>


    <!-- ===================== BELAKANG ===================== -->
    <div class="kta-box">

        <img src="<?= $backImage ?>"
            style="position:absolute; top:0; left:0; width:8.5cm; height:5.5cm;">

        <div style="position:absolute; left:3.4cm; top:2.1cm; font-size:12px; color: #fff; font-weight:bold; text-transform:uppercase;">
            <?= esc($user['nama_lengkap']) ?>
        </div>

        <div style="position:absolute; left:3.4cm; top:2.5cm; color: #fff; font-size:10px;">
            <?= esc($jabatan['nama_jabatan'] ?? 'Anggota') ?>
        </div>

    </div>


</body>

</html>