<?php
	session_start();
	echo '<br>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Student</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body><div id="container">
    <header>
	<div class="width">
    		<h1><a href="/">TSEC'S<span>SCAP</span></a></h1>
        	<h2>All thing's managed</h2>
	</div>
    </header>

		<div id="menu">
			<?php
				require 'include/teachernav.php';                     
				if(isset($result2)) 
				{                           
					echo $result2;
				}
			?>
		</div>
		<div>		
		
	<form method="POST" action="tcviewstudent.php" ><br><h1>View Student:--</h1><br><br>
		<input type="text" name="class" placeholder="CLASS" ><br>
		<br><center><button type="submit" name="submit">VIEW</button></center>		
	</form>
</body>
<?php
if (isset($_POST['submit']))
{
	if(!$_POST['class'])
		{
			echo '<script>alert("PLS FILL ALL DETAILS")</script>';
		}
		else{
				$sclass=$_POST['class'];
				@$con=mysql_connect('localhost', 'root', '');
				if($con) 
					{
						$sel=mysql_select_db('SCAP');
							if($sel) 
							{
								$query="select * from StudentDet where s_class='$sclass'";
								if($result=mysql_query($query))
								{
									//echo "successful";
									echo '<br>';
										$stuid=array();
										$stuname=array();                                         
										$stuclass=array();
										$stuphone=array();
										$stuadd=array();
										$stuemail=array();
										$studp=array();
										for($i=0; $row=mysql_fetch_assoc($result); $i++)
										{
											$stuid[$i]=$row['s_id'];
											$stuname[$i]=$row['s_name'];                                         
											$stuclass[$i]=$row['s_class'];
											$stuphone[$i]=$row['s_phone'];
											$stuadd[$i]=$row['s_caddress'];
											$stuemail[$i]=$row['s_email'];
											$studp[$i]=$row['s_dp'];
										}
										 $count=count($stuid);
										echo '<table bgcolor="#81b5d6"><th>SID</th><th>Name</th><th>Class</th><th>Phone no</th><th>Address</th><th>Email</th>';
										for($i=0; $i<$count;$i++)
										{
											echo '<tr><td>'. $stuid[$i] .'</td><td>'. $stuname[$i] .'</td><td>'. $stuclass[$i] .'</td><td>'. $stuphone[$i] .'</td><td>'.$stuadd[$i].'</td><td>'.$stuemail[$i].'</td></tr>';
										}
										echo '</table>';
								}else{echo "query problem";}
							}else {echo "scap doesnt exist";}

					}
			}
}
?>
</html>