<?php
session_start();
 include "../connect_to_mysql.php";

?>

<?php
	if(isset($_POST['logout']))
	{
		session_destroy();
		header('location:index.php');
		exit();
	}
?>

<?php
	if(isset($_POST['rem_can']))
	{
		$sql=mysqli_query($con,"truncate table candidates");
		$sql2=mysqli_query($con,"truncate table tp3");
		$sql3=mysqli_query($con,"truncate table voted");
		$sql4=mysqli_query($con,"update table winner set flag=0 where win='winner'");
		$sql4=mysqli_query($con,"update table winner set votes=0 where win='winner'");
		$sql4=mysqli_query($con,"update table winner set winner_name=NULL where win='winner'");
		header("location:hello.php#form1");
	}
?>

<?php
/*if(isset($_POST['can_name']))
{
	$name=$_POST['can_name'];
	$sql=mysqli_query($con,"insert into tp3(c_name) values 'aisha' ");
}*/
?>

<?php
	if(isset($_POST['dec_win']))
	{
		$s=mysqli_query($con,"select * from candidates where votes=(select max(votes) from candidates)");
		$row=mysqli_fetch_array($s);
		$s2=mysqli_real_escape_string($con,$row["name"]);
		$s3=mysqli_real_escape_string($con,$row["votes"]);
		
		
		$sql=mysqli_query($con,"UPDATE winner set flag=1 where win='winner'");
		$sql2=mysqli_query($con,"UPDATE winner set winner_name='$s2' where win='winner'");
		$sql3=mysqli_query($con,"UPDATE winner set votes='$s3' where win='winner'");
	}
	
?>

<?php
//parse the form data and add inventory item to the system
if(isset($_POST['submit_btn']))
{
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$info=mysqli_real_escape_string($con,$_POST['info']);
	$id=mysqli_real_escape_string($con,$_POST['id']);
	
	$sql="select id from candidates where name='$name' LIMIT 1";
	$mysql=mysqli_query($con,$sql);
	$matchcount=mysqli_num_rows($mysql);
	if($matchcount>0)
	{
		echo "sorry you tried to put a duplicate candidate. try again <a href='hello.php#form1'>click here</a>";
		exit();
		
	}else{
		
		
		
	//for candidate image
    function GetImageExtension($imagetype)
     {
		if(empty($imagetype)) return false;
		switch($imagetype)
       {

           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
	}

      
if (!empty($_FILES["uploadedimage"]["name"])) 
{
    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=$id.$ext;
    $target_path = "../images/".$imagename;
move_uploaded_file($temp_name, $target_path); 
/*
     $query_upload="INSERT into candidates (image_path,submission_date) VALUES
('.$target_path.','.date(\"Y-m-d\").')";
    mysqli_query($con,$query_upload) or die("error in $query_upload == ----> ".mysqli_error($con)); */
	$target_path = "images/".$imagename;

   $mysql=mysqli_query($con,"insert into candidates(name,info,sap,image_path)
		values('$name','$info','$id','$target_path')")or die();
		
		$sql1=mysqli_query($con,"insert into tp3(c_name) values ('$name') ");  


}

	}
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
<style>
body{
	background-image: url("../images/car/admin.jpg");

}
</style>

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
                        <a class="page-scroll" href="#about">Add Candidates</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="../bargraph.html">View Election</a>
                    </li>
					<li>
                        <a class="page-scroll" href="../comparison.php">View Comparison</a>
                    </li>
					
					<li>
                  <a class="page-scroll" >    <form action="hello.php" method="post">  <input type="submit" name="rem_can" value="NEW ELECTION" style="background-color:black;color:white;border:none;"/></form></a>
                    </li>
					
					<li>
                  <a class="page-scroll">    <form action="hello.php" method="post">  <input type="submit" name="dec_win" value="STOP ELECTION" style="background-color:black;color:white;border:none;"/></form></a>
                    </li>
					
					<li>
                        
						
					<a class="page-scroll">	<form action="hello.php" method="post"><input name="logout" type="submit" id="logout_btn" value="LOGOUT" style="background-color:black;color:white;border:none;"/></form></a>
						
						
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
                     
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
 <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
			<center>
                <div style="background-color:white;height:75%;width:50%;">
				
				
	<form name="form1" id="form1" action="hello.php" method="post" enctype="multipart/form-data" style="color:black;">
	<br><br>
		
<h4><u>ENTER CANDIDATE DETAILS</u></h4>	
					<fieldset><input type="text" placeholder="candidate name" name="name" tabindex="1"/></fieldset>
					<br><br>
					
					<fieldset>
					<textarea   placeholder="Candidate detail" tabindex="5" name="info"></textarea></fieldset>
					<br /><br>

					<input name="uploadedimage" placeholder="photo" type="file"/>
					<br><br>
					

					<input type="text" name="id" placeholder="sap id"/><br>
					<br><br>
					
					
					<input type="submit" name="submit_btn" />

					<br><br>
	</center>			
	
    
 </form>

				
				
				
				
				</div>
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