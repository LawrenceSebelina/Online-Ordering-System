<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>
        <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "fast-moving") { ?>
            Fast-moving Stock Products
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "slow-moving") { ?>
            Slow-moving Stock Products
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks") { ?>
            Manage Stocks
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "categories") { ?>
            Manage Categories
        <?php } else { ?>
            Manage Inventory
        <?php } ?>
    </title>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php'); 
        include_once('assets/components/sidebars.php'); 
        include_once('../classes/inventoryClass.php'); 
        $datas = $classInventory->getProducts();
        $infos = $classInventory->getCategories();
        $details = $classInventory->getFMStockProducts();
        $stmts = $classInventory->getSMStockProducts();
        $inventoryLogs = $classInventory->getInventoryLogs();

        if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "inventory") {
            if ($userdetails['userType'] != "Head Admin") {
                echo "<script>
                    swal('Warning!', 'You are not allowed to access this page!', 'warning').then(function() {
                    window.location.assign('index.php?route=home');
                });
                </script>";
            }
        }
    ?>
    <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
        <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks") { ?>
           
            <?php if (isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "fast-moving") { ?>
                <div class="container">

                    <div class="shadow rounded mb-4">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                            <div class="border-bottom-custom-green mt-2 mx-2">
                                <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Fast-moving Stocks Menu</div>
                            </div>

                            <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                                <div class="col-md-2">
                                    <a href="index.php?route=inventory&view=stocks" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to Stocks" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                                </div>

                                <div class="col-md-5 col-lg-4 col-xl-3">
                                    <a href="index.php?route=inventory&view=stocks&type=slow-moving" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" title="View Slow-moving Products" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-arrow-trend-down fs-5 me-2"></i>Slow-moving Products</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-bottom-custom-green mb-4">
                        <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-arrow-trend-up fa-fw fs-4 me-2"></i>Fast-moving Stocks</div>
                    </div>
                    
                    <div class="card">
                        <div class="shadow rounded">
                            <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="d-none">Id</th>
                                            <th>Photo</th>
                                            <th>Description</th>
                                            <th class="text-center">Qty Sold</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if(!empty($details)) { ?>
                                        <?php foreach ($details as $details) { ?>
                                        <tr>
                                            <td class="d-none"><?php echo $details['productId']; ?></td>
                                            <td><img src="<?php echo "../" . $details['productImgs']; ?>" width="50" height="50" alt=""></td>
                                            <td><?php echo $details['productDesc']; ?></td>
                                            <td class="bg-primary text-light text-end"><?php echo $details['quantitySold']; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>     
                    </div>

                </div>
            <?php } elseif (isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "slow-moving") { ?>
                <div class="container">

                    <div class="shadow rounded mb-4">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                            <div class="border-bottom-custom-green mt-2 mx-2">
                                <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Slow-moving Stocks Menu</div>
                            </div>

                            <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                                <div class="col-md-2">
                                    <a href="index.php?route=inventory&view=stocks" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to Stocks" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                                </div>

                                <div class="col-md-5 col-lg-4 col-xl-3">
                                    <a href="index.php?route=inventory&view=stocks&type=fast-moving" class="btn btn-primary d-flex align-items-center fw-bold me-2 w-100" title="View Fast-moving Products" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-arrow-trend-up fs-5 me-2"></i>Fast-moving Products</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-bottom-custom-green mb-4">
                        <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-arrow-trend-down fs-5 me-2"></i>Slow-moving Stocks</div>
                    </div>
                    
                    <div class="card">
                        <div class="shadow rounded">
                            <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="d-none">Id</th>
                                            <th>Photo</th>
                                            <th>Description</th>
                                            <th class="text-center">Qty Sold</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if(!empty($stmts)) { ?>
                                        <?php foreach ($stmts as $stmt) { ?>
                                        <tr>
                                            <td class="d-none"><?php echo $stmt['productId']; ?></td>
                                            <td><img src="<?php echo "../" . $stmt['productImgs']; ?>" width="50" height="50" alt=""></td>
                                            <td><?php echo $stmt['productDesc']; ?></td>
                                            <td class="bg-danger text-light text-end"><?php echo $stmt['quantitySold']; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>     
                    </div>

                </div>
            <?php } else { ?>
                <div class="container">

                    <div class="shadow rounded mb-4">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                            <div class="border-bottom-custom-green mt-2 mx-2">
                                <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Stocks Menu</div>
                            </div>

                            <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                                <div class="col-md-2">
                                    <a href="index.php?route=inventory" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to Inventory" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                                </div>

                                <div class="col-md-5 col-lg-4 col-xl-3">
                                    <a href="index.php?route=inventory&view=stocks&type=fast-moving" class="btn btn-primary d-flex align-items-center fw-bold me-2 w-100" title="View Fast-moving Products" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-arrow-trend-up fs-5 me-2"></i>Fast-moving Products</a>
                                </div>

                                <div class="col-md-5 col-lg-4 col-xl-3">
                                    <a href="index.php?route=inventory&view=stocks&type=slow-moving" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" title="View Slow-moving Products" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-arrow-trend-down fs-5 me-2"></i>Slow-moving Products</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-bottom-custom-green mb-4">
                        <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-boxes-stacked fa-fw fs-4 me-2"></i>Stocks</div>
                    </div>
                    
                    <div class="card">
                        <div class="shadow rounded">
                            <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                                <div class="d-flex justify-content-center mb-4 row row-cols-1 row-cols-xl-3 g-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col d-flex align-items-center justify-content-start">
                                                <i class="fa-solid fa-square fs-1 me-2 text-success"></i> <span class="fw-bold">— Good Stock Products</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col d-flex align-items-center justify-content-start">
                                                <i class="fa-solid fa-square fs-1 me-2 text-warning"></i> <span class="fw-bold">— Critical Stock Products</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col d-flex align-items-center justify-content-start">
                                                <i class="fa-solid fa-square fs-1 me-2 text-danger"></i> <span class="fw-bold">— Out of Stock Products</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="d-none">Id</th>
                                            <th>Photo</th>
                                            <th>Description</th>
                                            <th>Model</th>
                                            <th class="text-center">Remaining Qty</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if(!empty($datas)) { ?>
                                        <?php foreach ($datas as $data) { ?>
                                        <tr>
                                            <td class="d-none"><?php echo $data['productId']; ?></td>
                                            <td><img src="<?php echo "../" . $data['productImgs']; ?>" width="50" height="50" alt=""></td>
                                            <td><?php echo $data['productDesc']; ?></td>
                                            <td><?php echo $data['model']; ?></td>

                                            <?php if ($data['quantity'] == 0 ) { ?>
                                                <td class="bg-danger text-light text-end"><?php echo $data['quantity']; ?></td>
                                            <?php } elseif ($data['quantity'] <= 20 ) {?>
                                                <td class="bg-warning text-light text-end"><?php echo $data['quantity']; ?></td>
                                            <?php } else { ?>
                                                <td class="bg-success text-light text-end"><?php echo $data['quantity']; ?></td>
                                            <?php } ?>

                                            <td class="text-center">
                                                <button type="button" class="addProductStock btn btn-primary" title="Add New Product Stock" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-plus"></i></button>
                                                <button type="button" class="removeProductStock btn btn-danger" title="Deduct Product Stock" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-minus"></i></button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>     
                    </div>

                    <?php include_once('assets/components/inventoryModals.php'); ?>

                </div>
            <?php } ?>
    
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "inventory-logs") { ?>
            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Inventory Logs Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=inventory" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to Inventory" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-book-open fa-fw fs-4 me-2"></i>Inventory Logs</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>User Type</th>
                                        <th>Action Taken</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if(!empty($inventoryLogs)) { ?>
                                    <?php foreach ($inventoryLogs as $inventoryLog) { ?>
                                    <tr>
                                        <td><?php echo $inventoryLog['firstName']." ". $inventoryLog['lastName']; ?></td>
                                        <td><?php echo $inventoryLog['userType']; ?></td>
                                        <td><?php echo $inventoryLog['activityDone']; ?></td>
                                        <td class="text-center"><?php echo date('m/d/Y', strtotime($inventoryLog['activityDate'])); ?></td>
                                        <td class="text-center"><?php echo date('h:i a', strtotime($inventoryLog['activityDate'])); ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>     
                </div>

                <?php include_once('assets/components/inventoryModals.php'); ?>

            </div>

        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "categories") { ?>
            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-gree"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Categories Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=inventory" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to Inventory" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-table-list fa-fw fs-4 me-2"></i>Categories</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <div class="d-flex justify-content-start mb-4">
                                <button type="button" class="btn btn-success d-flex align-items-center fw-bold me-2" data-bs-toggle="modal" data-bs-target="#addCategories"><i class="fa-solid fa-square-plus fs-5 me-2"></i>Add Category</button>
                            </div>

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none">Id</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if(!empty($infos)) { ?>
                                    <?php foreach ($infos as $info) { ?>
                                    <tr>
                                        <td class="d-none"><?php echo $info['categoryId']; ?></td>
                                        <td><?php echo $info['categoryName']; ?></td>
                                        <td><?php echo $info['categoryDesc']; ?></td>
                                        <td class="text-center">
                                            <button type="button" class="updateCategories btn btn-primary" title="Edit Category" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-pen-to-square fs-5 align-middle"></i></button>
                                            <button type="button" class="deleteCategories btn btn-danger" title="Delete Category" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-trash-can fs-5 align-middle"></i></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>     
                </div>

                <?php include_once('assets/components/inventoryModals.php'); ?>

            </div>
        <?php } elseif (isset($_GET['route']) && !empty($_GET['route']) && !isset($_GET['view']) && empty($_GET['view']) && $_GET['route'] == "inventory") { ?>

            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Inventory Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=inventory&view=stocks" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Manage Stocks" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-boxes-stacked fs-5 me-2"></i>Manage Stocks</a>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xl-3">
                                <a href="index.php?route=inventory&view=categories" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" title="Manage Categories" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-table-list fs-5 me-2"></i>Manage Categories</a>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xl-3">
                                <a href="index.php?route=inventory&view=inventory-logs" class="btn btn-info d-flex align-items-center fw-bold me-2 w-100" title="Inventory Logs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-book-open fs-5 me-2"></i>Inventory Logs</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-warehouse fa-fw fs-4 me-2"></i>Inventory</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">
                            
                            <div class="d-flex justify-content-start mb-4">
                                <button type="button" class="btn btn-success d-flex align-items-center fw-bold me-2" data-bs-toggle="modal" data-bs-target="#addProducts"><i class="fa-solid fa-square-plus fs-5 me-2"></i>Add Product</button>
                            </div>

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none">Id</th>
                                        <th>Photo</th>
                                        <th class="d-none">Photo Dir</th>
                                        <th class="d-none">Description</th>
                                        <th class="d-none">Category</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Model</th>
                                        <th class="text-center">Weight</th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Desc</th>
                                        <th class="d-none">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($datas)) { ?>
                                    <?php foreach ($datas as $data) { ?>
                                    <tr>
                                        <td class="d-none"><?php echo $data['productId']; ?></td>
                                        <td><img src="<?php echo "../" . $data['productImgs']; ?>" width="50" height="50" alt=""></td>
                                        <td class="d-none"><?php echo $data['productImgs']; ?></td>
                                        <td class="d-none"><?php echo $data['productDesc']; ?></td>
                                        <td class="d-none"><?php echo $data['categoryId']; ?></td>
                                        <td style="font-size: 0.8rem;"><?php echo $data['categoryName']; ?></td>
                                        <td style="font-size: 0.8rem;"><?php echo $data['model']; ?></td>
                                        <td style="font-size: 0.8rem;" class="text-end"><?php echo $data['weight']; ?></td>
                                        <td style="font-size: 0.8rem;" class="text-center"><?php echo $data['unit']; ?></td>
                                        <td style="font-size: 0.8rem;" class="text-end">₱<?php echo number_format($data['unitPrice'], 2); ?></td>
                                        <td class="d-none"><?php echo $data['description']; ?></td>
                                        <td class="text-center"> <!-- class="d-none" -->
                                            <button type="button" class="viewProducts btn btn-warning" title="View Product" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-eye fs-5 align-middle"></i></button>
                                            <button type="button" class="updateProducts btn btn-primary" title="Edit Product" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-pen-to-square fs-5 align-middle"></i></button>
                                            <button type="button" class="deleteProducts btn btn-danger" title="Delete Product" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-trash-can fs-5 align-middle"></i></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>     
                </div>

                <?php include_once('assets/components/inventoryModals.php'); ?>

            </div>

        <?php } else { 
            echo "<script>
                window.location.assign('index.php?route=404');
            </script>";
        } ?>
    </main>

    <?php include_once('assets/components/footer.php'); ?>
    
    <script>
        //TODO Javascript for Image Previewer
        function previewImageProduct(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var previewProduct = document.getElementById("photo-previewer-product");
                previewProduct.src = src;
                previewProduct.style.display = "block";
            }
        }

        function updateImageProduct(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var updateProduct = document.getElementById("photo-update-product");
                updateProduct.src = src;
                updateProduct.style.display = "block";
            }
        }
        //TODO End of JavaScript for Image Previewer
    </script>
</body>
</html>