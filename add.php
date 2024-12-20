
<?php
include 'index.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>
<body  class="bg-secondary" >
  <header>
  <nav class="navbar bg-body-tertiary bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">fut-champion</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
</header>
<section class="bg-secondary">
    <div class="container">
        <button  style ="background-color: rgb(69, 169, 221)"class="btn  my-5"><a href="age.php" class="text-light">add user</a> 

    </button>
    <table class=" rounded table table-success ">
  <thead  >
   
    <tr>
      <th  scope="col"> nom </th>
      <th   scope="col">logo</th>
      <th  scope="col">nationnalite</th>
      <th  scope="col">equipe</th>
      <th  scope="col">flag</th>
      <th   scope="col">position</th>
      <th  scope="col">pace</th>
      <th  scope="col">rating</th>
      <th   scope="col">shooting</th>
      <th  scope="col">passing</th>
      <th  scope="col">defendling</th>
      <th  scope="col">physical</th>
      <th  scope="col">driblling</th>
      <th  scope="col"></th>
    </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT
    player.id, 
    player.position_player AS position, 
    player.nom, 
    player.rating,
    nationnalite.nom AS nationnalite, 
    nationnalite.flag AS flag, 
    equipe.nom AS equipe, 
    equipe.logo, 
    statistic_player.pace, 
    statistic_player.shooting, 
    statistic_player.passing, 
    statistic_player.dribbling, 
    statistic_player.defending, 
    statistic_player.physical, 
    statistic_gk.diving, 
    statistic_gk.hadling, 
    statistic_gk.kicking, 
    statistic_gk.speed, 
    statistic_gk.reflexes, 
    statistic_gk.positioning
FROM player
INNER JOIN nationnalite ON nationnalite.id = player.id_nationnalitee
INNER JOIN equipe ON equipe.id = player.id_equipe
INNER JOIN statistic_player ON statistic_player.id = player.id_statistic_player
INNER JOIN statistic_gk ON statistic_gk.id = player.id_statistic_gk";

$result = mysqli_query($coon, $sql);

if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id= $row['id'];
        $name = $row['nom'];
        $logo =$row['logo'];
        $nationnalite =$row['nationnalite'];
        $equipe= $row['equipe'];
        $flag=$row['flag'];
        $position=$row['position'];
        $rating = $row ['rating'];
        $pace= $row['pace'];
        $shooting = $row ['shooting'];
        $passing =$row ['passing'];
        $defending = $row ['defending'];
        $physical = $row ['physical'];
        $dribbling = $row ['dribbling'];
        $diving = $row ['diving'];
        $hadling=$row['hadling'];
        $kicking = $row ['kicking'];
        $reflexes= $row ['reflexes'];
        $speed= $row ['speed'];
        $positioning= $row ['positioning'];
        
        echo '<tr>
        
      <td class="table-success">'.$name.'</td>
      <td class="table-success"><img style=" width:38px; height:38px" src="'.$logo.'" alt=""></td>
      <td class="table-success">'. $nationnalite.'</td>
      <td class="table-success">'.$equipe.'</td>
     <td class="table-success"><img src="'.$flag.'" alt=""></td>
      <td class="table-success">'.$position.'</td>
        <td class="table-success">'.$rating.'</td>';
      if( $position=="GK"){
        echo
        '
      <td class="table-success">'.$diving.'</td>
      <td class="table-success">'.$hadling.'</td>
      <td class="table-success">'. $kicking.'</td>
      <td class="table-success">'.$reflexes.'</td>
      <td class="table-success">'.$speed.'</td>
      <td class="table-success">'.$positioning.'</td>'
;
    }else{
      echo
      '
      <td class="table-success">'.$pace.'</td>
      <td shooting='.$shooting.'  class="table-success">'.$shooting.'</td>
      <td  passing='.$passing.' class="table-success">'. $passing.'</td>
      <td defending='.$defending.' class="table-success">'.$defending.'</td>
      <td physical='.$physical.'  class="table-success">'.$physical.'</td>
      <td dribbling='.$dribbling.' class="table-success">'.$dribbling.'</td>';
      }
    echo'
     <td class=" d-flex gap-3 " >
<button  type="button"  class="btn btn-success">modifier</button>
<button    class="btn btn-danger"><a href="delete.php?delete='.$id.'" >supprimer</a></button>
    </td>
    </tr>
   ';

   }
 }else{
  echo "not defind";
 }


?>
  </tbody>
</table>
    </div>
    </section>
</body>
</html>