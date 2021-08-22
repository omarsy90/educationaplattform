

<!doctype html>


<?php  




  ?>



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


		.btm {
    
    /*Step 2: Basic Button Styles*/
    display: block;
    
    background: #34696f;
    border: 1px solid rgba(33, 68, 72, 0.59);
    
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
<body dir="rtl" >
  
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

 

	<div class="container">
	<header>
		<center><h1>teachers  information </h1></center>
		<p>
			
		</p>
		<hr>
	</header>

	<!-- Table start -->
    <table class="tablemanager" dir="rtl" >
    	<thead>
    		<tr>
				
				<th class="disableSort">الكورس</th>
				<th>الاسم الكامل</th>
				<th> اسم المستخدم</th>
				<th> كلمة السر </th>
				<th> الايميل </th>
				<th>رقم هاتف</th>
				<th class="disableFilterBy">تعديل</th>
				<th class="disableFilterBy">حذف</th>
				
			</tr>
    	</thead>
		<tbody>

           <?php 

          
          Include('configdb.php');

          $sql ="SELECT * FROM `courses` " ;
          $result = mysqli_query($conn, $sql);
          while ( $row = $result->fetch_assoc() ) {
                  
                  echo '<tr>';

                  echo '<td class="prova">'.$row['name'].'</td>';
                
                $sql2= "SELECT * FROM `teachers` WHERE id='".$row['teacher_id']."'" ;
                 $result2 = mysqli_query($conn, $sql2);
                     
                     
                 while ($row2 = $result2->fetch_assoc() ) {
                 	

                              echo '<td class="prova"> '.$row2['fullname'].'</td>';



                               $sql3 = " SELECT * FROM `users` WHERE id ='".$row2['user_id']."'";
                     $result3 = mysqli_query($conn,$sql3);
              while ( $row3=$result3->fetch_assoc()) {

                      
                      echo '<td class="prova">'.$row3['username'].'</td>';
                      echo '<td class="prova">'.$row3['password'].'</td>';
              }


                    
                     echo '<td class="prova">'.$row2['email'].'</td>';
                        echo '<td class="prova">'.$row2['telefonnummer'].'</td>';

                          
                          echo ('<td> <form action="editteacher.php"  method="POST"> <input type="hidden"  name="courseid"  value="'.$row['id'] .'" ><input type="submit" value="edit"  class="btm" ></form>  </td> ');
              echo ('<td> <form action="deleteteacherfromcoursecode.php"  method="POST"><input type="hidden" name="courseid" value="'.$row['id'].'" > <input type="submit" value="delete" class="btm" ></form>  </td> ');
           
             

                 	# code...
                 }
                         
                     
                      echo '</tr>';
                     
               


          }




            ?>



			
		
		</tbody>
	</table>

</div>
    <!-- External jQuery -->
    <script src="tabel2/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="./js/jquery-1.12.3.min.js"></script> -->
	<script type="text/javascript" src="tabel2/tableManager.js"></script>
	<script type="text/javascript">
		// basic usage
		$('.tablemanager').tablemanager({
			firstSort: [[3,0],[2,0],[1,'asc']],
			disable: ["last"],
			appendFilterby: true,
			dateFormat: [[4,"mm-dd-yyyy"]],
			debug: true,
			vocabulary: {
    voc_filter_by: 'Filter By',
    voc_type_here_filter: 'Filter...',
    voc_show_rows: 'Rows Per Page'
  },
			pagination: true,
			showrows: [5,10,20,50,100],
			disableFilterBy: [1]
		});
		// $('.tablemanager').tablemanager();
	</script>
	<script>
try {
  fetch(new Request("tabel2/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "tabel2/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
   // ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>




</body>
</html>
