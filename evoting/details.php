<?php
//post 6 latest items
include "connect_to_mysql.php";
if(isset($_GET['id']))
{
	$id=preg_replace('#[^0-9]#i','',$_GET['id']);
	$sql=mysqli_query($con,"select * from candidates where sap='$id' ");
	$count=mysqli_num_rows($sql);
	if($count>0)
	{
		while($row=mysqli_fetch_array($sql))
		{
			$id=$row["sap"];
			$name=$row["name"];
			$info=$row["info"];
			//$category=$row["category"];
			//$sap=$row["subcategory"];
			//$details=$row["details"];
		}
		
	}else{
		echo "that candidate does not exist!";
			exit();
		}
	}

else 
{
	echo "no candidate!!";
	exit();
	}
mysqli_close($con);
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CANDIDATE DETAIL</title>
<!--<link rel="stylesheet" type="text/css" href="style/style.css">-->
</head>

<body style="background-color: #e6f2ff" >



<div id="pageContent">

<table width="100%" border="1" cellspacing="0" cellpadding="15" style="margin:auto;background-color:white;">
  <tr >
    <td width="19%" valign="top"><img src="images/<?php echo $id; ?>.jpg" width="142" height="188" alt="<?php echo $name; ?>" /><br />
	<td width="19%" valign="top"><img src="images/<?php echo $id; ?>.png" width="142" height="188" alt="<?php echo $name; ?>" /><br /><br>
      <a href="images/<?php echo $id; ?>.jpg">View Full Size Image</a></td>
    <td width="81%" valign="top"><h3><?php echo $name; ?></h3>
      <p><?php echo $info; ?><br />
        <br />
        <?php// echo "$subcategory $category"; ?> <br />
<br />
        <?php //echo $details; ?>
<br />
        </p>
    <!--  <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php //echo $id; ?>" />
        <input type="submit" name="button" id="button" value="Add to Shopping Cart" />
      </form>   -->
      </td>
    </tr>
</table>




</div>
<?php //include_once("template_footer.php"); ?>



</body>


</html>