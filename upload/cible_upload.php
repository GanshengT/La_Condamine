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
     return move_uploaded_file($_FILES[$index]['tmp_name'],'../'.$destination);
}



function add_to_bdd($index,$bdd)
{
  $req = $bdd->prepare('INSERT INTO upload(up_id_user, up_nom_initial,up_nom_final, up_poids, up_ext, up_date) VALUES(:up_id_user, :up_nom_initial, :up_nom_final, :up_poids, :up_ext, CURDATE())');

  $req->execute(array(
      'up_id_user' => $_SESSION['id'],
      'up_nom_initial' => $_FILES[$index]['name'],
      'up_nom_final' => $_SESSION['id'] . $index,
      'up_poids' => $_FILES[$index]['size'],
      'up_ext' => substr(strrchr($_FILES[$index]['name'],'.'),1)
      ));
 }

 function del_from_bdd($ask,$bdd)
 {
  $req = $bdd->prepare('DELETE FROM upload WHERE up_nom_final=:up_nom_final');
  $req->execute(array(
      'up_nom_final' => $_SESSION['id'] . $ask
      ));
 }

function validate_upload($ask,$bdd)
{
  $upload = upload($ask, $_SESSION['id'] . $ask .'.' . substr(strrchr($_FILES[$ask]['name'],'.'),1) ,1536, array('pdf','png','gif','jpg','jpeg') ); 
  if ($upload==1)
  {
    echo "Upload réussi!<br />";
    del_from_bdd($ask,$bdd);
    $res=add_to_bdd($ask,$bdd);
    echo $res;
  }
  else
  {
    echo "Rien n'a été envoyé";
  }
}
?>

Document 1 : <?php validate_upload('identite',$bdd) ?> <br />
Document 2 : <?php validate_upload('photo',$bdd) ?> <br />
 
<a href='index.php'> Retourner à ma page d'envoi de fichiers</a>