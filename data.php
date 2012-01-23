<?php
	require("login.php");
	$logid=$_SESSION['log'];
	$name=isset($_POST['name'])?trim($_POST['name']):'';$warn1='';
	$ques=isset($_POST['ques'])?$_POST['ques']:'';$warn2='';
	$ans=isset($_POST['ans'])?trim($_POST['ans']):'';$warn3='';
if (isset($_POST['submit'])) 
{
	if($name==''||strlen($name)>11||strlen($name)<7)
	{
		$warn1="Enter Your Name (7 to 10) Character";
		$count=1;
	}
	if($ques==''||strlen($ques)<15)
	{
		$warn2="Enter Your Question Atleast 15 Character";
		$count=1;
	}
	if($ans==''||strlen($ans)<5)
	{
		$warn3="Enter Your Answer Atleast 5 Character";
		$count=1;
	}
	if($count!=1)
	{
		$result=pg_query("update admin set name='$name' , question='$ques' , answer='$ans' where loginid='$logid'");
		if($result)
		{
			$_SESSION['name'] = $name;
			header ('Refresh: 0; URL=web.php');
		}
	}	
}
if (isset($_POST['logout'])) 
{
	header ('Refresh: 0; URL=logout.php');
}	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>

<style>
.box4 {
width:170px;
font:12px Arial, Helvetica, sans-serif !important;
}
legend {
color:red;
font-weight:bold;
font-size:14px;
}
.star {
color:#FF0000  !important;
}
.mod {
color:green;
font-weight:bold;
font-size:16px;
}
.mod1 {
color:red;
font-weight:bold;
font-size:20px;
}
</style>  
  <title><?php echo $_SESSION['name'];?> Details</title>
 <link rel="stylesheet" href="placement/system.css" type="text/css">
<link rel="stylesheet" href="placement/general.css" type="text/css">
<link href="placement/template.css" rel="stylesheet" type="text/css">
<link href="placement/suckerfish.css" rel="stylesheet" type="text/css">
<link href="placement/body_beige.css" rel="stylesheet" type="text/css">
<link href="pl0acement/primary_red.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" href="">

<link href="placement/rokzoom.css" rel="stylesheet" type="text/css">
</head><body id="page_bg" class="b-medium p-red bd-beige">
<div class="wrapper">
<div class="mainbg">
<div id="header"><a href="" ><img src="placement/logo.jpg" alt="image not availevel" border="2" height="100" width="800"></a>
<div id="scroller"></div>
<div id="header_spotlight">
<div id="topbox"></div>
<div id="searchbox"></div></div></div>

<table class="mainbg" cellpadding="0" cellspacing="0">
<tbody><tr valign="top">
<td class="main">
<divclass="mainbody">
<span class="breadcrumbs pathway">
<a href="Welcome.php" class="pathway">Home</a> <img src="placement/arrow.png" alt=""> <?php echo $_SESSION['name'];?> Details</span>
														
<form action="data.php" method="post">							
<table width="70%" align="center" border="0" cellspacing="3" cellpadding="2">
<tbody><tr><td class="mod" width="100%"><?php echo $resul; ?></td></tr>
<td colspan="2" valign="top">

	<fieldset>
     	<legend><?php echo $_SESSION['name'];?> Details</legend>	
     	
      	<table width="100%" border="0" cellspacing="2" cellpadding="2"><tbody>
		<tr>
          	<td class="text_b2">Name <span class="star">*</span></td>
          	<td><input type="text" name="name"  class="box4" value="<?php echo $name ?>"></td>
      		<td><span class="star"><?php echo $warn1; ?></span></td></tr>
	<tr>
          	<td class="text_b2">Question <span class="star">*</span></td>
          	<td><input type="text" name="ques" class="box4" value="<?php echo $ques; ?>"></td>
          	<td><span class="star"><?php echo $warn2; ?></span></td>
        	</tr>
       	<tr>
          	<td class="text_b2">Answer <span class="star">*</span></td>
          	<td><input type="text" name="ans"  class="box4" value="<?php echo $ans; ?>"></td>
      		<td><span class="star"><?php echo $warn3;?></span></td></tr>
      	</tbody></table></fieldset>
</td>
		<tr><td colspan="2" align="center"><input type="hidden" name=”redirect” value="<?php echo $redirect ?>"/>
  		<input type="submit" name="submit" value="Submit" ><input type="submit" name="logout" value="Log Out" > </td></tr>
</tr>

</tbody></table></form>
<span class="article_separator">&nbsp;</span>

</div>
</td>
</form>		</td></tr></tbody></table>
<div id="footer">
<a href="">Copyright ©2008</a> National Institute of Technology,Calicut - 673601 | <a href="">Disclaimer</a>
</div></div></div>
</body></html>
