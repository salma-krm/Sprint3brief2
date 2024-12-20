<?php
include 'index.php'; 

if (isset($_POST['submit'])) {
  $name = $_POST['nom'];
  $logo = $_POST['logo'];
  $nationnalite = $_POST['nationnalite'];
  $equipe = $_POST['equipe'];
  $flag = $_POST['flag'];
  $position = $_POST['position'];
  $rating = $_POST['rating'];
  $pace = $_POST['pace'];
  $shooting = $_POST['shooting'];
  $passing = $_POST['passing'];
  $dribbling = $_POST['driblling'];
  $physical =$_POST['physical'];
  $defending = $_POST['defendling'];

 
  $stmt = $coon->prepare("INSERT INTO `statistic_player` (pace, shooting, passing, dribbling, defending, physical) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("iiiiii", $pace, $shooting, $passing, $dribbling, $defending, $physical);
  if ($stmt->execute()) {
      $id_statistic_player = $coon->insert_id; 
      echo "Statistic player data inserted successfully! ID: " . $id_statistic_player . "<br>";
  } else {
      echo "Error: " . $stmt->error . "<br>";
     
  }
  $stmt->close();

 
  $stmt = $coon->prepare("INSERT INTO `nationnalite` (nom, flag) VALUES (?, ?)");
  $stmt->bind_param("ss", $nationnalite, $flag);
  if ($stmt->execute()) {
      $id_nationnalite = $coon->insert_id;  
      echo "Nationnalite data inserted successfully! ID: " . $id_nationnalite . "<br>";
  } else {
      echo "Error: " . $stmt->error . "<br>";
      
  }
  $stmt->close();

 
  $stmt = $coon->prepare("INSERT INTO `equipe` (nom, logo) VALUES (?, ?)");
  $stmt->bind_param("ss", $equipe, $logo);
  if ($stmt->execute()) {
      $id_equipe = $coon->insert_id;  
      echo "Equipe data inserted successfully! ID: " . $id_equipe . "<br>";
  } else {
      echo "Error: " . $stmt->error . "<br>";
      
  }
  $stmt->close();


  $stmt = $coon->prepare("INSERT INTO `player` (nom, position_player, id_nationnalitee, id_statistic_player, id_equipe, rating) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssiiii", $name, $position, $id_nationnalite, $id_statistic_player, $id_equipe, $rating);

  if ($stmt->execute()) {
      echo "Player data inserted successfully!";
  } else {
      echo "Error: " . $stmt->error;
  }

  $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css?v=1.2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>
<body>
    <div class = " form-contain container my-5">
    <form method ="post">
  <div class="mb-3">
    <label >Nom</label>
    <input type="text" class="form-control" placeholder ="Entre name  " name ="nom" autocomplete ="off">
  </div>

  <div class="mb-3">
    <label >logo</label>
    <input type="text" class="form-control" placeholder ="Entre logo " name ="logo"  autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >nationnalite</label>
    <input type="text" class="form-control" placeholder ="Entre nationnalite " name ="nationnalite"  autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >flag</label>
    <input type="text" class="form-control" placeholder ="Entre flag " name ="flag" autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >equipe</label>
    <input type="numbre" class="form-control" placeholder ="Entre equipe " name ="equipe" autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >rating</label>
    <input type="numbre" class="form-control" placeholder ="Entrerating " name ="rating" autocomplete ="off">
  </div>
  <select name="position" class="form-control "  autocomplete ="off"  id="position">
                    <option value="ST">ST</option>
                    <option value="RW">RW</option>
                    <option value="LW">LW</option>
                    <option value="CM">CM</option>
                    <option value="RB">RB</option>
                    <option value="LB">LB</option>
                    <option value="CB">CB</option>
                    <option value="GK">GK</option>
                </select>
  <div id="ST-player">
  <div class="mb-3">
    <label >pace</label>
    <input type="numbre" class="form-control" placeholder ="Entre pace " name ="pace" autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >shooting</label>
    <input type="text" class="form-control" placeholder ="Entre shooting " name ="shooting" autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >passing</label>
    <input type="text" class="form-control" placeholder ="Entre passing  " name ="passing" autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >driblling</label>
    <input type="text" class="form-control" placeholder ="Entre driblling  " name ="driblling" autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >defendling</label>
    <input type="text" class="form-control" placeholder ="Entre defendling  " name ="defendling" autocomplete ="off">
  </div>

  <div class="mb-3">
    <label >physical</label>
    <input type="text" class="form-control" placeholder ="Entre physical  " name ="physical" autocomplete ="off">
  </div>

</div>
<div style="display:none;" id="GK-player">
<div class="mb-3">
    <label >pdiving</label>
    <input type="numbre" class="form-control" placeholder ="Entre diving " name ="diving" autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >handling</label>
    <input type="text" class="form-control" placeholder ="Entre hadling" name ="hadling" autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >kicking</label>
    <input type="text" class="form-control" placeholder ="Entre kicking " name ="kicking" autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >reflexes</label>
    <input type="text" class="form-control" placeholder ="Entre reflexes   " name ="reflexes" autocomplete ="off">
  </div>
  <div class="mb-3">
    <label >speed</label>
    <input type="text" class="form-control" placeholder ="Entre speed " name ="speed" autocomplete ="off">
  </div>

  <div class="mb-3">
    <label >positioning</label>
    <input type="text" class="form-control" placeholder ="Entre positioning " name ="positioning" autocomplete ="off">
  </div>
</div>

 
  <button type="submit" class="btn bg-success" name ="submit">Submit</button>
</form> 
 </div>
 <script>
const pos = document.getElementById("position");
const GKPlayer = document.getElementById("GK-player");
const STPlayer = document.getElementById("ST-player");
console.log(STPlayer);

pos.addEventListener('change', (event) => {
    if (event.target.value === 'GK') {
        STPlayer.style.display = 'none';
        GKPlayer.style.display = 'block';

    }
});
 </script>
  <script src="player.js"></script>
</body>