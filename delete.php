<?php 
$id = array_slice(explode("/", $_SERVER["REQUEST_URI"]), -1, 1)[0];

require 'funct.php';

if (deleteData($id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = '../index.php';
        </script>
    }";
} else {
    echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = '../index.php';
        </script>
    }";
}
?>