<?php
session_start(); 
include 'remember.php';
include 'redirection_nonco.php';
?>


<div class="container">
  <form class="form-compte" action="cible_compte.php" method="post"> <!-- on définit le fichier cible "cible.php" -->
    <h2 class="form-compte-heading">Modifier vos informations</h2>
    
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