<?php
session_start();
header('Location: profil.php');


$dossier = 'images/'; //dossier dans lequel les images seront enregistrées sur le serveur
$fichier = basename($_FILES['image']['name']); //nom du fichier
$taille_maxi = 2097152; // TAille max du fichier en octets
$taille = filesize($_FILES['image']['tmp_name']); //taille du fichier
$extensions = array('.png', '.gif', '.jpg', '.jpeg'); // tableau prédéfinis des extensions acceptées
$extension = strrchr($_FILES['image']['name'], '.'); // récup des extensions des fichiers envoyés

if(!in_array($extension, $extensions)){
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
} // si l'extension n'est pas dans le tableau alors
if($taille>$taille_maxi){
     $erreur = 'Le fichier est trop gros...';
} // si la taille du fichier est plus grande que la taille max acceptée
if(!isset($erreur)){
     $fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $fichier); // Normalisation du nom du fichier, on enlève les accents et les caractères spéciaux
     if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)){ //on enregistre dans le dossier définit

       $idmoncul = $_SESSION['id'];
       $titremoncul = $_POST['titre'];

       try
       {
           $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'plop');
       } catch ( Exception $e ){
           die('Erreur : '.$e->getMessage() );
       }
         $req = "INSERT INTO images VALUES (NULL, $idmoncul, 'images/$fichier', '$titremoncul')";
         $connexion->query($req);



     }else {
          echo 'Echec de l\'upload !';
     }
}else{
     echo $erreur;
}


?>
