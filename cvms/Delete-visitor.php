<?php
include('includes/dbconnection.php');

$id =$_GET['viewid'];

$ret=mysqli_query($con,"delete from  tblidcard where ID='$id'");

if ($ret) {
	?>
	<script>
		alert('delete successfully');
	</script>
	 <?php
         header('location:createid.php');
}
else{
	?>
	<script>
		alert('not deleted');
	</script>




	<?php

}
?>
