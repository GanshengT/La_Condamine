<?php
session_start(); 

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$reponse=$bdd->query('SELECT pseudo,nom,prenom FROM membres WHERE id_groupe =\'en_attente\'');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Changer son mot de passe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../_css/style.css">
  <link rel="stylesheet" href="../_css/signin.css">
  <link rel="stylesheet" href="../_css/gestion_abonne.css">
</head>

<body>

    <?php include '../_views/header.html' ?>

    <div class="container-fluid">
      <form class="form-abonne" action="cible_admin_abonne.php" method="post"> <!-- on définit le fichier cible "cible.php" -->
        <h2 class="form-abonne-heading">Les utilisateurs suivants sont en attente de validation. Sont-ils réellement abonnés ?</h2>


        <div class="col-md-6 offset-md-3" id="nom_abonne">

          <?php

          while ($donnees = $reponse->fetch())
          {
          	echo $donnees['prenom'] . ' '. $donnees['nom'] .', '. $donnees['pseudo'];
          	$reponse_form="reponse_form".$donnees['pseudo'];

          ?>

          			<input type="radio" name='<?php echo $reponse_form; ?>' value="oui" id="oui" /> <label for="oui">Oui</label>
          	    	<input type="radio" name='<?php echo $reponse_form; ?>' value="non" id="non" /> <label for="non">Non</label>
          <?php
          echo '<br />';
          }
          ?>

              <button class="btn btn-lg btn-block btn-primary" type="submit" id="btn_abonne">Enregistrer les modifications</button>

        </div>

      </form>
    </div>

    <?php

    $reponse->closeCursor();
    ?>

    <?php include '../_views/footer.html' ?>

</body>
</html>