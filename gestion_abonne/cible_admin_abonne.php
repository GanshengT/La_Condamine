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


$reponse=$bdd->query('SELECT pseudo FROM membres WHERE id_groupe =\'en_attente\'');


while ($donnees = $reponse->fetch())
{
	
	if (htmlspecialchars($_POST['reponse_form'.$donnees['pseudo']])=="oui")
{
	$abonne="abonne";
}
elseif (htmlspecialchars($_POST['reponse_form'.$donnees['pseudo']])=="non")
{
	$abonne="non_abonne";
}

	$req = $bdd->prepare('UPDATE membres SET id_groupe = :nvidgr WHERE pseudo = :pseudo');

	$req->execute(array(
		'nvidgr' => $abonne,
		'pseudo' => $donnees['pseudo']
		));

	$_SESSION['id_groupe'] = $abonne;


}


$reponse->closeCursor();







//for ($utilisateur_en_attente = 1; $utilisateur_en_attente <= $donnees['nbattente']; $utilisateur_en_attente++)
//{
    
//	$req = $bdd->prepare('UPDATE membres SET pid_groupe = :nvidgr WHERE id = :id');
  //echo 'Ceci est la ligne n°  <br />';
//}






?>