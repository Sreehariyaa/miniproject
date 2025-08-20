<?php
include("../Assets/Connection/Connection.php");
$dname="";
$did="";

if(isset($_POST['btn_sub']))
{
	
	$categoryname=$_POST['txt_cat'];
	$did=$_POST['txt_id'];
	if($did=="")
	{
		
	$insqry="insert into tbl_category(category_name) values('".$categoryname."')";
	if($Conn->query($insqry))
	{
		?>
		<script>
        	alert("Inserted");
			window.location="Category.php";
        </script>
        <?php
	}
}
else
{
		$UpQry="update tbl_category set category_name='".$categoryname."' where category_id='".$did."'";
	if($Conn->query($UpQry))
	{
		?>
		<script>
        	alert("Updated");
			window.location="Category.php";
        </script>
        <?php
	}
}
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_category where category_id='".$_GET['did']."'";
	if($Conn->query($delQry))
	{
		?>
        <script>
		   alert("Deleted")
		   window.location="Category.php";
		 </script>
         <?php
	}
	
}
if(isset($_GET['eid']))
{
	$SelQry="select * from tbl_category where category_id='".$_GET['eid']."'";
	$row=$Conn->query($SelQry);
	$editdata=$row->fetch_assoc();
	$dname=$editdata['category_name'];
	$did=$editdata['category_id'];
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>





<form name="form" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Category</td>
      <td><label for="txt_cat"></label>
       <input type="hidden" name="txt_id" id="txt_cat"required value="<?php echo $did ?>"/>
      <input type="text" name="txt_cat" id="txt_cat" required value="<?php echo $dname ?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit"></td>
    </tr>
  </table>
  <br />
  <table width="200" border="1" align="center">
  <tr>
    <td>SL NO</td>
    <td>Category</td>
    <td>Action</td>
  </tr>
  <?php
  $i=0;
  $select="select * from tbl_category";
  $res=$Conn->query($select);
  while($data=$res->fetch_assoc())
  {
	  $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['category_name'];?></td>
    <td><a href="Category.php?did=<?php echo $data['category_id']?>"> Delete</a>
    <a href="Category.php?eid=<?php echo $data['category_id']?>"> Edit</a></td>
  </tr>
  <?php
  }
  ?>
</table>

</form>
</body>
</html>
