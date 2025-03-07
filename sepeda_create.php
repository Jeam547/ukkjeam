<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $merk = $_POST['merk'];
    $tipe = $_POST['tipe'];
    $warna = $_POST['warna'];
    $harga_sewa = $_POST['harga_sewa'];
    $status = $_POST['status'];

    $sql = "INSERT INTO sepeda (merk, tipe, warna, harga_sewa, status) VALUES ('$merk', '$tipe', '$warna', '$harga_sewa', '$status')";
    
    if ($conn->query($sql)) {
        header("Location: sepeda_index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Sepeda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Sepeda</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Merk:</label>
            <input type="text" name="merk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tipe:</label>
            <input type="text" name="tipe" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Warna:</label>
            <input type="text" name="warna" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga Sewa:</label>
            <input type="number" step="0.01" name="harga_sewa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Status:</label>
            <select name="status" class="form-control">
                <option value="Tersedia">Tersedia</option>
                <option value="Disewa">Disewa</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="sepeda_index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
