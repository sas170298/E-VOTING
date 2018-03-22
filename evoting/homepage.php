<?php
include "connect_to_mysql.php";
session_start();
?>

<?php
if(isset($_POST['more']))
{
if(isset($_POST['can_sap']))
{
	$sap=$_POST['can_sap'];
	$sql=mysqli_query($con,"select * from candidates where sap='$sap'");
}
}
?>

<?php
	if(isset($_POST['user_logout']))
	{
		session_destroy();
		header('location:index.php');
		exit();
	}
?>

<?php
$dynamiclist="";
$candidate_image="";
$sql=mysqli_query($con,"select * from candidates");
$count=mysqli_num_rows($sql);
if($count>0)
{
	$count = 0;
		while($row=mysqli_fetch_array($sql))
		{
			$sap=$row["sap"];
			$name=$row["name"];
			$info=$row["info"];
			$image=$row["image_path"];
			//$candidate_image='<tr><img src='.$row["image_path"].' alt="cand"></tr>';
			
			
			$dynamiclist .='<form action="./homepage.php" method="post"><table class="tableCSS" width="100%" cellpadding="6" border="1" >
			<tr ><td width="25%"> <img src=" '.$image.'" alt="cand" style="width:200px;"></td>
				<input type="hidden" value="'.$sap.'" name="can_sap">
				<td width="75%" style="padding-left:5px;">' . $sap . '</br>
				' . $name . '<br>
				
				</br>
				
				<input name="vote" class="buttons" type="submit" value="VOTE"></input>
	
		
	
		</form>
			<button class="buttons"><a href="#loginScreen'.$count.'" class="" style="color:black;"> KNOW MORE</a></button>	
	<br><br><br><br>
	
				
				<br></td>
			
		</tr>	
			</table><br>   

<div id="loginScreen'.$count.'" style="margin:0 auto;" >
    <a href="homepage.php" class="cancel">&times;</a>
	
	
	
  <center>
    <img src="images/'.$sap.'.jpg" width="142" height="188" alt="" /><br>
	
      <a href="images/'.$sap.'.jpg" style="color:red;">View Full Size Image</a><br>
    <h4> '.$name.' </h4>
      <p> '.$info.'<br />
        <br>
        
        

        </p>
	
      
   </center> 


   
</div> 

<div id="cover" >
</div>';

echo '<style>
	#loginScreen'.$count.'
{
    height:380px;
    width:340px;
    margin:0 auto;
    position:relative;
    z-index:10;
    display:none;
	background: #fff;
	border:5px solid #cccccc;
	border-radius:10px;
}
#loginScreen'.$count.':target, #loginScreen'.$count.':target + #cover{
    display:block;
    opacity:2;
}
	</style>';
	
	
	
			
	$count += 1;			
	}
				
}
//<a href="details.php?id=' . $sap . '" style="color:black;">KNOW MORE</a>
else{ $dynamiclist="no candidate as of yet";
}

if(isset($_POST['can_sap']))
{
	$sap=$_POST['can_sap'];
	$sql=mysqli_query($con,"select name from candidates where sap='$sap'");
	$count=mysqli_num_rows($sql);
	if($count>0)
	{
		//echo 'count > 0'; 
		$em=$_SESSION['username'];
		echo "<h1>".$em."</h1>";
		$s=mysqli_query($con,"select * from voted where sap='$em'");
		$ch=mysqli_num_rows($s);
		if($ch>0)
		{
			//echo "YOU HAVE ALREADY VOTED!";
			header("location:already_voted.php");
			//header("location:index.php");
		}
		else
		{
	
		$sql=mysqli_query($con,"UPDATE candidates SET votes = (votes+1) WHERE sap = '$sap'");
		$em=$_SESSION["username"];
		//$in=mysqli_query($con,"SELECT sap_id from voters where email='$em'");
		$sql=mysqli_query($con,"INSERT INTO voted (sap) values ($em)");	
		

$sql1 = "SELECT * FROM voters where sap_id='$em'";
$result1 = $con->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
       
	   
	   $sql2 = "SELECT * FROM candidates where sap='$sap'";
$result2 = $con->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
       
	    $y = mysqli_real_escape_string($con,$row1['year']);
	   $sql3=mysqli_query($con,"UPDATE tp3 set $y=($y+1) where c_name='".$row2['name']."' ");
	   header("location:thankyou.php");
	   
    }
} else {
    echo "0 results";
}
	   
	   
	   
    }
} else {
    echo "0 results";
}
		
		//$sql1=mysqli_query($con,"select year from voters where sap_id='$em'");
		//$sql2=mysqli_query($con,"select name from candidates where sap='$sap'");
		//echo "$sql2";
		//$sql3=mysqli_query($con,"UPDATE tp3 set $sql1=($sql1+1) where c_name='$sql2' ");
		
		
		}
		
		
		
	}
}

