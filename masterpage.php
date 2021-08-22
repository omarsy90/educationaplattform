
<?php 

session_start();

 
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


  


<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;

}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;

  




}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.admin {

  visibility: hidden;
}


.teacher {

  visibility: hidden;
}

.alle {

visibility: hidden;

}

.out{

  visibility: hidden;
}
</style>
</head>
<body >

<div class="topnav"   >
  <table  dir="rtl" style="margin-left: 0px;">
    
    <tr>
      <td><a  href="index.php" >الصفحة الرئيسية</a></td>

<td class="teacher"> <a href="addlektion.php">اضافة درس</a> </td>

     <td class="alle" > <a href="courses.php">الكورسات</a> </td>
     <td class="admin"> <a href="addcourse.php">اضافة كورس</a> </td>
     <td class="admin"> <a href="teachers.php">المعلمين</a> </td>

     <td class="admin"><a  href="addteacher.php" >اضافة معلم</a></td>
    
     <td class="admin"> <a href="students.php">الطلاب </a> </td>
     <td class="admin"> <a href="addstudent.php">اضافة طالب</a> </td>
      
      
      <td class="admin"> <a href="addaltestudent.php"> اضافة طالب موجود </a> </td>
       
       <td class="teacher"> <a href="addtest.php"> اضافة امتحان</a></td>
       <td class="alle"> <a href="test.php"> امتحانات</a></td>
      

      <td class="in"> <a href="signin.php"> تسجيل الدخول  </a> </td>
      <td class="out"> <a href="signout.php">  تسجيل خروج </a> </td>
     
    </tr>
  </table>
  
</div>

<div style="padding-left:16px">


  <?php 

        


         
       
  

  

   if (isset($_SESSION['status'])) {
                



                echo('  <script type="text/javascript">
    
   var x = document.getElementsByClassName("out");
  var i;
     for (i = 0; i < x.length; i++) {
         x[i].style.visibility = "visible";
           }


  </script> ');



  echo('  <script type="text/javascript">
    
   var x = document.getElementsByClassName("in");
  var i;
     for (i = 0; i < x.length; i++) {
         x[i].style.visibility = "hidden";
           }


  </script> ');
  

      if ($_SESSION['roll']=='0') {

        # code if username is admin

        

          echo('  <script type="text/javascript">
    
   var x = document.getElementsByClassName("admin");
  var i;
     for (i = 0; i < x.length; i++) {
         x[i].style.visibility = "visible";
           }


  </script> ');

  echo('  <script type="text/javascript">
    
   var x = document.getElementsByClassName("teacher");
  var i;
     for (i = 0; i < x.length; i++) {
         x[i].style.visibility = "visible";
           }


  </script> ');

  echo('  <script type="text/javascript">
    
   var x = document.getElementsByClassName("alle");
  var i;
     for (i = 0; i < x.length; i++) {
         x[i].style.visibility = "visible";
           }


  </script> ');


    

      } elseif ($_SESSION['roll']=='1') {
        # code if username is teacher

        

        echo('  <script type="text/javascript">
    
   var x = document.getElementsByClassName("teacher");
  var i;
     for (i = 0; i < x.length; i++) {
         x[i].style.visibility = "visible";
           }


  </script> ');



  echo('  <script type="text/javascript">
    
   var x = document.getElementsByClassName("alle");
  var i;
     for (i = 0; i < x.length; i++) {
         x[i].style.visibility = "visible";
           }


  </script> ');



      } elseif ($_SESSION['roll']=='2') {
        # code if username is student

          

        echo('  <script type="text/javascript">
    
   var x = document.getElementsByClassName("alle");
  var i;
     for (i = 0; i < x.length; i++) {
         x[i].style.visibility = "visible";
           }


  </script> ');


      }

      # code...
    }




    ?>
  






 
 
  
</div><br>

</body>
</html>
