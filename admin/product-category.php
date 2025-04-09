<?php

include "header.php";

?>

<section class="trending-product section" style="margin-top: 12px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                       <?php
                         $product_cat=$_REQUEST['id'];
                        
                         $q1="select * from product_cat where cat_id=$product_cat ";
                         $res1=mysqli_query($conn,$q1);
                         $cat_data=mysqli_fetch_array($res1);

                         echo '<h1 style="text-transform:capitalize; color:blue;"><b>'.$cat_data['name'];'</b></h1>';
                        
                        ?>
                     <!--   <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
-->
                    </div>
                </div>
            </div>
            <div class="row">
               
                    <!-- Start Single Product -->

                    <?php
                          $product_cat=$_REQUEST['id'];
                          include 'db.php';
                          $q="select * from products where cat_id=$product_cat ";
                          $res=mysqli_query($conn,$q);
                          while($data=mysqli_fetch_array($res))
                        {
                            $q2="select * from product_cat where cat_id=".$data['cat_id'];
                           // print_r($q2);
                            $res2=mysqli_query($conn,$q2);
                            $cat_data=mysqli_fetch_array($res2);
                        ?>

                    <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                           <a href="product-detail.php?id=<?php echo $data['product_id'];?>"> <img src="<?php echo $data['image'];?>" alt="#"></a>
                           <span class="sale-tag">-25%</span>
                            <div class="button">
                                <a href="product-detail.php?id=<?php echo $data['product_id'];?>" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category"><?php echo $cat_data['name'];?></span>
                            <h4 class="title">
                                <a href="produt-detail.php"><?php echo $data['name'];?></a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span style="color:green;" >$<?php echo $data['price'];?></span>
                                <span style="color:red;"  class="discount-price">$300.00</span>
                            </div>
                        </div>
                    </div>
                    </div>

  <?php
                        }
                        ?>
                    <!-- End Single Product -->
                
                
            </div>
        </div>
    </section>

<?php

include "footer.php";

?>