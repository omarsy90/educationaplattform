

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Table Manager Plugin Example</title>
	<link href="tabel2/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<!-- Include Font Awesome -->
	<link rel="stylesheet" href="tabel2/font-awesome.min.css">
	<!-- Style -->
	<style type="text/css">
		body {
			font-family: "Roboto Condensed", Helvetica, sans-serif;
			background-color: #f7f7f7;
		}
		.container { margin: 150px auto; max-width: 960px; }
		a {

			text-decoration: none;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		table, th, td {
		   border: 1px solid #bbb;
		   text-align: left;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		th {
			background-color: #ddd;
		}
		th,td {
			padding: 5px;
		}
		button {
			cursor: pointer;
		}
		/*Initial style sort*/
		.tablemanager th.sorterHeader {
			cursor: pointer;
		}
		.tablemanager th.sorterHeader:after {
			content: " \f0dc";
			font-family: "FontAwesome";
		}
		/*Style sort desc*/
		.tablemanager th.sortingDesc:after {
			content: " \f0dd";
			font-family: "FontAwesome";
		}
		/*Style sort asc*/
		.tablemanager th.sortingAsc:after {
			content: " \f0de";
			font-family: "FontAwesome";
		}
		/*Style disabled*/
		.tablemanager th.disableSort {

		}
		#for_numrows {
			padding: 10px;
			float: left;
		}
		#for_filter_by {
			padding: 10px;
			float: right;
		}
		#pagesControllers {
			display: block;
			text-align: center;
		}

		label{


			visibility: hidden;
		}


	 input {
    
    /*Step 2: Basic Button Styles*/
    display: block;
    
    background: #34696f;
    border: 2px solid rgba(33, 68, 72, 0.59);
    
    /*Step 3: Text Styles*/
    color: rgba(0, 0, 0, 0.55);
    text-align: center;
    font: bold 20px "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif;
    
    /*Step 4: Fancy CSS3 Styles*/
    background: -webkit-linear-gradient(top, #34696f, #2f5f63);
    background: -moz-linear-gradient(top, #34696f, #2f5f63);
    background: -o-linear-gradient(top, #34696f, #2f5f63);
    background: -ms-linear-gradient(top, #34696f, #2f5f63);
    background: linear-gradient(top, #34696f, #2f5f63);
    
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
</head>
<body dir="rtl">

   <?php

  include('masterpage.php');

if (!$_SESSION['status']=='true') {

    

header('Location: signin.php');

    

    # code...
}


  ?>



	<div class="container">
	<header>
		<center><h1>quizes </h1></center>
		<p>
			
		</p>
		<hr>
	</header>

	<!-- Table start -->
    <table class="tablemanager">
    	<thead>
    		<tr>
				
				<th class="disableSort">الكورس</th>
				<th>عنوان</th>
				<th>التاريخ</th>
				<th>حالة امتحان</th>
				
			</tr>
    	</thead>
		<tbody>

			<?php
               

              
			$roll =$_SESSION['roll'];

			$iduser =$_SESSION['iduser'];



			include('configdb.php');

			if($roll ==2 ){
             
             //code if student

              $sql ="SELECT id FROM students WHERE user_id =".$iduser."" ;

              $result=  mysqli_query($conn,$sql);

              $row = $result->fetch_assoc() ;

              $idstudent =$row['id'];
           
          
                



             $sql = "SELECT * FROM student_and_quizes WHERE student_id=".$idstudent."" ;

              $result = mysqli_query($conn,$sql);



              while ($row = $result->fetch_assoc() ) {

               
               $sql2="SELECT * FROM quizes WHERE id =".$row['quizes_id']."" ;

               $result2 = mysqli_query($conn,$sql2);

                 $row2 = $result2->fetch_assoc() ;
                  
                  
                
                 $sql3=" SELECT name FROM courses WHERE id =".$row2['course_id']."" ;
                 $result3 = mysqli_query($conn,$sql3);
                 $row3 = $result3->fetch_assoc() ;

                   
                   $course = $row3['name'] ;

                    $titel = $row2['titel'] ;
                    
                    $date=$row2['date'];




                 

                 
                      

                  echo('</tr>') ;

                 echo'<td class="prova" >'.$course.'</td>' ;

                 echo '<td class="prova" >'.$titel.'</td>' ;

                 echo '<td class="prova" >'.$date.'</td>' ;

                 if(!$row['status']) {
                   
                   echo'<td><form action="viewtest.php" method="POST"> <input type="hidden" name="idtest" value="'.$row2['id'].'"> <input type="hidden" name="roll" value="'.$roll.'"> <input type="hidden" name="idst" value="'.$idstudent.'"> <input type="submit" value="دخول الامتحان"> </form></td>' ;

             } else {

                 
                 echo('<td style="background-color:#879296"> it has done</td>') ;

         }

     echo('</tr>') ;

                  






          }



		}elseif($roll == 1 ){

       //code if  teacher 



        $sql ="SELECT id FROM teachers WHERE user_id =".$iduser."" ;

              $result=  mysqli_query($conn,$sql);

              $row = $result->fetch_assoc() ;

              $idteacher =$row['id'];
           
          
                



             $sql = " SELECT quizes.id as idq , quizes.titel , quizes.date , courses.name FROM quizes JOIN courses ON quizes.course_id= courses.id WHERE courses.teacher_id=".$idteacher."" ;

              $result = mysqli_query($conn,$sql);



              while ($row = $result->fetch_assoc() ) {

               
              
                

                   
                   $course = $row['name'] ;

                    $titel = $row['titel'] ;
                    
                    $date=$row['date'];




                 

                 
                      

                  echo('</tr>') ;

                 echo'<td class="prova" >'.$course.'</td>' ;

                 echo '<td class="prova" >'.$titel.'</td>' ;

                 echo '<td class="prova" >'.$date.'</td>' ;
                   
                 echo'<td><form action="viewtest.php" method="POST"> <input type="hidden" name="idtest" value="'.$row['idq'].'"> <input type="hidden" name="roll" value="'.$roll.'"><input type="submit" value="دخول الامتحان"  >  </form></td>' ;
             

     echo('</tr>') ;


	}





}elseif($roll==0){

    // code if admin
	
   
            $sql = " SELECT quizes.id as idq , quizes.titel , quizes.date , courses.name FROM quizes JOIN courses ON quizes.course_id= courses.id " ;

            $result = mysqli_query($conn,$sql);

            while ($row = $result->fetch_assoc() ) {

               
              
                

                   
                   $course = $row['name'] ;

                    $titel = $row['titel'] ;
                    
                    $date=$row['date'];




                 

                 
                      

                  echo('</tr>') ;

                 echo'<td class="prova" >'.$course.'</td>' ;

                 echo '<td class="prova" >'.$titel.'</td>' ;

                 echo '<td class="prova" >'.$date.'</td>' ;
                   
                 echo'<td><form action="viewtest.php" method="POST"> <input type="hidden" name="idtest" value="'.$row['idq'].'"> <input type="hidden" name="roll" value="'.$roll.'"> <input type="submit" value="دخول الامتحان"     > </form></td>' ;
             

     echo('</tr>') ;


	}




}


			?>

          


			
		
		</tbody>
	</table>

</div>
    <!-- External jQuery -->
   




</body>
</html>
