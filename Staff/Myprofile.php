<?php
include("../Assets/Connection/Connection.php");
session_start();
$SelQry="select * from tbl_staff s inner join tbl_mechanicshop p on p.mechanicshop_id=s.mechanicshop_id where staff_id='".$_SESSION['sid']."'";
$res=$Conn->query($SelQry);
$data=$res->fetch_assoc();



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
      <td colspan="2" align="center"><img width="100" height="100" src="../Assets/Files/StaffDocs/<?php echo $data['staff_photo'];?>" /></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php  echo $data['staff_name'];?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php   echo $data['staff_email'];?></td>
    </tr>
    <tr>
     <td>Shop Name</td>
      <td><?php   echo $data['mechanicshop_name'];?></td>
      </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['staff_contact']?>;</td>
    </tr>
    <tr>
    <td><a href="EditProfile.php">EditProfile</a></td>
    <td><a href="ChangePass.php">ChangePassword</a></td>
    </tr>
  </table>
</form>
</body>
</html>
