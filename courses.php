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




<!-- cardview -->


<?php 


include('masterpage.php');






if (!$_SESSION['status']=='true') {

    

header('Location: signin.php');

    

    # code...
}











include('configdb.php');



$roll= $_SESSION['roll'];
$userid= $_SESSION['iduser'];


if($roll==0) {


$sql ="SELECT * FROM `courses` " ;


 $result = mysqli_query($conn, $sql);

 echo ('<div class="webinar-grid">');

while ( $row = $result->fetch_assoc() ) {

echo ('<div class="link-block" >');
 
 echo ('<div class="jumbotron left-right-jumbotron-block">');

 echo ('<div class="webinar-image-container">');

 if (!$row['foto']) {
   	 
   	 $row['foto']='uploads/defult.jpg';
   }

 echo ('<img src="'.$row['foto'].'" style="height: 140px">');

echo ('</div>');
   
   

echo ('<div width="70%">').$row['name'].' </div>';




echo ('</div>');

  
  echo ('<div  class="fotercard1"   >');   
         
         echo ' <form  action="lektions.php" method="post">
<input type="hidden" name="idcourse"   value="'.$row['id'].'"> 
<input type="submit" value="ENTER"     id="edit" class="btm">

</form> ';


  echo ('</div>');



  echo ('<div  class="fotercard2"   >');   
         
         echo ' <form  action="detilscourse.php" method="post">
<input type="hidden" id="idcourse" value="'.$row['id'].'" name="idcourse" >
<input type="submit" value="DETEILS"   id="edit"  class="btm">

</form> ';


  echo ('</div>');


echo ('</div>');


}


echo ('</div>');


}
elseif ($roll==1) {

//$userid=1;

$sql ="SELECT id FROM `teachers` WHERE user_id ='".$userid."' " ;


 $result = mysqli_query($conn, $sql);
 


$teacherid = -1 ;
while ( $row = $result->fetch_assoc() ) {

 $teacherid = $row['id'] ;


}



$sql ="SELECT * FROM `courses` " ;


 $result = mysqli_query($conn, $sql);

 echo ('<div class="webinar-grid">');

while ( $row = $result->fetch_assoc() ) {

echo ('<div class="link-block">');
 
 echo ('<div class="jumbotron left-right-jumbotron-block">');

 echo ('<div class="webinar-image-container">');

 if (!$row['foto']) {
   	 
   	 $row['foto']='uploads/defult.jpg';
   }

 echo ('<img src="'.$row['foto'].'" style="height: 140px">');

echo ('</div>');
   
   

echo ('<div width="70%">').$row['name'].' </div>';




echo ('</div>');

  

   if ($row['teacher_id']==$teacherid ) {


   	echo ('<div  class="fotercard1"   >');   
         
         echo ' <form  action="lektions.php" method="post">
<input type="hidden" name="idcourse"   value="'.$row['id'].'">
<input type="submit" value="  ENTER "       id="edit"  class="btm">

</form> ';


  echo ('</div>');
   	

   }
  



  echo ('<div  class="fotercard2"   >');   
         
         echo ' <form  action="detilscourse.php" method="post">
<input type="hidden" id="idcourse" value="'.$row['id'].'" name="idcourse" >
<input type="submit" value=" DETEILS "      id="edit" class="btm">

</form> ';


  echo ('</div>');


echo ('</div>');


}

echo "</div>";









	
}

elseif ($roll==2) {

	# code...
    $sql ="SELECT id FROM `students` WHERE user_id ='".$userid."' " ;


 $result = mysqli_query($conn, $sql);

$studentid=0;
while ( $row = $result->fetch_assoc() ) {
  
 $studentid = $row['id'] ;

}

$arraycourses =array();

$sql= "SELECT course_id from students_and_courses  WHERE student_id = '".$studentid."'" ;

$result = mysqli_query($conn,$sql);

if ($result) {

	while ( $row = $result->fetch_assoc() ) {

		array_push($arraycourses, $row['course_id']);


	}
	
}






$sql=" SELECT * FROM courses " ;

$result = mysqli_query($conn, $sql);






//var_dump($result);



echo ('<div class="webinar-grid">');

while ( $row = $result->fetch_assoc() ) {

echo ('<div class="link-block">');
 
 echo ('<div class="jumbotron left-right-jumbotron-block">');

 echo ('<div class="webinar-image-container">');

 if (!$row['foto']) {
   	 
   	 $row['foto']='uploads/defult.jpg';
   }

 echo ('<img src="'.$row['foto'].'" style="height: 140px">');

echo ('</div>');
   
   

echo ('<div width="70%">').$row['name'].' </div>';




echo ('</div>');

  

   if (  in_array($row['id'], $arraycourses) ) {


   	echo ('<div  class="fotercard1"   >');   
         
         echo ' <form  action="lektions.php" method="post">
<input type="hidden" name="idcourse"   value="'.$row['id'].'">
<input type="submit" value="  ENTER "  id="edit" class="btm">

</form> ';


  echo ('</div>');
   	

   }
  



  echo ('<div  class="fotercard2"   >');   
         
         echo ' <form  action="detilscourse.php" method="post">
<input type="hidden" id="idcourse" value="'.$row['id'].'" name="idcourse" >
<input type="submit" value="DETEILS "    id="edit"  class="btm">

</form> ';


  echo ('</div>');


echo ('</div>');


}



echo ('</div>');


}




  ?>





<!--
<div class="webinar-grid">

  <div class="link-block">
    <div class="jumbotron left-right-jumbotron-block">
      <div class="webinar-image-container">
        <img src="cardview/1.jpg" style="height: 140px">
      </div>
      <h1 class="dundas-blue-text-long">
     نوفر ارخص الاسعار
    </h1>



      <div class="webinar-content-box">
        <p>We’ll show you how Dundas BI lets you use all of the existing data connections to inject data into R and then visualize and interact with the results in Dundas BI so more people get faster insights and make better decisions.</p>
        <span class="dundas-blue-link">View webinar &gt;</span>
      </div>
    </div>


        
    <div  class="fotercard">  -->


      <?php  /*

      session_start();
      session_unset();

      $_SESSION["useridentety"]='2';

     $useridentety = $_SESSION["useridentety"] ;



      if ($useridentety==1) {


         $var =5;

      echo ' <form  action="editcourse.php" method="post">
<label id="idcourse">' .$var.'</label> 
<input type="submit" value="edit" id="edit">

</form> ';   

echo ' <form   action="deletcourse.php" method="post"  class="form" >

  <label      id="idcourse">' .$var.'</label> 
  <input type="submit" value="delet"  id="delet">

</form>';
     
     
        
      } */

      


        ?>

      


<!--
</div>

  </div>

-->

  











</body>
</html>