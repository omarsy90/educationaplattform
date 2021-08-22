<?php
include('configdb.php');

session_start();
$_SESSION['page']= 'courses' ;


$idlektion;
$idlektion=$_POST['idlektion'];

$sql= "DELETE FROM `lekture` WHERE `lekture`.`id` = ".$idlektion."";


$result = $conn->query($sql);

if ($result) {
	
     
    
	header("Location: sucess.php");
}else{

      header("Location: error.php");

}



?>