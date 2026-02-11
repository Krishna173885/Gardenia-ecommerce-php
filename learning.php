
 <?php 

    $active='Learning';
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
                       Learning
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
<div class="container" id="slider"><!-- container Begin -->
       
       <div class="col-md-12"><!-- col-md-12 Begin -->
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
               
               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol><!-- carousel-indicators Finish -->
            <a href="product.php">   
               <div class="carousel-inner"><!-- carousel-inner Begin -->
                  
              <?php 
                   
                   $get_slides = "select * from blog_slide LIMIT 0,1";
                   
                   $run_slides = mysqli_query($con,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $Lslides_name = $row_slides['Lslides_name'];
                       $Lslides_image = $row_slides['Lslides_image'];
                       
                       echo "
                       
                       <div class='item active'>
                    
                       <img src='admin_area/blog_slide/$Lslides_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                     $get_slides = "select * from blog_slide LIMIT 1,3";
                   
                    $run_slides = mysqli_query($con,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $Lslides_name= $row_slides['Lslides_name'];
                       $Lslides_image = $row_slides['Lslides_image'];
                       
                       echo "
                       
                       <div class='item'>
                       
                       <img src='admin_area/blog_slide/$Lslides_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   ?>
                  
                      
                          
               </div><!-- carousel-inner Finish -->
                </a> 
               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a><!-- left carousel-control Finish -->
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a><!-- left carousel-control Finish -->
               
           </div><!-- carousel slide Finish -->
           
       </div><!-- col-md-12 Finish -->
       
       </div><!-- container Finish -->
       
      <div id="advantages"><!-- #advantages Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="same-height-row"><!-- same-height-row Begin -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-heart"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">Gardening Basics</a></h3>
                       
                       <p>Growing Lily Plants: What Colour is your Favourite? . </p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-tag"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">Garden Maintenance</a></h3>
                       
                       <p>Which Soil is best for Plant Growth?.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-thumbs-up"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">Kitchen Gardening</a></h3>
                       
                       <p>These 10 Fruit Plants You Must Plant In Your Home Garden.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
           </div><!-- same-height-row Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- #advantages Finish -->
   
   <div id="hot"><!-- #hot Begin -->
       
      
           
           <div class="container"><!-- container Begin -->
               
               <div class="col-md-12"><!-- col-md-12 Begin -->
                   
                   <h2>
                      The problems faced while gardening
                   </h2>
                   
               </div><!-- col-md-12 Finish -->
               
           </div><!-- container Finish -->
           
      
   </div><!-- #hot Finish -->
   
   <div id="content" class="container"><!-- container Begin -->
       
       <div class="row"><!-- row Begin -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="images/blog%201.jpg" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="Blog1.php">
                              How to Get Rid of Bagworms in the Garden?
                           </a>
                       </h3>
                       <center>
                       <p1 class="price">Bagworms are moths that feed on shrubs and trees during their larval stage. They pesky pests are small and create little diamond-shaped bags on arborvitae.</p1>
                       </center>
                       <p class="button">
                             
                           <a href="Blog1.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Read More
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="Blog3.php">
                       
                       <img class="img-responsive" src="images/blog3.jpg" alt="Product 1">
                       
                   </a>
                <style>
                    p1{
                        text-align: justify;
                        justify-content: center;
                        color: darkorange;
                        font-size: 20px;
                
                    }
                   
                   
                   </style>   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="Blog3.php">
                              Divide Congested Pot-plants
                           </a>
                       </h3>
                       <center>
                       <p1 class="price">Once a plant has captured the entire pot, and if it is not practical to move to a larger one, the division may revive it and will also give you a number of extra plants. Not all plants respond to division.</p1>
                       </center>
                       <p class="button">
                        
                           
                           <a href="Blog3.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                 Read More
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="images/blog4.jpg" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="Blog4.php">
                              Plants That Grow Without Soil At Home
                           </a>
                       </h3>
                       <center>
                       <p1 class="price">The thought of gardening is sure to have you all agog and raring to go. However, many people, especially city dwellers are reluctant to get their hands dirty.  </p1>
                       </center>
                       <p class="button">
                           
                
                           
                           <a href="Blog4.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                  Read More
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="images/blog2.jpg" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="Blog2.php">
                                10 Ways to Save Your Drying or Dead Plant 
                           </a>
                       </h3>
                       <center>
                       <p1 class="price">If you are into gardening, then the reason for you coming here is that you have a dead plant in your hand. It can happen irrespective  for plants in your garden.</p1>
                       </center>
                       <p class="button">
                          
                           <a href="Blog2.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Read More
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
        
       </div><!-- row Finish -->
       
   </div><!-- container Finish -->
    
    
       
       
</div>  
</div>
</div>

   
    <?php
    include("includes/footer.php");
    ?>
  
   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>
</body>
 </html>

 