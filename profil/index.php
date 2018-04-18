<?php
session_start();
include 'remember.php';
include 'redirection_nonco.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Espace Utilisateur</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/favicon.png">
	<title> Inscription </title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../_css/style.css">
	<link rel="stylesheet" href="../_css/signin.css"> 
	<link rel="stylesheet" href="../_css/profil.css">
</head>
<body>

	<?php include '..\_views\header.html'; ?>

	<div class="row" id="info">

		<div class="col-lg-2 offset-lg-2" id="prephotobox" >
			<div class="container-fluid" id="photobox">
				<p> <img src="../_img/gustave.jpg" id="photoG"/> </p>
							</div>
		</div>

		<div class="col-lg-6 push-lg-4" >
			<div class="container-fluid" id="information"> 
				<h2> Vos informations </h2>
				<div class="container" id ="boxinfo"> 
					<label>Nom </label> : <?php echo $_SESSION['nom'] ?> <br/>
					<label>Prénom </label> : <?php echo $_SESSION['prenom'] ?> <br/>
					<label>Pseudo </label> : <?php echo $_SESSION['pseudo'] ?> <br/>
					<label>Adresse mail </label> : <?php echo $_SESSION['email'] ?> <br/>
					<label>Téléphone </label> : <?php echo '0666666666' ?> <br/>
					<label>Domaine artistique </label> : <?php echo 'Danse' ?>
				</div>
				<p> <a href="../change_profil"> Modifier mon profil </a> </p>
			</div>
		</div>

		<a href="disconnect.php">Se déconnecter</a>

	</div>

<?php include '..\_views\footer.html' ?>

</body>