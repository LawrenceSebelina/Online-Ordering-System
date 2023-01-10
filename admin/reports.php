<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Reports</title>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php');  
        include_once('assets/components/sidebars.php');
        
        if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "reports") {
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

       
        <div class="container">
            <div class="border-bottom-custom-green mb-4">
                <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-folder-open fa-fw fs-4 me-2"></i>Reports</div>
            </div>

            <div class="card">
                <div class="shadow rounded">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">
                    
                        <div class="d-flex justify-content-start mb-4 row row-cols-1 g-2">

                            <div class="row row-cols-1 g-2 mb-4">
                                <div class="col-md-12">
                                    <div class="border-bottom-custom-green mb-2">
                                        <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-warehouse fs-4 me-2"></i>Inventory Reports</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=inventory" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Inventory Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-warehouse fs-5 me-2"></i>Product Inventory Report</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=stocks&type=good" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Good Stock Products Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-battery-full fs-5 me-2"></i>Good Stock Products Report</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=stocks&type=critical" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Critical Stock Products Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-battery-quarter fs-5 me-2"></i>Critical Stock Products Report</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=stocks&type=stockout" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Out of Stock Products Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-battery-empty fs-5 me-2"></i>Out of Stock Products Report</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=stocks&type=fast-moving" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Fast-moving Products Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-arrow-trend-up fs-5 me-2"></i>Fast-moving Products Report</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=stocks&type=slow-moving" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Slow-moving Products Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-arrow-trend-down fs-5 me-2"></i>Slow-moving Products Report</a>
                                </div>

                            </div>
                            
                            <div class="row row-cols-1 g-2 mb-4">
                                <div class="col-md-12">
                                    <div class="border-bottom-custom-green mb-2">
                                        <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-chart-simple fs-4 me-2"></i>Sales Reports</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=transaction-logs" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Weekly Sales Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-handshake-angle fs-5 me-2"></i>Transaction Logs Report</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=sales&type=weekly" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Weekly Sales Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-calendar-week fs-5 me-2"></i>Weekly Sales Report</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=sales&type=monthly" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Monthly Sales Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-calendar-days fs-5 me-2"></i>Monthly Sales Report</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=sales&type=yearly" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Yearly Sales Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-calendar fs-5 me-2"></i>Yearly Sales Report</a>
                                </div>
                            </div>

                            <div class="row row-cols-1 g-2 mb-4">
                                <div class="col-md-12">
                                    <div class="border-bottom-custom-green mb-2">
                                        <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-box fs-4 me-2"></i>Orders Reports</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=orders" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Orders Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-box fs-5 me-2"></i>Orders Report</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=payments" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Order Payments Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-credit-card fs-5 me-2"></i>Order Payments Report</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=delivered-orders" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Delivered Orders Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-truck-fast fs-5 me-2"></i>Delivered Orders Report</a>
                                </div>

                            </div>

                            <div class="row row-cols-1 g-2">
                                <div class="col-md-12">
                                    <div class="border-bottom-custom-green mb-2">
                                        <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-screwdriver-wrench fs-4 me-2"></i>Service Installation Reports</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=services" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Service Installation Requests Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-screwdriver-wrench fs-5 me-2"></i>Service Installation Requests Report</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="index.php?route=report&view=assigned-service" class="btn btn-sm btn-outline-success text-black d-flex align-items-center fw-bold me-2 w-100" title="View Assigned Service Installation Requests Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-clipboard-check fs-5 me-2"></i>Assigned Service Installation Requests Report</a>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Modals -->

                </div>     
            </div>

        </div>

        
    </main>

    <?php include_once('assets/components/footer.php'); ?>

</body>
</html>