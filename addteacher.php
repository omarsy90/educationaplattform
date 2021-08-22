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



<body  dir="rtl">
    <?php  


 include('masterpage.php');


if ($_SESSION['status']=='true') {

    if(  !($_SESSION['roll']=='0')   ){

header('Location: signin.php');

    }

    # code...
}else{

    header('Location: signin.php');
}








  ?>


    
   
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Event Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="addusercode.php">

                       <input type="text" name="page" value="adduser"  style="visibility: hidden;">

                        <div class="form-row m-b-55">
                            <div class="name"> الاسم الكامل</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="fullname" id="name" required >
                                            <label class="label--desc">full name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">اسم المستخدم</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">الايميل</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email">
                                </div>
                            </div>
                        </div>

                             

                              <div class="form-row">
                            <div class="name">كلمة السر</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="password" required>
                                </div>
                            </div>
                        </div>



                        <div class="form-row m-b-55">
                            <div class="name">الهاتف</div>
                            <div class="value">
                                <div class="row row-refine">
                                   
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"> الكورس </div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">

                                       <?php   
                                        
                                        include("configdb.php");

                                        $sql ="SELECT id , name  FROM `courses` WHERE teacher_id IS  NULL OR teacher_id = '0'" ;
                       
                                          $result = mysqli_query($conn, $sql);

                                             if($result){

                                                

                                                  echo '<select name="course">
                                            <option  selected="selected" value="">Choose option</option> ';

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
                        <div class="form-row p-t-20">
                           
                            <div class="p-t-15">
                                
                                <label class="radio-container">teacher
                                    <input type="radio" name="roll" value="1" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div>

                            <button class="btn btn--radius-2 btn--red" type="submit">اضافة</button>
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