<?php


include("../Assets/Connection/Connection.php");
session_start();
$uname="";
$uemail="";
$ucontact="";
$SelQry="select * from tbl_user where user_id='".$_SESSION['uid']."';";
$res=$Conn->query($SelQry);
$data=$res->fetch_assoc();
if(isset($_POST['btn_sub']))
{
	$uname=$_POST['txt_name'];
	$uemail=$_POST['txt_email'];
	$ucontact=$_POST['txt_cont'];
		$UpQry="Update tbl_user set user_name='".$uname."',user_email='".$uemail."',user_contact='".$ucontact."' where user_id='".$_SESSION['uid']."'";
	if($Conn->query($UpQry))
	{
		?>
		<script>
		alert("Updated");
		window.location="MyProfile.php";
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
  <table  width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $data['user_name'];?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
  <input type="email" name="txt_email" id="txt_email" value="<?php echo $data['user_email'];?>" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_cont"></label>
      <input type="text" name="txt_cont" id="txt_cont" value="<?php echo $data['user_contact'];?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Update" /></td>
    </tr>
  </table>
</form>
</body>
</html>