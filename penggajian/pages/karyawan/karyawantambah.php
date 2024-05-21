<div id="top" class="row mb-3">
    <div class="col">
        <h3>Tambah Data Karyawan</h3>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <a href="?page=karyawan" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i> Kembali
        </a>
    </div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col">
        <?php
        include "database/connection.php";

        if (isset($_POST["simpan_button"])) {
            $nik = $_POST["nik"];
            $nama = $_POST['nama'];
            $tanggal_mulai = $_POST['tanggal_mulai'];
            $gajih_pokok = $_POST['gajih_pokok'];
            $status_karyawan = $_POST['status_karyawan'];
            $bagian_id = $_POST['bagian_id'];

            $sudahAda = false;
            $checkSQL = "SELECT * FROM karyawan WHERE nik='$nik'";
            $resultcheck = mysqli_query($connection, $checkSQL);
            if (mysqli_num_rows($resultcheck) > 0) {
                $sudahAda = true;
            }

            if ($sudahAda) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fab fa-exclamation-circle"></i>
                    Nomor Induk Karyawan (NIK) sama sudah ada
                </div>
                <?php
            } else {
                $insertSQL = "INSERT INTO karyawan SET 
                nik='$nik', 
                nama='$nama', 
                tanggal_mulai='$tanggal_mulai', 
                gajih_pokok=$gajih_pokok, 
                status_karyawan='$status_karyawan', 
                bagian_id=$bagian_id";
                $result = mysqli_query($connection, $insertSQL);
                if (!$result) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fab fa-exclamation"></i>
                        <?php echo mysqli_error($connection) ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fab fa-check-circle"></i>
                        Data berhasil disimpan
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>
</div>
<div id="inputan" class="row mb-3">
    <div class="col">
        <div class="card px-3">
            <form action="" method="POST">
                <div class="mb-3 mt-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="misal : 0001" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="misal : Fulan" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="tanggal_mulai" class="form-label">tanggal_mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="gajih_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" class="form-control" id="gajih_pokok" name="gajih_pokok" required>
                </div>
                <label class="form-label">Status Karyawan</label>
                <div class="mb-3 mt-3">
                    <input class="form-check-input" type="radio" name="status_karyawan" id="TETAP" value="TETAP" required>
                    <label class="form-check-label" for="TETAP">
                        Tetap
                    </label>
                </div>
                <div class="mb-3 mt-3">
                    <input class="form-check-input" type="radio" name="status_karyawan" id="KONTRAK" value="KONTRAK" required>
                    <label class="form-check-label" for="KONTRAK">
                        Kontrak
                    </label>
                </div>
                <div class="mb-3 mt-3">
                    <input class="form-check-input" type="radio" name="status_karyawan" id="MAGANG" value="MAGANG" required>
                    <label class="form-check-label" for="MAGANG">
                        Magang
                    </label>
                </div>
                <div class="mb-3 mt-3">
                    <label for="bagian_id" class="form-label">Bagian</label>
                     <?php
                        $selectSQL = "SELECT * FROM bagian";
                        $result = mysqli_query($connection, $selectSQL);
                        if (!$result) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo mysqli_error($connection) ?>
                    </div>
                    <?php
                        return;
                    }
                        if (mysqli_num_rows($result) == 0) {
                    ?>
                    <div class="alert alert-light" role="alert">
                        data kosong
                    </div>
                    <?php
                        return;
                    }
                    ?>
                   <select class="form-select" aria-label="Default select example" name="bagian_id">
                        <option value="" selected> -- Pilih Bagian --</option>
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?php echo $row["id"] ?>"><?php echo $row["nama"]?></option>
                            <?php
                            }
                            ?>
                    </select> 
                </div>
                <div class="col mb-3">
                    <button class="btn btn-success" type="submit" name="simpan_button">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>