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

		iframe{


			margin-left: 10%;
			

			width: 80%;
			height: 800px;
		}


	</style>
</head>
<body>

  
<?php   


include('masterpage.php');


?>
	<div class="container">
	<header>
		<center><h1>quizes </h1></center>
		<p>
			
		</p>
		<hr>
	</header>

	</div>
    <!-- External jQuery -->

    <?php  

    include('configdb.php'); 
      
      $link ;

       $idquiz=$_POST['idtest'];
      



       if($_POST['roll']== '2'){


       $idstudent=$_POST['idst'];
      

       
       


       $sql ="UPDATE `student_and_quizes` SET `status` = '1' WHERE `student_and_quizes`.`student_id` = '".$idstudent."' AND    `student_and_quizes`.`quizes_id` ='". $idquiz."' " ;

       $result = mysqli_query($conn,$sql);

      

     }


     $sql="SELECT link FROM quizes  WHERE id = '".$idquiz."'" ;

      $result = mysqli_query($conn,$sql);

      

      $row = $result->fetch_assoc()  ;

        $link=$row['link'] ;


        echo' <iframe  title="W3Schools Free Online Web Tutorials"  src="'.$link.'">
              </iframe>'

  




       ?>

    
   




</body>
</html>