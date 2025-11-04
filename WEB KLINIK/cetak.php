<?php
// Ambil data dari query string (GET)
$nama     = $_GET['nama']     ?? "RCHAN";
$telepon  = $_GET['telepon']  ?? "0896777444";
$alamat   = $_GET['alamat']   ?? "JL. SEKARAN NO 2 SEMARANG";
$keluhan  = $_GET['keluhan']  ?? "SAKIT PERUT MULES";
$tanggal  = $_GET['tanggal']  ?? "2025-09-15";
$sesi     = $_GET['sesi']     ?? "1 (15.30.00 – 16.30.00)";
$nomor    = $_GET['nomor']    ?? "020"; // Nomor antrian
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran Antrian Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 700px;
            margin: auto;
            border: 2px solid #000;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header h2 {
            margin: 0;
            color: #005b96;
            font-family: 'Trebuchet MS', sans-serif;
        }
        .header p {
            margin: 0;
            font-weight: bold;
        }
        .antrian {
            background: #f87171;
            color: white;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            padding: 10px;
            margin: 15px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th {
            background: #e5e7eb;
            width: 30%;
            text-align: left;
            padding: 8px;
        }
        td {
            padding: 8px;
        }
        .footer {
            font-size: 12px;
            margin-top: 10px;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <div class="header">
            <h2>dr. Alim</h2>
            <p>Bukti Pendaftaran Antrian Online</p>
        </div>
        <div class="antrian">Nomor Antrian: <?= htmlspecialchars($nomor) ?></div>
        <table>
            <tr><th>Nama</th><td><?= htmlspecialchars($nama) ?></td></tr>
            <tr><th>No. Telepon</th><td><?= htmlspecialchars($telepon) ?></td></tr>
            <tr><th>Alamat</th><td><?= htmlspecialchars($alamat) ?></td></tr>
            <tr><th>Keluhan</th><td><?= htmlspecialchars($keluhan) ?></td></tr>
            <tr><th>Tanggal Periksa</th><td><?= htmlspecialchars($tanggal) ?></td></tr>
            <tr><th>Sesi</th><td><?= htmlspecialchars($sesi) ?></td></tr>
        </table>
        <div class="footer">
            Terimakasih Sudah Mendaftar Di Klinik Kami. Admin kami akan menghubungi anda lewat Whatsapp.  
            Simpan ini sebagai bukti antrian anda. QR Code di kanan bawah dapat dipindai untuk verifikasi.
        </div>
    </div>
</body>
</html>
