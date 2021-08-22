<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="cardview/card.css">

<style type="text/css">
  
  
  #idcourse  {
    visibility: hidden;


  }

  #edit {
    width: 40%;
  }

  #delet{
    width: 40%;

  }

  .form {

    margin-top: : 30px;
  }


  .fotercard1 {

     background-color: #45a049;
     border-radius: 4px;
     height: 45px;
     width: 100%;
      position: absolute;
      bottom: 50px;
      border: 3px solid #73AD21;
       margin-top: 100px;

  }

  .fotercard2 {
      
      background-color: #33A1FF;
     border-radius: 4px;
     height: 45px;
     width: 100%;
     position: absolute;
     bottom:0px;
      border: 3px solid #33A1FF;
       margin-top: 1px;

  }
  #idlekture{

    visibility: hidden;
  }

  .titel{


    margin-top: 100px;
  }

  .btm {
    
    /*Step 2: Basic Button Styles*/
    
    
    background: #34696f;
    border: 1px solid rgba(33, 68, 72, 0.59);
    
    /*Step 3: Text Styles*/
    color: rgba(0, 0, 0, 0.55);
    
    font: bold 20px "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif;
    
    /*Step 4: Fancy CSS3 Styles*/
    
    
    -webkit-border-radius: 50px;
    -khtml-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    
    -webkit-box-shadow: 0 8px 0 #1b383b;
    -moz-box-shadow: 0 8px 0 #1b383b;
    box-shadow: 0 8px 0 #1b383b;
    
    text-shadow: 0 2px 2px rgba(255, 255, 255, 0.2);
    
}



</style>


	<title></title>
</head>
<body>
  <?php

  include('configdb.php');
  include('masterpage.php');

  


  
  $roll = $_SESSION['roll'] ;

$sql ="SELECT * FROM `lekture` WHERE course_id =".$_POST['idcourse']."" ;


 $result = mysqli_query($conn, $sql);

 echo ('<div class="webinar-grid">');

while ( $row = $result->fetch_assoc() ) {

echo ('<div class="link-block" >');
 
 echo ('<div class="jumbotron left-right-jumbotron-block">');

 echo ('<div class="webinar-image-container">');

 if (!$row['link']) {
     
     $row['foto']='uploads/defult.jpg';
   }

 echo ('<iframe width="100%" height="250px" src="'.$row['link'].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');

echo ('</div> <br>');
   
   

echo ('<div width="70%" class="titel">').$row['titel'].' </div>';




echo ('</div>');

  



  echo ('<div  class="fotercard2"   >');   
         
         /* echo ' <form  action="detilslekture.php" method="post">
<label id="idlekture" >' .$row['id'].'</label> 
<input type="submit" value="DETEILS" id="edit" class="btm">

</form> '; */
 echo ('</div>');


 if ($roll == 0 ||  $roll ==1) {
   

   /* echo ('<div  class="fotercard1"   >');   
         
         echo ' <form  action="editlekture.php" method="post">
<label id="idlekture" >' .$row['id'].'</label> 
<input type="submit" value="EDIT" id="edit"  class="btm">

</form> ';
 echo ('</div>');  */



 }





echo ('</div>');


}


echo ('</div>');




?>






</body>
</html>




