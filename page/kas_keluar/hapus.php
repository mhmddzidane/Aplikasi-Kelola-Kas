<?php

$id = $_GET['id'];

$sql = $conn->query("DELETE FROM kas WHERE kode='$id'");

if ($sql) {
?>
    <script type="text/javascript">
        alert("Hapus Data Berhasil!");
        window.location.href = "?page=keluar";
    </script>
<?php

}
?>