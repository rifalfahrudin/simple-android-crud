<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$server = "mysql.idhostinger.com";
$username = "u870324227_crud";
$password = "novrizal";
$database = "u870324227_andro";

mysql_connect($server, $username, $password) or die("<h1>Koneksi Mysql Error : </h1>" . mysql_error());
mysql_select_db($database) or die("<h1>Koneksi Kedatabase Error : </h1>" . mysql_error());

@$konek = $_GET['konek'];

switch ($konek) {
    case "view":


        $query_tampil_biodata = mysql_query("SELECT * FROM biodata") or die(mysql_error());
        $data_array = array();
        while ($data = mysql_fetch_assoc($query_tampil_biodata)) {
            $data_array[] = $data;
        }
        echo json_encode($data_array);
        break;
        /* ini buat tambah data*/
        case "insert":
        @$nama = $_GET['nama'];
        @$alamat = $_GET['alamat'];
        $query_insert_data = mysql_query("INSERT INTO biodata (nama, alamat) VALUES('$nama', '$alamat')");
        if ($query_insert_data) {
            echo "Data Berhasil Disimpan";
        } else {
            echo "Error insert Biodata " . mysql_error();
        }
        break;
    case "get_biodata_by_id":
        /* ini Edit data dan mengirim data berdasarkan id */
        @$id = $_GET['id'];
        $query_tampil_biodata = mysql_query("SELECT * FROM biodata WHERE id='$id'") or die(mysql_error());
        $data_array = array();
        $data_array = mysql_fetch_assoc($query_tampil_biodata);
        echo "[" . json_encode($data_array) . "]";
            break;
    case "update":
        /* ubah data */
        @$nama = $_GET['nama'];
        @$alamat = $_GET['alamat'];
        @$id = $_GET['id'];
        $query_update_biodata = mysql_query("UPDATE biodata SET nama='$nama', alamat='$alamat' WHERE id='$id'");
        if ($query_update_biodata) {
            echo "Update Data Berhasil";
        } else {
            echo mysql_error();
        }
        break;
    case "delete":
        /* hapus data */
        @$id = $_GET['id'];
        $query_delete_biodata = mysql_query("DELETE FROM biodata WHERE id='$id'");
        if ($query_delete_biodata) {
            echo "Delete Data Berhasil";
        } else {
            echo mysql_error();
        }

        break;

    default:
        break;
}
?>
