<?php
include("../Assets/Connection/Connection.php");
$id="";
if(isset($_POST['btn_sub']))
{
	$placename=$_POST['txt_place'];
	$districtid=$_POST['sel_district'];
	$id=$_POST['txt_id'];
	if($id=="")
	{
	
	$insqry="insert into tbl_place(place_name,district_id) values('".$placename."','".$districtid."')";
	if($Conn->query($insqry))
	{
		?>
		<script>
        	alert("Inserted");
			window.location="Place.php";
        </script>
        <?php
	}
}
else
{
	$UpQry="update tbl_place set place_name='".$placename."',district_id='".$districtid."' where place_id='".$id."'";
	if($Conn->query($UpQry))
	{
		?>
		<script>
        	alert("Updated");
			window.location="Place.php";
        </script>
        <?php
	}
}
}
if(isset($_GET['id']))
{
	$delQry="delete from tbl_place where place_id='".$_GET['id']."'";
	if($Conn->query($delQry))
	{
		?>
        <script>
		   alert("Deleted")
		   window.location="Place.php";
		 </script>
         <?php
	}	
}
$pname="";
$pid="";
$disid="";
if(isset($_GET['eid']))
{
	$SelQry="select * from tbl_place where place_id='".$_GET['eid']."'";
	$row=$Conn->query($SelQry);
	$editdata=$row->fetch_assoc();
	$pname=$editdata['place_name'];
	$pid=$editdata['place_id'];
	$disid=$editdata['district_id'];	
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
<table border="1" align="center">    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district">
          <option selected="selected">select</option>
          <?php
		  $select="select * from tbl_district";
		  $res=$Conn->query($select);
		  while($data=$res->fetch_assoc())
		  {
		  ?>
          <option
          <?php
		  if($disid==$data['district_id'])
		  {
			  echo "selected";
		  }
		  ?>
           value="<?php echo $data['district_id'] ?>" ><?php echo $data['district_name'] ?></option>
          <?php
		  }
		  ?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
      <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $pid ?>"/>
      <input type="text" name="txt_place" id="txt_place" value="<?php echo $pname ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" /></td>
    </tr>
  </table>
  <br />
  <table width="237" border="1" align="center">
    <tr>
      <td>Sl NO</td>
      <td>District</td>
      <td>Place</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$selplace="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
	$res=$Conn->query($selplace);
	while($data=$res->fetch_assoc())
	{
		$i++;
		
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['district_name']; ?></td>
      <td><?php echo $data['place_name']; ?></td>
      <td><a href="Place.php?id=<?php echo $data['place_id'];?>">Delete
      <a href="Place.php?eid=<?php echo $data['place_id'];?>">Edit</td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>