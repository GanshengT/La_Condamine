<?php 
session_start();
include("../views/remember.php");
include("../views/redirection_nonco.php");

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

echo $_SESSION['id'];
$req = $bdd->prepare('SELECT ask_name FROM ask_admin WHERE ask_cible=:id');
$req->execute(array(
      ':id' => $_SESSION['id']
      ));

while ($donnees = $req->fetch())
{
	
	echo 'kose';
?>
	<a href=<?php echo $donnees['ask_name']?>> <?php echo $donnees['ask_name'].'<br />'; ?> </a>

<?php 
} 
?>
