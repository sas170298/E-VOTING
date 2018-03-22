<?php
include "connect_to_mysql.php";
?>
<?php

if(isset($_POST['email']))
{
	$email=$_POST['email'];
	$password=$_POST['pass'];
	$query="select * from voters where email='$email' AND password='$password'";
	$query_run=mysqli_query($con,$query);
	if(mysqli_num_rows($query_run)>0)
	{
	//valid
//	$_SESSION['username']=$email;
	header('location:homepage.php');
	}
	else
	{//invalid
	echo '<script type="text/javascript">alert("invalid")</script>';
	}
}

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">


	  
	  
  
</head>

<body>
  <div class="form" name="form"  style="background-color:#cc0000;">
     
      
      <div class="tab-content">
        <div id="signup">   
          <h1>LOG IN!</h1>
          
          <form id="form1" action="login2.php" method="post">
          
         <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="email" type="email"required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input name="pass" type="password" required autocomplete="off"/>
          </div>
          
		  
          
		  
          
          <button type="submit" class="button button-block" >Get Started</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>

