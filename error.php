<!DOCTYPE html>
<html>
<head>
<style>
body {background-color: #C13232;}
h1   {color: blue;}
p    {color: red;}
</style>
</head>
<body>

<center> <h1> there is an ERROR  !!!</h1> </center>

<?php 

session_start();
include('configdb.php');
$conn->close();
 


 ?>



</body>
</html>

<script type="text/javascript">


  function myFunction(page) {
  
  setTimeout(function(){ redirect(page); }, 3000);

            }


	  function redirect (page){
          
          window.location.href = page;

	}


    

  
	
//wait(2000);


</script>

<?php



if($_SESSION['page']=='addlektion') {



  echo ('  <script type="text/javascript">

   myFunction(page="addlektion.php");
 </script>  ');
}
 elseif ($_SESSION['page']=='courses') {

     

     echo ('  <script type="text/javascript">

   myFunction(page="courses.php");
 </script>  ');

  # code...
 } elseif ($_SESSION['page']=='students') {


  echo ('  <script type="text/javascript">

   myFunction(page="students.php");
 </script>  ');
  # code...
 } elseif ($_SESSION['page']=='addteacher') {

       echo ('  <script type="text/javascript">

   myFunction(page="addteacher.php");
 </script>  ');


  # code...
 } elseif ($_SESSION['page']=='addstudent') {

  echo ('  <script type="text/javascript">

   myFunction(page="students.php");
 </script>  ');
  # code...
 } elseif ($_SESSION['page']=='addalteteacher') {

      
      echo ('  <script type="text/javascript">

   myFunction(page="addalteteacher.php");
 </script>  ');

  # code...
 }elseif ($_SESSION['page']=='teachers') {


      echo ('  <script type="text/javascript">

   myFunction(page="teachers.php");
 </script>  ');
  # code...
 } elseif ($_SESSION['page']=='addcourse') {
          
          echo ('  <script type="text/javascript">

   myFunction(page="addcourse.php");
 </script>  ');

  # code...
 }elseif ($_SESSION['page']=='test') {

    echo ('  <script type="text/javascript">

   myFunction(page="test.php");
 </script>  ');
  # code...
 }




 


?>