<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        
    $folder = "image/".$filename;
          
    $db = mysqli_connect("localhost", "root", "", "tblidcard");
  
        // Get all the submitted data from the form
        $sql = "INSERT INTO tblidcard (filename) VALUES ('$filename')";
  
        // Execute query
        mysqli_query($db, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cvmsaid=$_SESSION['cvmsaid'];
 $fullname=$_POST['fullname'];
$email=$_POST['email'];
$mobnumber=$_POST['mobilenumber'];

$add=$_POST['address'];

 $query=mysqli_query($con,"insert into tblidcard(fullName,email,phone,address) value('$fullname','$email','$mobnumber','$add')");

    if ($query) {
    $msg="Visitors Detail has been added.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>CVSM Visitors Forms</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include_once('includes/sidebar.php');?>
   
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once('includes/header.php');?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content" Style="background-color: #000814;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-12 ">
                                <div class="card bg-placeholder" Style="color:#fff;">
                                    <div class="card-header">
                                        <strong>CREATE</strong> VISITORS ID-Card
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
    $cnt=$cnt+1;
  }  ?> </p>                                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <th>Choose Image</th>                              
        
                                                </div>
                                                <div> <input type="file" Style="margin-left:15px;" class="bg-placeholder" name="uploadfile" value="" /> </div>
                                            </div>
                                    
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Full Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control bg-placeholder" required="">
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Email Input</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control bg-placeholder" required="">
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Phone Number</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" class="form-control bg-placeholder" maxlength="10" required="">
                                                    
                                                </div>
                                            </div>
                                          
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="address" id="address" rows="9" placeholder="Enter Visitor Address..." class="form-control bg-placeholder" required=""></textarea>
                                                </div>
                                            </div>
                                            
                                                                                      
     

                                            
                                          <div class="card-footer">
                                                <p style="text-align: center;">                                            
                                                    <button type="submit" name="submit" id="submit" class="btn" Style="width:160px;">
                                                        CREATE ID-CARD
                                                    </button>                                       

                                                </p>

                                                                            
                                        </div>
                                     </form>

                            <div>
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                            <tr>                
                                                <th>SR.NO</th>
                                                <th>Image</th>
                                                <th>Full Name</th>            
                                                <th>phone</th>
                                                <th>address</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                    </thead>
                                <tbody>
                                        
        <?php 
        

        $ret=mysqli_query($con,"select *from tblidcard");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
              
               <tr  Style="background-color: #161D29; color:#fff;">
                  <td><?php echo $cnt;?></td>

                  <td><?php  echo $row['image'];?></td>
                  <td><?php  echo $row['fullname'];?></td>
                  <td><?php  echo $row['phone'];?></td>
                  <td><?php  echo $row['address'];?></td>
                  <td><a href="idcard.php?viewid1=<?php echo $row['ID']; ?>" title="View idcard">
                    <i class='fa fa-id-card-o' Style="  color: #ffd60a;"></i></a></td>

                  <td><a href="Delete-visitor.php?viewid=<?php echo $row['ID']; ?>" title="Delete Visitors data">
                    <i class="fa fa-trash" Style="  color: #ffd60a;"></i></a></td>


                


                   
                </tr>
        <?php 
        $cnt=$cnt+1;
        }?>
    </div>

      
       
                                </tbody>    
                            </table>
                        </div>                                   
                    </div>
                </div>                        
            </div>

               
 
<?php include_once('includes/footer.php');?>
   </div> </div>
            </div>
        </div>
</div>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
<?php } ?>