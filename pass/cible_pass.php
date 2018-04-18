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

$pass_hache = password_hash(htmlspecialchars($_POST['new_pass']), PASSWORD_DEFAULT);


if (!password_verify(htmlspecialchars($_POST['old_pass']),$_SESSION['pass']))
{
	//header('location:michel.php?erreur=old_pass');
	echo 'Mot de passe actuel incorrect';
}

elseif (htmlspecialchars($_POST['new_pass'])!==htmlspecialchars($_POST['new_pass2']))
{
	//header('location:michel.php?erreur=new_pass');
	echo 'Les nouveaux mots de passe ne sont pas identiques';
}
else
{
	$req = $bdd->prepare('UPDATE membres SET pass = :nvpass WHERE id = :id');

	$req->execute(array(
		'nvpass' => $pass_hache,
		'id' => $_SESSION['id']
		));

	$_SESSION['pass'] = $pass_hache;

	echo 'Vos informations ont bien été modifiées !';	
}
?>