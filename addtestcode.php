<?php

session_start();

$_SESSION['page']='addtest';



$titel=$_POST['titel'];
$date=$_POST['date'];
$course_id=$_POST['course'];
$link=$_POST['link'];


include('configdb.php');

if ($_POST['course']) {
	# code...


$sql="INSERT INTO `quizes` (`id`, `titel`, `date`, `course_id`, `link`) VALUES (NULL,'".$titel."', '". $date."','".$course_id."', '".$link."')" ;


$result = mysqli_query($conn,$sql);








$sql ="SELECT MAX(id) as id FROM quizes" ;

$result = mysqli_query($conn,$sql) ;



$row = $result->fetch_assoc() ;

$idquiz = $row['id'];






$sql="SELECT * FROM  students_and_courses WHERE course_id='".$course_id."'" ;

$result = mysqli_query($conn,$sql);





while ($row = $result->fetch_assoc() ) {


	$sql2="INSERT INTO `student_and_quizes` (`id`, `student_id`, `quizes_id`, `status`) VALUES (NULL,".$row['student_id'].", ".$idquiz.",NULL)" ;

	$result2=mysqli_query($conn,$sql2);

	

}

header("Location: sucess.php"); 

}else{


header('Location: error.php ');

}



?>