//mysqli_close($con);
?>
<!--
 <img style="border=#666 1px solid;" src="images/' . $id . '.jpg"></img>
-->
<!DOCTYPE html>
<html lang="en">

<head>

<style>
*{
	color:black;
}
body{
	background-color:white;
}

.tableCSS{
	border-radius: 10px !important;
}

.buttons{
	border-radius: 10px;
	border-color: #000;
	background-color: #fff;
	text-decoration-color: #000;
	color: #000;
}


.button
{
	width: 150px;
	padding: 10px;
	background-color: #FF8C00;
	box-shadow: -8px 8px 10px 3px rgba(0,0,0,0.2);
    font-weight:bold;
	text-decoration:none;
	border-radius: 10px;

}
#cover{
    position:fixed;
    top:0;
    left:0;
    background:rgba(0,0,0,0.6);
    z-index:5;
    width:100%;
    height:100%;
    display:none;
}

.cancel
{
    display:block;
    position:absolute;
    top:3px;
    right:2px;
    background:rgb(245,245,245);
    color:black;
    height:30px;
    width:35px;
    font-size:30px;
    text-decoration:none;
    text-align:center;
    font-weight:bold;
}


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

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<style>
	#welcome, #logoutBtn {
		display: inline;
	}
	#welcome{
		
	}
	</style>

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background-color:black;height:10%;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
				
                <a class="navbar-brand page-scroll" href="login.php">
                   <!-- <i class="fa fa-vcard-o" "></i> <span class="light"></span> to Vote. -->
                </a>
				
			   <ul class="nav navbar-nav">
				 
				<li>
                     <a style="position:absolute !important;float:right !important; margin-right:10px !important;" class="page-scroll">    <form action="homepage.php" method="post">  <input id="logoutBtn" type="submit" name="user_logout" value="LOGOUT" style="background-color:black;color:white;border:none;"/></form></a>
                    </li>
				
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
         <!--     <li class="hidden">
                       <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download">Download</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>-->
                </ul>
            </div>
<center> <h3 id="welcome" style="color:white;">WELCOME <?php echo $_SESSION["username"]; ?></h3></center>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
               
           </div>
            <!-- /.navbar-collapse -->
       </div>
        <!-- /.container -->

		</nav>

    <!-- Intro Header -->
  <!--  <header class="intro" style="background-color:#cc0000;">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    
                        <h1>CANDIDATES</h1>
                       
                    
                </div>
            </div>
        </div>
    </header>
-->
<br>
<div id="pageContent" style="background-color:white;">
<br><br><br>
<!--<table width="100%" cellpadding="10"  >
<tr>
<td width="30%" valign="top">
 
</td>
<td width="40%" style="background-color:white;color:black;"> <b><?php echo"$dynamiclist"; ?></b></td>
<td width="30%" valign="top"></td>
</tr>
</table>-->
<div style="padding-left: 20px; padding-right: 20px;">
<style>
table tr {
    border-bottom-right-radius: 10px;
	border-top-right-radius: 10px;
	border-radius: 10px;
}

table tr{
    border-bottom-left-radius: 10px;
	border-top-left-radius: 10px;
}
</style>






<?php echo"$dynamiclist"; ?>
</div>
<br><br>
</div>


    <!-- Footer 
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Our Website 2017</p>
        </div>
    </footer>
-->
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
