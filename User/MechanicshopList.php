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
<table width="200" border="1" align="center">
  <tr>
    <td>District</td>
    <td><label for="sel_dis"></label>
      <select name="sel_dist" id="sel_dist" onChange="getPlace(this.value)">
         <option ="">select</option>
          <?php
		  $select="select * from tbl_district";
		  $res=$Conn->query($select);
		  while($data=$res->fetch_assoc())
		  {
		  ?>
          <option
           value="<?php echo $data['district_id'] ?>" ><?php echo $data['district_name'] ?></option>
          <?php
		  }
		  ?>

      </select></td>
    <td>Place</td>
    <td><label for="sel_place"></label>
      <select name="sel_place" id="sel_place" onChange="getMech(this.value)">
      </select></td>
  </tr>
</table>

  <table width="200" border="1" align="center" id="mechdata">
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
      <td><img width="50" height="50" src="../Assets/Files/MechDocs/<?php echo $data['mechanicshop_logo'];?>" /></td>
      <td><?php echo $data['district_name'];?></td>
      <td><?php echo $data['place_name']?></td>
      <td><a href="Request.php?mid=<?php echo $data['mechanicshop_id'];?>">Request</td>
     <?php
	}
	 ?> 
    </tr>
  </table>
</form>
</body>
</html>


<script src="../Assets/JQ/jQuery.js"></script> 


<script>
    function getPlace(did) 
    {

        $.ajax({
        url:"../Assets/Ajaxpages/AjaxPlace.php?did="+did,
        success: function(html){
            $("#sel_place").html(html);
        }
        });
    }
	function getMech(mid)
	{

        $.ajax({
        url:"../Assets/Ajaxpages/AjaxMech.php?mid="+mid,
        success: function(html){
            $("#mechdata").html(html);
        }
        });
	}
</script>