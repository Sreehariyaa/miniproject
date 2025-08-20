<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_sub']))
{
	$adminname=$_POST['txt_name'];
	$adminemail=$_POST['txt_email'];
	$adminpassword=$_POST['txt_pass'];
	
	$insqry="insert into tbl_admin(admin_name,admin_email,admin_pass) values('".$adminname."','".$adminemail."','".$adminpassword."')";
	if($Conn->query($insqry))
	{
		?>
		<script>
        	alert("Inserted");
			window.location="Adminregistration.php";
        </script>
        <?php
	}
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="text" name="txt_pass" id="txt_pass"required /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" /></td>
    </tr>
  </table>
  
</form>
</body>
</html>