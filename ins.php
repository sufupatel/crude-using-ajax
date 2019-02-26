<?php

$cn=mysqli_connect("localhost","root","","suf_ajax") or die("failed");
if(isset($_REQUEST['str']))
{
	
		$str=$_REQUEST['str'];
$ex=explode("/",$str);

$q="insert into std (name,password) values('$ex[0]','$ex[1]')";

mysqli_query($cn,$q);
}
else if(isset($_REQUEST['ustr']))
{
	$str=$_REQUEST['ustr'];
$ex=explode("/",$str);

$q="update std set name='$ex[0]',password='$ex[1]' where id='$ex[2]'";
mysqli_query($cn,$q);
}
else if(isset($_REQUEST['dstr']))
{
	$id=$_REQUEST['dstr'];
	
	mysqli_query($cn,"delete from std where id='$id'");
}

?>