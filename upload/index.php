<?php 
session_start();
include("views/remember.php");
include("views/redirection_nonco.php");

$req = $bdd->prepare('SELECT count(*) AS cnt FROM upload WHERE up_id_user=:up_id_user AND up_nom_final=:up_titre');

$req->execute(array(
  'up_id_user' => $_SESSION['id'],
  'up_titre' => $_SESSION['id'] . '_identite' 
  ));

if ($donnees = $req->fetch())
{
	echo "Pièce d'identité déjà envoyée";
	
	
}
else
{

	echo "Il faut uploader !";
}

?>


<div class="container">
     <form method="post" action="cible_upload.php?deja=1" enctype="multipart/form-data">
          <label for="identite">Carte d'identité :</label><br />
          <input type="file" name="identite" id="identite" /><br />
          <input type="submit" name="submit" value="Envoyer" />
     </form>
