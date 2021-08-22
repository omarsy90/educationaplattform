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
</head>

<body dir="rtl">
    <br>
    
    
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
                    <h2 class="title">create course</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="addcoursecode.php" enctype="multipart/form-data">
                       
                        <div class="form-row">
                            <div class="name">  الاسم</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">الوصف </div>
                            <div class="value">
                                <div class="input-group">

                                    <textarea class="input--style-5"  cols="40" rows="3" maxlength="150" placeholder="maximum 110 letter" style="font-size: 15px" name="discription"> 

                                    </textarea>
                                  
                                </div>
                            </div>
                        </div>






                         <div class="form-row">
                            <div class="name">اضافة صورة</div>
                            <div class="value">
                                <div class="input-group">

                                  <input type="file" class="input--style-5" id="selphoto" name="imgfile">

                                </div>
                            </div>
                        </div>


                        
                          
                       

                        <div class="form-row">
                            <div class="name">النوع</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="type" >
                                            
                                            <option value="1"> رياضيات</option>
                                            <option value="2"> فيزياء  </option>
                                            <option value="3"> كيمياء </option>
                                            <option value="3"> لغة انجليزي </option>
                                            <option value="3"> عربي </option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                         <div class="form-row">
                            <div class="name">مدرس الكورس</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                       
                                       
                                        <?php   
                                        
                                        include("configdb.php");

                                        $sql ="SELECT id , fullname ,user_id FROM `teachers` " ;
                       
                                          $result1 = mysqli_query($conn, $sql);

                                             if($result1){

                                                

                                                  echo '<select name="teacher">
                                            <option  selected="selected" value="">Choose option</option> ';

                                                while ( $row = $result1->fetch_assoc() ) {
                                                    # code...
                                                     
                                                     $sql ="SELECT id , username  FROM `users` WHERE id = ".$row['user_id']."  " ;

                                                    $result2=  mysqli_query($conn, $sql);
                                                    $row2= $result2->fetch_assoc() ;
                                                    


                                                    echo '
                                            <option value ='.$row["id"].' >'.$row["fullname"]. "  //  ".$row2["username"].'</option>';


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