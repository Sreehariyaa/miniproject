<?php
include("../Assets/Connection/Connection.php");
session_start();
?>
<?php 
if(isset($_GET['aid']))
{
$Accept= "Update tbl_mechanicshop set mechanicshop_status=1 where mechanicshop_id=".$_GET['aid'];
if($Conn->query($Accept))
{
	?>
    <script>
	alert("Request Accepted");
	window.location="Mechaniclist.php";
	</script>
    <?php
}
}
if(isset($_GET['rid']))
{
$reject= "Update tbl_mechanicshop set mechanicshop_status=2 where mechanicshop_id=".$_GET['rid'];
if($Conn->query($reject))
{
	?>
    <script>
	alert("Request Rejeceted");
	window.location="Mechaniclist.php";
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
  <table width="200" border="1" align="center">
    <tr>
      <td>Sl.NO</td>
      <td>Name</td>
      <td>Email</td>
      <td>Contact</td>
      <td>Address</td>
      <td>Logo</td>
      <td>License</td>
      <td>District</td>
      <td>Place</td>
      <td>Action</td>
    </tr>
     <?php
	$i=0;
	$SelQry="select * from tbl_mechanicshop m inner join tbl_place p on m.place_id=p.place_id
	inner join tbl_district d on p.district_id=d.district_id";
	$res=$Conn->query($SelQry);
	while($data=$res->fetch_assoc())
	{
		$i++;
		
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['mechanicshop_name']; ?></td>
      <td><?php echo $data['mechanicshop_email'];?></td>
      <td><?php echo $data['mechanicshop_contact'];?></td>
      <td><?php echo $data['mechanicshop_address'];?></td>
      <td><img width="50" height="50" src="../Assets/Files/MechDocs/<?php echo $data['mechanicshop_logo'];?>"</td>
      <td><img width="50" height="50"src="../Assets/Files/MechDocs/<?php echo $data['mechanicshop_license'];?>"</td>
      <td><?php echo $data['district_name'];?></td>
      <td><?php echo $data['place_name']?></td>
      <td><?php 
	  if($data['mechanicshop_status']==0)
	  {
		  ?>
          <a href="Mechaniclist.php?aid=<?php echo $data['mechanicshop_id']; ?>"/>Accept</a>
       <a href="Mechaniclist.php?rid=<?php echo $data['mechanicshop_id']; ?>"/>Reject</a></td>
          <?php
	  }
	  else if($data['mechanicshop_status']==1)
	  {
		  echo "Accepted";
	  }
	   else if($data['mechanicshop_status']==2)
	  {
		  echo "Rejected";
	  }
		  ?>
      
    </tr>
	 </td>
     <?php
	}
	 ?> 
    </tr>
  </table>
</form>
</body>
</html>