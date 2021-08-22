<?php
include('configdb.php');


session_start();
$_SESSION['page']='courses' ;

$idcourse;
$idcourse=$_POST['idcourse'];

$sql= "DELETE FROM `courses` WHERE `courses`.`id` = ".$idcourse."";


$result = $conn->query($sql);

if ($result) {
	
	header("Location: http:sucess.php");
}



?>