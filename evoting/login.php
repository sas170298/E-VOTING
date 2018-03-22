<?php
include "connect_to_mysql.php";
session_start();
?>

<?php
if (isset($_POST["sap_id"]) && isset($_POST["pass"]))
{
	$sap = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["sap_id"]);
	$pass = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["pass"]);
	$query="select * from voters where sap_id='$sap' AND password='$pass'";
	$query_run=mysqli_query($con,$query);
	if(mysqli_num_rows($query_run)>0)
	{
	//valid
//	$_SESSION['username']=$email;
	header('location:homepage.php');
	}
	else
	{//invalid
	header('location:invalid.php');
	}
	
}

?>

<?php
if(isset($_POST["sap_id"]))
{	
	//$emailyo = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["email"]);
	
	//$email = $_POST["email"];
	//$username = strstr($email, '@', true);
	//$username = substr($email, 0, strpos($email, '@'));
	$_SESSION["username"]=$_POST["sap_id"];
}
?>


<?php 

if (isset($_POST["email"]) && isset($_POST["sap"])) {

	$first = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["first"]);
	$last = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["last"]);
	$year = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["year"]);
	$sap = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["sap"]); // filter everything but numbers and letters
    //$email = $_POST["email"];
	$email = preg_replace('#[^A-Za-z0-9@.]#i', '', $_POST["email"]);

    $sql = mysqli_query($con,"SELECT sap_id FROM students WHERE sap_id='$sap' AND email='$email' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysqli_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the countss
	     while($row = mysqli_fetch_array($sql)){ 
             $id = $row["sap_id"];
		 }
		 $_SESSION["sap_id"] = $id;
		 $_SESSION["first_name"] = $first;
		 
		 $ran=rand();
		 $sqlCommand = "INSERT INTO voters (sap_id, first_name, last_name, email, password, year) VALUES ('$sap','$first','$last','$email','$ran','$year');";
		$query=mysqli_query($con,$sqlCommand);
		
		//	$mysql=mysqli_query($con,"insert into products(product_name,price,category,subcategory,details,date_added)
		//values('$product_name','$price','$category','$subcategory','$details',now())")or die();
		 
		 mail($email,'password for voting!','Your password is'+$ran,'from:sas170298@gmail.com');
		 header("location:login.php ");
         exit();
    } else {
	
		header("location:invalid.php");
		exit();
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
<style>

</style>

	  
	  
  
</head>

<body>
  <div class="form" name="form"  >
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form id="form1" action="login.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input  name="first" type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input name="last" type="text"required autocomplete="off"/>
            </div>
          </div>
		  
		
		  
		  
		<!--  <div class="field-wrap">
            <label>
              Year<span class="req">*</span>
            </label>
             <select name="year" required autocomplete="off">
				<option value="FE">FE</option>
				<option value="SE">SE</option>
				<option value="TE">TE</option>
				<option value="BE">BE</option>
			</select>   
          </div>
		  -->

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="email" type="email"required autocomplete="off"/>
          </div>
          
		    <div class="field-wrap">
		   <h2 style="color:white;">Year:</h2><select name="year" required autocomplete="off">
				<option value="FE">FE</option>
				<option value="SE">SE</option>
				<option value="TE">TE</option>
				<option value="BE">BE</option>
			</select> 
			
		  </div>
		   <div class="field-wrap">
            <label>
              Sap ID<span class="req">*</span>
            </label>
            <input name="sap" size="3" type="int" required autocomplete="off"/>
          </div>
          
		  
          
          <button type="submit" class="button button-block">Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="login.php" method="post">
          
            <div class="field-wrap">
            <label>
              Sap ID<span class="req">*</span>
            </label>
            <input name="sap_id" type="number"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input name="pass" type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot" ><a href="#">Forgot Password?</a></p>
          
          <button name="login" class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
