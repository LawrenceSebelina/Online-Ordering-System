<?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route']  == "product") { ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-4 mt-5">
            <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green">
                <i class="fa-solid fa-table-list fa-fw fs-4 me-2"></i>From the Same Category
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-4 row-cols-xl-5 row-cols-sm-2 g-3">

        <?php
            $categoryUniqueId = $data['categoryUniqueId'];
            $productUniqueId = $data['productUniqueId'] ?? $_GET['pid'];
            $datas = $classInventory->getProductsByCatPro($categoryUniqueId, $productUniqueId);
            if (!empty($datas)) { 
        ?>

        <?php foreach ($datas as $data) { ?>

            <div class="col">
                <a href="index.php?route=product&pid=<?php echo $data['productUniqueId']; ?>&pd=<?php echo $data['model']; ?>" class="text-decoration-none text-dark">
                    <div class="card shadow bg-success bg-opacity-50 card-product h-100">
                        
                        <img src="<?php echo $data['productImgs'] ?? ""; ?>" class="card-img-top" height="180" alt="...">

                        <div class="card-body bg-light bg-opacity-25" style="height: 8rem;">
                            <p class="card-title" style="font-size: 0.6rem;">Product Name: <?php echo $data['productDesc'] ?? ""; ?></p>
                            <p class="card-title" style="font-size: 0.55rem;">Model: <?php echo $data['model'] ?? ""; ?></p>
                            <p class="card-text" style="font-size: 0.55rem;"><?php echo $data['categoryName'] ?? ""; ?></p>
                        </div>


                        <?php if ($data['unitPrice'] < 1000) {
                            $unitPrice = number_format($data['unitPrice']);
                        } else if ($data['unitPrice'] < 1000000) {
                            $unitPrice = number_format($data['unitPrice'] / 1000, 1) . "K";
                        } else if ($data['unitPrice'] < 1000000000) {
                            $unitPrice = number_format($data['unitPrice'] / 1000000, 1) . "M";
                        } else { 
                            $unitPrice = number_format($data['unitPrice'] / 1000000000, 1) . "B";
                        }?>
                        
                        
                        <?php if ($data['quantitySold'] < 1000) {
                            $quantitySold = number_format($data['quantitySold']) . " sold";
                        } else if ($data['quantitySold'] < 1000000) {
                            $quantitySold = number_format($data['quantitySold'] / 1000, 1) . "K sold";
                        } else if ($data['quantitySold'] < 1000000000) {
                            $quantitySold = number_format($data['quantitySold'] / 1000000, 1) . "M sold";
                        } else { 
                            $quantitySold = number_format($data['quantitySold'] / 1000000000, 1) . "B sold";
                        }?>

                        <div class="card-footer bg-white p-2">
                            <small class="text-success float-start">₱<?php echo $unitPrice ?? ""; ?></small>
                            <small class="text-muted float-end"><?php echo $quantitySold ?? ""; ?></small>
                        </div>
                        
                    </div>
                </a>
            </div> 

            <?php } ?>
            <?php } else { ?>  
                <p>No products available</p>
            <?php } ?>  
        </div>

    </div>
<?php } else { ?>
    
    <div class="container">
        <div class="border-bottom-custom-green mb-4 mt-5">
            <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green">
                <i class="fa-solid fa-cart-shopping fa-fw fs-4 me-2"></i>Products
            </div>
        </div>

        <?php $datas = $classInventory->getTSProducts(); ?>

        <div class="row row-cols-1 row-cols-md-4 row-cols-xl-5 row-cols-sm-2 g-3">

        <?php if (!empty($datas)) { ?>
        <?php foreach ($datas as $data) { ?>

            <div class="col">
                <a href="index.php?route=product&pid=<?php echo $data['productUniqueId']; ?>&pd=<?php echo $data['model']; ?>" class="text-decoration-none text-dark">
                    <div class="card shadow bg-success bg-opacity-50 card-product h-100">
                        
                        <img src="<?php echo $data['productImgs'] ?? ""; ?>" class="card-img-top" height="180" alt="...">

                        <div class="card-body bg-light bg-opacity-25" style="height: 8rem;">
                            <p class="card-title" style="font-size: 0.8rem;">Product Name: <?php echo $data['productDesc'] ?? ""; ?></p>
                            <p class="card-title" style="font-size: 0.65rem;">Model: <?php echo $data['model'] ?? ""; ?></p>
                            <p class="card-text" style="font-size: 0.65rem;"><?php echo $data['categoryName'] ?? ""; ?></p>
                        </div>

                        <?php if ($data['unitPrice'] < 1000) {
                            $unitPrice = number_format($data['unitPrice']);
                        } else if ($data['unitPrice'] < 1000000) {
                            $unitPrice = number_format($data['unitPrice'] / 1000, 1) . "K";
                        } else if ($data['unitPrice'] < 1000000000) {
                            $unitPrice = number_format($data['unitPrice'] / 1000000, 1) . "M";
                        } else { 
                            $unitPrice = number_format($data['unitPrice'] / 1000000000, 1) . "B";
                        }?>
                        
                        
                        <?php if ($data['quantitySold'] < 1000) {
                            $quantitySold = number_format($data['quantitySold']) . " sold";
                        } else if ($data['quantitySold'] < 1000000) {
                            $quantitySold = number_format($data['quantitySold'] / 1000, 1) . "K sold";
                        } else if ($data['quantitySold'] < 1000000000) {
                            $quantitySold = number_format($data['quantitySold'] / 1000000, 1) . "M sold";
                        } else { 
                            $quantitySold = number_format($data['quantitySold'] / 1000000000, 1) . "B sold";
                        }?>

                        <div class="card-footer bg-white p-2">
                            <small class="text-success float-start">₱<?php echo $unitPrice ?? ""; ?></small>
                            <small class="text-muted float-end"><?php echo $quantitySold ?? ""; ?></small>
                        </div>
                       
                    </div>
                </a>
            </div> 

            <?php } ?>
            <?php } else {?>
                <p>No products available</p>
            <?php } ?>

        </div>

        <div class="row d-flex justify-content-center mb-3 mt-4">
            <div class="col-md-4">
                <a href="index.php?route=all_products" class="w-100 btn btn-sm btn-success d-flex align-items-center justify-content-center"><strong>See More</strong><i class="fa-solid fa-ellipsis fs-6 mt-2"></i></a>
            </div>
        </div>

    </div>

<?php } ?>