<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Home</title>
</head>
<body class="d-flex flex-column h-100">
    <?php
        include_once('assets/components/header.php'); 
        include_once('classes/inventoryClass.php');
    ?>

        <?php $datas = $classInventory->getProductsLimitTen(); ?>
    
        <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
            <div class="container">

                <div class="border-bottom-custom-green mb-4 mt-1"> <!-- card bg-custom-green -->
                    <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-arrow-trend-up fs-4 me-2"></i>Top Products</div>
                </div>
                
                <div class="card shadow mb-4">
                    <div class="row g-0">

                        <div class="col-lg-6">
                            <div class="card-body">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <?php if (!empty($datas)) { ?>
                                        <?php foreach ($datas as $data) { ?>
                                            <div class="swiper-slide">
                                                <div class="position-relative d-flex justify-content-center">
                                                    <img src="<?php echo $data['productImgs'] ?? ""; ?>" class="img-fluid" alt="...">
                                                    <h4 class="text-custom-green pb-4 bottom-0 position-absolute"><?php echo $data['model'] ?? ""; ?></h4>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card-body">
                                <div class="swiper mySwiperAlt">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide"><img src="assets/images/first-slide.png" class="img-fluid" alt="..."></div>
                                        <div class="swiper-slide"><img src="assets/images/second-slide.png" class="img-fluid" alt="..."></div>
                                        <div class="swiper-slide"><img src="assets/images/third-slide.png" class="img-fluid" alt="..."></div>
                                        <div class="swiper-slide"><img src="assets/images/fourth-slide.png" class="img-fluid" alt="..."></div>
                                        <div class="swiper-slide"><img src="assets/images/fifth-slide.png" class="img-fluid" alt="..."></div>
                                        <div class="swiper-slide"><img src="assets/images/sixth-slide.png" class="img-fluid" alt="..."></div>
                                        <div class="swiper-slide"><img src="assets/images/seventh-slide.png" class="img-fluid" alt="..."></div>
                                        <div class="swiper-slide"><img src="assets/images/eight-slide.png" class="img-fluid" alt="..."></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <?php include_once('productsDisplay.php'); ?>

        </main>

    <?php include_once('assets/components/footer.php'); ?>
    
</body>
</html>