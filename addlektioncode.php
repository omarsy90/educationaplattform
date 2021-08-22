<?php

session_start();


$_SESSION['page']='addlektion';





include("configdb.php") ;


if($_POST['course']){

     



     $sql = " INSERT INTO `lekture` (`id`, `titel`, `discrition`, `link`, `course_id`) VALUES (NULL, '".$_POST['name']."', '".$_POST['discription']."', '".$_POST['link']."', '".$_POST['course']."')" ;


  $result = $conn->query($sql);

 	if ($result) {

 		header("Location: sucess.php");
 		
 	}

}
else{


       header('Location: error.php') ;



}







?>