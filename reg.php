<?php
error_reporting(0);
$cn=mysqli_connect("localhost","root","","suf_ajax") or die("failed");
$id=$_REQUEST['id'];
$usel=mysqli_query($cn,"select * from std where id='$id'");
$uft=mysqli_fetch_array($usel);

if(isset($_REQUEST['u']))
{
	header("location:show.php");
	
}

?>

<html>
	<head>
	<script type="text/javascript">
		function ins()
		{
			
			var x=new XMLHttpRequest();
			
			x.open("GET","ins.php?str="+nm.value + "/" +ps.value)
			x.send()
			
			x.onreadystatechange = function()
			{
				if(x.readyState == 4 )
				{
					alert("Success")
				}
				
			}
		}
	
	function up()
		{
			
			var x=new XMLHttpRequest();
			
			x.open("GET","ins.php?ustr="+nm.value + "/" +ps.value + "/"+hd.value)
			x.send()
			
			x.onreadystatechange = function()
			{
				if(x.readyState == 4 )
				{
					alert(x.responseText)
				}
				
			}
		}
	
	</script>
	</head>
	
	<body>
		<form method="post">
			
		<table>
		
			<tr>
				<td>NAME</td>
				<td><input type="text" name="nm" id="nm" value="<?php echo $uft[1];?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="ps" id="ps" value="<?php echo $uft[2];?>">
				
				<input type='hidden' value="<?php echo $_REQUEST['id'];?>" id="hd"></td>
				
			</tr>
			<tr>
				<td>
				<?php
				if(isset($_REQUEST['id']))
				{
					?>
					<input type="submit" name="u" value="update" onclick="up()">
	
					<?php
					
				}
				else
				{
					?>
					<input type="submit" name="s" value="Register" onclick="ins()">
					<?php
					
				}
				?>
				
				</td>
			</tr>

		
		</table>
			
		
		</form>
	
	</body>

</html>