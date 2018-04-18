<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if (isset($_COOKIE['pseudo']) AND isset($_COOKIE['pass']))
{
	$membre = $bdd->prepare('SELECT id, pseudo,pass,email,date_inscription,id_groupe,nom, prenom,FROM membres WHERE pass = :pass AND pseudo=:pseudo');
    
	$membre->execute(array(
	'pseudo' => $_COOKIE['pseudo'],
	'pass' => $_COOKIE['pass'],
	));

	$donnes=$membre->fetch();

	session_start();
	$_SESSION['id'] = $donnes['id'];
	$_SESSION['email'] = $donnes['email'];
	$_SESSION['nom'] = $donnes['nom'];
	$_SESSION['prenom'] = $donnes['prenom'];
	$_SESSION['pseudo'] = $donnes['pseudo'];
	$_SESSION['pass'] = $donnes['pass'];
	$_SESSION['id_groupe'] = $donnes['id_groupe'];
	$_SESSION['date_inscription'] = $donnes['date_inscription'];
}


?>
