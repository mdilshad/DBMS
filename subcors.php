<?php
session_start();
	require("login.php");
	if($_SESSION['logged']!=1)
	{
		header ('Refresh: 1; URL=adminlogin.php');
		die("Plese First log in");
	}
	$count=0;$resul='';
	$cname=isset($_POST['cname'])?trim($_POST['cname']):'';$warn1='';
	$depname=isset($_POST['depname'])?trim($_POST['depname']):'';$warn2='';
if (isset($_POST['submit'])) 
{
	if($cname=='')
	{
		$warn1="Enter Course name";
		$count=1;
	}
	else
	{
		$query=pg_query("SELECT cname,dname FROM course where cname='$cname' and dname='$depname'");
		$row=pg_fetch_array($query);
		if($cname==$row[0] and $depname==$row[1])
		{
			$warn1="Course Already Exist";
			$count=1;
		}
	}		
	if($count==0)
		$result=pg_query("insert into course values('$cname','$depname',0)");
	if($result)
	{
    echo "<script>alert('Submit successfully')</script>";
  }
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>
  <title>Insert Course Detail</title>

<style>
fieldset {
-moz-border-radius:4px 4px 4px 4px;
border:1px solid #DDDDDD;
margin:0 0 12px;
padding:6px 8px 5px;
}
.mod {
color:green;
font-weight:bold;
font-size:18px;
}
.mod1 {
color:#1B5D89;
font-weight:bold;
font-size:14px;
}
legend {
color:red;
font-weight:bold;
font-size:14px;
}
.mandatory-star {
color:#FF0000  !important;
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
<li class="item75"><a href="Welcome.php" target="_blank"><span>TP Home</span></a></li>
<li class="item1"><a href="web.php"><span>Home</span></a></li>
<li class="parent item56"><a href="" class="topdaddy"><span>Student</span></a>
<ul>
<li class="item62"><a href="stusub.php"><span>insert</span></a></li>
<li class="item63"><a href="updstu.php"><span>Update</span></a></li></ul></li>
<li class="parent item56"><a href="" class="topdaddy"><span>Placed Student</span></a>
<ul>
<li class="item64"><a href="subalumni.php"><span>insert</span></a></li>
<li class="item65"><a href="updalumni.php"><span>Update</span></a></li></ul></li>
<li class="parent active item66"><a href="" class="topdaddy"><span>Course</span></a>
<ul>
<li id="current" class="active item67"><a href="subcors.php"><span>insert</span></a></li>
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
<li class="item75"><a href="logout.php"><span>Admin Logout</span></a></li></ul></li>
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
<a href="web.php" class="pathway">Home</a><img src="placement/arrow.png" alt=""><a href="" class="pathway">Course</a><img src="placement/arrow.png" alt="">Insert</span>
<table class="contentpaneopen"><tbody><tr>
<td class="contentheading" width="100%">Insert Course Details</td></tr>
<tr>
<td class="mod" width="100%"><?php echo $resul; ?></td></tr>
</tbody></table>
<form action="subcors.php" method="post">
	<table width="100%" border="0" cellspacing="3" cellpadding="2">
		<tbody>
			<tr><td colspan="3"><div class="mandatory-star" style="padding:0 0 0 10px;"></div></td></tr>
 
			<tr valign="top"><tr><td width="10%"></td>
			<td width="80%">
	<fieldset>
	
		<legend>Course Details</legend>		
      	
      	<table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
        
        <tr>
          	<td class="text_b2">Course Name <span class="mandatory-star">*</span></td>
          	<td><input type="text" name="cname"  class="box4" value="<?php echo $cname?>"></td>
          	<td><span class="mandatory-star"><?php echo $warn1; ?></span></td>
        </tr>
        
        <tr>
          	<td class="text_b2">Department Name <span class="mandatory-star">*</span></td>
          	<td><select name="depname">
		<?php
		$sql=pg_query("select dname from dept order by dname");	
		while($row=pg_fetch_row($sql))
			echo '<option value="'.$row[0].'">'.$row[0].'</option>';
		?>
		</select></td>
          	<td><span class="mandatory-star"><?php echo $warn2; ?></span></td>
        </tr>
		</tbody>
	</table>
      </fieldset><td width="10%"></td></tr></tbody></table>
      
    	 <table width="100%" border="0" cellspacing="3" cellpadding="2">
		<tbody>
  
  	<tr>
  		<td colspan="3" align="center"><input type="submit" name="submit" value="Submit" ></td></tr>
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
