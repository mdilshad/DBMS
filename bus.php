<?php
 $con = pg_connect("host=localhost dbname=dilshad user=dilshad") or die("could not cannect");
 $name=isset($_POST['name'])?trim($_POST['name']):'';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>

  <title>Welcome </title>
  </head>
<body>
<h1><marquee>Welcome to KSRTC</h1>
<table align="left" border="0"><tr>

<td><a href="book.php">Book A ticket</a></td>
<td><a href="canbook.php">cacell a ticket</a></td>
<td><a href="modbook.php">modification</a></td></tr></table><br><br><br>
<form action="web.php" method="post">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
        
        <tr>
          	<td><input type="text" name="name" class="box4" value="<?php echo $name; ?>"></td>
          	<td><select name="platform">
		<option selected="selected" value="ssta">By Start Station</option>
		<option value="esta">By End station</option>
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

<table style="width: 820px;" cellspacing="1" cellpading="1" border="1" bgcolor="white"><tbody>
<?php
	$flag=0;
	if(isset($_POST['search']))
	{
		$mode=$_POST['platform'];
		if($mode=='ssta'&&$name!='')
		{
			$len=strlen($name);
			$sql=pg_query("SELECT * FROM bus");
			while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[1],$len) or !strncasecmp($name,$row[3],$len)||!strncasecmp($name,$row[4],$len) or !strncasecmp($name,$row[5],$len) or !strncasecmp($name,$row[6],$len))
					$flag=1;
			if($flag==1)		
			{
				$sql=pg_query("SELECT * FROM bus ,schedule where bus.busno=schedule.busno");
				echo '<tr><th>Bus Number</th><th> Start Station</th><th>Via Station 1</th><th>Station 2</th><th>Station 3</th>';
				echo '<th>Station 4</th><th>Station 5</th><th>Destination</th><th>s</th><th>M</th><th>T</th><th>W</th><th>F</th><th>s</th></tr>';
				while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[1],$len) or !strncasecmp($name,$row[3],$len)||!strncasecmp($name,$row[4],$len) or !strncasecmp($name,$row[5],$len) or !strncasecmp($name,$row[6],$len))
				{	
					echo '<tr><td><center>'.$row[0].'</td><td><center>'. $row[1].'</td><td><center>'. $row[3].'</td><td><center>'. $row[4].'</td>';
		echo'<td><center>'. $row[5].'</td><td><center>'. $row[6].'</td><td><center>'. $row[7].'</td><td><center>'. $row[2].'</td><td><center>'. $row[10].'</td><td><center>'. $row[11].'</td><td><center>'. $row[12].'</td><td><center>'. $row[13].'</td><td><center>'. $row[14].'</td><td><center>'. $row[15].'</td><td><center>'. $row[16].'</td></tr>';
				}
			}
			else
		    	echo '<div class="mod">No result Found</div>';
		}
		if($mode=='esta'&&$name!='')
		{
			$len=strlen($name);
			$sql=pg_query("SELECT * FROM bus");
			while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[2],$len) or !strncasecmp($name,$row[3],$len)||!strncasecmp($name,$row[4],$len) or !strncasecmp($name,$row[5],$len) or !strncasecmp($name,$row[6],$len))
					$flag=1;
			if($flag==1)		
			{
				$sql=pg_query("SELECT * FROM bus,schedule where bus.busno=schedule.busno");
				echo '<tr><th>Bus Number</th><th> Start Station</th><th>Via Station 1</th><th>Station 2</th><th>Station 3</th>';
				echo '<th>Station 4</th><th>Station 5</th><th>Destination</th><th>s</th><th>M</th><th>T</th><th>W</th><th>F</th><th>s</th></tr>';
				while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[2],$len) or !strncasecmp($name,$row[3],$len)||!strncasecmp($name,$row[4],$len) or !strncasecmp($name,$row[5],$len) or !strncasecmp($name,$row[6],$len))
				{	
					echo '<tr><td><center>'.$row[0].'</td><td><center>'. $row[1].'</td><td><center>'. $row[3].'</td><td><center>'. $row[4].'</td>';
		echo'<td><center>'. $row[5].'</td><td><center>'. $row[6].'</td><td><center>'. $row[7].'</td><td><center>'. $row[2].'</td><td><center>'. $row[10].'</td><td><center>'. $row[11].'</td><td><center>'. $row[12].'</td><td><center>'. $row[13].'</td><td><center>'. $row[14].'</td><td><center>'. $row[15].'</td><td><center>'. $row[16].'</td></tr>';
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
</body>
</html>
