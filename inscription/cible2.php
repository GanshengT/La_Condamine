<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$pass_hache = password_hash(htmlspecialchars($_POST['pass']), PASSWORD_DEFAULT);

if (isset(htmlspecialchars($_POST['abonne'])))
{
	$abonne="en_attente";
}
else
{
	$abonne="non_abonne";
}


$liste_pseudo = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = ?');
$liste_pseudo->execute(array(htmlspecialchars($_POST['pseudo'])));
$liste_email = $bdd->prepare('SELECT email FROM membres WHERE email = ?');
$liste_email->execute(array(htmlspecialchars($_POST['email'])));


if ($liste_pseudo->fetch())
{
	header('location:index2.php?erreur=pseudo');
	
}

elseif ($liste_email->fetch())
{
	header('location:index2.php?erreur=email');
}

elseif (htmlspecialchars($_POST['pass'])!==htmlspecialchars($_POST['pass2']))
{
	header('location:index2.php?erreur=pass');
}

else
{
	$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription,id_groupe, nom, prenom) VALUES(:pseudo, :pass, :email, CURDATE(),:abonne,:nom,:prenom)');

	$req->execute(array(
    	'pseudo' => htmlspecialchars($_POST['pseudo']),
    	'pass' => $pass_hache,
    	'email' => htmlspecialchars($_POST['email']),
    	'abonne' => $abonne,
   		'nom' => htmlspecialchars($_POST['nom']),
   		'prenom' => htmlspecialchars($_POST['prenom'])
		));


echo 'Vous êtes bien inscrit !';

}

?>


