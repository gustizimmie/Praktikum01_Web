<?php

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "";
}

switch ($page) {
    case "":
    case "dashboard":
        include "pages/dashboard.php";
        break;
    case "bagian":
        include "pages/bagian.php";
        break;
     case "bagiantambah":
            include "pages/bagiantambah.php";
            break;
    case "bagianhapus":
        include "pages/bagianhapus.php";
        break;
    case "bagianubah":
        include "pages/bagianubah.php";
        break;
    case "karyawan":
        include "pages/karyawan/karyawan.php";
        break;
    case "karyawantambah":
        include "pages/karyawan/karyawantambah.php";
        break;
    case "karyawanhapus":
        include "pages/karyawan/karyawanhapus.php";
        break;
    case "karyawanubah":
        include "pages/karyawan/karyawanubah.php";
        break;
    case "pilihbulantahunpenggajian":
        include "pages/penggajian/pilihbulantahunpenggajian.php";
        break;
    case "penggajian":
        include "pages/penggajian/penggajian.php";
        break;
    case "pilihkaryawanpenggajian";
        include "pages/penggajian/pilihkaryawanpenggajian.php";
    default:
        include "pages/404.php";
}