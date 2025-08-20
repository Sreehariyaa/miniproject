<?php
include("../Connection/Connection.php");
?>

  <table width="200" border="1" align="center">
    <tr>
      <td>Sl.NO</td>
      <td>Name</td>
      <td>Email</td>
      <td>Contact</td>
      <td>Address</td>
      <td>Logo</td>
      <td>District</td>
      <td>Place</td>
      <td>Action</td>
    </tr>
     <?php
	$i=0;
	$SelQry="select * from tbl_mechanicshop m inner join tbl_place p on m.place_id=p.place_id
	inner join tbl_district d on p.district_id=d.district_id where m.place_id='".$_GET['mid']."'";
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
      <td><img width="50" height="50" src="../Assets/Files/MechDocs/<?php echo $data['mechanicshop_logo'];?>" /></td>
      <td><?php echo $data['district_name'];?></td>
      <td><?php echo $data['place_name']?></td>
      <td><a href="Request.php?mid=<?php echo $data['mechanicshop_id'];?>">Request</td>
     <?php
	}
	 ?> 
    </tr>
  </table>