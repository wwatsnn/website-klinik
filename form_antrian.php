<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Antrian Online</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .container {
            width: 100%;
            max-width: 600px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            padding-bottom: 20px;
        }
        
        .header {
            background: linear-gradient(to right, #2c3e50, #4ca1af);
            color: white;
            text-align: center;
            padding: 25px 20px;
            position: relative;
        }
        
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .title {
            font-weight: bold;
            font-size: 32px;
            margin-bottom: 5px;
            letter-spacing: 1px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }
        
        .form-container {
            padding: 25px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }
        
        input[type="date"],
        select,
        input[type="text"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        input[type="date"]:focus,
        select:focus,
        input[type="text"]:focus,
        input[type="tel"]:focus,
        textarea:focus {
            border-color: #4ca1af;
            outline: none;
            box-shadow: 0 0 0 3px rgba(76, 161, 175, 0.2);
        }
        
        textarea {
            height: 100px;
            resize: vertical;
        }
        
        .error {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 6px;
            display: none;
        }
        
        button {
            background: linear-gradient(to right, #2c3e50, #4ca1af);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(44, 62, 80, 0.3);
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(44, 62, 80, 0.4);
        }

        /* Output Box */
        #outputBox {
            display: none;
            margin: 20px;
        }
        #outputBox .card {
            background:#ecfdf5;
            border:2px solid #10b981;
            border-radius:12px;
            padding:25px;
            text-align:center;
            box-shadow:0 8px 20px rgba(0,0,0,0.15);
        }
        #outputBox h2 {
            color:#059669;
            margin-bottom:15px;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:8px;
        }
        #outputBox p {
            font-size:18px;
            margin:8px 0;
        }
        #outputBox button {
            margin-top:15px;
            padding:10px 18px;
            background:#2563eb;
            color:white;
            border:none;
            border-radius:8px;
            cursor:pointer;
            font-size:16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo-container">
                <img src="logo-inverse.png" alt="Logo Klinik">
            </div>
            <div class="title">Daftar Antrian Online</div>
        </div>
        
        <div class="form-container">
            <form id="antrianForm">
                <div class="form-group">
                    <label for="tanggal_periksa">Tanggal Periksa</label>
                    <input type="date" id="tanggal_periksa" name="tanggal_periksa" required>
                    <div id="errorTanggal" class="error">Hanya bisa memilih hari Senin, Rabu, atau Jumat</div>
                </div>
                
                <div class="form-group">
                    <label for="sesi">Pilih Sesi</label>
                    <select id="sesi" name="sesi" required disabled>
                        <option value="">-- Pilih Sesi --</option>
                        <option value="08:00-10:00" data-kuota="10">08:00-10:00 (Kuota tersisa: 10)</option>
                        <option value="10:00-12:00" data-kuota="10">10:00-12:00 (Kuota tersisa: 10)</option>
                        <option value="13:00-15:00" data-kuota="10">13:00-15:00 (Kuota tersisa: 10)</option>
                    </select>
                    <div id="errorSesi" class="error">Sesi harus dipilih</div>
                </div>
                
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required>
                    <div id="errorNama" class="error">Nama lengkap harus diisi</div>
                </div>
                
                <div class="form-group">
                    <label for="no_telepon">No. Telepon/WhatsApp</label>
                    <input type="tel" id="no_telepon" name="no_telepon" required>
                    <div id="errorTelepon" class="error">Nomor telepon/WhatsApp harus diisi</div>
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" required></textarea>
                    <div id="errorAlamat" class="error">Alamat harus diisi</div>
                </div>
                
                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea id="keluhan" name="keluhan"></textarea>
                </div>
                
                <button type="submit">Daftar Sekarang</button>
            </form>

            <!-- OUTPUT BOX -->
            <div id="outputBox">
                <div class="card">
                    <h2>✅ Pendaftaran Berhasil!</h2>
                    <p>Nomor Antrian Anda: <b id="outNomor"></b></p>
                    <p>Nama: <b id="outNama"></b></p>
                    <p>Tanggal Periksa: <b id="outTanggal"></b></p>
                    <button onclick="window.print()">⬇️ Download Bukti PDF</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('antrianForm');
            const tanggalInput = document.getElementById('tanggal_periksa');
            const sesiSelect = document.getElementById('sesi');

            // Set tanggal minimum ke hari ini
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            tanggalInput.min = `${yyyy}-${mm}-${dd}`;
            
            // Simpan kuota di localStorage
            let kuotaData = JSON.parse(localStorage.getItem('kuotaSesi')) || {};
            function simpanKuota() {
                localStorage.setItem('kuotaSesi', JSON.stringify(kuotaData));
            }
            function dapatkanKuotaUntukTanggal(tanggal) {
                if (!kuotaData[tanggal]) {
                    kuotaData[tanggal] = {
                        '08:00-10:00': 10,
                        '10:00-12:00': 10,
                        '13:00-15:00': 10
                    };
                    simpanKuota();
                }
                return kuotaData[tanggal];
            }
            function kurangiKuota(tanggal, sesi) {
                if (kuotaData[tanggal] && kuotaData[tanggal][sesi] > 0) {
                    kuotaData[tanggal][sesi]--;
                    simpanKuota();
                    return true;
                }
                return false;
            }
            function getHari(tanggal) {
                const hari = new Date(tanggal).getDay();
                const hariList = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                return hariList[hari];
            }

            // Event listener untuk tanggal
            tanggalInput.addEventListener('change', function() {
                const selectedDate = this.value;
                const hari = getHari(selectedDate);
                document.getElementById('errorTanggal').style.display = 'none';
                
                if (['Senin', 'Rabu', 'Jumat'].includes(hari)) {
                    sesiSelect.disabled = false;
                    const kuotaHariIni = dapatkanKuotaUntukTanggal(selectedDate);
                    document.querySelectorAll('#sesi option').forEach(option => {
                        if (option.value) {
                            const kuotaTersisa = kuotaHariIni[option.value] || 0;
                            option.textContent = `${option.value} (Kuota tersisa: ${kuotaTersisa})`;
                            option.disabled = kuotaTersisa <= 0;
                        }
                    });
                } else {
                    sesiSelect.disabled = true;
                    sesiSelect.value = '';
                    if (selectedDate) {
                        document.getElementById('errorTanggal').style.display = 'block';
                    }
                }
            });

            // Submit form
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                let isValid = true;

                const selectedDate = tanggalInput.value;
                const hari = getHari(selectedDate);
                if (!selectedDate || !['Senin', 'Rabu', 'Jumat'].includes(hari)) {
                    document.getElementById('errorTanggal').style.display = 'block';
                    isValid = false;
                }

                const selectedSesi = sesiSelect.value;
                if (!selectedSesi || sesiSelect.disabled) {
                    document.getElementById('errorSesi').style.display = 'block';
                    isValid = false;
                }

                const nama = document.getElementById('nama_lengkap').value;
                if (!nama) {
                    document.getElementById('errorNama').style.display = 'block';
                    isValid = false;
                }

                const telepon = document.getElementById('no_telepon').value;
                if (!telepon) {
                    document.getElementById('errorTelepon').style.display = 'block';
                    isValid = false;
                }

                const alamat = document.getElementById('alamat').value;
                if (!alamat) {
                    document.getElementById('errorAlamat').style.display = 'block';
                    isValid = false;
                }

                if (isValid) {
                    if (kurangiKuota(selectedDate, selectedSesi)) {
                        let riwayat = JSON.parse(localStorage.getItem('riwayatPendaftaran')) || [];
                        const nomorAntrian = String(riwayat.length + 1).padStart(3, '0');
                        const pendaftaran = {
                            nomor: nomorAntrian,
                            tanggal: selectedDate,
                            sesi: selectedSesi,
                            nama: nama,
                            telepon: telepon,
                            alamat: alamat,
                            keluhan: document.getElementById('keluhan').value,
                            waktu: new Date().toISOString()
                        };
                        riwayat.push(pendaftaran);
                        localStorage.setItem('riwayatPendaftaran', JSON.stringify(riwayat));

                        // Tampilkan output
                        document.getElementById("outNomor").textContent = nomorAntrian;
                        document.getElementById("outNama").textContent = nama;
                        document.getElementById("outTanggal").textContent = selectedDate;
                        form.style.display = "none";
                        document.getElementById("outputBox").style.display = "block";
                    }
                }
            });
        });
    </script>
</body>
</html>
