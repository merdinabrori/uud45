<?php 
$pasal = urldecode(array_slice(explode("/", $_SERVER["REQUEST_URI"]), -1, 1)[0]);

require 'funct.php';
// ambil data
$result_isi = getData("SELECT * FROM uud WHERE pasal = '$pasal'");
// var_dump($result_isi);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title><?= ucwords($result_isi[0]['pasal']); ?></title>
</head>
<body>
<ul class="navbar">
    <li><a href="../index.php">Home</a></li>
    <li><a href="add.php">Tambah</a></li>
    <li><a href="contact.asp">Contact</a></li>
    <li><a href="about.asp">About</a></li>
</ul> 
    <div>
    <?php foreach($result_isi as $ayat) : ?>
        <?php 
        $bab = explode("|", $ayat["bab"]);
        $pasal = $ayat["pasal"];
        $pembahasan = explode("|", $ayat["pembahasan"]);
        $amandemen = str_replace("|", ", ", strtoupper($ayat["amandemen"]));
        ?>
        <div style="text-align: center;">
            <?php if($ayat['nomor'] == 1) : ?>
                <!-- BAB -->
                <?php if(count($bab)>1) : ?>
                    <h1>BAB <?= strtoupper($bab[0]) ?></h1>
                    <h2><?= ucwords($bab[1]) ?></h2>
                <?php else : ?>
                    <h1><?= strtoupper($bab[0]) ?></h1>
                <?php endif; ?>
                <!-- pasal -->
                <h2><?= ucwords($pasal) ?></h2>
            <?php endif; ?>
            <!-- nomor -->
            <hr>
            <h2><?= "Ayat " . $ayat['nomor'] ?></h2>
            <!-- isi -->
            <h3><?= $ayat["isi"] ?></h3><br>
        </div>
        <!-- pembahasan -->
        <table>
        <?php foreach ($pembahasan as $row) : ?>
            <tr>
                <td class="pembahasan"><p><?= ucfirst($row) ?></p></td>
            </tr>
        <?php endforeach; ?>
        </table>
        <?php if (str_contains($amandemen, "ORIGINAL") == false) : ?>
        <p>Amandemen : <?= $amandemen ?></p>
        <?php endif; ?>
        <a href="<?= '../edit.php/' . $ayat['id'] ?>">Ubah</a>
        <a href="<?= '../delete.php/' . $ayat['id'] ?>" onclick="return confirm('Anda yakin menghapus <?= $pasal ?>');">Hapus</a>
    <?php endforeach; ?>
    </div>
</body>
</html>