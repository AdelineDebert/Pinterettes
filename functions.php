<?php
session_start();

$pseudo = $_SESSION['pseudo'];
try
{
    $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'plop');
} catch ( Exception $e ){
    die('Erreur : '.$e->getMessage() );
}

$table = [];

if(isset($_POST['pseudo'])&&(isset($_POST['password']))){
// Connexion à la BDD
$password = $_POST['password'];
$_SESSION['pseudo'] = $_POST['pseudo'];

$reponses = $connexion->query("SELECT * FROM users");
while ($donnees = $reponses->fetch()){
  // Vérification du couple pseudo-password
  if (($_SESSION['pseudo'] == $donnees['pseudo'])&&($password == $donnees['password'])){
    $_SESSION['id'] = $donnees['id'];
    array_push($table, header('Location: accueil.php'));
  }
};
$reponses->closeCursor();

if ($table === []){
  header('Location: index.php');
}else{
  echo $table[0];
}
}
/*----------------------------------------------- Formulaire d'inscription*/
if(isset($_POST['new_pseudo'])&&(isset($_POST['email']))&&(isset($_POST['new_password']))){
  $npseudo = $_POST['new_pseudo'];
  $email = $_POST['email'];
  $npassword = $_POST['new_password'];

  $requete = "INSERT INTO users VALUES (NULL, '$email', '$pseudo', '$npassword')";
  $connexion->query($requete);
  $_SESSION['pseudo']= $npseudo;
  header('Location: accueil.php');
}
?>
