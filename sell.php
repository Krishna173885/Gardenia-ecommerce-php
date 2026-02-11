<?php 

    $active='Sell';
    include("includes/header.php");

?>

       
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                      Sell
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
    <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <h2> Create a Wholesaler account </h2>
                           
                       </center><!-- center Finish -->
                       
                       <form action="sell.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Name</label>
                               
                               <input type="text" class="form-control" name="s_name" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Email</label>
                               
                               <input type="email" class="form-control" name="s_email" required>
                               
                           </div><!-- form-group Finish -->
                           
                           
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Country</label>
                               
                               <input type="text" class="form-control" name="s_country" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your City</label>
                               
                               <input type="text" class="form-control" name="s_city" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Contact</label>
                               
                               <input type="text" class="form-control" name="s_contact" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Address</label>
                               
                               <input type="text" class="form-control" name="s_address" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Product Img 1(Front view)</label>
                               
                               <input type="file" class="form-control form-height-custom" name="s_image1" required>
                               
                           </div><!-- form-group Finish -->
                          <div class="form-group"><!-- form-group Begin -->  
                               
                               <label>Your Product Img 2(Side view)</label>
                               
                               <input type="file" class="form-control form-height-custom" name="s_image2" required>
                               
                           </div><!-- form-group Finish -->
                           
                            <div class="form-group"><!-- form-group Begin -->  
                               
                               <label>Your Product Img 3 (Top view)</label>
                               
                               <input type="file" class="form-control form-height-custom" name="s_image3" required>
                               
                           </div><!-- form-group Finish -->
                           
                            <div class="form-group"><!-- form-group Begin -->
                           <input type="checkbox" name="agree" id="agree" required>
                                  <label for="agree">I agree the <a href="terms.php">Terms And Conditions</a></label>
                                  
                             </div><!-- form-group Finish -->
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <button type="submit" name="sell" class="btn btn-primary">
                               
                               <i class="fa fa-user-md"></i> Submit
                               
                               </button>
                               
                           </div><!-- text-center Finish -->
                           
                       </form><!-- form Finish -->
                       
                        <?php 
                       
                       if(isset($_POST['sell'])){
                           
                           $s_email = $_POST['s_email'];
                           
                           $subject = "Welcome to Gardenia";
                           
                           $msg = "Dear Customer Your Product Will Picked By 2 Days ,Thank You!";
                           
                           $from = "GardeniaJK4@gmail.com";
                           
                           mail($s_email,$subject,$msg,$from);
                           
                           echo "<h2 align='center'>You will Receive a Message </h2>";
                           
                       }
                       
                       ?>

                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>

<?php 

if(isset($_POST['sell'])){
    
    $s_name = $_POST['s_name'];
    
    $s_email = $_POST['s_email'];
    
    $s_country = $_POST['s_country'];
    
    $s_city = $_POST['s_city'];
    
    $s_contact = $_POST['s_contact'];
    
    $s_address = $_POST['s_address'];
    
    $s_image1 = $_FILES['s_image1']['name'];
    
    $s_image1_tmp = $_FILES['s_image1']['tmp_name'];
    
    $s_image2 = $_FILES['s_image2']['name'];
    
    $s_image2_tmp = $_FILES['s_image2']['tmp_name'];
    
    $s_image3 = $_FILES['s_image3']['name'];
    
    $s_image3_tmp = $_FILES['s_image3']['tmp_name'];
    
    $s_ip = getRealIpUser();
    
    
    $insert_seller = "insert into sell (sell_name,sell_email,sell_country,sell_city,sell_contact,sell_address,sell_image1,sell_image2,sell_image3,sell_ip) values ('$s_name','$s_email','$s_country','$s_city','$s_contact','$s_address','$s_image1','$s_image2','$s_image3','$s_ip')";
    
    $run_seller = mysqli_query($con,$insert_seller);
    
    $sel_cart = "select * from cart where ip_add='$s_ip'";
    
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        
        /// If register have items in cart ///
        
        $_SESSION['sell_email']=$s_email;
        
        echo "<script>alert('Your product details have been uploded')</script>";
        
        echo "<script>window.open('sell.php','_self')</script>";
        
    }else{
        
        /// If register without items in cart ///
        
        $_SESSION['sell_email']=$s_email;
        
        echo "<script>alert('Your product details have been uploded')</script>";
        
        echo "<script>window.open('sell.php','_self')</script>";
        
    }
    
}

    
?>

