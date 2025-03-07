<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM sepeda WHERE id_sepeda=$id");
$sepeda = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $merk = $_POST['merk'];
    $tipe = $_POST['tipe'];
    $warna = $_POST['warna'];
    $harga_sewa = $_POST['harga_sewa'];
    $status = $_POST['status'];

    $sql = "UPDATE sepeda SET merk='$merk', tipe='$tipe', warna='$warna', harga_sewa='$harga_sewa', status='$status' WHERE id_sepeda=$id";
    
    if ($conn->query($sql)) {
        header("Location: sepeda_index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!-- Form edit sama seperti sepeda_create.php, hanya saja isian sudah terisi -->
