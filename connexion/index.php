<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../_css/style.css">
	<link rel="stylesheet" href="../_css/connexion.css">
	<link rel="stylesheet" href="../_css/signin.css">
</head>
<body>
	<?php include '../_views/header.html' ?>

	<div id="main" class="container-fluid">
		<div class="row">
			<div id="connexion" class="col-lg-4 push-lg-8 align-items-center">
				<?php include '../_views/signin.html' ?>
			</div>

			<div id="body" class="col-lg-8 pull-lg-4">
				<?php for($i=0; $i<4; $i++) { ?>
					<div class="article">
						<div class="image-large">
							<img src="../_img/banner1_large.jpg" class="w-100">
						</div>
						<div class="image-medium">
							<img src="../_img/banner1_medium.jpg" class="w-100">
						</div>
						<div class="image-small">
							<img src="../_img/banner1_small.jpg" class="w-100">
						</div>
						
						<div class="container-fluid">
							<hr>
							<h3>QU'EST-CE QUE LA CONDAMINE?</h3> 
							<hr>
							<p>
								La Condamine a été fondée en 2016, à partir d'un constat : de nos jours, de nombreux artistes ont du talent et savent créer mais rencontrent des difficultés pour structurer leur activité, organiser leur temps, financer leur création et communiquer afin de diffuser leur œuvre et vivre de leur art. C'est pourquoi nous avons décidé de mettre en place une structure permettant de partager notre savoir-faire en matière de gestion, développement économique, communication et administration.
							</p>
						</div>
					</div>						
				<?php }

				include '../_views/footer.html' ?>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>