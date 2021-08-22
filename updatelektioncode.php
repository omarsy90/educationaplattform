<?php

session_start();

$_SESSION['page']='courses'

include('configdb.php');

$sql=" UPDATE `lekture` SET `titel` = '".$_POST['name']."', `discrition` = '".$_POST['discription']."', `link` = '".$_POST['link']."', `course_id` = '".$_POST['course']."' WHERE `lekture`.`id` = ".$_POST['idlektion']."" ;

$result = $conn->query($sql);

if ($result) {
	
	header("Location: http:sucess.php");
}



?>