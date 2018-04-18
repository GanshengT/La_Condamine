<div class="container">
  <form class="form-compte" action="cible_pass.php" method="post"> <!-- on définit le fichier cible "cible.php" -->
    <h2 class="form-pass-heading">Modifier votre mot de passe</h2>
        
    <label for="inputOldPassword" class="sr-only">Mot de passe actuel</label>
    <input type="password" name="old_pass" class="form-control" placeholder= "Mot de passe actuel"  required>
    
    <label for="inputNewPassword" class="sr-only">Nouveau mot de passe</label>
    <input type="password" name="new_pass" class="form-control" placeholder="Nouveau mot de passe" required>

    <label for="inputNewPassword2" class="sr-only">Confirmation du nouveau mot de passe</label>
    <input type="password" name="new_pass2" class="form-control" placeholder="Confirmation du nouveau mot de passe" required>

    <button class="btn btn-lg btn-block btn-primary" type="submit">Enregistrer les modifications</button>
  </form>
</div>