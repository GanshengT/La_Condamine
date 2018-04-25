<?php 
// Page sur laquelle les utilisateurs uploadent les fichiers à destination des admins.
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

session_start();

function ask_upload($bdd,$ask)
{

$req = $bdd->prepare('SELECT up_nom_final FROM upload WHERE up_id_user=:up_id_user AND up_nom_final=:up_titre');

$req->execute(array(
  'up_id_user' => $_SESSION['id'],
  'up_titre' => $_SESSION['id'] .$ask
  ));


if ($res = $req->fetch())
{
  echo "Document déjà envoyé";
  
}
else
{
  echo "Il faut uploader !";
}

?>      <label for=<?php echo $ask; ?>></label><br />
          <input type='file' name=<?php echo $ask ?> id=<?php echo $ask ?> /><br />
          
<?php
}

include("../views/remember.php");
include("../views/redirection_nonco.php");



?>
<div class="container">
     <form method="post" action="cible_upload.php?deja=1" enctype="multipart/form-data">
     Document 1 : <?php  ask_upload($bdd,'identite' ); ?> <br />
     Document 2 : <?php ask_upload($bdd,'photo' ); ?> <br />
     <input type='submit' name='submit' value='Envoyer' />
     </form>
