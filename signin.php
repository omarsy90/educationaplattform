<html>

<head>
  <link rel="stylesheet" href="signin/style.css">
  <link href="signin/sign1.css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <title>Sign in</title>
</head>

<body>

   <?php  


 include('masterpage.php');

          $brief='';


         if (isset($_POST['signin'])) {
            
            include('configdb.php');
            
            $username =$_POST['username'];
             $password=$_POST['password'];
              $roll='';

             $sql ="SELECT * FROM users WHERE username ='".$username."' AND password ='".$password."'";

             $result = mysqli_query($conn, $sql);
              $row = $result->fetch_assoc();

              
              

            if ($row) {
      
            
            $_SESSION['status']='true' ;
          $_SESSION["username"] = $row['username'];
          $_SESSION["roll"] =  $row['roll_id'];
          $_SESSION["iduser"]=$row['id'] ;

          header('Location: courses.php');
    }


     else{

        $brief=" username or passwort ist not correct ";



    } 

    



         }
       
    
   



         
  ?>
  <div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1"  method="POST">
      <input class="un " type="text" align="center" placeholder="Username"  name="username">
      <input class="pass" type="password" align="center" placeholder="Password"  name="password">

      <input type="submit"   name="signin" value="Submit"  class="submit" align="center"><br><br>

      <center style="color: red"> <?php  echo ($brief);     ?></center>

     
        <!--       <p class="forgot" align="center"><a href="#">Forgot Password?</p>  -->
            
                
    </div>
     
</body>

</html>