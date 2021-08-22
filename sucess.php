<!DOCTYPE html>
<html>
<head>
<style>
body {background-color: powderblue;}
h1   {color: blue;}
p    {color: red;}
</style>
</head>
<body>

<center> <h1>you have suceed</h1> </center>



</body>
</html>



<script type="text/javascript">


  function myFunction(page) {
  
  setTimeout(function(){ redirect(page); }, 3000);

            }


	  function redirect (page){
          
          window.location.href = page;

	}

</script>


<?php

session_start();

include('configdb.php');
$conn->close();









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