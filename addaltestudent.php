<!DOCTYPE html>

<?php  




  ?>



<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="addstudentstyle/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="addstudentstyle/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="addstudentstyle/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="addstudentstyle/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="addstudentstyle/css/main.css" rel="stylesheet" media="all">



<!--   add library for sweet alert wit ajax  -->

</head>

<body dir="rtl">
    
     <?php  


 include('masterpage.php');



if ($_SESSION['status']=='true') {

    if(  !($_SESSION['roll']=='0' )   ){

header('Location: signin.php');

    }

    # code...
}else{

    header('Location: signin.php');
}






  ?>



<?php   
 

 $statment ='';
   
    
    include('configdb.php');


   if (isset($_POST['add'])) {

    

   $idcourse=$_POST['course'];
   $idusername=$_POST['idusername'] ;
   


     
     $_SESSION['page']='students';
   


   

   if(!$idusername) {
      
      echo ('   <script type="text/javascript">
        window.location.href = "error.php";
        </script> ');
        

}
   


   


   $sql = "SELECT id FROM students WHERE user_id ='".$idusername."'" ;
   $result = mysqli_query($conn, $sql);
   $row = $result->fetch_assoc() ;
   $idstudent=$row['id'];



   $sql= "SELECT * FROM students_and_courses WHERE student_id ='".$idstudent."' AND  course_id ='". $idcourse ."'" ;

   $result = mysqli_query($conn, $sql);

   $row = $result->fetch_assoc() ;

   if(!$row){
          

          $sql = " INSERT INTO `students_and_courses` (`id`, `course_id`, `student_id`) VALUES (NULL, '".$idcourse."', '".$idstudent."') "  ;

           $result = mysqli_query($conn, $sql);

             
             echo ('   <script type="text/javascript">
        window.location.href = "sucess.php";
          </script> ');

            



} else{
    


    $statment =" diese student hase schon angemeldet " ;
}





  


}



  ?>
    
   
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title"> اضافة طالب ل كورس </h2>
                </div>
                <div class="card-body">
                    <form  method="POST">

                       <input type="text" name="page" value="adduser"  style="visibility: hidden;">

                           
                           <div class="form-row">
                            <div class="name"> الكورس</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                             
                                             <?php   
                                                
                                                $sql = "SELECT * FROM students" ;

                                                 $result = mysqli_query($conn, $sql);


                                                 echo '<select    name ="idusername"  required="required">';

                                                  while ( $row = $result->fetch_assoc() ) {


                                                     $sql2 ="SELECT * FROM users WHERE id =".$row['user_id']."" ;
                                                     $result2 = mysqli_query($conn, $sql2);
                                                     $row2 = $result2->fetch_assoc() ;
                                                    


                                                     echo '<option value ='.$row2["id"].' >'.$row["name"].'//'.$row2['username'] .'</option>';




                                                  }


                                                   echo "</select>";
                                              

                                                ?>
                                            

                                                
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        

                             

                             



                      
                        <div class="form-row">
                            <div class="name"> الكورس</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">

                                       <?php   
                                        
                                        include("configdb.php");

                                        $sql ="SELECT id , name  FROM `courses`  " ;
                       
                                          $result = mysqli_query($conn, $sql);

                                             if($result){

                                                

                                                  echo '<select name="course" required="required">';

                                                while ( $row = $result->fetch_assoc() ) {
                                                    # code...

                                                    echo '
                                            <option value ='.$row["id"].' >'.$row["name"].'</option>';


                                                }

                                                echo "</select>";
                                             }

                                            
                                        ?>

 
                                        
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                       


                       
                        <div>

                            <input type="submit" name="add" value="add" class="btn btn--radius-2 btn--red" type="submit">    
                        </div>
                    </form>
                </div>
                     
                     <center style="color: red"> <?php  echo ($statment);     ?>  </center>

                     <?php   $conn->close(); ?>
            </div>
        </div>
    </div>

   

    <!-- Jquery JS-->
    <script src="addstudentstyle/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="addstudentstyle/vendor/select2/select2.min.js"></script>
    <script src="addstudentstyle/vendor/datepicker/moment.min.js"></script>
    <script src="addstudentstyle/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="addstudentstyle/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->