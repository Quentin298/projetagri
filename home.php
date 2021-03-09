<?php

if(!session_id())
{
	session_start();
	session_regenerate_id(true);
}

include 'database.php';

//récupérer les données de la table MesuresCapteurs dans un tableau $mesures
$tableCapteur = $db->prepare("SELECT * FROM MesuresCapteurs");
$executeIsOk = $tableCapteur->execute();
$mesures = $tableCapteur->fetchall();

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="home.css">
        <title>Agriculture Vietnam</title>
        <div class="en_tete">
        	<nav>
        		<ul>
        			<li><a href="deco.php"><img src="deco.png"></a></li>
        		</ul>
        	</nav>	
        </div>
    </head>

    <body>
        <div class="bloc_donnees">
    		<div class="temp">
    			<p>15</p>
    		</div>

    		<div class="humi">
    			<p>30</p>
    		</div>
    	</div>

    </body>

</html>
