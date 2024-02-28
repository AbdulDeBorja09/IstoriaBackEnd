<?php 
$pid = 1;
?>
<div class="modal fade" id="exampleModal" class="exampleModal" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content" style="background-color: white">
        <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$pid'") or die ('query failed');
            if(mysqli_num_rows($select_products)>0){
                $product = mysqli_fetch_assoc($select_products);
        ?>
            <div class="row">
                <div class="col-lg-6">
                    <img class="modal-coffee-img" src="../products/<?php echo  $product['image']?>" alt="coffee" />
                </div>
                <div class="modal-div-2 col-lg-6">
                    <h1><?php echo  $product['name']?></h1>
                    <div class="star">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                    <h5>₱ <?php echo  $product['price']?>.00</h5>
                    <h6>CHOICES</h6>
                    <input type="radio" class="btn-check" name="product_type" id="option5" autocomplete="off" checked value="hot"/>
                    <label class="radiolabel btn" for="option5" >HOT</label>

                    <input type="radio" class="btn-check" name="product_type" id="option6" autocomplete="off" value="iced"/>
                    <label class="btn" for="option6">ICED</label>
                    <h6>SIZE</h6>
                    <input type="radio" class="btn-check" name="product_size" id="small" autocomplete="off" checked  value="16 oz"/>
                    <label class="btn" for="small">16 OZ</label>

                    <input type="radio" class="btn-check" name="product_size" id="large" autocomplete="off" value="22 oz"/>
                    <label class="btn" for="large">22 OZ</label>

                    <h6>ADD ONS</h6>

                    <table class="addonts-table w-50" style="background-color: #f6f3f1">
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" class="btn-check" id="espresso" autocomplete="off" />
                                    <label class="btn" for="espresso">ESPRESSO SHOT</label>
                                </td>
                                <td>
                                    <h5>₱ 79.00</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="btn-check" id="sauce" autocomplete="off" />
                                    <label class="btn" for="sauce">SAUCE </label>
                                </td>
                                <td>
                                    <h5>₱ 79.00</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="btn-check" id="syrup" autocomplete="off" />
                                    <label class="btn" for="syrup">SYRUP </label>
                                </td>
                                <td>
                                    <h5>₱ 79.00</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="btn-check" id="drizzle" autocomplete="off" />
                                    <label class="btn" for="drizzle">DRIZZLE </label>
                                </td>
                                <td>
                                    <h5>₱ 79.00</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="add-to-tray w-100 btn">ADD TO TRAY</button>
                    <hr />
                    <a href="user_viewpage.php" class="viewdetails"><span class="hover-underline-animation">VIEW
                            FULL DETAILS</span>
                        <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                            viewBox="0 0 46 16">
                            <path id="Path_10" data-name="Path 10"
                                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                transform="translate(30)"></path>
                        </svg>
                    </a>
                <hr />
                </div>
            </div>
            <?php 
                }
            
            ?>
        </div>
    </div>
</div>

    