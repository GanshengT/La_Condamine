<div class="container-fluid">

    <div class="container-fluid" id="msg_err">

        <?php $erreur="_GET[erreur]";

        if ($erreur=="email") {$err="Votre adresse mail est déjà utilisée";}
        elseif ($erreur=="pass") {$err="Les deux mots de passe ne sont pas identiques";}
        elseif ($erreur=="pseudo") {$err="Votre pseudonyme est déjà utilisé";} 
        else {$err='0';}

        ?>
        
        <h2>

        <?php 

        if ($erreur=="email" OR $erreur=="pass" OR $erreur=="pseudo")  {echo '' .$err. '.';}
        
        ?>
        
        </h2>

    
    </div>

  <form class="form-inscription" action="cible2.php" method="post" id="formulaire"> <!-- on définit le fichier cible "cible.php" -->
    <h2 class="form-inscription-heading">Inscrivez-vous</h2>
    

    <label for="inputEmail" class="sr-only">Adresse mail</label>
    <input type="email" name="email" class="form-control" placeholder="Adresse mail" required autofocus>
    
    <label for="inputPseudo" class="sr-only">Prénom</label>
    <input type="text"  name="prenom" class="form-control" placeholder="Prénom" required autofocus>

    <label for="inputPseudo" class="sr-only">Nom</label>
    <input type="text"  name="nom" class="form-control" placeholder="Nom" required autofocus>

    <label for="inputPseudo" class="sr-only">Pseudo</label>
    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required autofocus>
    
    <label for="inputPassword" class="sr-only">Mot de passe</label>
    <input type="password" name="pass" class="form-control" placeholder="Mot de passe" required>
    
    <label for="inputPassword" class="sr-only">Vérification du mot de passe</label>
    <input type="password" name="pass2" class="form-control" placeholder="Confirmation du mot de passe" required>

    <label for="case">Je suis un abonné de La Condamine</label>
    <input type="checkbox" name="abonne" id="abonne" /> 

    <button class="btn btn-lg btn-block btn-primary" type="submit">Créer un compte</button>
  </form>
</div> <!-- /container -->
