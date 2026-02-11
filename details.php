<?php 
session_start();
$active='Cart';

include("includes/db.php");
include("functions/functions.php");

$product_id=$pro_title=$product_label=$p_cat_title='';

?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_products = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_products['p_cat_id'];
    
    $pro_title = $row_products['product_title'];
    
    $pro_price = $row_products['product_price'];

    $pro_sale_price = $row_products['product_sale'];
    
    $pro_desc = $row_products['product_desc'];
    
    $pro_img1 = $row_products['product_img1'];
    
    $pro_img2 = $row_products['product_img2'];
    
    $pro_img3 = $row_products['product_img3'];
        
    $pro_label = $row_products['product_label'];

    if($pro_label == ""){

    }else{

        $product_label = "
        
            <a href='#' class='label $pro_label'>
            
                <div class='thelabel'> $pro_label </div>
                <div class='labelBackground'>  </div>
            
            </a>
        
        ";

    }
    
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
    
    
}
if(isset($_POST['review_submit'])){
    
	$rating = $_POST['rating'];
	$review = $_POST['review'];
	$added_on=date('Y-m-d');
    
           $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
    
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_orders where customer_id='$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);

    
	mysqli_query($con,"insert into product_review(product_id,customer_id,rating,review,status,added_on) values('$product_id','$customer_id','$rating','$review','1','$added_on')");
	header('location:product.php?id='.$product_id);
	
}

$product_review_res=mysqli_query($con,"select customers.customer_name,product_review.review_id,product_review.rating,product_review.review,product_review.added_on from customers,product_review where product_review.status=1 and product_review.customer_id=customers.customer_id and product_review.product_id='$product_id' order by product_review.added_on desc");


?>

   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width,initial-scale=1">
    <title>GARDENIA</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
      
