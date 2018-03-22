<?php
include "connect_to_mysql.php";
$dynamic_winner="";
			
			$sql=mysqli_query($con,"select * from winner where win='winner'");
			$count=mysqli_num_rows($sql);
			if ($count > 0) 
			{
				while($row = mysqli_fetch_array($sql))
				{
				if($row["flag"]==1)
				{
					$name=$row['winner_name'];
					$votes=$row['votes'];
					$dynamic_winner="The Winner is ".$name. " with ".$votes." votes!";
				}

	   
				}
			}
			else
{
	$dynamic_winner="no winner";
}			
?>	
<!DOCTYPE html>
<html lang="en">

<head>

<style>

</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-VOTING</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >
				    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background-color:black;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
               
                    
<?php $sql=mysqli_query($con,"select * from winner where win='winner'");
			$count=mysqli_num_rows($sql);
			if ($count > 0) 
			{
				while($row = mysqli_fetch_array($sql))
				{
				if($row["flag"]==0)
			{ echo" <a class='navbar-brand page-scroll' href='login.php'><i class='fa fa-check-square'></i> <span class='light'>Login</span> to Vote."; }}}?>
          </a>
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
    <header class="intro" style="background-color:#ebebe0;color:black;">
        <div class="intro-body">
            <div class="container">
                <div class="row">
				
			
                    <div class="col-md-8 col-md-offset-2"><br><br><br><br>
                        <!--<h1 class="brand-heading" >Hey,Have a look!</h1> --><br>
	
<marquee behavior='scroll' direction='left' onmouseover='this.stop();' onmouseout='this.start();'>
							<b><p style="color:black;font-size:22px;"><?php echo"$dynamic_winner"; ?></p></b>
						</marquee>
	
	

<!-- carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner"  >
    <div class="item active">
      <img src="images/car/car11.png" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="images/car/car2.png" alt="Chicago" style="width:100%;height:100%;">
    </div>

    <div class="item">
      <img src="images/car/carss.png" alt="New York" style="width:100%;height:100%;">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<!-- carousel ends-->


                        <p class="intro-text" ></p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center" style="">
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
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>

</body>

</html>
