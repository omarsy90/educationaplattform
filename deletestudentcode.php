<?php

//var_dump($_POST);

$idstudent = -100;


session_start();
$_SESSION['page']='students';

 include('configdb.php');

 $id = $_POST['id'];


$sql="SELECT student_id FROM students_and_courses WHERE id =".$id."" ;

$result = mysqli_query($conn,$sql);


//var_dump($result);



 while ( $row=$result->fetch_assoc()) {

$idstudent = $row['student_id'];



 }

 



$sql="DELETE FROM `students_and_courses` WHERE `students_and_courses`.`id` = ".$id."" ;

$result = mysqli_query($conn,$sql);





$sql="SELECT student_id FROM students_and_courses WHERE student_id =".$idstudent."" ;

$result = mysqli_query($conn,$sql);

$row = $result->fetch_assoc();

if (!$row) {


	# code...
	$sql="SELECT user_id FROM students WHERE id =".$idstudent. "" ;

	$result= mysqli_query($conn,$sql);

	$row = $result->fetch_assoc();

	$sql= "DELETE FROM `users` WHERE `users`.`id` = ".$row['user_id']."" ;

	$result= mysqli_query($conn,$sql);

    
	$sql="DELETE FROM `students` WHERE `students`.`id` = ".$idstudent."" ;
	$result= mysqli_query($conn,$sql);

	



}
       

header("Location: sucess.php"); 





?>