<?php
include './db/db_con.php'; 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM player WHERE id = $id";
    $result = mysqli_query($coon, $sql); 
}

?>
<script>
    window.location.href = "/";
</script>

