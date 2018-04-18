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



function add_to_bdd($index,$destination,$bdd)
{
  $req = $bdd->prepare('INSERT INTO upload(up_id_user, up_nom_initial,up_nom_final, up_poids, up_ext, up_date) VALUES(:up_id_user, :up_nom_initial, :up_nom_final, :up_poids, :up_ext, CURDATE())');

  $req->execute(array(
      'up_id_user' => $_SESSION['id'],
      'up_nom_initial' => $_FILES[$index]['name'],
      'up_nom_final' => $destination,
      'up_poids' => $_FILES[$index]['size'],
      'up_ext' => substr(strrchr($_FILES[$index]['name'],'.'),1)
      ));
 }

 function del_from_bdd($bdd)
 {
  $req = $bdd->prepare('DELETE FROM upload WHERE up_nom_final=:up_nom_final');
  $req->execute(array(
      'up_nom_final' => $_SESSION['id'] . '_identite'
      ));
 }


$upload = upload('identite', $_SESSION['id'] . '_identite.' . substr(strrchr($_FILES['identite']['name'],'.'),1) ,1536, array('png','gif','jpg','jpeg') );
  

  if ($upload==1)
  {
    echo "Upload de la carte d'identité réussi!<br />";
    del_from_bdd($bdd);
    $res=add_to_bdd('identite',$_SESSION['id'] . '_identite',$bdd);
    echo $res;
  }
  else
  {
    echo 'erreur';
  }

?>
