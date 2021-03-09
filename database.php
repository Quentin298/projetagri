<?php 

$user = 'projet2';
$pass = 'willy9105';

$db = new PDO ('mysql:host=mysql-projet2.alwaysdata.net;dbname=projet2_bdd',$user,$pass);

$tableLogin = $db->prepare("SELECT * FROM login");
$executeIsOk2 = $tableLogin->execute();
$donnéesClient = $tableLogin->fetchall();

?>