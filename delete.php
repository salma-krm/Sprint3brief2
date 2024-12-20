 <?php
// ob_start();
 include 'index.php'; 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql= "DELETE FROM player WHERE id =$id";

    $result = mysqli_query($coon, $sql);

    if ($result) {
        echo "suprimer";  
    } else {
        echo "notttt";  
    }
}
// header("location: add.php");
// ob_end_flush();

?>