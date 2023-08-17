<?php 
require 'funct.php';

if (isset($_POST["submit"])) {

    // cek berhasil input data
    if (addData($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    }else {
        echo "
        <script>
            alert('Data gagal ditambahkan');
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Data</title>
</head>
<body>
<ul class="navbar">
    <li><a href="../index.php">Home</a></li>
    <li><a href="add.php">Tambah</a></li>
    <li><a href="contact.asp">Contact</a></li>
    <li><a href="about.asp">About</a></li>
</ul> 
    <h1>Tambah Pasal</h1>
    <div>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="bab">BAB* :</label>
                    <input type="text" name="bab" id="bab" required>
                </li>
                <li>
                    <label for="judul_bab">Judul BAB :</label>
                    <input type="text" name="judul_bab" id="judul_bab">
                </li>
                <li>
                    <label for="pasal">Pasal* :</label>
                    <input type="text" name="pasal" id="pasal" required>
                </li>
                <li>
                    <label for="nomor">Nomor* :</label>
                    <input type="number" name="nomor" id="nomor" required>
                </li>
                <li>
                    <label for="isi">Isi* :</label>
                    <textarea name="isi" id="isi" cols="30" rows="10" required></textarea>
                </li>
                <li>
                    <label for="pembahasan">Pembahasan :</label>
                    <textarea name="pembahasan" id="pembahasan" cols="30" rows="7"></textarea>
                </li>
                <li>
                    <label for="amandemen">Amandemen :</label>
                    <select name="amandemen" id="amandemen">
                        <option value="original">Original</option>
                        <option value="i">I</option>
                        <option value="ii">II</option>
                        <option value="iii">III</option>
                        <option value="iv">IV</option>
                    </select>
                </li>
                <li>
                    <button type="submit" name="submit">Tambah</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>