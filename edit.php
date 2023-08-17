<?php 
$id = array_slice(explode("/", $_SERVER["REQUEST_URI"]), -1, 1)[0];
$_POST["id"] = $id;

require 'funct.php';

// ambil data
$data_edit = getData("SELECT * FROM uud WHERE id = $id")[0];
$bab = explode("|", $data_edit["bab"]);

if (isset($_POST["submit"])) {

    // cek berhasil ubah data
    if (editData($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = '../isi.php/" . $data_edit['pasal'] . "';
        </script>
        ";
    }else {
        echo "
        <script>
            alert('Data gagal diubah');
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
    <link rel="stylesheet" href="../style.css">
    <title>Ubah Data</title>
</head>
<body>
<ul class="navbar">
    <li><a href="../index.php">Home</a></li>
    <li><a href="add.php">Tambah</a></li>
    <li><a href="contact.asp">Contact</a></li>
    <li><a href="about.asp">About</a></li>
</ul> 
    <h1>Ubah Pasal</h1>
    <div>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="bab">BAB* :</label>
                    <input type="text" name="bab" id="bab" required value="<?= $bab[0] ?>">
                </li>
                <li>
                    <label for="judul_bab">Judul BAB :</label>
                    <input type="text" name="judul_bab" id="judul_bab" value="<?= (isset($bab[1])) ? $bab[1] : '' ?>">
                </li>
                <li>
                    <label for="pasal">Pasal* :</label>
                    <input type="text" name="pasal" id="pasal" value="<?= $data_edit['pasal'] ?>" required>
                </li>
                <li>
                    <label for="nomor">Nomor* :</label>
                    <input type="number" name="nomor" id="nomor" value="<?= $data_edit['nomor'] ?>" required>
                </li>
                <li>
                    <label for="isi">Isi* :</label>
                    <textarea name="isi" id="isi" cols="30" rows="10" required><?= $data_edit['isi'] ?></textarea>
                </li>
                <li>
                    <label for="pembahasan">Pembahasan :</label>
                    <textarea name="pembahasan" id="pembahasan" cols="30" rows="7"><?= (isset($data_edit['pembahasan'])) ? $data_edit['pembahasan'] : '' ?></textarea>
                </li>
                <li>
                    <p>input amandemen menggunakan huruf romawi dan gunakan tanda koma (,) jika lebih dari satu</p>
                    <label for="amandemen">Amandemen :</label>
                    <input type="text" name="amandemen" id="amandemen" value="<?= $data_edit['amandemen'] ?>" required>
                </li>
                <li>
                    <button type="submit" name="submit">Ubah</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>