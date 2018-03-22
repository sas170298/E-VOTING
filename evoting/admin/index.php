<?php 

session_start();
if (isset($_SESSION["manager"])) {
    header("location: hello.php"); 
    exit();
}

?>
<?php 

// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
    include "../connect_to_mysql.php"; 
    $sql = mysqli_query($con,"SELECT id FROM admin WHERE username='$manager' AND password='$password' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysqli_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the count
	     while($row = mysqli_fetch_array($sql)){ 
             $id = $row["id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["manager"] = $manager;
		 $_SESSION["password"] = $password;
		 header("location: hello.php");
         exit();
    } else {
		echo '<br><br><center><h3>The information added is wrong.<a href="index.php">click here to login again!</a></h3></center>';
		exit();
		
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="../css/grayscale.min.css" rel="stylesheet">
	
	
	<style>
body{
	background-image: url("../images/car/admin.jpg");

}
</style>

   
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background-color:black;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                  <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
				
                </ul>
				
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro" style="background-color:;">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"><br><br><br><br>
					<br>
                       <div style="width:500px;height:auto;background-color:white;">
						<p style="background-color:black;padding:12px;font-size:35px;"> Admin Panel Login</p>    
						<br>
						
						
						
						<form id="form1" name="form1" method="post" action="index.php">
							<p style="color:black;">Username: 
							<input type="text" name="username" style="color:black;"/></p>
						
							<p style="color:black;">Password: 
							<input type="password" name="password" style="color:black;"/></p>
					   <br>
							<input type="submit" value="Login" name="login" style="color:black;font-size:2s0px;width:250px;"/>
							
					   </form>
					 <br><br>
					   </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
 <!-- About Section -->
 
 
 
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About E-VOTING.</h2>
                <p>E-VOTING is a web-based online voting system that will help you manage your elections easily and securely.</p>
				<p>It allows you to vote online without the need of an EVM. Just simply login and vote for your favourite candidate within seconds without having the need to go anywhere.</p>
                <p>WHY CHOOSE US? Secure, Reliable and Flexible.</p>
             
            </div>
        </div>
    </section>

    <!-- Download Section -->
  <!--  <section id="download" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Download Grayscale</h2>
                    <p>You can download Grayscale for free on the preview page at Start Bootstrap.</p>
                    <a href="http://startbootstrap.com/template-overviews/grayscale/" class="btn btn-default btn-lg">Visit Download Page</a>
                </div>
            </div>
        </div>
    </section>
-->

    <!-- Contact Section -->
  <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact Us!</h2>
                <p>Feel free to email us to provide some feedback or give us suggestions, or to just say hello!</p>
                <p><a href="mailto:feedback@startbootstrap.com">evoting201718@gmail.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                <!--    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
				-->	
                </ul>
            </div>
        </div>
    </section>
	
    <!-- Map Section -->
<!--    <div id="map"></div>  --> 

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Our Website 2017</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Theme JavaScript -->
    <script src="../js/grayscale.min.js"></script>

</body>

</html>
