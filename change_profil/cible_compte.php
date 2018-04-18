<?php
session_start(); 
?>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$secemail=$_POST['email'];
$secpseudo=$_POST['pseudo'];
$secnom=$_POST['nom'];
$secprenom=$_POST['prenom'];
$secabonne=$_POST['abonne'];

$liste_pseudo = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = ?');
$liste_pseudo->execute(array($secpseudo));
$liste_email = $bdd->prepare('SELECT email FROM membres WHERE email = ?');
$liste_email->execute(array($secemail));


if (isset($secabonne))
{
	$abonne="en_attente";
}
else
{
	$abonne="non_abonne";
}

if ($secpseudo!==$_SESSION['pseudo'] AND $liste_pseudo->fetch())
{
	//header('location:michel.php?erreur=pseudo');
	echo 'Pseudo déjà utilisé';
}

elseif ($secemail!==$_SESSION['email'] AND $liste_email->fetch())
{
	//header('location:michel.php?erreur=email');
	echo 'Email déjà utilisé';
}

else
{
	$req = $bdd->prepare('UPDATE membres SET pseudo = :nvpseudo,  email = :nvemail,id_groupe = :nvidgr, nom = :nvnom, prenom = :nvprenom  WHERE id = :id');

	$req->execute(array(
		'nvemail' => $secemail,
		'nvpseudo' => $secpseudo,
		'nvnom' => $secnom,
		'nvprenom' => $secprenom,
		'nvidgr' => $abonne,
		'id' => $_SESSION['id']
		));

	$_SESSION['email'] = $secemail;
	$_SESSION['nom'] = $secnom;
	$_SESSION['prenom'] = $secprenom;
	$_SESSION['pseudo'] = $secpseudo;
	$_SESSION['id_groupe'] = $abonne;


	echo 'Vos informations ont bien été modifiées !';	
}


?>