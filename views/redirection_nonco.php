<?php
if (!isset($_SESSION['pseudo']))
{
	header('location: ../connexion/index.html');
}
?>