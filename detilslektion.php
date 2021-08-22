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
          top: 10px;
          width: 100%;

         }
     </style>

</head>

<body>
    <br>
    <br><br>




    <?php 

//var_dump($_POST);
//exit();

$roll=0;

$idlektion =3 ; //$_POST['idlektion'];

include('configdb.php') ;

$titel ;
$discription;
$link='';
$course='';



$sql = "SELECT * FROM lekture WHERE id ='".$idlektion."'" ;

$result = mysqli_query($conn, $sql);
 while ( $row = $result->fetch_assoc() ) {
  
  $link=$row['link'];

  if(!$link){

  $src='uploads/defult.jpg' ;
}


  $titel=$row['titel'];
  $discription=$row['discrition'];

     




  $sql2 = "SELECT * FROM courses WHERE id ='".$row['course_id']."'" ;
  $result2 = mysqli_query($conn, $sql2);



  if($result2){

  while($row2 = $result2->fetch_assoc()){

    $course=$row2['name'] ;


}

}


}





?>

    
   
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50 edit" >
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">create course</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="updatelektioncode.php" enctype="multipart/form-data">

                          <input type="hidden" name="idlektion" value="<?php echo($idlektion) ;   ?>">

                         <div class="form-row">
                            <div class="name"> </div>
                            <div class="value">
                                <div class="input-group" >
                                  <?php
                                    echo ('<iframe width="100%" height="250px" src="'.$link.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');

                                      ?>
                                
                                     
                                    
                                </div>
                            </div>
                        </div>






                       
                        <div class="form-row">
                            <div class="name"> titel</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="name" value="<?php echo($titel);   ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">discription </div>
                            <div class="value">
                                <div class="input-group">

                                    <textarea class="input--style-5"  cols="50" rows="3" maxlength="150" placeholder="maximum 110 letter" style="font-size: 15px" name="discription"> 
                                        <?php  echo($discription);   ?>

                                    </textarea>
                                  
                                </div>
                            </div>
                        </div>






                         <div class="form-row">
                            <div class="name">link</div>
                            <div class="value">
                                <div class="input-group">

                                  <input type="input" class="input--style-5" id="selphoto" name="link" value="<?php echo($link);  ?>" >

                                </div>
                            </div>
                        </div>


                        
                          
                       

                        <div class="form-row">
                            <div class="name">course</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">

                                        <select name="course" >
                                         
                                         <?php
                                         
                                         $ch='';

                                            $sql6="SELECT * FROM courses " ;

                                             $result6 = mysqli_query($conn, $sql6);

                                             while ( $row6 = $result6->fetch_assoc() ) {

                                                 if($row6['name']==$course){
   
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



                         




                      
                        <div>

                            <button class="btn btn--radius-2 btn--red" type="submit" style="background-color: blue">update</button>
                        </div>
                    </form>

                    <form action="deletelektioncode.php" style="margin-top: 10px;" method="POST">   
                       <input type="hidden" name="idlektion" value="<?php echo($idlektion)  ?>">
                      <button class="btn btn--radius-2 btn--red" type="submit">delete</button>

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
                                   echo ('<iframe width="100%" height="250px" src="'.$link.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
                                    
                                    ?>
                                </div>
                            </div>
                          
                            







                        <div class="form-row">
                            <div class="name"> name</div>
                            <div class="value">
                                <div class="input-group">
                                 <h4>   <label> <?php  echo($titel)  ;  ?>   </label> </h4>
                                </div>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="name">discription </div>
                            <div class="value">
                                <div class="input-group">

                                    <textarea class="input--style-5"  cols="40" rows="5" maxlength="150"  style="font-size: 15px" name="discription" style="width: 90% " disabled="disabled"> 
                                             
                                             <?php  echo($discription)  ;  ?> 

                                    </textarea>
                                  
                                </div>
                            </div>
                        </div


                        
                          
                       

                        <div class="form-row">
                            <div class="name">course</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                      <h3><label> <?php  echo($course) ;   ?> </label></h3> 
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                         




                      
                      <?php 
                       
                       if($roll==0){


                       echo(' <div >
                        <button class="btn btn--radius-2 btn--red"  onclick="editplay()"  style="margin-bottom: 5px;margin-left: 10px;" >edit</button>
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