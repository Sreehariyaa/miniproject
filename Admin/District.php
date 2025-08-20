<?php
include("../Assets/Connection/Connection.php");
$dname="";
$did="";

if(isset($_POST['btn_sub']))
{
	$districtname=$_POST['txt_name'];
	$did=$_POST['txt_id'];
	if($did=="")
	{
	
	$insqry="insert into tbl_district(district_name) values('".$districtname."')";
	if($Conn->query($insqry))
	{
		?>
		<script>
        	alert("Inserted");
			window.location="District.php";
        </script>
        <?php
	}
}
else
{
	$UpQry="update tbl_district set district_name='".$districtname."' where district_id='".$did."'";
	if($Conn->query($UpQry))
	{
		?>
		<script>
        	alert("Updated");
			window.location="District.php";
        </script>
        <?php
	}
}
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_district where district_id='".$_GET['did']."'";
	if($Conn->query($delQry))
	{
		?>
        <script>
		   alert("Deleted")
		   window.location="District.php";
		 </script>
         <?php
	}
	
}

if(isset($_GET['eid']))
{
	$SelQry="select * from tbl_district where district_id='".$_GET['eid']."'";
	$row=$Conn->query($SelQry);
	$editdata=$row->fetch_assoc();
	$dname=$editdata['district_name'];
	$did=$editdata['district_id'];
	
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
      <td>District</td>
      <td><label for="txt_name"></label>
      <input type="hidden" name="txt_id" id="txt_id" required value="<?php echo $did ?>"/>
      <input type="text" name="txt_name" id="txt_name" required value="<?php echo $dname ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" /></td>
    </tr>
  </table>
  <br />
  <table width="200" border="1" align="center">
  <tr>
    <td>SL NO</td>
    <td>District</td>
    <td>Action</td>
  </tr>
  <?php
  $i=0;
  $select="select * from tbl_district";
  $res=$Conn->query($select);
  while($data=$res->fetch_assoc())
  {
	  $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['district_name'];?></td>
    <td><a href="District.php?did=<?php echo $data['district_id']?>"> Delete</a>
        <a href="District.php?eid=<?php echo $data['district_id']?>"> Edit</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>

</form>
</body>
</html>