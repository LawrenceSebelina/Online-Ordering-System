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
    
        <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
            <div class="container">
                <div class="border-bottom-custom-green mb-4 mt-1">
                    <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green">
                        <i class="fa-solid fa-cart-shopping fa-fw fs-4 me-2"></i>All Products
                    </div>
                </div>

                <?php
                    if (isset($_GET['page_no']) && !empty($_GET['page_no']) && $_GET['page_no'] == "0") {
                        echo "<script>
                            window.location.assign('index.php?route=404');
                        </script>";
                    } elseif (isset($_GET['page_no']) && !empty($_GET['page_no']) && $_GET['page_no'] != "") {
                        $page_no = $_GET['page_no'];
                    }  else {
                        $page_no = 1;
                    }

                    $total_records_per_page = 24;
                    $offset = ($page_no - 1) * $total_records_per_page;
                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;
                    $adjacents = "2"; 

                    $datas = $classInventory->getProductsPerPage($page_no, $total_records_per_page, $offset, $previous_page, $next_page, $adjacents);
                    $infos = $classInventory->getProducts();
                    $datacount = count($infos);
                    $total_no_of_pages = ceil($datacount / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1;
                ?>

                <div class="row row-cols-1 row-cols-md-4 row-cols-xl-5 row-cols-sm-2 g-3">

                <?php if (!empty($datas)) { ?>
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
                    <?php } else {?>
                        <p>No products available</p>
                    <?php } ?>

                </div>

                <?php if (!empty($datas) && $datacount > 24) { ?>
                    <div class="d-flex justify-content-center mt-4">
                        <ul class="pagination">
                            <!-- First -->
                            <?php if ($page_no > 1) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?route=all_products&page_no=1">First</a>
                                </li>
                            <?php } ?>

                            <!-- Previous -->
                            <?php if($page_no <= 1) { ?> 
                                <li class="page-item disabled">
                                    <a class="page-link">Previous</a>
                                </li>
                            <?php } else { ?>         
                                <li class="page-item">
                                    <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $previous_page ?>">Previous</a>
                                </li>
                            <?php } ?>  

                            <!-- Numbers -->
                            <?php if($total_no_of_pages <= 10) { ?> 
                                <?php for ($counter = 1; $counter <= $total_no_of_pages; $counter++) { ?>
                                    <?php if ($counter == $page_no) { ?>
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $counter; ?>"><?php echo $counter; ?></a>
                                        </li>
                                    <?php } else { ?>
                                        <li class="page-item">
                                            <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $counter; ?>"><?php echo $counter; ?></a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            <?php } elseif ($total_no_of_pages > 10) { ?>  
                                <?php if ($page_no <= 4) { ?>
                                    <?php for ($counter = 1; $counter < 8; $counter++) { ?>
                                        <?php if ($counter == $page_no) { ?>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link"><?php echo $counter; ?></a>
                                            </li>
                                        <?php } else { ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $counter; ?>"><?php echo $counter; ?></a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                        <li class="page-item">
                                            <a class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $second_last; ?>"><?php echo $second_last; ?></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $total_no_of_pages; ?>"><?php echo $total_no_of_pages; ?></a>
                                        </li>
                                <?php } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="index.php?route=all_products&page_no=1">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="index.php?route=all_products&page_no=2">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link">...</a>
                                    </li>

                                    <?php for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) { ?>
                                        <?php if ($counter == $page_no) { ?>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link"><?php echo $counter; ?></a>
                                            </li>
                                        <?php } else { ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $counter; ?>"><?php echo $counter; ?></a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>

                                    <li class="page-item">
                                        <a class="page-link">...</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $second_last; ?>"><?php echo $counter; ?></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $total_no_of_pages; ?>"><?php echo $counter; ?></a>
                                    </li>
                                <?php } else { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="index.php?route=all_products&page_no=1">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="index.php?route=all_products&page_no=2">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link">...</a>
                                    </li>

                                    <?php for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) { ?>
                                        <?php if ($counter == $page_no) { ?>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link"><?php echo $counter; ?></a>
                                            </li>
                                        <?php } else { ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $counter; ?>"><?php echo $counter; ?></a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>

                            <!-- Next -->
                            <?php if($page_no >= $total_no_of_pages) { ?>
                                <li class="page-item disabled">
                                    <a class="page-link">Next</a>
                                </li>
                            <?php } else {  ?>
                                <?php if($page_no < $total_no_of_pages) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $next_page ?>">Next</a>
                                    </li>
                                <?php } ?>
                            <?php } ?>

                            <!-- Last -->
                            <?php if ($page_no < $total_no_of_pages) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?route=all_products&page_no=<?php echo $total_no_of_pages ?>">Last</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </main>

    <?php include_once('assets/components/footer.php'); ?>
    
</body>
</html>