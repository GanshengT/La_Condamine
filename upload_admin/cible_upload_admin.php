<?php 
session_start();
include("views/remember.php");
include("views/redirection_nonco.php");
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
{
   //Test1: fichier correctement uploadé
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0){return False;}
   //Test2: taille limite
     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize){echo False;}
   //Test3: extension
     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)){return False;}
   //Déplacement
     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
}



function add_to_bdd($index,$bdd,$cible)
{
  $req = $bdd->prepare('INSERT INTO ask_admin(ask_name, ask_ext, ask_size, ask_cible) VALUES(:ask_name, :ask_ext, :ask_size, :ask_cible)');

  $req->execute(array(
      'ask_name' => $_FILES[$index]['name'],
      'ask_ext' => substr(strrchr($_FILES[$index]['name'],'.'),1),
      'ask_size' => $_FILES[$index]['size'],
      'ask_cible' => $cible
      ));
 }


$upload = upload('demande', $_FILES['demande']['name'] .'.'. substr(strrchr($_FILES['demande']['name'],'.'),1) ,1536, array('png','gif','jpg','jpeg') );
echo $upload;







  if ($upload==1)
  {
    echo "Upload du devoir réussi!<br />";

    foreach($_POST['cible'] as $valeur)
    {
    echo "La checkbox ". $valeur ." a été cochée<br>";
    $res=add_to_bdd('demande',$bdd, $valeur);
    echo $res;
 
    }

     }
  else
  {
    echo "rien n'a été envoyé";
  }

?>