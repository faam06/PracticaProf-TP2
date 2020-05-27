<?php
  session_start();
  require 'database.php';
 # $a = "SELECT nombre_usr from usuario WHERE nombre_usr = jorge";
 # $b = $conn ->prepare($a);
 # $b -> execute(); 
 # echo "hola";
 if (isset($_SESSION['id'])) {
  $records = $conn->prepare('SELECT * FROM usuario WHERE `id_usr` = :id_usr');
  $records->bindParam(':id_usr', $_SESSION['id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $user = null;
  if (count($results) > 0)  {
    $user = $results;
  }
  
}  
else {
  header('Location: index.php');
}

?>