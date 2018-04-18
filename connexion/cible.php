<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


if (isset($_POST['remember']))
{
	$remember=1;
}
else
{
	$remember=2;
}


$membre = $bdd->prepare('SELECT id, pseudo, email, pass, date_inscription,id_groupe,nom,prenom FROM membres WHERE email = :email');
    
$membre->execute(array(
    'email' => htmlspecialchars($_POST['email']),
	));


$donnes=$membre->fetch();
 
if (!password_verify(htmlspecialchars($_POST['pass']), $donnes['pass']))
{
	//header('location:signin.php?erreur=nomatch');
	echo 'Mauvais identifiant ou mot de passe !';
}

else
{

	session_start();
	$_SESSION['id'] = $donnes['id'];
	$_SESSION['email'] = $donnes['email'];
	$_SESSION['nom'] = $donnes['nom'];
	$_SESSION['prenom'] = $donnes['prenom'];
	$_SESSION['pseudo'] = $donnes['pseudo'];
	$_SESSION['pass'] = $donnes['pass'];
	$_SESSION['id_groupe'] = $donnes['id_groupe'];
	$_SESSION['date_inscription'] = $donnes['date_inscription'];

	echo 'Bravo ' . $_SESSION['pseudo']. ', tu es connecté !';


	if ($remember==1)
	{
		setcookie('pseudo',$_SESSION['pseudo'], time() + 30*24*3600, null, null, false, true);
		setcookie('pass',$donnes['pseudo'], time() + 30*24*3600, null, null, false, true);
		echo 'On se souviendra de toi';

	}
}


?>
        





