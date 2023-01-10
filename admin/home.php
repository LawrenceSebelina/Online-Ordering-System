<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Dashboard</title>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php'); 
        include_once('assets/components/sidebars.php'); 
        include_once('../classes/dashboardClass.php');
        $countDailySales = $classDashboard->countDailySales();
        
        $countWeeklySales = $classDashboard->countWeeklySales();
        $countMonthlySales = $classDashboard->countMonthlySales();
        $countYearlySales = $classDashboard->countYearlySales();
        $countProducts = $classDashboard->countProducts();
        $countGoodProducts = $classDashboard->countGoodProducts();
        $countCriticalProducts = $classDashboard->countCriticalProducts();
        $countStockoutProducts = $classDashboard->countStockoutProducts();
        $countFMStockProducts = $classDashboard->countFMStockProducts();
        $countOrders = $classDashboard->countOrders();
        $countOrdersApproved = $classDashboard->countOrdersApproved();
        $countOrdersDelivered = $classDashboard->countOrdersDelivered();
        $countServiceReqs = $classDashboard->countServiceReqs();
        $countSRAssigned = $classDashboard->countSRAssigned();
        $countSRDeclined = $classDashboard->countSRDeclined();
        $countSRDone = $classDashboard->countSRDone();

        if (!empty($countDailySales)) {
            foreach ($countDailySales as $countDailySale) {
                $dailyDate[] = $countDailySale['orderByDay'];
                $dailySales[] = $countDailySale['totalByDay'];
            }
        }

        if (!empty($countFMStockProducts)) {
            foreach ($countFMStockProducts as $countFMStockProduct) {
                $productModel[] = $countFMStockProduct['model'];
                $productQtySale[] = $countFMStockProduct['quantitySold'];
            }
        }

        if (!empty($countWeeklySales)) {
            foreach ($countWeeklySales as $countWeeklySale) {
                $weeklySale = $countWeeklySale['totalByWeek'];
            }
        }

        if (!empty($countMonthlySales)) {
            foreach ($countMonthlySales as $countMonthlySale) {
                $monthlySale = $countMonthlySale['totalByMonth'];
            }
        }

        if (!empty($countYearlySales)) {
            foreach ($countYearlySales as $countYearlySale) {
                $yearlySale = $countYearlySale['totalByYear'];
            }
        }
    ?>
    <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
        <div class="container">
            
            <div class="border-bottom-custom-green mb-4 mt-1">
                <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-gauge fa-fw fs-4 me-2"></i>Dashboard</div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-3">
                <div class="col-xl-3">
                    <div class="card border border-end-0 border-top-0 border-bottom-0 border-success border-5 shadow py-2 h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-bold text-success text-uppercase mb-1" style="font-size: 0.9rem;">Total Products</div>
                                    <div class="mb-0 fw-bold text-secondary h3 counter"><?php echo $countProducts ?? ""; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-cart-shopping fs-1 text-secondary text-opacity-50 align-middle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card border border-end-0 border-top-0 border-bottom-0 border-secondary border-5 shadow py-2 h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-bold text-secondary text-uppercase mb-1" style="font-size: 0.9rem;">Critical Products</div>
                                    <div class="mb-0 fw-bold text-secondary h3 counter"><?php echo $countCriticalProducts ?? ""; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-battery-quarter fs-1 text-secondary text-opacity-50 align-middle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card border border-end-0 border-top-0 border-bottom-0 border-danger border-5 shadow py-2 h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-bold text-danger text-uppercase mb-1" style="font-size: 0.9rem;">Out of Stock</div>
                                    <div class="mb-0 fw-bold text-secondary h3 counter"><?php echo $countStockoutProducts ?? ""; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-battery-empty fs-1 text-secondary text-opacity-50 align-middle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card border border-end-0 border-top-0 border-bottom-0 border-primary border-5 shadow py-2 h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-bold text-primary text-uppercase mb-1" style="font-size: 0.9rem;">Total Orders</div>
                                    <div class="mb-0 fw-bold text-secondary h3 counter"><?php echo $countOrders ?? ""; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-box fs-1 text-secondary text-opacity-50 align-middle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card border border-end-0 border-top-0 border-bottom-0 border-info border-5 shadow py-2 h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-bold text-info text-uppercase mb-1" style="font-size: 0.9rem;">Approved Orders</div>
                                    <div class="mb-0 fw-bold text-secondary h3 counter"><?php echo $countOrdersApproved ?? ""; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-clipboard-check fs-1 text-secondary text-opacity-50 align-middle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card border border-end-0 border-top-0 border-bottom-0 border-warning border-5 shadow py-2 h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-bold text-warning text-uppercase mb-1" style="font-size: 0.9rem;">Delivered Orders</div>
                                    <div class="mb-0 fw-bold text-secondary h3 counter"><?php echo $countOrdersDelivered ?? ""; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-truck-fast fs-1 text-secondary text-opacity-50 align-middle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3">
                    <div class="card border border-end-0 border-top-0 border-bottom-0 border-dark border-5 shadow py-2 h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-bold text-dark text-uppercase mb-1" style="font-size: 0.9rem;">Service Installation</div>
                                    <div class="mb-0 fw-bold text-secondary h3 counter"><?php echo $countServiceReqs ?? ""; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-screwdriver-wrench fs-1 text-secondary text-opacity-50 align-middle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3">
                    <div class="card border border-end-0 border-top-0 border-bottom-0 border-success border-5 shadow py-2 h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-bold text-success text-uppercase mb-1" style="font-size: 0.9rem;">Assigned Service Installation</div>
                                    <div class="mb-0 fw-bold text-secondary h3 counter"><?php echo $countSRAssigned ?? ""; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-clipboard-check fs-1 text-secondary text-opacity-50 align-middle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 g-3">
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow h-100">
                        <div class="card-header py-3 bg-dark">
                            <h6 class="m-0 fw-bold text-white">Recent Weekly Sales</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow h-100">
                        <div
                            class="card-header py-3 bg-dark">
                            <h6 class="m-0 fw-bold text-white">Top 5 Most Sold Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    
    <?php include_once('assets/components/footer.php'); ?>
    
    <script>
        //TODO Area Chart 
        const ctxArea = document.getElementById('myAreaChart');
        const myAreaChart = new Chart(ctxArea, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($dailyDate); ?>,
                datasets: [{
                    label: 'Recent Weekly Sales',
                    data: <?php echo json_encode($dailySales); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        //TODO Pie Chart 
        const ctxPie = document.getElementById('myPieChart');
        const myPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($productModel); ?>,
                datasets: [{
                    label: '# of Votes',
                    data: <?php echo json_encode($productQtySale); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
        
    </script>
    
</body>
</html>