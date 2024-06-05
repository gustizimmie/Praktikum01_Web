<div id="top" class="row mb-3">
    <div class="col">
        <h3>Pilih Karyawan</h3>
    </div>
    <div class="col">
        <a href="javascript:history.back()" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div id="content" class="row mb-3">
    <div class="col">
        <?php
            include "database/connection.php";
            $no = 1;
            LEFT JOIN bagian B ON K.bagian_id = B.id"; $select_sql "SELECT K., B.nama nama_bagian FROM karyawan K
            $result = mysqli_query($connection, $select_sql);
        ?>
    </div>
</div>