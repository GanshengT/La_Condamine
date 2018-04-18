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

<div class="container">
  <form class="form-abonne" action="cible_admin_abonne.php" method="post"> <!-- on définit le fichier cible "cible.php" -->
       <h2 class="form-abonne-heading">Les utilisateurs suivants sont en attente de validation. Sont-ils réellement abonnés ?</h2>

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

    <button class="btn btn-lg btn-block btn-primary" type="submit">Enregistrer les modifications</button>
  </form>
</div>

<?php

$reponse->closeCursor();
?>