<?php
session_start();
	require("login.php");
	if($_SESSION['logged']!=1)
	{
		header ('Refresh: 1; URL=adminlogin.php');
		die("Please First log in");
	}
	$count=0;$resul='';
	$roll_no=isset($_POST['roll_no'])?trim($_POST['roll_no']):'';$warn1='';$warn8='';
	$comname=isset($_POST['comname'])?trim($_POST['comname']):'';$warn2='';$warn7='';
	$package=isset($_POST['package'])?trim($_POST['package']):'';$warn3='';$warn5='';
	pg_connect("host=localhost port=5432 dbname=placement user=dilshad password=a") or die("could not connect");
if (isset($_POST['update'])) 
{
	if($roll_no=='')
	{
		$warn1="Enter Roll number ";
		$count=1;
	}
	if($roll_no!='')
	{
		$query=pg_query("SELECT roll_no FROM alumni where roll_no='$roll_no'");
		$row=pg_fetch_array($query);
		if($roll_no!=$row[0])
		{
			$warn1="Alumni not Exist";
			$count=1;
		}
	}
	if($comname!=''&&$count==0)
	{
		if($comname < 0)
			$warn2="Enter Company regestration number";
		else
		{
			$query=pg_query("SELECT reg_no FROM alumni where reg_no=$comname");
			$row=pg_fetch_array($query);
			if($comname!=$row[0])
				$warn2="Company not Exist";
			else
			{
				$result=pg_query("update alumni set reg_no=$comname where roll_no='$roll_no'");
				if($result)
				{	
					$warn7="Update Successfull..";$comname='';
				}
			}
		}
	}		
	if($package!=''&&$count==0)
	{
		if($package < 0)
			$warn3="Enter package";
		else
		{
			$result=pg_query("update alumni set package=$package where roll_no='$roll_no'");
			if($result)
			{	
				$warn5="Update Successfull..";$package='';
			}
		}
	}	
}
if (isset($_POST['delete'])) 
{
	if($roll_no=='')
	{
		$warn1="Enter Roll number";
		$count=1;
	}
	else
	{
		$query=pg_query("SELECT roll_no FROM alumni where roll_no='$roll_no'");
		$row=pg_fetch_array($query);
		if($roll_no!=$row[0])
		{
			$warn1="Alumni not Exist";
			$count=1;
		}
	}		
	if($count==0)
		$result=pg_query("delete from alumni where roll_no='$roll_no'");
	if($result)
	{	
		$resul="Delete Successfull..";
	}
}
if (isset($_POST['check'])) 
{
	if($roll_no=='')
	{
		$warn1="Enter Roll number";
	}
	else
	{
		$query=pg_query("SELECT alumni.roll_no,student.name FROM alumni,student where student.roll_no=alumni.roll_no and alumni.roll_no='$roll_no'");
		$row=pg_fetch_row($query);
		if($row[0]=='')
		{
			$warn1="Alumni not Exist";
		}
		else
			$warn8=$row[1];
	}		
}
if (isset($_POST['check1'])) 
{
	if($comname=='')
	{
		$warn2="Enter Registration number";
	}
	if($comname!='')
	{
		$query=pg_query("SELECT reg_no,name FROM company where reg_no='$comname'");
		$row=pg_fetch_array($query);
		if($comname!=$row[0])
		{
			$warn2="Company not Exist";
		}
		else
			$warn7=$row[1];
	}		
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>
  <title>Update Placed Student Details</title>
<style>
fieldset {
-moz-border-radius:4px 4px 4px 4px;
border:1px solid #DDDDDD;
margin:0 0 12px;
padding:6px 8px 5px;
}
legend {
color:red;
font-weight:bold;
font-size:14px;
}
.mod {
color:green;
font-weight:bold;
font-size:14px;
}
.mod1 {
color:#1B5D89;
font-weight:bold;
font-size:14px;
}
.mandatory-star {
color:#FF0000  !important;
}
.star {
color:green  !important;
}
.text_b2 {
font:bold 14px Arial, Helvetica, sans-serif !important;
}

.texts_b2 {
font:bold 11px Arial, Helvetica, sans-serif !important;
}

.box4 {
width:170px;
font:12px Arial, Helvetica, sans-serif !important;
}
</style> 

<link rel="stylesheet" href="placement/system.css" type="text/css">
<link rel="stylesheet" href="placement/general.css" type="text/css">
<link href="placement/template.css" rel="stylesheet" type="text/css">
<link href="placement/suckerfish.css" rel="stylesheet" type="text/css">
<link href="placement/body_beige.css" rel="stylesheet" type="text/css">
<link href="placement/primary_red.css" rel="stylesheet" type="text/css">

<link href="placement/rokzoom.css" rel="stylesheet" type="text/css">
</head><body id="page_bg" class="b-medium p-red bd-beige">

<div class="wrapper">
<div class="mainbg">
<div id="header"><a href="" class="nounder"><img src="placement/logo.jpg" alt="image not availevel" border="2" height="100" width="800"></a>
<div id="scroller"></div>
<div id="header_spotlight">
<div id="topbox"></div>
<div id="searchbox"></div></div></div>
<div id="safari">
<div id="nav_suckerfish">
<ul class="menu">
<li class="item75"><a href="Welcome.php"><span>TP Home</span></a></li>
<li class="item1"><a href="web.php"><span>Home</span></a></li>
<li class="parent item56"><a href="" class="topdaddy"><span>Student</span></a>
<ul>
<li class="item62"><a href="stusub.php"><span>insert</span></a></li>
<li class="item63"><a href="updstu.php"><span>Update</span></a></li></ul></li>
<li class="parent active item56"><a href="" class="topdaddy"><span>Placed Student</span></a>
<ul>
<li class="item64"><a href="subalumni.php"><span>insert</span></a></li>
<li id="current" class="active item65"><a href="updalumni.php"><span>Update</span></a></li></ul></li>
<li class="parent item66"><a href="" class="topdaddy"><span>Course</span></a>
<ul>
<li class="item67"><a href="subcors.php"><span>insert</span></a></li>
<li class="item68"><a href="updcors.php"><span>Update</span></a></li></ul></li>
<li class="parent item69"><a href="" class="topdaddy"><span>Department</span></a>
<ul>
<li class="item70"><a href="subdept.php"><span>insert</span></a></li>
<li class="item71"><a href="upddept.php"><span>Update</span></a></li></ul></li>
<li class="parent item72"><a href="" class="topdaddy"><span>Company</span></a>
<ul>
<li class="item73"><a href="subcom.php"><span>insert</span></a></li>
<li class="item74"><a href="updcom.php"><span>Update</span></a></li></ul></li>
<li class="parent item21"><a href="" class="topdaddy"><span><?php echo $_SESSION['name'];?></span></a>
<ul>
<li class="item22"><a href="changepass.php"><span>Change Password</span></a></li>
<li class="item22"><a href="upddetail.php"><span>Update detail</span></a></li>
<?php
	if($_SESSION['log']=='admin')
	{
		echo '<li class="item23"><a href="createuser.php"><span>Create User</span></a></li>';
		echo '<li class="item23"><a href="upduser.php"><span>Update User</span></a></li>';
	}
?>
<li class="item75"><a href="logout.php"><span>Admin Logout</span></a></li>
</ul></li>
</ul></div></div>


<table class="mainbg" cellpadding="0" cellspacing="0">
<tbody><tr valign="top">
<td class="main">
<div class="mainbody">
<span class="mod1"><center>Welcome
<?php
		echo $_SESSION['name'];
?></center></span>
<span class="breadcrumbs pathway">
<a href="web.php" class="pathway">Home</a><img src="placement/arrow.png" alt=""> <a href="" class="pathway">Placed Student</a><img src="placement/arrow.png" alt=""> Update</span>
<table class="contentpaneopen"><tbody><tr>
<td class="contentheading" width="100%">Update Placed Student Details</td></tr>
<tr>
<td class="mod" width="100%"><?php echo $resul; ?></td></tr>
</tbody></table>
<form action="updalumni.php" method="post">
	<table width="100%" border="0" cellspacing="3" cellpadding="2">
		<tbody>
			<tr><td colspan="3"><div class="mandatory-star" style="padding:0 0 0 10px;"></div></td></tr>
 
			<tr valign="top"><tr><td width="10%"></td>
			<td width="80%">
	<fieldset>
	
		<legend>Alumni Details</legend>		
      	
      	<table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
        
 		<tr>
		<td class="text_b2">Student Roll Number <span class="mandatory-star">*</span></td>
          	<td><input type="text" name="roll_no"  class="box4" value="<?php echo $roll_no?>"></td>
          	<td><span class="star"><?php echo $warn8; ?></span><span class="mandatory-star"><?php echo $warn1; ?></span></td>
        	</tr>	
        
        	<tr>
  		<td colspan="3" align="center"><input type="submit" name="check" value="Check" ></td></tr>
	
        
        	<tr>
          	<td class="text_b2">Company Reg number<br/>(Numeric) </td>
          	<td><input type="text" name="comname" class="box4" value="<?php echo $comname?>"></td>
          	<td><span class="star"><?php echo $warn7; ?></span><span class="mandatory-star"><?php echo $warn2; ?></span></td>
        	</tr>
		
		<tr>
  		<td colspan="3" align="center"><input type="submit" name="check1" value="Check" ></td></tr>
		
		<tr>
        	<td class="text_b2">Package </td>
          	<td><input type="text" name="package" class="box4" value="<?php echo $package?>"></td>
          	<td><span class="star"><?php echo $warn5; ?></span><span class="mandatory-star"><?php echo $warn3; ?></span></td>
        	</tr>
        				
		</tbody>
	</table>
      </fieldset><td width="10%"></td></tr></tbody></table>
      
    	 <table width="100%" border="0" cellspacing="3" cellpadding="2">
		<tbody>
  
  	<tr>
  		<td colspan="3" align="center"><input type="submit" name="delete" value="Delete" ><input type="submit" name="update" value="Update" ></td></tr>
	</tbody></table>
	</form>	
<table class="contentpaneopen">
<tbody><tr>
<td colspan="2" valign="top">
<p><strong></strong></p><p>&nbsp;</p><p></p>

<table style="width: 820px;" cellspacing="12" cellpading="12" border="1"><tbody>
	
	</tbody></table>
	<p>&nbsp;</p><br>

</td>
</tr>

</tbody></table>
<div id="footer">
<a href="">Copyright ©2008</a> National Institute of Technology,Calicut - 673601 | <a href="">Disclaimer</a>
</div></div></div>
</body></html>
