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


<!DOCTYPE html
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
					msg.innerHTML="Successfully Inserted"
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
					alert("Successfully Updated")
					location.replace("http://localhost/suf_ajax/show.php")
				}
				
			}
		}
	
	</script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form method="post">
  <div class="container">
    <h1>Register</h1>
	<h5 id="msg"  class="registerbtn" style="cursor:none;width:15%"></h5>
<hr>

    <label for="email"><b>NAME</b></label>
    <input type="text" placeholder="Enter NAME" id="nm" value="<?php echo $uft[1];?>" name="nm" required>

    <label for="psw"><b>Password</b></label>
    <input type="text" placeholder="Enter Password" id="ps" value="<?php echo $uft[2];?>" name="ps" required>
    <input type="hidden" id="hd" value="<?php echo $uft[0];?>" name="ps" required>

   
    <hr>
	
	<?php
				if(isset($_REQUEST['id']))
				{
					?>
					<input type="Button" name="u" class="registerbtn" value="update" onclick="up()">
	
					<?php
					
				}
				else
				{
					?>
					<input type="Button" name="s" class="registerbtn" value="Register" onclick="ins()">
					<?php
					
				}
				?>
    
  </div>
  
</form>

</body>
</html>
