<?php 
include("../Assets/Connection/Connection.php");
session_start();
$selQry="select * from tbl_user where user_id='".$_SESSION['uid']."' ";
$result=$Conn->query($selQry);
$row=$result->fetch_assoc();
$currentpass=$row['user_pass'];
if(isset($_POST['btn_sub']))
{
	$oldpass=$_POST['txt_pass'];
	$newpass=$_POST['txt_new'];
	$retype=$_POST['txt_retype'];
	if($oldpass==$currentpass)
	{
		if($newpass==$retype)
		{
			$upQry="update tbl_user set user_pass='".$newpass."' where user_id='".$_SESSION['uid']."' ";
			if($Conn->query($upQry))
			{
				?>
                <script>
				alert("Password Updated");
				window.location="../Guest/Login.php";
				</script>
                <?php
			}
		}
		else
		{
			?>
                <script>
				alert("Password Mismatch");
				window.location="ChangePass.php";
				</script>
                <?php
		}
	}
	else
	{
		?>
                <script>
				alert("Password Invalid");
				window.location="ChangePass.php";
				</script>
                <?php
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="230" border="1">
    <tr>
      <td width="174">Old password</td>
      <td width="40"><label for="txt_pass"></label>
      <input type="password" name="txt_pass" id="txt_pass" /></td>
    </tr>
    <tr>
      <td>New password</td>
      <td><label for="txt_new"></label>
      <input type="password" name="txt_new" id="txt_new" /></td>
    </tr>
    <tr>
      <td>Re-type password</td>
      <td><label for="txt_retype"></label>
      <input type="password" name="txt_retype" id="txt_retype" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Change Password" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>