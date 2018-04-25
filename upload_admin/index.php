<?php 
// Page sur laquelle les admins peuvent demander envoyer des documents aux utilisateurs de leur choix.
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

session_start();
include("../views/remember.php");
include("../views/redirection_nonco.php");

$req = $bdd->query('SELECT id, pseudo, nom, prenom FROM membres WHERE id_groupe=\'abonne\'');

?>
A qui voulez-vous envoyer ce fichier ?



<div class="container">
     <form method="post" action="cible_upload_admin.php" enctype="multipart/form-data">




<?php
while ($donnees = $req->fetch())
{

?>
	
	<input type="checkbox" name="cible[]" value=<?php echo $donnees['id'] ?> /> <?php echo $donnees['prenom'] . ' blabla'. $donnees['nom'] .', '. $donnees['pseudo']; ?><br>

<?php
echo '<br />';
}



?>



          <label for="demande">Devoir:</label><br />
          <input type="file" name="demande" id="demande" /><br />
          <input type="submit" name="submit" value="Envoyer" />
     </form>