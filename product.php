<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Product: <?php echo $_GET['pd']; ?></title>
</head>
<body class="d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php'); 
        include_once('classes/inventoryClass.php');
    ?>

        <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
            <?php 
                if (isset($_GET['pid']) && !empty($_GET['pid'])) { 
                $productUniqueId = $_GET['pid'];
                $datas = $classInventory->getProduct($productUniqueId);
            ?>
            
                <div class="container mb-4">

                    <?php if (!empty($datas)) { ?>
                    <?php foreach ($datas as $data) { ?>

                    <?php $classInventory->addToCart(); ?>
                    
                        <div class="card shadow mb-3">
                            <div class="row g-0">
                                <div class="col-md-5 d-flex align-items-center">
                                    <div class="card-body" style="height: 20rem;">
                                        <img src="<?php echo $data['productImgs'] ?? ""; ?>" class="img-fluid rounded-start h-100 w-100" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <form method="post">
                                        <div class="card boder border-start">
                                            <div class="card-header p-3 bg-custom-green text-light bg-opacity-50">
                                                <strong><?php echo $data['productDesc'] ?? ""; ?> (<?php echo $data['model'] ?? ""; ?>)</strong> 
                                            </div>
                                            <div class="card-body mx-3">
                                                <input type="hidden" id="cartUserId" name="cartUserId" value="<?php echo $userdetails['userId'] ?? ""; ?>">
                                                <input type="hidden" id="cartProdId" name="cartProdId" value="<?php echo $data['productId'] ?? ""; ?>">
                                                <input type="hidden" id="cartProdUp" name="cartProdUp" value="<?php echo $data['unitPrice'] ?? ""; ?>">
                                                <input type="hidden" id="cartProductRQty" name="cartProductRQty" value="<?php echo $data['quantity'] ?? ""; ?>">
                                                <h3 class="text-end">₱<?php echo number_format($data['unitPrice'], 2) ?? ""; ?></h3>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <p class="card-text">Model: <?php echo $data['model'] ?? ""; ?></p>
                                                        <p class="card-text">Category: <?php echo $data['categoryName'] ?? ""; ?></p>
                                                        <p class="card-text">Weight: <?php echo $data['weight'] ?? ""; ?> <?php echo $data['unit'] ?? ""; ?></p>
                                                        <p class="card-text">Number Sold: <?php echo $data['quantitySold'] ?? ""; ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="card-text">Description:</p>
                                                        <p class="card-text" style="text-indent: 1rem; text-align: justify; text-justify: inter-word;"><?php echo $data['description'] ?? ""; ?> <?php echo $data['unit'] ?? ""; ?></p>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="row row-cols-1 row-cols-sm-2 g-0 text-center">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="input-group">
                                                            <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="cartProductQty">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <input type="text" name="cartProductQty" class="form-control text-center input-number" value="1" min="1" max="<?php echo $data['quantity'] ?? ""; ?>">
                                                            <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="cartProductQty">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-6 mt-2 text-start">
                                                        <span class="input-group-plaintext mx-2"><?php echo $data['quantity'] ?? ""; ?> pieces available</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-footer text-end bg-custom-green bg-opacity-50">
                                            
                                                <?php if (!empty($userdetails)) { ?>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="submit" name="addToCart" class="btn btn-primary d-flex align-items-center justify-content-center"><i class="fa-solid fa-cart-plus fs-3 me-2"></i><strong>Add to Cart</strong></button>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="d-flex justify-content-end">
                                                        <a href="index.php?route=signin" class="btn btn-primary d-flex align-items-center justify-content-center"><i class="fa-solid fa-cart-plus fs-3 me-2"></i><strong>Add to Cart</strong></a>
                                                    </div>
                                                <?php } ?>
                                            
                                            </div>
                                        </div>  
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>  
                    <?php } else {
                        echo "<script>
                            swal('Warning!', 'Not enough quantity!', 'warning').then(function() {
                            window.location.assign('index.php?route=home');
                        });
                        </script>";
                    } ?>  

                </div>

                <?php include_once('productsDisplay.php'); ?>
                
            <?php } else { 
                echo "<script>
                    swal('Warning!', 'Please select a product!', 'warning').then(function() {
                    window.location.assign('index.php?route=home');
                });
                </script>";
            } ?>  
        </main>

    <?php include_once('assets/components/footer.php'); ?>
    
</body>
</html>