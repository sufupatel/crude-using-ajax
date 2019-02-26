<?php

$cn=mysqli_connect("localhost","root","","suf_ajax") or die("failed");
if(isset($_REQUEST['id']))
{	
	header("location:show.php");
	
}
?>
<html>

<script type="text/javascript">
	
function del(str)
		{
			
			var x=new XMLHttpRequest();
			
			x.open("GET","ins.php?dstr="+str)
			x.send()
			
			x.onreadystatechange = function()
			{
				if(x.readyState == 4 )
				{
					alert("Success")
				}
				
			}
		}
	
</script>

<title>Show</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 20px;
  cursor: pointer;
  margin-top:5px;
}
.pull-right {
    float: right;
}
</style

<head>


</head>
<body>
<div class="w3-container">

<h2>SHOW ALL DATA <a href="insert.php" class="button pull-right">New Record</a>
</h2>
	<table align="center" class="w3-table w3-bordered">
	
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>PASSWORD</th>
			<th>DELETE</th>
			<th>UPDATE</th>
		</tr>
		<?php
		$sel=mysqli_query($cn,"select * from std");
		while($ft=mysqli_fetch_array($sel))
		{
			?>
			<tr>
			<th><?php echo $ft[0];?></th>
			<th><?php echo $ft[1];?></th>
			<th><?php echo $ft[2];?></th>
			<th><a href="show.php?id=<?php echo $ft[0];?>" onclick="del(this.id)" id="<?php echo $ft[0];?>">delete</a></th>
			<th><a href="insert.php?id=<?php echo $ft[0];?>">Update</a></th>
			
		</tr>

			<?php 
		}
		?>
		
	</table>
	
	</div>
</body>

</html>