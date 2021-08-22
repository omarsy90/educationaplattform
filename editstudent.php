<!DOCTYPE html>
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

<body>
    <br>
    <br><br>

    <?php  
       
    include('configdb.php');

   include('masterpage.php');

 //var_dump($_POST);
// exit();
 $id=0;
 $idstudent;
 $iduser;
 $name;
 $telefon;
 $email;
 $username;
 $password;


 $sql="SELECT * FROM students_and_courses WHERE id='".$_POST['id']."'" ;
 $result = mysqli_query($conn,$sql);

 while ( $row=$result->fetch_assoc()) {


      $sql2="SELECT * FROM students WHERE id='".$row['student_id']."'" ;

                $result2 = mysqli_query($conn,$sql2);

                    while ( $row2=$result2->fetch_assoc()) {
                    
                    $idstudent=$row2['id'];
                    $name=$row2['name'];
                    $telefon=$row2['telefonnummer'] ;
                    $email=$row2['email'];



                     
                     $sql3="SELECT * FROM users WHERE id='".$row2['user_id']."'" ;

                $result3 = mysqli_query($conn,$sql3);

                while($row3=$result3->fetch_assoc())  {

                        $iduser=$row3['id'] ;

                      $username=$row3['username'] ;
                      $password=$row3['password'];


            }





                }



                      
                                   }
  



      ?>

    
   
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Event Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="editstudentcode.php">

                       <input type="text" name="page" value="adduser"  style="visibility: hidden;">

                        <div class="form-row m-b-55">
                            <div class="name">full name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="fullname" id="name" required  value="<?php echo($name);  ?>">
                                            <label class="label--desc">full name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">user name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username" required  value="<?php echo($username);  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email"  value="<?php echo($email);  ?>">
                                </div>
                            </div>
                        </div>

                             

                              <div class="form-row">
                            <div class="name">password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="password" required   value="<?php echo($password);   ?>">
                                </div>
                            </div>
                        </div>



                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                   
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone"  value="<?php echo($telefon) ;    ?>">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                        <div class="form-row p-t-20">
                            <label class="label label--block">Are you an existing customer?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">student
                                    <input type="radio" checked="checked" name="roll" value="2">
                                    <span class="checkmark"></span>
                                </label>
                               
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="idstudent" value="<?php echo($idstudent)  ?>">
                            <input type="hidden" name="iduser" value="<?php echo($iduser)  ?>">
                            <button class="btn btn--radius-2 btn--red" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
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