</head>
<body>
  
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                
                 <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Welcome: Guest";
                       
                   }else{
                       
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
                </a>
                
                 <a href="checkout.php"><?php items(); ?> Items In Your Cart | Total Price: <?php total_price(); ?> </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="customer_register.php">Register</a>
                   </li>
                   <li>
                       <a href="customer/my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href="cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="checkout.php">
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

                               }
                           
                           ?>
                        
                       </a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
    
    <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/logo.png" alt="Gardenia Logo" class="hidden-xs">
                   <img src="images/logo-mobile.png" alt="Gardenia Logo Mobile" class="visible-xs">
   
    </a><!-- navbar-brand home Finish -->
    
    <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
    
 </div><!-- navbar-header Finish -->
 
 <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li class="<?php if($active=='HOME') echo"active"; ?>">
                           <a href="index.php">Home</a>
                       </li>
                       <li class="<?php if($active=='PRODUCTS') echo"active"; ?>">
                           <a href="product.php">Products</a>
                       </li>
                       <li class="<?php if($active=='Learning') echo"active"; ?>">
                           <a href="learning.php">Learning</a>
                       </li>
                       <li class="<?php if($active=='Sell') echo"active"; ?>">
                           <a href="sell.php">Sell</a>
                       </li>
                       <li class="<?php if($active=='MY ACCOUNT') echo"active"; ?>">
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='checkout.php'>My Account</a>";
                               
                           }else{
                               
                              echo"<a href='customer/my_account.php?my_orders'>My Account</a>"; 
                               
                           }
                           
                           ?>
                       </li>
                       <li class="<?php if($active=='CART') echo"active"; ?>">
                           <a href="cart.php">Shopping Cart</a>
                       </li>
                       <li class="<?php if($active=='CONTACT US') echo"active"; ?>">
                           <a href="contact.php">Contact Us</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                  <span><?php items(); ?> Items In Your Cart</span>
                   
                      </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
               
               <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                     </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                  
                   
                   <form method="get" action="result.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="search_data" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search_data_product" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
  
  </div><!-- container Finish -->
  
  </div><!-- navbar navbar-default Finish -->
   
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Products
                   </li>
                   
                   <li>
            <a href="product.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                   </li>
                   <li> <?php echo $pro_title; ?> </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-12"><!-- col-md-12 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators Finish -->
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img name="image" class="img-look" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
                                   </div>
                                   <div class="item">
                                       <center><img name="image" class="img-look" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b"></center>
                                   </div>
                                   <div class="item">
                                       <center> <img name="image" class="img-look" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c"></center>
                                   </div>
                               </div>
                              
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- left carousel-control Finish -->
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Next</span>
                               </a><!-- right carousel-control Finish -->
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->

                           <?php echo $product_label;?>

                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <h1 class="text-center"> <?php echo $pro_title;?> </h1>
                           
                           <?php add_cart(); ?>
                           
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               <div class="form-group"><!-- form-group Begin -->
                                   <label class="col-md-5 control-label">Product Size</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                       
     <select name="product_size" class="form-control" oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')" required><!-- form-control Begin -->
                                          
                                           <option disabled selected>Select a Size</option>
                                           <option>Small</option>
                                           <option>Medium</option>
                                           <option>Large</option>
                                           
                                       </select><!-- form-control Finish -->
                                       
                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->
                               
                               <?php 

                                    if($pro_label == "Sale"){

                                        echo "

                                            <p class='price'>

                                            PRICE: <del> ₹$pro_price</del><br/>

                                            SALE: ₹    $pro_sale_price

                                            </p>

                                        ";

                                    }else{

                                        echo "

                                            <p class='price'>

                                            PRICE: ₹ $pro_price

                                            </p>

                                        ";

                                    }
                               
                               ?>
                               
                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>
                               
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                       
                       <div class="row" id="thumbs"><!-- row Begin -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product 2" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product 4" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                       </div><!-- row Finish -->
                       
                   </div><!-- col-sm-6 Finish -->
                   
                   
               </div><!-- row Finish -->
               
               <div class="box" id="details"><!-- box Begin -->
                       
                       <h4>Product Details</h4>
                   
                   <p>
                       
                       <?php echo $pro_desc; ?>
                       
                   </p>
                   
                       <h4>Size</h4>
                       
                       <ul>
                           <li>Small</li>
                           <li>Medium</li>
                           <li>Large</li>
                       </ul>  
                       
                       <hr>
                   
               </div><!-- box Finish -->
               
                <h3 class="review_heading"> Reviews </h3><br/>
               <div id="review" >
                 <div class="pro__tab__content__inner">
                        <?php 
                if(mysqli_num_rows($product_review_res)>0){
									
				while($product_review_row=mysqli_fetch_assoc($product_review_res)){
									?>
									
				<article class="row">
										<div class="col-md-12 col-sm-12">
										  <div class="panel panel-default arrow left">
											<div class="panel-body">
											  <header class="text-left">
					<div><span class="comment-rating"> <?php echo $product_review_row['rating']?></span> (<?php echo $product_review_row['customer_name']?>)<br></div>
												<time class="comment-date"> 
												<br>
 <?php
      $added_on=strtotime($product_review_row['added_on']);
      echo date('d M Y',$added_on);
   ?>
								<br>				
												
												
												</time>
											  </header>
											  <div class="comment-post">
											  <br>
												<p>
												  <?php echo $product_review_row['review']?>
												</p>
												<br>
											  </div>
											</div>
										  </div>
										</div>
									</article>
								<?php } }else { 
								echo "<h3 class='submit_review_hint'>No review added</h3><br/>";
									}
									?>
               
               
               
                <h3 class="review_heading">Enter your review</h3><br/>
                
                <?php 
                
                if(isset($_SESSION['customer_email'])){
                    
                    
               ?>
               
               <div class="row" id="post-review-box" style=>
									   <div class="col-md-12">
										  <form action="" method="post">
											 <select class="form-control" name="rating" required>
												  <option value="">Select Rating</option>
												  <option>Worst</option>
												  <option>Bad</option>
												  <option>Good</option>
												  <option>Very Good</option>
												  <option>Fantastic</option>
											 </select>	<br/>
											 <textarea class="form-control" cols="50" id="new-review" name="review" placeholder="Enter your review here..." rows="5"></textarea>
											 <br>
											  <div class="text-center"><!-- text-center Begin -->
                               
                               <button type="submit" name="review_submit" class="btn btn-primary">
                               
                               <i class="fa fa-user-md"></i> Submit
                               
                               </button>
                               
                           </div><!-- text-center Finish -->
										  </form>
									   </div>
									</div>
                                  <br>
                                   <?php } else {
                
										echo "<span class='submit_review_hint'><a href='checkout.php'>Please login to submit your review</a></span>";
                                     
									}
               
									?>
                   </div>
               </div>
               
            <br>
             <style>
                 .submit_review_hint{
                     font-size: 20px;
                 }
               
               </style>
              <br>
               
               
               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Products You Maybe Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->
                   
                   <?php 
                   
                   $get_products = "select * from products order by rand() LIMIT 0,3";
                   
                   $run_products = mysqli_query($con,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                    $pro_id = $row_products['product_id'];
        
                    $pro_title = $row_products['product_title'];
                    
                    $pro_price = $row_products['product_price'];
            
                    $pro_sale_price = $row_products['product_sale'];
                    
                    $pro_img1 = $row_products['product_img1'];
                    
                    $pro_label = $row_products['product_label'];
                    
                    if($pro_label == "Sale"){
            
                        $product_price = " <del> ₹ $pro_price </del> ";
            
                        $product_sale_price = "/ ₹ $pro_sale_price ";
            
                    }else{
            
                        $product_price = "  ₹ $pro_price  ";
            
                        $product_sale_price = "";
            
                    }
            
                    if($pro_label == ""){
            
                    }else{
            
                        $product_label = "
                        
                            <a href='#' class='label $pro_label'>
                            
                                <div class='thelabel'> $pro_label </div>
                                <div class='labelBackground'>  </div>
                            
                            </a>
                        
                        ";
            
                    }
                    
                    echo "
                    
                    <div class='col-md-3 col-sm-6 center-responsive'>
                    
                        <div class='product'>
                        
                            <a href='details.php?pro_id=$pro_id'>
                            
                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                            
                            </a>
                            
                            <div class='text'>
            
                            
                                <h3>
                        
                                    <a href='details.php?pro_id=$pro_id'>
            
                                        $pro_title
            
                                    </a>
                                
                                </h3>
                                
                                <p class='price'>
                                
                                $product_price &nbsp;$product_sale_price
                                
                                </p>
                                
                                <p class='button'>
                                
                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
            
                                        View Details
            
                                    </a>
                                
                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
            
                                        <i class='fa fa-shopping-cart'></i> Add to Cart
            
                                    </a>
                                
                                </p>
                            
                            </div>
            
                            $product_label
                        
                        </div>
                    
                    </div>
                    
                    ";
                       
                   }
                   
                   ?>
                   
                   
               </div><!-- #row same-heigh-row Finish -->
               
           </div><!-- col-md-12 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    <style>
        .img-look{
            height: 500px;
            width: 300px;
        }
    
    </style>
</body>
</html>
