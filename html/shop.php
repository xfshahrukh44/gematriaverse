<?php include 'include/header.php' ?>
<?php include 'include/menu.php' ?>



<section class="shop_pg">
     <div class="container">
          <div class="row">
               <div class="col-lg-12">
                    <div class="hoodie_shirt">
                         <div class="main_shirt">
                              <h3>Apparel</h3>
                              <a href="{{route('product-detail')}}">
                                   <img src="images/hoodie_1.jpg" class="img-fluid" alt="">
                                   <h5>Hoodie</h5>
                                   <p><span>$</span>49.85 – <span>$</span>51.85</p>
                                   <div class="cart_hoodie">
                                        <h6><i class="fa-solid fa-cart-shopping"></i> Select options</h6>
                                   </div>
                              </a>
                         </div>

                         <div class="search_product">
                              <h4>Search</h4>
                              <form>
                                   <input type="search" name="search" class="form-control" placeholder="Search..." required>
                                   <i class="fa-solid fa-magnifying-glass"></i>
                              </form>
                              <h4>Categories</h4>
                              <div class="select-apparel">
                                   <p>Apparel <span>(1)</span></p>
                                   <p>Memberships <span>(1)</span></p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>



<?php include 'include/footer.php' ?>