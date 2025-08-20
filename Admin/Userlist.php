<?php
include("../Assets/Connection/Connection.php");
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
      <td>Sl No</td>
      <td>User name</td>
      <td>User email</td>
      <td>User contact</td>
      <td>User photo</td>
    </tr>
     <?php
	$i=0;
	$SelQry="select * from tbl_user";
	$res=$Conn->query($SelQry);
	while($data=$res->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['user_name'];?></td>
      <td><?php echo $data['user_email'];?></td>
      <td><?php echo $data['user_contact'];?></td>
      <td><img width="50" height="50"src="../Assets/Files/UsersDocs/<?php echo $data['user_photo'];?>"</td>    
      </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>