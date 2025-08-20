<?php
include("../Assets/Connection/Connection.php");
session_start();
$name="";
$email="";
$contact="";
$SelQry="select * from tbl_staff where staff_id='".$_SESSION['sid']."';";
$res=$Conn->query($SelQry);
$data=$res->fetch_assoc();
if(isset($_POST['btn_sub']))
{
	
	$name=$_POST['txt_name'];
	$email=$_POST['txt_email'];
	$contact=$_POST['txt_contact'];
	$address=$_POST['txt_address'];
	
	$UpQry="Update tbl_staff set staff_name='".$name."',staff_email='".$email."',staff_contact='".$contact."' where staff_id='".$_SESSION['sid']."'";
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
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $data['staff_name'];?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" value="<?php echo $data['staff_email'];?>" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data['staff_contact']; ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Update" /></td>
    </tr>
  </table>
</form>
</body>
</html>