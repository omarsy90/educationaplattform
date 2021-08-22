<?php
 //var_dump($_POST);

 //exit();


session_start();
$_SESSION['page']='teachers' ;

 $username;

 include('configdb.php');

$sql ="SELECT * FROM users WHERE id ='".$_POST['iduser']."'";

$result = mysqli_query($conn,$sql);

 while ( $row=$result->fetch_assoc()) {
     
     $username=$row['username'];




 }

 
 

 if($username==$_POST['username']){

  

 	$sql2= "UPDATE `users` SET `username` = '".$_POST['username']."', `password` = '".$_POST['password']."' WHERE `users`.`id` = ".$_POST['iduser']."";
      
      $result2 = mysqli_query($conn,$sql2) ;

          
          $sql3=" UPDATE `teachers` SET `fullname` = '".$_POST['fullname']."', `telefonnummer` = '".$_POST['phone']."', `email` = '".$_POST['email']."' WHERE teachers.id=".$_POST['idteacher']."" ;

          $result3 = mysqli_query($conn,$sql3) ;

          

          header("Location: sucess.php");

           


 }
 else{

  
 


 	     $sql ="SELECT * FROM users WHERE username ='".$_POST['username']."'";

$result = mysqli_query($conn,$sql);

 
 

  

   	$row=$result->fetch_assoc()  ;
   	

   	     if ($row) {
           
          
         
   	     	header("Location: error.php");

   	     	
   	     }
          
          

   else{


         $sql2= "UPDATE `users` SET `username` = '".$_POST['username']."', `password` = '".$_POST['password']."'  WHERE `users`.`id` = ".$_POST['iduser']."";
      
      $result2 = mysqli_query($conn,$sql2) ;

          
          $sql3=" UPDATE `teachers` SET `fullname` = '".$_POST['fullname']."', `telefonnummer` = '".$_POST['phone']."', `email` = '".$_POST['email']."' WHERE teachers.id=".$_POST['idteacher']."" ;

          $result3 = mysqli_query($conn,$sql3) ;
              
              
          header("Location: http:sucess.php");





   }





 }




?>