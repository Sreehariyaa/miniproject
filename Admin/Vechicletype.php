<?php
include("../Assets/Connection/Connection.php");
$dname="";
$did="";

if(isset($_POST['btn_sub']))
{    
    $type=$_POST['txt_type'];
	$did=$_POST['txt_id'];
	if($did=="")
	{
	
	$insqry="insert into tbl_vehicletype(vehicle_name) values('".$type."')";
	if($Conn->query($insqry))
	{
		?>
		<script>
        	alert("Inserted");
			window.location="Vechicletype.php";
        </script>
        <?php
	}
}
else
{
	$UpQry="update tbl_vehicletype set vehicle_name='".$type."' where vehicletype_id='".$did."'";
	if($Conn->query($UpQry))
	{
		?>
		<script>
        	alert("Updated");
			window.location="Vechicletype.php";
        </script>
        <?php
	}
}
}
	
	if(isset($_GET['did']))
{
	$delQry="delete from tbl_vehicletype where vehicletype_id='".$_GET['did']."'";
	if($Conn->query($delQry))
	{
		?>
        <script>
		   alert("Deleted")
		   window.location="Vechicletype.php";
		 </script>
         <?php
	}
	
}
if(isset($_GET['eid']))
{
	$SelQry="select * from tbl_vehicletype where vehicletype_id='".$_GET['eid']."'";
	$row=$Conn->query($SelQry);
	$editdata=$row->fetch_assoc();
	$dname=$editdata['vehicle_name'];
	$did=$editdata['vehicletype_id'];
	
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
  <table width="358" border="1" align="center">
    <tr>
      <td width="153">Vechicle Type</td>
      <td width="189"><label for="txt_type"></label>
      <input type="hidden" name="txt_id" id="txt_id" required value="<?php echo $did ?>"/>
      <input type="text" name="txt_type" id="txt_type"required value="<?php echo $dname ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" /></td>
    </tr>
  </table>
  <br />
  <table width="242" border="1" align="center">
    <tr>
      <td>Sl.no</td>
      <td>Vechicle type</td>
      <td>Action</td>
    </tr>
    <?php
  $i=0;
  $select="select * from tbl_Vehicletype";
  $res=$Conn->query($select);
  while($data=$res->fetch_assoc())
  {
	  $i++;
  ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['vehicle_name'];?></td>
      <td><a href="Vechicletype.php?did=<?php echo $data['vehicletype_id']?>"> Delete</a>
      <a href="Vechicletype.php?eid=<?php echo $data['vehicletype_id']?>"> Edit</a>
      </td>
    </tr>
    <?php
  }
  ?>
  </table>
</form>
</body>
</html>