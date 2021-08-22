<?php

session_start();


include('configdb.php');

$sql =" UPDATE Courses
SET teacher_id= NULL
WHERE id = ".$_POST['courseid']."" ;

$result = mysqli_query($conn,$sql);


$_SESSION['page']='teachers' ;
header("Location: sucess.php"); 


?>