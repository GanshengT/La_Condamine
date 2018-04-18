 <?php echo $_POST['prenom']; ?> 
 <?php
        try
            { $bdd = new PDO('mysql:host=localhost;dbname=condamine;charset=utf8', 'root', ''); }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        ?>

    <?php
    
$req = $bdd->prepare('INSERT INTO events(title, start) VALUES(:title, :start)');
$req->execute(array(
	'title' => $_POST['intitude'],
	'start' => $_POST['date'],
	));

?>