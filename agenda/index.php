<?php 
try {
	$db=new PDO('mysql:host=localhost;dbname=condamine;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
	die('Erreur: '.$e->getMessage());
}

function secure($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return($data);
}

$query = "select * from events limit 20"; 

$events = array();
$req = $db->query($query);

foreach ($req as $event) { 
	$id = $event['id'];
	$title = $event['title']; 
	$start = $event['start'];
	$end = $event['end'];
	$allDay = $event['allDay'];
	$url=$event['url']; 

	$events[] = array('id' => $id,'title'=> $title, 'start' => $start, 'end' => $end, 'allDay' => $allDay, 'url'=> $url);
}

$file = fopen('json/events.json', 'w');
fwrite($file, json_encode($events));
fclose($file);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Agenda</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../_css/style.css">
	<link rel="stylesheet" href="../_css/agenda.css">
	<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet'>
	<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print'>

	<script src='fullcalendar/lib/moment.min.js'></script>
	<script src='fullcalendar/lib/jquery.min.js'></script>
	<script src='fullcalendar/fullcalendar.min.js'></script>
	<script src='fullcalendar/locale/fr.js'></script>
	<script src="niceDatePicker-master/nice-date-picker.js"></script>
	<script>
	$(document).ready(function() {
		var events = [];

		<?php foreach ($events as $event) { ?>
			var event = {};

			<?php foreach ($event as $key => $val) { ?>
				event.<?php echo $key; ?> = <?php echo $val; ?>;
			<?php } ?>

			events.push(event);
		<?php } ?>

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listMonth'
			},
			themeSystem: 'bootstrap3',
			defaultDate: '2018-02-12',
			weekNumbers: true,
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: events,
    	});
	});
	</script>
	<style>
	#calendar {
		max-width: 1000px;
		margin: 0 auto;
	}
	</style>
</head>

<body>
	<?php include '../_views/header.html' ?>

	<div id="main" class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div id="calendar"></div>
			</div>

			<div class="col-lg-4">
				<h2>Ajouter un événement:</h2>
				<form action="ajoutEvenement.php" method="post">
					<label for="intitule">Nom de l'événement: </label>
					<input type="text" name="intitule" placeholder="Nom"><br>

					<label for="lieu">Lieu: </label>
					<input type="text" name="lieu" placeholder="Lieu">

					<label for="date">Date: </label>
					<input id="#dateField" type="text" name="date" value="">
					<div id="calendar1-wrapper1"></div>
				</form>
			</div>
		</div>
	</div>

	<?php include '../_views/footer.html' ?>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>