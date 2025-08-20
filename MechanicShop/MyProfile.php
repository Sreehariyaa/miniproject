<?php
include("../Assets/Connection/Connection.php");
session_start();
    $SelQry="select * from tbl_mechanicshop m inner join tbl_place p on p.place_id=m.place_id inner join tbl_district d on d.district_id=p.district_id where mechanicshop_id='".$_SESSION['mid']."' ";
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
  <table width="200" border="1" align="center">
     <tr>
     <td align="center" colspan="2"><img width="100" height="100" src="../Assets/Files/MechDocs/<?php echo $data['mechanicshop_logo'];?>"></td>
     </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data['mechanicshop_name']; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data ['mechanicshop_email'];?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['mechanicshop_contact'];?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php  echo $data['mechanicshop_address']; ?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $data['district_name'];?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php  echo $data['place_name']; ?></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      	<a href="EditProfile.php">Edit Profile</a>
        <a href="ChangePass.php">Change Password</a>
     </td>
    </tr>
    <?php
	?>
  </table>
</form>
</body>
</html>