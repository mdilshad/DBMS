<?php
session_start();
	$comname=isset($_POST['comname'])?trim($_POST['comname']):'';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>
  <title>Search Company Details</title>
  <style>
 .mod {
color:red;
font-weight:bold;
font-size:18px;
}
.mod1 {
color:#1B5D89;
font-weight:bold;
font-size:14px;
}
</style>

<link rel="stylesheet" href="placement/system.css" type="text/css">
<link rel="stylesheet" href="placement/general.css" type="text/css">
<link href="placement/template.css" rel="stylesheet" type="text/css">
<link href="placement/suckerfish.css" rel="stylesheet" type="text/css">
<link href="placement/body_beige.css" rel="stylesheet" type="text/css">
<link href="placement/primary_red.css" rel="stylesheet" type="text/css">

<link href="placement/rokzoom.css" rel="stylesheet" type="text/css">

<meta http-equiv="content-type" content="text/html; charset=UTF-8"></head><body id="page_bg" class="b-medium p-red bd-beige">

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
<li class="item75"><a href="Welcome.php" target="_blank"><span>TP Home</span></a></li>
<li class="item1"><a href="query.php"><span>Home</span></a></li>
<li class="parent item56"><a href="" class="topdaddy"><span>Student</span></a>
<ul>
<li class="item62"><a href="vwstu.php"><span>View all</span></a></li>
<li class="item63"><a href="serstu.php"><span>Search</span></a></li></ul></li>
<li class="parent item56"><a href="" class="topdaddy"><span>Placed Student</span></a>
<ul>
<li class="item64"><a href="vwalumni.php"><span>View all</span></a></li>
<li class="item65"><a href="seralumni.php"><span>Search</span></a></li></ul></li>
<li class="parent item66"><a href="" class="topdaddy"><span>Course</span></a>
<ul>
<li class="item67"><a href="vwcors.php"><span>View all</span></a></li>
<li class="item68"><a href="sercors.php"><span>Search</span></a></li></ul></li>
<li class="parent item69"><a href="" class="topdaddy"><span>Department</span></a>
<ul>
<li class="item70"><a href="vwdept.php"><span>View all</span></a></li>
<li class="item71"><a href="serdept.php"><span>Search</span></a></li></ul></li>
<li class="parent active item72"><a href="" class="topdaddy"><span>Company</span></a>
<ul>
<li class="item73"><a href="vwcom.php"><span>View all</span></a></li>
<li id="current" class="active item74"><a href="sercom.php"><span>Search</span></a></li></ul></li>
<?php
	require("login.php");
	if($_SESSION['logged']!=1)
		echo '<li class="item58"><a href="adminlogin.php"><span>Admin Login</span></a></li></ul></div></div>';
	else
		echo '<li class="item58"><a href="logout.php"><span>Admin Logout</span></a></li></ul></div></div>';
?>



<table class="mainbg" cellpadding="0" cellspacing="0">
<tbody><tr valign="top">
<td class="main">
<div class="mainbody">
<span class="mod1"><center>Welcome
<?php
	if($_SESSION['logged']!=1)
		echo 'Guest';
	else
		echo $_SESSION['name'];
?></center></span>
<span class="breadcrumbs pathway">
<a href="query.php" class="pathway">Home</a><img src="placement/arrow.png" alt=""><a href="" class="pathway">Company</a><img src="placement/arrow.png" alt=""> Search </span>
														
<table class="contentpaneopen"><tbody><tr>
<td class="contentheading" width="100%">Company Search</td></tr>
</tbody></table>
<form action="sercom.php" method="post">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
        
        <tr>
          	<td><input type="text" name="comname" class="box4" value="<?php echo $comname; ?>"></td>
          	<td><select name="platform">
		<option selected="selected" value="reg">By Registration Number</option>
		<option value="name">By Company Name</option>
		<option value="speci">By Specification</option>
		</select></td>
		<td><input type="submit" name="search" value="Search"></td>
		</tr>
      	</tbody>
      	</table>
      	</form>
<table class="contentpaneopen">
<tbody><tr>
<td colspan="2" valign="top">
<p><strong></strong></p><p>&nbsp;</p><p></p>

<table  style="width: 820px;" cellspacing="12" cellpading="10" border="1"><tbody>
	
	<?php
	$con=pg_connect("host=localhost port=5432 dbname=placement user=dilshad password=a") or die("could not connect");
	if(isset($_POST['search']))
	{
		$mode=$_POST['platform'];
		if($mode=='reg')
		{
			$sql=pg_query("SELECT * FROM company where reg_no=$comname");
			$row=pg_fetch_array($sql);
		   	if($row[0])		
			{
				echo '<tr><th>Company Reg.</th><th>Company name</th><th>Estd</th><th>Specification</th></tr>';	
				echo '<tr><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td></tr>';
			}
			else
		    	echo '<div class="mod">No result Found</div>';
		}
		if($mode=='name')
		{
			$len=strlen($comname);
			$sql=pg_query("SELECT name FROM company");
			while($row=pg_fetch_row($sql))
				if(!strncasecmp($comname,$row[0],$len))
					$flag=1;
			if($flag==1)		
			{
				$sql=pg_query("SELECT * FROM company");
				echo '<tr><th>Company Reg.</th><th>Company name</th><th>Estd</th><th>Specification</th></tr>';
				while($row=pg_fetch_row($sql))
				if(!strncasecmp($comname,$row[1],$len))
				{	
					echo '<tr><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td></tr>';
				}
			}
			else
		    	echo '<div class="mod">No result Found</div>';
		}
		
		if($mode=='speci')
		{
			$len=strlen($comname);
			$sql=pg_query("SELECT speci FROM company");
			while($row=pg_fetch_row($sql))
				if(!strncasecmp($comname,$row[0],$len))
					$flag=1;
			if($flag==1)		
			{
				$sql=pg_query("SELECT * FROM company");
				echo '<tr><th>Company Reg.</th><th>Company name</th><th>Estd</th><th>Specification</th></tr>';
				while($row=pg_fetch_row($sql))
				if(!strncasecmp($comname,$row[3],$len))
				{	
					echo '<tr><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td></tr>';
				}
			}
			else
		    	echo '<div class="mod">No result Found</div>';
		}
	}
?>
	
	</tbody></table>
	<p>&nbsp;</p><br>

</td>
</tr>

</tbody></table>
<div id="footer">
<a href="">Copyright ©2008</a> National Institute of Technology,Calicut - 673601 | <a href="">Disclaimer</a>
</div></div></div>
</body></html>
