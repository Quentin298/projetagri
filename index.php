<?php
	
include 'database.php';
//var_dump($donnéesClient[0][2]);
//echo $_POST['password'];
//récupérer les données de la table login

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="index.css">
        <title>Agriculture Vietnam</title>
            
    </head>
    <body>
    	<div class="bloc_form">
    		<div class="formulaire">
    			<h2 class="titre"> Connexion </h2>
    			<form method="post">
    				<input type="text" name="login" placeholder="Nom d'utilisateur">
    				<br>
    				<input type="password" name="password" placeholder="Mot de passe">
    				<br>
					<input type="submit" name="valid" value="Connexion">

					<?php
					
						if(isset($_POST['valid'])){
					
							if((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['password']) && !empty($_POST['password'])))
							{
					
								if($_POST['login']!=$donnéesClient[0][1])
								{
									echo "<br> Nom d'utilisateur ou mot de passe incorrect";
								}else
								{
									if($donnéesClient[0][2]==NULL)
									{
										$options = [
											'cost' => 12,
										];

										$hashpass = password_hash($_POST['password'], PASSWORD_BCRYPT, $options); 

										$password = $db->prepare("UPDATE login SET Password = (:password) WHERE idUser = 1");
										$password->execute(['password' => $hashpass]);

										header('Location: /home.php');
										exit();

									}
									else
									{

										if(password_verify($_POST['password'],$donnéesClient[0][2]) == true)
										{
											header('Location: /home.php');
											exit();
										}
										else
											echo "<br> Nom d'utilisateur ou mot de passe incorrect";
									}
								}
							}else
								echo "<br> <strong> Vous n'avez pas renseigné tous les champs";
						}
					?>

    			</form>
    		</div>
    	</div>
    </body>
</html>