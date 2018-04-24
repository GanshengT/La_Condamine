</!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.png">
    <title> Modifier le mot de passe </title>
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
		  <form class="form-compte" action="cible_pass.php" method="post"> <!-- on définit le fichier cible "cible.php" -->
		    <h2 class="form-pass-heading" id="titre_form">Modifier votre mot de passe</h2>
		        
		    <label for="inputOldPassword" class="sr-only">Mot de passe actuel</label>
		    <input type="password" name="old_pass" class="form-control" placeholder= "Mot de passe actuel"  required>
		    
		    <label for="inputNewPassword" class="sr-only">Nouveau mot de passe</label>
		    <input type="password" name="new_pass" class="form-control" placeholder="Nouveau mot de passe" required>

		    <label for="inputNewPassword2" class="sr-only">Confirmation du nouveau mot de passe</label>
		    <input type="password" name="new_pass2" class="form-control" placeholder="Confirmation du nouveau mot de passe" required>

		    <button class="btn btn-lg btn-block btn-primary" type="submit">Enregistrer les modifications</button>
		  </form>
		</div>
  

    </div>

     

    <?php include '..\_views\footer.html' ?> 


</body>

</html>