<?php  

  include 'configdb.php' ;

 //print_r($_POST);

  session_start();


  


$username=$_POST["username"];


$sql = "SELECT id FROM users where username ='".$username."'";


 $result = mysqli_query($conn, $sql);

 
 

 if ($result) {

 	

 	
 	
 	$row = mysqli_num_rows($result); 

 	

 	if($row){

                    // if there is another user  has the same name

                $conn->close();

              header("Location:error.php");

 	}




     else{

// the user name ist not reprated 



 	$username=$_POST["username"];
 	$password= $_POST["password"];
 	$fullname=$_POST["fullname"];
 	$phone=$_POST["phone"];
 	$email=$_POST["email"];
 	$course=$_POST["course"];
 	$roll=$_POST["roll"];

 	$sql =	" INSERT INTO `users` (`id`, `username`, `password`, `roll_id`) VALUES (NULL, '".$username."' ,'". $password."','". $roll."') ";

 	$result = $conn->query($sql);



// get id user that recently entred
      $user_id = 0;

      $sql = "SELECT id FROM users where username ='".$username."'";
        $result = mysqli_query($conn, $sql);

        while ( $row = $result->fetch_assoc() ) {


        	$user_id=$row["id"] ;
        }



        if ($roll==1) {

        	
        	
        	# code...
           // inser user if it is teacher
        	$sql= "INSERT INTO `teachers` (`id`, `fullname`, `telefonnummer`, `email`, `user_id`) VALUES (NULL, '".$fullname."', '".$phone."', '".$email."','".$user_id."')" ;

        	 $result = $conn->query($sql);

        	

        	 // add teacher_id to the course if the course ist determend 

        	 if ($course) {

        	 	$teacher_id=0;


                  $sql = "SELECT id FROM teachers where user_id ='".$user_id."'";
                       
                        $result = mysqli_query($conn, $sql);
                           

                           while ( $row = $result->fetch_assoc() ) {


        	                              $teacher_id=$row["id"] ;


                                     }

                                  //   echo "teachers ist".$teacher_id;

                                  $sql=" UPDATE `courses` SET `teacher_id` = '".$teacher_id."' WHERE `courses`.`id` ='".$course."' ";

                                   
                                    $result = mysqli_query($conn, $sql);

                               

                               

        	 	
        	 }

             
             $conn->close();


             $_SESSION['page']='addteacher';
             header("Location: sucess.php");

        }


        else{


                         // inser code if et is student


        	           $sql= "INSERT INTO `students` (`id`, `name`, `telefonnummer`, `email`,`user_id`) VALUES (NULL, '".$fullname."', '".$phone."', '".$email."','".$user_id."')" ;
                             

                             $result = $conn->query($sql);

                           //geting id for student that it is entred 


                              $sql = "SELECT id FROM students where user_id ='".$user_id."'";
                       
                             $result = mysqli_query($conn, $sql);

                             $student_id=0;
                           

                           while ( $row = $result->fetch_assoc() ) {


        	                              $student_id=$row["id"] ;


                                     }



                             //



                           
                           $sql="INSERT INTO `students_and_courses` (`id`, `course_id`, `student_id`) VALUES (NULL,'".$course."','".$student_id."')";
                           
                           $result = $conn->query($sql);
 	                        
 	                        $conn->close();

                          $_SESSION['page']='addstudent';

                          header("Location: sucess.php");





        }


  

 }









 }

 
  



?>