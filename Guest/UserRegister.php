<?php
include"../Assets/Connection/Connection.php";

if(isset($_POST['btn_sub']))
{
$photo=$_FILES['file_photo']['name'];
$temp=$_FILES['file_photo']['tmp_name'];
move_uploaded_file($temp,"../Assets/Files/UsersDocs/".$photo);
$uname=$_POST['txt_name'];
$uemail=$_POST['txt_email'];
$ucontact=$_POST['txt_contact'];
$upass=$_POST['txt_pass'];
$InQry="insert into tbl_user (user_name,user_email,user_contact,user_pass,user_photo)values ('".$uname."','".$uemail."','".$ucontact."','".$upass."','".$photo."')";
	if($Conn->query($InQry))
	{
		?>
		<script>
        	alert("Inserted");
			window.location="UserRegister.php";
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
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" required /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="password" name="txt_pass" id="txt_pass" required /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>