<!DOCTYPE html>
<html lang="ar">


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
     
     <style type="text/css">
         
         .edit{

            visibility: hidden;
         }

         .view{

          position: absolute;
          top: 50px;
          width: 100%;

         }
     </style>

</head>

<body dir="rtl">
    <br>
    <br><br>




    <?php 

//var_dump($_POST);
//exit();
include('masterpage.php');

echo "<br><br><br>";
$roll=$_SESSION['roll'];

$idcourse = $_POST['idcourse'];

include('configdb.php') ;

$name ;
$src;
$discription;
$type='';
$teacher='';



$sql = "SELECT * FROM courses WHERE id ='".$idcourse."'" ;

$result = mysqli_query($conn, $sql);
 while ( $row = $result->fetch_assoc() ) {
  
  $src=$row['foto'];

  if(!$src){

  $src='uploads/defult.jpg' ;
}

  $name=$row['name'];
  $discription=$row['discrition'];

     




  $sql2 = "SELECT * FROM teachers WHERE id ='".$row['teacher_id']."'" ;
  $result2 = mysqli_query($conn, $sql2);



  if($result2){

  while($row2 = $result2->fetch_assoc()){

    $teacher=$row2['fullname'] ;


}

}


  
 $sql3 = "SELECT * FROM type_material WHERE id ='".$row['type_id']."'" ;
  $result3 = mysqli_query($conn, $sql3);
    
  if($result3){

  while($row3 = $result3->fetch_assoc()){

    $type=$row3['name'] ;


}
}







}





?>

    
   
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50 edit" >
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    
                </div>
                <div class="card-body">
                    <form method="POST" action="updatecoursecode.php" enctype="multipart/form-data">



                         <div class="form-row">
                            <div class="name"> </div>
                            <div class="value">
                                <div class="input-group" >
                                    <?php
                                         echo '<img src="'.$src.'" style="width: 100%;"  >' ;
                                    ?>

                                     <input type="hidden" name="src" value="<?php echo($src) ;   ?>">
                                     <input type="hidden" name="idcourse" value="<?php echo($idcourse) ;   ?>">
                                    
                                </div>
                            </div>
                        </div>






                       
                        <div class="form-row">
                            <div class="name"> الاسم</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="name" value="<?php echo($name);   ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">الوصف </div>
                            <div class="value">
                                <div class="input-group">

                                    <textarea class="input--style-5"  cols="50" rows="3" maxlength="150" placeholder="maximum 110 letter" style="font-size: 15px" name="discription"> 
                                        <?php  echo($discription);   ?>

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
                                         
                                         <?php
                                         
                                         $ch='';

                                            $sql6="SELECT * FROM type_material " ;

                                             $result6 = mysqli_query($conn, $sql6);

                                             while ( $row6 = $result6->fetch_assoc() ) {

                                                 if($row6['name']==$type){

                                                 $ch="selected" ;
                                                  

                                             }
                                                
                                                echo(' <option value="'.$row6['id'].'"'.$ch.'>'.$row6['name'].'</option>') ;
                                                 
                                                 $ch='';

                                         }

                                           ?>

                                        
                                            
                                            
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

                                        $sql4 ="SELECT id , fullname ,user_id FROM `teachers` " ;
                       
                                          $result4 = mysqli_query($conn, $sql4);

                                             if($result4){

                                                

                                                  echo '<select name="teacher">
                                            <option  selected="selected" value="">Choose option</option> ';

                                                while ( $row4 = $result4->fetch_assoc() ) {
                                                    # code...
                                                     
                                                     $sql5 ="SELECT id , username  FROM `users` WHERE id = ".$row4['user_id']."  " ;

                                                    $result5=  mysqli_query($conn, $sql5);
                                                    $row5= $result5->fetch_assoc() ;
                                                    
                                                         if($row4['fullname']==$teacher) {

                                                         $ch="selected";


                                                     }

                                                    echo '
                                            <option value ="'.$row4["id"].'"   ' .$ch. '>'.$row4["fullname"]. "  //  ".$row5["username"].'</option>';
                                                  
                                                  $ch='';

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

                            <button class="btn btn--radius-2 btn--red" type="submit" style="background-color: blue">تحديث</button>
                        </div>
                    </form>

                    <form action="deletecoursecode.php" style="margin-top: 10px;" method="POST">   
                       <input type="hidden" name="idcourse" value="<?php echo($idcourse)  ?>">
                      <button class="btn btn--radius-2 btn--red" type="submit">حذف</button>

                    </form>
                </div>
            </div>
        </div>
    </div>






<!--  this templete for view only -->



     <div class="page-wrapper bg-gra-03 p-t-45 p-b-50 view">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">information about course</h2>
                </div>
                <div class="card-body">
                    
                        

             <div class="form-row">
                            <div class="name"> </div>
                            <div class="value">
                                <div class="input-group" >
                                    <?php
                                         echo '<img src="'.$src.'" style="width: 100%;">' ;
                                    ?>
                                    
                                </div>
                            </div>
                            







                        <div class="form-row">
                            <div class="name"> اسم</div>
                            <div class="value">
                                <div class="input-group">
                                 <h4>   <label> <?php  echo($name)  ;  ?>   </label> </h4>
                                </div>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="name"> الوصف </div>
                            <div class="value">
                                <div class="input-group">

                                    <textarea class="input--style-5"  cols="40" rows="5" maxlength="150"  style="font-size: 15px" name="discription" style="width: 90% " disabled="disabled"> 
                                             
                                             <?php  echo($discription)  ;  ?> 

                                    </textarea>
                                  
                                </div>
                            </div>
                        </div


                        
                          
                       

                        <div class="form-row">
                            <div class="name"> النوع</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                       <label> <?php  echo($type) ;   ?> </label>
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
                                       
                                       
                                   <h3> <label> <?php  echo($teacher) ;   ?></label> </h3>
                                       
                                      


                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>




                      
                      <?php 
                       
                       if($roll==0){


                       echo(' <div >
                        <button class="btn btn--radius-2 btn--red"  onclick="editplay()">تعديل</button>
                        </div> ')   ; 
                        
                   }

                   ?>
                       

                       

                    
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

    <script type="text/javascript">

        function editplay() {
                
                document.getElementsByClassName("edit")[0].style.visibility="visible" ;

                document.getElementsByClassName("view")[0].style.visibility="hidden"

  
                 }
        
       

    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->