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
    <?php
    /*<link rel="stylesheet" type="text/css" href="bootstrap-datetimepicker-master/bootstrap-master/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="bootstrap-datetimepicker-master/bootstrap-master/dist/js/bootstrap.js"></script>
    <script src="bootstrap-datetimepicker-master/moment-develop/moment.js"></script>
    <script src="bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js"></script>
    */
    ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../_css/style.css">
	<link rel="stylesheet" href="../_css/agenda.css">
	<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet'>
	<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print'>

	<script src='fullcalendar/lib/moment.min.js'></script>
	<script src='fullcalendar/lib/jquery.min.js'></script>
	<script src='fullcalendar/fullcalendar.min.js'></script>
	<script src='fullcalendar/locale/fr.js'></script>
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

        <div class='row'>
            <div class="col-lg-8">
                <div id='calendar'></div>  
            </div>
            <div class="col-lg-4">
                <h2>Ajouter un événement:</h2>
                <form action="php/add_mes.php" method="post">
                    <label for="intitule">Nom de l'événement: </label>
                    <p><input type="text" name="intitule" placeholder="Nom"></p>

                    <label for="lieu">Lieu: </label>
                    <p><input type="text" name="lieu" placeholder="Lieu"></p>

                    <label for="date">Date: </label>
                    <span class="calendar1-msg"><input id="#dateField" type="text" name="date" value="" placeholder="Date">
                    </span>
                    <a href="bootstrap-datetimepicker-master/test/screen-capture/base.html">click to select</a>
                    
                    <p><input type="submit" value="confirm" /></p>
                    
                </form>
            </div>
            
	   </div>
    </div>

    
	<?php include '../_views/footer.html' ?>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

