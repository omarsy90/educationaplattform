<?php

include("configdb.php");

session_start();

$_SESSION['page']='addcourse';


$name=$_POST["name"];
$discription=$_POST["discription"] ;
$type =$_POST["type"];
$teacher_id=$_POST["teacher"];




if (!$teacher_id) {
	$teacher_id=0;
}


// this code to add image to the server 
$file_ext;

$target_dir ;
$target_file = $_FILES["imgfile"]["name"];
$div =explode(".",$target_file);

$file_ext=strtolower( end($div) );

if ($file_ext) {



$unique_name=substr(md5(time()), 0,10).".".$file_ext ;

$target_dir = "uploads/".$target_dir.$unique_name ;


$uploadOk = 1;


//$check = getimagesize($_FILES["imgfile"]["tmp_name"]);

  move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_dir) ;

	
}



  //


  $sql =	"INSERT INTO `courses` (`id`, `name`, `discrition`, `foto`, `type_id`, `teacher_id`) VALUES (NULL,'".$name."','".$discription."', '".$target_dir."','".$type."','".$teacher_id."'); ";

 	$result = $conn->query($sql);

 	if ($result) {

 		header("Location: http:sucess.php");
 		
 	}


?>