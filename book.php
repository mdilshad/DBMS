<?php
	 $con = pg_connect("host=localhost dbname=dilshad user=dilshad") or die("could not cannect");
	$count=0;$resul='';$result=0;
	$name=isset($_POST['name'])?trim($_POST['name']):'';$warn1='';
	$fname=isset($_POST['fname'])?trim($_POST['fname']):'';$warn2='';
	$userid=isset($_POST['userid'])?trim($_POST['userid']):'';$warn3='';
	$dob=isset($_POST['dob'])?trim($_POST['dob']):'';$warn4='';
	$addl1=isset($_POST['addl1'])?trim($_POST['addl1']):'';$warn5='';
	$addl2=isset($_POST['addl2'])?trim($_POST['addl2']):'';$warn6='';
	$email=isset($_POST['email'])?trim($_POST['email']):'';$warn7='';
	$phone=isset($_POST['phone'])?trim($_POST['phone']):'';$warn8='';
if (isset($_POST['submit'])) 
{	
	if($userid=='')
	{
		$warn1="Enter unique user id";
		$count=1;
	}
	else
	{
		$query=pg_query("SELECT userid FROM users where userid='$userid'");
		$row=pg_fetch_array($query);
		if($row[0]!='')
		{
			$warn1="User id Already Exist";
			$count=1;
		}	
	}
	if($name=='')
	{
		$warn2="Enter name";
		$count=1;
	}
	if($fname=='')
	{
		$warn3="Enter father name";
		$count=1;
	}
	if($dob=='')
	{
		$warn4="Enter date of Birth";
		$count=1;
	}
	if($addl1=='')
	{
		$warn5="Enter Address";
		$count=1;
	}
	if($email=='')
	{
		$warn7="Enter email";
		$count=1;
	}
	if($phone=='')
	{
		$warn8="Enter phone number";
		$count=1;
	}
	if($count!=1)
	{
		$result=pg_query("insert into users values('$userid','$name','$fname','$dob','$email','$addl1','$addl2','wait',$phone)");
	}
	if($result)
	{	
		$resul="Submit Successfull..";
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>
  <title>Insert User Details</title>
  
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
<script type="text/javascript" src="ezcalendar.js"></script>
<link rel="stylesheet" type="text/css" href="ezcalendar.css" />
</style>  


</head><body id="page_bg" class="b-medium p-red bd-beige">


<form action="register.php" method="post">
	<table width="100%" border="0" cellspacing="3" cellpadding="2">
		<tbody>
			<tr><td colspan="3"><div class="mandatory-star" style="padding:0 0 0 10px;"></div></td></tr>
 
			<tr valign="top"><tr><td width="10%"></td>
			<td width="80%">
	<fieldset>
	
		<legend>Personal Details</legend>
      
	<table width="100%" border="0" cellspacing="3" cellpadding="2">
		<tbody>
		
			<tr>
          		<td class="text_b2">Bus number <span class="mandatory-star">*</span></td>
          		<td><input type="text" name="userid" class="box4" title="Enter name" value="<?php echo $userid;?>"></td>
          		<td><span class="mandatory-star"><?php echo $warn1; ?></span></td>
        		</tr>
		
			<tr>
			<td class="text_b2">Start Station <span class="mandatory-star">*</span></td>
			<td><input type="text" name="name" class="box4" value="<?php echo $name;?>"></td>
			<td><span class="mandatory-star"><?php echo $warn2; ?></span></td>
			</tr>
			
			<tr>
          		<td class="text_b2">Destination <span class="mandatory-star">*</span></td>
          		<td><input type="text" name="fname" class="box4" value="<?php echo $fname;?>">
          		<td><span class="mandatory-star"><?php echo $warn3; ?></span></td>
        		</tr>
      
        		
       			<tr>
          		<td class="text_b2">Date <br/>(mm-dd-yyyy)<span class="mandatory-star">*</span></td>
          		<td><input type="text" name="dob" id="date" class="box4" value="<?php echo $dob;?>" ></td>
          		<td><span class="mandatory-star"><?php echo $warn4; ?></span></td>
        		</tr>
		
		</tbody>
	</table>
      </fieldset><td width="10%"></td></tr></tbody></table>
      <table width="100%" border="0" cellspacing="3" cellpadding="2">
		<tbody>
		<tr><td colspan="3"><div class="mandatory-star" style="padding:0 0 0 10px;"></div></td></tr>
 
			<tr valign="top"><tr><td width="10%"></td>
     
    	<td width="80%"><fieldset>
      
      	<legend>Contact Details</legend>		
      	
      	<table width="100%" border="0" cellspacing="3" cellpadding="2">
        <tbody>
        
        
         <tr>
          	<td class="text_b2">Address Line1 <span class="mandatory-star">*</span></td>
          	<td><input type="text" name="addl1"  class="box4" value="<?php echo $addl1;?>"></td>
          	<td><span class="mandatory-star"><?php echo $warn5; ?></span></td>
        </tr>
        
	<tr>
          	<td class="text_b2">Address Line2 </td>
          	<td><input type="text" name="addl2"  class="box4" value="<?php echo $addl2;?>"></td>
          	<td><span class="mandatory-star"><?php echo $warn6; ?></span></td>
        </tr>
  
        <tr>
          	<td class="text_b2">E-mail ID <span class="mandatory-star">*</span></td>
          	<td><input type="text" name="email" class="box4" value="<?php echo $email;?>"></td>
          	<td><span class="mandatory-star"><?php echo $warn7; ?></span></td>
        </tr>
        
        <tr>
          	<td class="text_b2">Phone <span class="mandatory-star">*</span></td>
          	<td><input type="text" name="phone" class="box4" value="<?php echo $phone;?>"></td>
          	<td><span class="mandatory-star"><?php echo $warn8; ?></span></td>
        </tr>
        
	
	
	
      
      	</tbody>
      	</table>
      
      </fieldset><td width="10%"></td></tr></tbody></table>
	
	<table width="100%" border="0" cellspacing="3" cellpadding="2"><tbody>
	<tr>
  		<td colspan="3" align="center"><input type="submit" name="submit" value="Submit" ></td>
  	</tr>
	</tbody></table>
	
	</form>	

</body></html>
