<?php
session_start(); 
include '../views/remember.php';
include '../views/redirection_nonco.php';
?>

</!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.png">
    <title> Changer ses informations </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../_css/style.css">
    <link rel="stylesheet" href="../_css/signin.css"> 
    <link rel="stylesheet" href="../_css/inscription.css">
</head>


<body>

    <?php include '..\_views\header.html' ?>

    <div class="col-md-4 offset-md-4" id="formulaire">

    

        <div class="container">
          <form class="form-compte" action="cible_compte.php" method="post"> <!-- on définit le fichier cible "cible.php" -->
                <h2 class="form-compte-heading" id="titre_form">Modifier vos informations</h2>
                
                <label for="inputEmail" class="sr-only">Adresse mail</label>
                <input type="email" name="email" class="form-control" value=<?php echo $_SESSION['email']; ?> required autofocus>
                
                <label for="inputPrenom" class="sr-only">Prénom</label>
                <input type="text"  name="prenom" class="form-control" value=<?php echo $_SESSION['prenom']; ?> required autofocus>

                <label for="inputNom" class="sr-only">Nom</label>
                <input type="text"  name="nom" class="form-control" value=<?php echo $_SESSION['nom']; ?> required autofocus>

                <label for="inputPseudo" class="sr-only">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" value=<?php echo $_SESSION['pseudo']; ?> required autofocus>
               

        
                <?php
                if ($_SESSION['id_groupe']="non_abonne")
                {
                ?> 

                    <label for="case">Je suis un abonné de La Condamine</label>
                    <input type="checkbox" name="abonne" id="abonne">

                <?php
                }
                ?>


                <button class="btn btn-lg btn-block btn-primary" type="submit">Enregistrer les modifications</button>


            </form>

  

         </div>

     </div>

    <?php include '..\_views\footer.html' ?> 


</body>

</html>