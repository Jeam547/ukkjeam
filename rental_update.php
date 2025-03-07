<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM rental WHERE id_rental = $id");
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $sql = "UPDATE rental SET status='$status', tanggal_kembali='$tanggal_kembali' WHERE id_rental=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: rental_index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
</head>
<body>
    <h2>Edit Transaksi Rental</h2>
    <form method="POST">
        <label>Status:</label>
        <select name="status">
            <option value="Disewa" <?= $data['status'] == 'Disewa' ? 'selected' : '' ?>>Disewa</option>
            <option value="Dikembalikan" <?= $data['status'] == 'Dikembalikan' ? 'selected' : '' ?>>Dikembalikan</option>
        </select>
        <br>

        <label>Tanggal Kembali:</label>
        <input type="datetime-local" name="tanggal_kembali" value="<?= $data['tanggal_kembali'] ?>"><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
