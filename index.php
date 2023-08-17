<?php 
require 'funct.php';
// ambil data
$result_alinea = getData("SELECT id, pasal FROM uud WHERE bab = 'pembukaan'");
$result_pasal = getData("SELECT id, pasal, nomor FROM uud WHERE bab != 'pembukaan'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>UUD 1945</title>
</head>
<body>
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="add.php">Tambah</a></li>
            <li><a href="contact.asp">Contact</a></li>
            <li><a href="about.asp">About</a></li>
        </ul> 
    <div class="content">
        <h4>Pembukaan (Preambule)</h4>
        <ol>
            <?php foreach ($result_alinea as $a) :?>
                <li><a href="<?= 'isi.php/' . $a['pasal'] ?>"><?= $a['pasal'] ?></a></li>
            <?php endforeach; ?>
        </ol>
        
        <h4>Batang Tubuh</h4>
        <ul class="pasal">
            <?php foreach ($result_pasal as $b) :?>
                <?php if($b['nomor']==1) : ?>
                <li><a href="<?= 'isi.php/' . $b['pasal'] ?>"><?= $b['pasal']; ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>