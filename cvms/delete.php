<?php
include('includes/dbconnection.php');

$id =$_GET['editid'];

$ret=mysqli_query($con,"delete from  tblvisitor where ID='$id'");

if ($ret) {
	?>
	<script>
		alert('delete successfully');
	</script>
	 <?php
         header('location:manage-newvisitors.php');
}
else{
	?>
	<script>
		alert('not deleted');
	</script>




	<?php

}
?>
