<?php
	require("login.php");
	$logid=$_SESSION['log'];
	$sql=pg_query("select question,answer from admin where loginid='$logid'");
	$row=pg_fetch_row($sql);
	$ques=$row[0];
	$ans=isset($_POST['ans'])?trim($_POST['ans']):'';
if(isset($_POST['set']))
{
	if($ans==$row[1])
	{
		$_SESSION['logged']=1;
		header ('Refresh: 0; URL=pass.php');
	}
	else
		$warn="Wrong Answer";
}
if(isset($_POST['back']))
{
	header ('Refresh: 0; URL=adminlogin.php');
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
color:#FF0000;
font-weight:bold;
font-size:16px;
}
.mod1 {
color:red;
font-weight:bold;
font-size:20px;
}
</style>  
  <title>Admin Login</title>
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
<div id="safari">
<div id="nav_suckerfish">
<ul class="menu">
<li class="item75"><a href="" target="_blank"><span>NITC Home</span></a></li>
<li class="item1"><a href="Welcome.php"><span>Home</span></a></li>
<li class="item55"><a href="procedure.php"><span>Procedure</span></a></li>
<li class="parent item56"><a href="recruit.php" class="topdaddy"><span>Why Recruit @ NITC</span></a>
<ul>

<li class="item65"><a href="alumni.php"><span>Alumni</span></a></li>
<li class="item66"><a href="facilities.php"><span>Facilities</span></a></li></ul></li>
<li class="parent item57"><a href="" class="topdaddy"><span>Academics</span></a>
<ul>
<li class="item67"><a href="disciplines.php"><span>Disciplines</span></a></li>
<li class="item68"><a href="students-profile.php"><span>Students profile</span></a></li>
<li class="item69"><a href="beyond.php"><span>Beyond academics</span></a></li></ul></li>
<li class="parent item60"><a href="" class="topdaddy"><span>Placements</span></a>
<ul>
<li class="item70"><a href="past-recruiters.php"><span>Past recruiters</span></a></li>
<li class="item71"><a href=""><span>Placement statistics</span></a></li></ul></li>
<li  class="item58"><a href="contact.php"><span>Contact Us</span></a></li>
<?php
	if($_SESSION['logged']!=1)
		echo '<li class="active item58"><a href="adminlogin.php"><span>Admin Login</span></a></li></ul></div></div>';
	else
		echo '<li class="item58"><a href="logout.php"><span>Admin Logout</span></a></li></ul></div></div>';
?>
<table class="mainbg" cellpadding="0" cellspacing="0">
<tbody><tr valign="top">
<td class="main">
<divclass="mainbody">
<span class="breadcrumbs pathway">
<a href="Welcome.php" class="pathway">Home</a> <img src="placement/arrow.png" alt=""> Admin login</span>
														
<form action="secure.php" method="post">							
<table width="60%" align="center" border="0" cellspacing="3" cellpadding="2">
<tbody><tr>
<td colspan="2" valign="top">
<fieldset>
     	<legend><?php echo $_SESSION['name'];?> Details</legend>	
     	
      	<table width="100%" border="0" cellspacing="2" cellpadding="2"><tbody>
		<tr>
	<tr>
          	<td class="text_b2">Question <span class="star">*</span></td>
          	<td><input type="text" name="ques" class="box4" value="<?php echo $ques; ?>"></td>
        	</tr>
       	<tr>
          	<td class="text_b2">Answer <span class="star">*</span></td>
          	<td><input type="text" name="ans"  class="box4" value="<?php echo $ans; ?>"></td>
      		<td><span class="star"><?php echo $warn;?></span></td></tr>
      	</tbody></table></fieldset>
</td>
		<tr><td colspan="2" align="center"><input type="hidden" name=”redirect” value="<?php echo $redirect ?>"/>
  		<input type="submit" name="set" value="Set" ><input type="submit" name="back" value="Back" > </td></tr>
</tr>

</td>

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
