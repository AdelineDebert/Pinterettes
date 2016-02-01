<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PINTERETTES</title>
  <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="style.css" media="screen" charset="utf-8">
</head>
<body>
  <h1 id='titre_index'>Bienvenue sur Pinterettes</h1>

  <div class='log_form' id='connexion'>
    <h3>S'IDENTIFIER</h3>
    <form action="functions.php" method="post" id=''>
      <label for="pseudo">Pseudo</label>
      <input type='text' name='pseudo'/>
      <label for="password">Password</label>
      <input type='password' name='password'/>
      <button type='submit' name='submit'>Valider</button>
    </form>
  </div>
  <a href='#' onclick='apparait_form()' class='lien_connexion'>Pas encore membre ? Inscription</a>
  <div id='form_cache'>
    <h1 id='titre_index'>Bienvenue sur Pinterettes</h1>
    <div class='log_form' id='inscription'>
      <h3>S'INSCRIRE</h3>
      <form action="functions.php" method="post" id=''>
        <label for="pseudo">Pseudo</label>
        <input type='text' name='new_pseudo'/>
        <label for="email">Email</label>
        <input type="text" name="email">
        <label for="password">Password</label>
        <input type='password' name='new_password'/>
        <button type='submit' name='submit'>Valider</button>
      </form>
    </div>
    <a href='#' onclick='disparait_form()' class='lien_connexion'>Déjà membre ? Connexion</a>
  </div>
<script>

  var form_cache = document.getElementById('form_cache');

  function apparait_form(){
    form_cache.style.display = 'inline';
  }

  function disparait_form(){
    form_cache.style.display = 'none';
  }


</script>
</body>
</html>
