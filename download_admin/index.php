<?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
session_start();
include("views/remember.php");
include("views/redirection_nonco.php");

$req = $bdd->query('SELECT up_nom_final, up_id_user, up_ext, nom FROM upload JOIN membres WHERE upload.up_id_user=membres.id');

while ($donnees = $req->fetch())
{
	
	?><a href=<?php echo $donnees['up_nom_final'] .'.'.$donnees['up_ext'] ?>> <?php echo $donnees['up_nom_final'] . ' '. $donnees['nom'] .'<br />'; ?> </a><?php
}


?>