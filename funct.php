<?php 
$hostname = "Localhost";
// connect DB
$koneksi = mysqli_connect($hostname, "root", "", "uud45");

function getData($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function addData($data){
    global $koneksi;
    $bab = strtolower(htmlspecialchars($data["bab"] . "|" . $data["judul_bab"]));
    $pasal = strtolower(htmlspecialchars($data["pasal"]));
    $nomor = htmlspecialchars($data["nomor"]);
    $isi = htmlspecialchars($data["isi"]);
    $pembahasan = htmlspecialchars($data["pembahasan"]);
    $amandemen = str_replace(",", "|", strtolower(htmlspecialchars($data["amandemen"])));

    // query insert data
    $query = "INSERT INTO uud VALUES ('', '$bab', '$pasal', '$nomor', '$isi', '$pembahasan', '$amandemen')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);

}

function editData($data){
    global $koneksi;
    $id = $data['id'];
    $bab = strtolower(htmlspecialchars($data["bab"] . "|" . $data["judul_bab"]));
    $pasal = strtolower(htmlspecialchars($data["pasal"]));
    $nomor = htmlspecialchars($data["nomor"]);
    $isi = htmlspecialchars($data["isi"]);
    $pembahasan = htmlspecialchars($data["pembahasan"]);
    $amandemen = strtolower(htmlspecialchars($data["amandemen"]));

    // query insert data
    $query = "UPDATE uud SET
                bab = '$bab',
                pasal = '$pasal',
                nomor = '$nomor',
                isi = '$isi',
                pembahasan = '$pembahasan',
                amandemen = '$amandemen'
            WHERE id = $id";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);

}


function deleteData($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM uud WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}
?>