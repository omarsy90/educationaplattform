<?php
 
 $username;


 session_start();

 $_SESSION['page']='students' ;

 include('configdb.php');

$sql ="SELECT * FROM users WHERE id ='".$_POST['iduser']."'";

$result = mysqli_query($conn,$sql);

 while ( $row=$result->fetch_assoc()) {
     
     $username=$row['username'];




 }

 if($username==$_POST['username']){

 	$sql2= "UPDATE `users` SET `username` = '".$_POST['username']."', `password` = '".$_POST['password']."'  WHERE `users`.`id` = ".$_POST['iduser']."";
      
      $result2 = mysqli_query($conn,$sql2) ;

          
          $sql3=" UPDATE `students` SET `name` = '".$_POST['fullname']."', `telefonnummer` = '".$_POST['phone']."', `email` = '".$_POST['email']."' WHERE students.id=".$_POST['idstudent']."" ;

          $result3 = mysqli_query($conn,$sql3) ;

          header("Location: sucess.php");

           


 }
 else{


 	     $sql ="SELECT * FROM users WHERE username ='".$_POST['username']."'";

$result = mysqli_query($conn,$sql);

 
 

  

   	$row=$result->fetch_assoc()  ;
   	

   	     if ($row) {


   	     	header("Location: error.php");
   	     	# code...
   	     }
          
          

   else{


         $sql2= "UPDATE `users` SET `username` = '".$_POST['username']."', `password` = '".$_POST['password']."', `roll_id` = '2' WHERE `users`.`id` = ".$_POST['iduser']."";
      
      $result2 = mysqli_query($conn,$sql2) ;

          
          $sql3=" UPDATE `students` SET `name` = '".$_POST['fullname']."', `telefonnummer` = '".$_POST['phone']."', `email` = '".$_POST['email']."' WHERE students.id=".$_POST['idstudent']."" ;

          $result3 = mysqli_query($conn,$sql3) ;

          header("Location: sucess.php");





   }





 }




?>