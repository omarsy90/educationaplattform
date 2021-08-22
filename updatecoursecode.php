
<?php

 
 session_start();
 $_SESSION['page']='courses';

$idcourse=$_POST['idcourse'];
$name= $_POST['name'];
$discription= $_POST['discription'];
$type=$_POST['type'];
$teacher=$_POST['teacher'];
$target_dir=$_POST['src'];

if ($_FILES['imgfile']['size']> 0) {

	$file_ext;


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
	
}


include('configdb.php');

$sql=" UPDATE `courses` SET `name` = '".$name."', `discrition` = '".$discription."', `foto` = '".$target_dir."', `type_id` = '".$type."', `teacher_id` = '".$teacher."' WHERE `courses`.`id` = ".$idcourse."" ;

$result = $conn->query($sql);

if ($result) {
	
	header("Location: http:sucess.php");
}



?>

