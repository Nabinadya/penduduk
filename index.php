<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Kependudukan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .form-box {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
        }

        input,
        select,
        textarea {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        h2 {
            margin-top: 0;
        }

        button {
            padding: 10px 20px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
<script>
function cekHubungan() {
    const select = document.getElementById('hubunganKK');
    const input = document.getElementById('hubunganLainnyaInput');

    if (select.value === "Lainnya") {
        input.style.display = "block";
        input.setAttribute("required", "required");
    } else {
        input.style.display = "none";
        input.removeAttribute("required");
    }
}
</script>

    <!-- FORM INPUT KK -->
    <div class="form-box">
        <h2>Input KK</h2>
        <form method="post" action="index.php">
            <label>No KK</label>
            <input type="text" name="nokk" maxlength="16" required>

            <label>Kepala Keluarga</label>
            <input type="text" name="kepala_keluarga" required>

            <label>Alamat</label>
            <textarea name="alamat" required></textarea>

            <label>RT</label>
            <input type="text" name="rt" maxlength="3" required>

            <label>RW</label>
            <input type="text" name="rw" maxlength="3" required>

            <label>Desa/Kelurahan</label>
            <input type="text" name="desa" required>

            <label>Kecamatan</label>
            <input type="text" name="kecamatan" required>

            <label>Kabupaten</label>
            <input type="text" name="kabupaten" required>

            <label>Provinsi</label>
            <input type="text" name="provinsi" required>

            <label>Kode Pos</label>
            <input type="text" name="kodepos" required>

            <button type="submit" name="simpan_kk">Simpan KK</button>
        </form>
    </div>

    <!-- FORM INPUT KTP -->
    <div class="form-box">
        <h2>Input KTP (Anggota KK)</h2>
        <form method="post" action="index.php">
            <label>NIK</label>
            <input type="text" name="nik" maxlength="16" required>

            <label>No KK</label>
            <input type="text" name="nokk_ktp" maxlength="16" required>

            <label>Nama</label>
            <input type="text" name="nama" required>

            <label>Hubungan dengan KK</label>
            <select name="hubungan" id="hubunganKK" onchange="cekHubungan()" required>
                <option value="">-- Pilih Hubungan --</option>
                <option value="Kepala Keluarga">Kepala Keluarga</option>
                <option value="Suami">Suami</option>
                <option value="Istri">Istri</option>
                <option value="Anak">Anak</option>
                <option value="Orang Tua">Orang Tua</option>
                <option value="Mertua">Mertua</option>
                <option value="Cucu">Cucu</option>
                <option value="Saudara Kandung">Saudara Kandung</option>
                <option value="Pembantu">Pembantu</option>
                <option value="Lainnya">Lainnya</option>
            </select>

<input type="text" name="hubungan_lainnya" id="hubunganLainnyaInput" placeholder="Isi Hubungan Lainnya" style="display:none; margin-top: 8px;" />


            <label>Jenis Kelamin</label>
            <select name="jk" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>

            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" required>

            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" required>

            <label>Golongan Darah</label>
            <select name="goldar">
                <option value="">-- Pilih Golongan Darah --</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
            </select>

            <label>Agama</label>
            <input type="text" name="agama" required>

            <label>Status Perkawinan</label>
            <select name="status">
                <option value="">-- Pilih Status Perkawinan --</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Menikah">Menikah</option>
                <option value="Cerai">Cerai</option>
            </select>

            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" required>

            <label>Kewarganegaraan</label>
            <select name="kewarganegaraan">
                <option value="">-- Pilih Kewarganegaraan --</option>
                <option value="WNI">WNI</option>
                <option value="WNA">WNA</option>
            </select>

            <label>Status Hidup</label>
            <select name="hidup">
                <option value="">-- Pilih Status Hidup --</option>
                <option value="Hidup">Hidup</option>
                <option value="Meninggal">Meninggal</option>
            </select>

            <button type="submit" name="simpan_ktp">Simpan KTP</button>
        </form>
    </div>

</body>

</html>

<?php
// Simpan data KK
if (isset($_POST['simpan_kk'])) {
    $sql = "INSERT INTO KartuKeluarga VALUES (
        '{$_POST['nokk']}',
        '{$_POST['kepala_keluarga']}',
        '{$_POST['alamat']}',
        '{$_POST['rt']}',
        '{$_POST['rw']}',
        '{$_POST['desa']}',
        '{$_POST['kecamatan']}',
        '{$_POST['kabupaten']}',
        '{$_POST['provinsi']}',
        '{$_POST['kodepos']}'
    )";

    mysqli_query($conn, $sql);
    echo "<script>alert('Data KK berhasil disimpan');</script>";
}

// Simpan data KTP
if (isset($_POST['simpan_ktp'])) {
    $hubungan = (isset($_POST['hubungan_lainnya']) && $_POST['hubungan'] === 'Lainnya')
        ? $_POST['hubungan_lainnya']
        : $_POST['hubungan'];

    $sql = "INSERT INTO Penduduk VALUES (
        '{$_POST['nik']}',
        '{$_POST['nokk_ktp']}',
        '{$_POST['nama']}',
        '$hubungan',
        '{$_POST['jk']}',
        '{$_POST['tempat_lahir']}',
        '{$_POST['tanggal_lahir']}',
        '{$_POST['goldar']}',
        '{$_POST['agama']}',
        '{$_POST['status']}',
        '{$_POST['pekerjaan']}',
        '{$_POST['kewarganegaraan']}',
        '{$_POST['hidup']}'
    )";

    mysqli_query($conn, $sql);
    echo "<script>alert('Data KTP berhasil disimpan');</script>";
}

?>
<!-- LIST DATA KTP -->
<div class="form-box">
    <h2>List Data KTP</h2>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>No KK</th>
            <th>Hubungan</th>
            <th>Jenis Kelamin</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Agama</th>
            <th>Status</th>
            <th>Pekerjaan</th>
            <th>Kewarganegaraan</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM Penduduk ORDER BY Nama ASC");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['NIK']}</td>";
            echo "<td>{$row['Nama']}</td>";
            echo "<td>{$row['NoKK']}</td>";
            echo "<td>{$row['HubunganKK']}</td>";
            echo "<td>{$row['JenisKelamin']}</td>";
            echo "<td>{$row['TempatLahir']}, {$row['TanggalLahir']}</td>";
            echo "<td>{$row['Agama']}</td>";
            echo "<td>{$row['StatusPerkawinan']}</td>";
            echo "<td>{$row['Pekerjaan']}</td>";
            echo "<td>{$row['Kewarganegaraan']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>