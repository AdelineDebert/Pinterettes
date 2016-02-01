<?php
session_start();


try
{
  $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'plop');
} catch ( Exception $e ){
  die('Erreur : '.$e->getMessage() );
}
$idmescouilles = $_SESSION['id'];
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Pinterettes</title>
  <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body>
  <header id='header_profil'>


  <h1> <?php echo $_SESSION['pseudo'];?></h1>

  <form action="upload.php" method="post" enctype='multipart/form-data' id='upload_form'>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
    <label>Téléchargez votre image (max. 2 Mo) :</label>
    <input type="file" name="image" > <!-- la propriété name sera le paramètre de $_FILES dans le PHP-->
    <label>Donnez lui un titre :</label>
    <input type="textarea" name="titre" placeholder="titre">
    <input type="submit" name="upload_submit" value="Envoyer">
  </form>
  </header>

  <div class='container_img'>

<?php

    $img_req = "SELECT img_url, img_name FROM images WHERE user_id ='$idmescouilles'";
    $donnees = $connexion->query($img_req);
    while($img_perso = $donnees->fetch()){
      ?>
      <div class='bloc_image'>
        <img src="<?php echo $img_perso['img_url']?>" class='image_style'/>
        <p><?php echo $img_perso['img_name']?></p>
      </div>

      <?php
    }
    ?>
  </div>

</body>
</html>
