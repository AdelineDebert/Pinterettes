<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" media="screen" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <title>Pinterette</title>
  </head>
  <body>
    <h1> Hello
      <a href="profil.php"><?php echo $_SESSION['pseudo'];?></a>
    </h1>

    <form action="" method="">
      <input type="text" name="search" value="Rechercher"/>
    </form>
    <div class='container_img'>
      <?php
      try
      {
          $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'plop');
      } catch ( Exception $e ){
          die('Erreur : '.$e->getMessage() );
      }
      $images = $connexion->query("SELECT * FROM users INNER JOIN images
ON images.user_id = users.id");
      while ($recup_img = $images->fetch()){
      ?>
        <div class='bloc_image' onclick="pinmoi()"><img src="<?php echo $recup_img['img_url']?>" class='image_style' onmouseover="pinmoi()" onmouseout="retournormal()"/>
        <p><?php echo $recup_img['img_name']?></p>
        <p>Posté par : <?php echo $recup_img['pseudo']?></p></div>


      <?php
        };
       ?>
       </div>

<script>

</script>

  </body>
</html>
