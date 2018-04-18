<?php
session_start();
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

	


	<!--<?php 
	include 'remember.php';
	include 'redirection_nonco.php';
	?>-->

	<?php include 'D:\wamp64\www\condamine\_views\header.html' ?>


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
					<label>Nom </label> : <?php echo 'Jean' ?> <br/>
					<label>Prénom </label> : <?php echo 'Dupuis' ?> <br/>
					<label>Adresse mail </label> : <?php echo 'jean.dupuis@mail.fr' ?> <br/>
					<label>Téléphone </label> : <?php echo '0666666666' ?> <br/>
					<label>Domaine artistique </label> : <?php echo 'Danse' ?>
				</div>
				<p> <a href="cible.php"> Modifier mon profil </a> </p>
			</div>
		</div>




</div>	

</div>

<?php include 'D:\wamp64\www\condamine\_views\footer.html' ?> 

</body>
</html>