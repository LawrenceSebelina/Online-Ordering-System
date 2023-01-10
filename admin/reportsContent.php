<?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "inventory") { ?>
    <?php $inventoryDatas = $classReports->getProducts(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-warehouse fa-fw fs-4 me-2"></i>Product Inventory Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                    <table id="inventory-report" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Description</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Model</th>
                                <th class="text-center">Weight</th>
                                <th class="text-center">Unit</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(!empty($inventoryDatas)) { ?>
                            <?php foreach ($inventoryDatas as $inventoryData) { ?>
                            <tr>
                                <td><?php echo $inventoryData['productDesc']; ?></td>
                                <td><?php echo $inventoryData['categoryName']; ?></td>
                                <td><?php echo $inventoryData['model']; ?></td>
                                <td class="text-end"><?php echo $inventoryData['weight']; ?></td>
                                <td class="text-center"><?php echo $inventoryData['unit']; ?></td>
                                <td class="text-end"><?php echo $inventoryData['unitPrice']; ?></td>
                                <td class="text-end"><?php echo $inventoryData['quantity']; ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "stocks" && $_GET['type'] == "good") { ?>

    <?php $gStockDatas = $classReports->getGStockProducts(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-battery-full fa-fw fs-4 me-2"></i>Good Stock Products Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                    <table id="good-report" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Description</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Model</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(!empty($gStockDatas)) { ?>
                            <?php foreach ($gStockDatas as $gStockData) { ?>
                            <tr>
                                <td><?php echo $gStockData['productDesc']; ?></td>
                                <td><?php echo $gStockData['categoryName']; ?></td>
                                <td><?php echo $gStockData['model']; ?></td>
                                <td class="text-end"><?php echo $gStockData['quantity']; ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "stocks" && $_GET['type'] == "critical") { ?>

    <?php $cStockDatas = $classReports->getCStockProducts(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-battery-quarter fa-fw fs-4 me-2"></i>Critical Stock Products Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                    <table id="critical-report" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Description</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Model</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(!empty($cStockDatas)) { ?>
                            <?php foreach ($cStockDatas as $cStockData) { ?>
                            <tr>
                                <td><?php echo $cStockData['productDesc']; ?></td>
                                <td><?php echo $cStockData['categoryName']; ?></td>
                                <td><?php echo $cStockData['model']; ?></td>
                                <td class="text-end"><?php echo $cStockData['quantity']; ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "stocks" && $_GET['type'] == "stockout") { ?>

    <?php $sStockDatas = $classReports->getSStockProducts(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-battery-empty fa-fw fs-4 me-2"></i>Out of Stock Products Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                    <table id="stockout-report" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Description</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Model</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(!empty($sStockDatas)) { ?>
                            <?php foreach ($sStockDatas as $sStockData) { ?>
                            <tr>
                                <td><?php echo $sStockData['productDesc']; ?></td>
                                <td><?php echo $sStockData['categoryName']; ?></td>
                                <td><?php echo $sStockData['model']; ?></td>
                                <td class="text-end"><?php echo $sStockData['quantity']; ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "stocks" && $_GET['type'] == "fast-moving") { ?>

    <?php $fmStockDatas = $classReports->getFMStockProducts(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-arrow-trend-up fa-fw fs-4 me-2"></i>Fast-moving Stock Products Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                    <table id="fm-stock-report" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Description</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Model</th>
                                <th class="text-center">Quantity Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(!empty($fmStockDatas)) { ?>
                            <?php foreach ($fmStockDatas as $fmStockData) { ?>
                            <tr>
                                <td><?php echo $fmStockData['productDesc']; ?></td>
                                <td><?php echo $fmStockData['categoryName']; ?></td>
                                <td><?php echo $fmStockData['model']; ?></td>
                                <td class="text-end"><?php echo $fmStockData['quantitySold']; ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "stocks" && $_GET['type'] == "slow-moving") { ?>

    <?php $smStockDatas = $classReports->getSMStockProducts(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-arrow-trend-down fa-fw fs-4 me-2"></i>Slow-moving Stock Products Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                    <table id="sm-stock-report" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Description</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Model</th>
                                <th class="text-center">Quantity Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(!empty($smStockDatas)) { ?>
                            <?php foreach ($smStockDatas as $smStockData) { ?>
                            <tr>
                                <td><?php echo $smStockData['productDesc']; ?></td>
                                <td><?php echo $smStockData['categoryName']; ?></td>
                                <td><?php echo $smStockData['model']; ?></td>
                                <td class="text-end"><?php echo $smStockData['quantitySold']; ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "transaction-logs") { ?>

    <?php $tLogsDatas = $classReports->getTransactionLogs(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-handshake-angle fa-fw fs-4 me-2"></i>Transaction Logs Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                    <table id="transaction-logs-report" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Company Name</th>
                                <th class="text-center">Payment</th>
                                <th class="text-center">Total Amount</th>
                                <th class="text-center">Balance</th>
                                <th class="text-center">Order Date</th>
                                <th class="text-center">Order Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(!empty($tLogsDatas)) { ?>
                            <?php foreach ($tLogsDatas as $tLogsData) { ?>
                            <tr>
                                <td><?php echo $tLogsData["orderNo"]; ?></td>
                                <td><?php echo $tLogsData['firstName'] ." ". $tLogsData['lastName'] ; ?></td>
                                <td><?php echo $tLogsData['userCName']; ?></td>
                                <td class="text-center"><?php echo $tLogsData['paymentType']; ?></td>
                                <td class="text-end">₱<?php echo number_format($tLogsData['totalAmount'], 2); ?></td>
                                <td class="text-end">₱<?php echo number_format($tLogsData['totalBalance'], 2); ?></td>
                                <td class="text-center"><?php echo date('m/d/Y', strtotime($tLogsData['orderDate'])); ?></td>
                                <td class="text-center"><?php echo date('h:i a', strtotime($tLogsData['orderDate'])); ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "weekly" && isset($_GET['sp']) && !empty($_GET['sp'])) { ?>
   
    <?php 
        $orderByWeekUId = $_GET['sp'];
        $wSalesProdSoldDatas = $classReports->getWeeklySalesProdSold($orderByWeekUId); 
        
        if (!empty($wSalesProdSoldDatas)) {
            foreach ($wSalesProdSoldDatas as $wSalesProdSoldData) {
                $orderByWeek = $wSalesProdSoldData['orderByWeek'];
            }
        } else {
            echo "<script>
                swal('Warning!', 'No products!', 'warning').then(function() {
                window.location.assign('index.php?route=report&view=sales&type=weekly');
            });
            </script>";
        }
    ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-calendar-week fa-fw fs-4 me-2"></i><?php echo $orderByWeek ?? ""; ?></div>
        </div>
        
        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
            <div class="col-md-2">
                <a href="index.php?route=report&view=sales&type=weekly" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to Weekly Sales Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
            </div>
        </div>

        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                        <table id="ws-prod-sold-report" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product Description</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>          
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($wSalesProdSoldDatas)) { ?>
                                <?php foreach ($wSalesProdSoldDatas as $wSalesProdSoldData) { ?>
                                <tr>
                                    <td><img src="<?php echo "../" . $wSalesProdSoldData['productImgs']; ?>" width="100" height="100" alt=""></td>
                                    <td><?php echo $wSalesProdSoldData['productDesc'] . " (" . $wSalesProdSoldData['model'] . ")" . " - " . $wSalesProdSoldData['weight'] . " " .$wSalesProdSoldData['unit'] ; ?></td>
                                    <td class="text-end">₱<?php echo number_format($wSalesProdSoldData['unitPrice'], 2); ?></td>
                                    <td class="text-end"><?php echo $wSalesProdSoldData['productQty']; ?></td>
                                    <td class="text-end">₱<?php echo number_format($wSalesProdSoldData['total'], 2); ?></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "monthly" && isset($_GET['sp']) && !empty($_GET['sp'])) { ?>
   
    <?php 
        $orderByMonthUId = $_GET['sp'];
        $mSalesProdSoldDatas = $classReports->getMonthlySalesProdSold($orderByMonthUId); 
        
        if (!empty($mSalesProdSoldDatas)) {
            foreach ($mSalesProdSoldDatas as $mSalesProdSoldData) {
                $orderByMonth = $mSalesProdSoldData['orderByMonth'];
            }
        } else {
            echo "<script>
                swal('Warning!', 'No products!', 'warning').then(function() {
                window.location.assign('index.php?route=report&view=sales&type=monthly');
            });
            </script>";
        }
    ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-calendar-days fa-fw fs-4 me-2"></i><?php echo $orderByMonth ?? ""; ?></div>
        </div>
        
        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
            <div class="col-md-2">
                <a href="index.php?route=report&view=sales&type=monthly" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to Monthly Sales Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
            </div>
        </div>

        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                        <table id="ms-prod-sold-report" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product Description</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>          
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($mSalesProdSoldDatas)) { ?>
                                <?php foreach ($mSalesProdSoldDatas as $mSalesProdSoldData) { ?>
                                <tr>
                                    <td><img src="<?php echo "../" . $mSalesProdSoldData['productImgs']; ?>" width="100" height="100" alt=""></td>
                                    <td><?php echo $mSalesProdSoldData['productDesc'] . " (" . $mSalesProdSoldData['model'] . ")" . " - " . $mSalesProdSoldData['weight'] . " " .$mSalesProdSoldData['unit'] ; ?></td>
                                    <td class="text-end">₱<?php echo number_format($mSalesProdSoldData['unitPrice'], 2); ?></td>
                                    <td class="text-end"><?php echo $mSalesProdSoldData['productQty']; ?></td>
                                    <td class="text-end">₱<?php echo number_format($mSalesProdSoldData['total'], 2); ?></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "yearly" && isset($_GET['sp']) && !empty($_GET['sp'])) { ?>
   
   <?php 
       $orderByYearUId = $_GET['sp'];
       $ySalesProdSoldDatas = $classReports->getYearlySalesProdSold($orderByYearUId); 
       
       if (!empty($ySalesProdSoldDatas)) {
           foreach ($ySalesProdSoldDatas as $ySalesProdSoldData) {
               $orderByYear = $ySalesProdSoldData['orderByYear'];
           }
       } else {
           echo "<script>
               swal('Warning!', 'No products!', 'warning').then(function() {
               window.location.assign('index.php?route=report&view=sales&type=yearly');
           });
           </script>";
       }
   ?>

   <div class="container">
       <div class="border-bottom-custom-green mb-2">
           <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-calendar fa-fw fs-4 me-2"></i><?php echo $orderByYear ?? ""; ?></div>
       </div>
       
       <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
           <div class="col-md-2">
               <a href="index.php?route=report&view=sales&type=yearly" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to Yearly Sales Report" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
           </div>
       </div>

       <div class="card">
           <div class="shadow rounded">
               <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                       <table id="ys-prod-sold-report" class="table table-striped" style="width:100%">
                           <thead>
                               <tr>
                                   <th></th>
                                   <th>Product Description</th>
                                   <th>Unit Price</th>
                                   <th>Quantity</th>
                                   <th>Sub Total</th>          
                               </tr>
                           </thead>
                           <tbody>
                               <?php if(!empty($ySalesProdSoldDatas)) { ?>
                               <?php foreach ($ySalesProdSoldDatas as $ySalesProdSoldData) { ?>
                               <tr>
                                   <td><img src="<?php echo "../" . $ySalesProdSoldData['productImgs']; ?>" width="100" height="100" alt=""></td>
                                   <td><?php echo $ySalesProdSoldData['productDesc'] . " (" . $ySalesProdSoldData['model'] . ")" . " - " . $ySalesProdSoldData['weight'] . " " .$ySalesProdSoldData['unit'] ; ?></td>
                                   <td class="text-end">₱<?php echo number_format($ySalesProdSoldData['unitPrice'], 2); ?></td>
                                   <td class="text-end"><?php echo $ySalesProdSoldData['productQty']; ?></td>
                                   <td class="text-end">₱<?php echo number_format($ySalesProdSoldData['total'], 2); ?></td>
                               </tr>
                               <?php } ?>
                               <?php } ?>
                           </tbody>
                           <tfoot>
                               <tr>
                                   <th>Total</th>
                                   <th></th>
                                   <th></th>
                                   <th></th>
                                   <th></th>
                               </tr>
                           </tfoot>
                       </table>

               </div>
           </div>     
       </div>

   </div>
    
<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "weekly") { ?>

    <?php $wSalesDatas = $classReports->getWeeklySales(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-calendar-week fa-fw fs-4 me-2"></i>Weekly Sales Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">
                    <div class="mb-3" id="chart"></div>

                        <table id="weekly-sales-report" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Weeks</th>
                                    <th>Sales</th>   
                                    <th>Product Sold</th>            
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($wSalesDatas)) { ?>
                                <?php foreach ($wSalesDatas as $wSalesData) { ?>
                                <tr>
                                    <td><?php echo $wSalesData['orderByWeek']; ?></td>
                                    <td class="text-end">₱<?php echo number_format($wSalesData['totalByWeek'], 2); ?></td>
                                    <td style="width: 23rem"><a href="index.php?route=report&view=sales&type=weekly&sp=<?php echo $wSalesData['orderByWeekUId']?>&title=<?php echo $wSalesData['orderByWeek']; ?>" class="btn btn-success d-flex align-items-center fw-bold me-2" title="View <?php echo $wSalesData['orderByWeek']; ?> Sold Products" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-cart-shopping fs-5 me-2"></i>View <?php echo $wSalesData['orderByWeek']; ?> Sold Products</a></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total:</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "monthly") { ?>

    <?php $mSalesDatas = $classReports->getMonthlySales(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-calendar-days fa-fw fs-4 me-2"></i>Monthly Sales Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">
                    <div class="mb-3" id="chart"></div>

                        <table id="monthly-sales-report" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Months</th>
                                    <th>Sales</th>     
                                    <th>Product Sold</th>           
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($mSalesDatas)) { ?>
                                <?php foreach ($mSalesDatas as $mSalesData) { ?>
                                <tr>
                                    <td><?php echo $mSalesData['orderByMonth']; ?></td>
                                    <td class="text-end">₱<?php echo number_format($mSalesData['totalByMonth'], 2); ?></td>
                                    <td style="width: 23rem"><a href="index.php?route=report&view=sales&type=monthly&sp=<?php echo $mSalesData['orderByMonthUId']?>&title=<?php echo $mSalesData['orderByMonth']; ?>" class="btn btn-success d-flex align-items-center fw-bold me-2" title="View <?php echo $mSalesData['orderByMonth']; ?> Sold Products" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-cart-shopping fs-5 me-2"></i>View <?php echo $mSalesData['orderByMonth']; ?> Sold Products</a></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total:</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "yearly") { ?>

    <?php $ySalesDatas = $classReports->getYearlySales(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-calendar fa-fw fs-4 me-2"></i>Yearly Sales Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">
                    <div class="mb-3" id="chart"></div>

                        <table id="yearly-sales-report" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Months</th>
                                    <th class="text-end">Sales</th>     
                                    <th>Product Sold</th>               
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($ySalesDatas)) { ?>
                                <?php foreach ($ySalesDatas as $ySalesData) { ?>
                                <tr>
                                    <td><?php echo $ySalesData['orderByYear']; ?></td>
                                    <td>₱<?php echo number_format($ySalesData['totalByYear'], 2); ?></td>
                                    <td style="width: 23rem"><a href="index.php?route=report&view=sales&type=yearly&sp=<?php echo $ySalesData['orderByYearUId']?>&title=<?php echo $ySalesData['orderByYear']; ?>" class="btn btn-success d-flex align-items-center fw-bold me-2" title="View <?php echo $ySalesData['orderByYear']; ?> Sold Products" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-cart-shopping fs-5 me-2"></i>View <?php echo $ySalesData['orderByYear']; ?> Sold Products</a></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total:</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "orders") { ?>

    <?php $ordersDatas = $classReports->getOrders(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-box fa-fw fs-4 me-2"></i>Orders Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                        <table id="orders-report" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Company Name</th>
                                    <th class="text-center">Payment</th>
                                    <th class="text-center">Total Amount</th>
                                    <th class="text-center">Balance</th>
                                    <th class="text-center">Order Date</th>
                                    <th class="text-center">Order Time</th>                
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($ordersDatas)) { ?>
                                <?php foreach ($ordersDatas as $ordersData) { ?>
                                <tr>
                                    <td><?php echo $ordersData['orderNo']; ?></td>
                                    <td class="text-center"><?php echo $ordersData['firstName'] ." ".  $ordersData['lastName']; ?></td>
                                    <td class="text-center"><?php echo $ordersData['userCName']; ?></td>
                                    <td class="text-center"><?php echo $ordersData['paymentType']; ?></td>
                                    <td class="text-end">₱<?php echo number_format($ordersData['totalAmount'], 2); ?></td>
                                    <td class="text-end">₱<?php echo number_format($ordersData['totalBalance'], 2); ?></td>
                                    <td class="text-center"><?php echo date('m/d/Y', strtotime($ordersData['orderDate'])); ?></td>
                                    <td class="text-center"><?php echo date('h:i a', strtotime($ordersData['orderDate'])); ?></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "payments") { ?>

    <?php $paymentsDatas = $classReports->getPayments(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-credit-card fa-fw fs-4 me-2"></i>Payments Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                        <table id="payments-report" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Company Name</th>
                                    <th class="text-center">Payment</th>
                                    <th class="text-center">Pay</th>
                                    <th class="text-center">Balance</th>
                                    <th class="text-center">Payment Date</th>
                                    <th class="text-center">Payment Time</th>           
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($paymentsDatas)) { ?>
                                <?php foreach ($paymentsDatas as $paymentsData) { ?>
                                <tr>
                                    <td><?php echo $paymentsData['orderNo']; ?></td>
                                    <td class="text-center"><?php echo $paymentsData['firstName'] ." ".  $paymentsData['lastName']; ?></td>
                                    <td class="text-center"><?php echo $paymentsData['userCName']; ?></td>
                                    <td class="text-center"><?php echo $paymentsData['paymentType']; ?></td>
                                    <td class="text-end">₱<?php echo number_format($paymentsData['pay'], 2); ?></td>
                                    <td class="text-end">₱<?php echo number_format($paymentsData['balance'], 2); ?></td>
                                    <td class="text-center"><?php echo date('m/d/Y', strtotime($paymentsData['paymentDate'])); ?></td>
                                    <td class="text-center"><?php echo date('h:i a', strtotime($paymentsData['paymentDate'])); ?></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "delivered-orders") { ?>

    <?php $dordersDatas = $classReports->getDeliveredOrders(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-truck-fast fa-fw fs-4 me-2"></i>Delivered Orders Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                        <table id="payments-report" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Company Name</th>
                                    <th class="text-center">Order Date</th>
                                    <th class="text-center">Order Time</th>       
                                    <th class="text-center">Delivery Marked Date</th>       
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($dordersDatas)) { ?>
                                <?php foreach ($dordersDatas as $dordersData) { ?>
                                <tr>
                                    <td><?php echo $dordersData['orderNo']; ?></td>
                                    <td class="text-center"><?php echo $dordersData['firstName'] ." ".  $dordersData['lastName']; ?></td>
                                    <td class="text-center"><?php echo $dordersData['userCName']; ?></td>
                                    <td class="text-center"><?php echo date('m/d/Y', strtotime($dordersData['orderDate'])); ?></td>
                                    <td class="text-center"><?php echo date('h:i a', strtotime($dordersData['orderDate'])); ?></td>
                                    <td class="text-center"><?php echo date('m/d/Y', strtotime($dordersData['deliveryMarkedDate'])); ?></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "services") { ?>

    <?php $servicesDatas = $classReports->getServices(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-screwdriver-wrench fa-fw fs-4 me-2"></i>Service Installation Requests Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                        <table id="services-report" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Company Name</th>
                                    <th class="text-center">Service Request</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Order Date</th>
                                    <th class="text-center">Order Time</th>            
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($servicesDatas)) { ?>
                                <?php foreach ($servicesDatas as $servicesData) { ?>
                                <tr>
                                    <td><?php echo $servicesData['ordersOrderNo']; ?></td>
                                    <td class="text-center"><?php echo $servicesData['firstName'] ." ".  $servicesData['lastName']; ?></td>
                                    <td class="text-center"><?php echo $servicesData['userCName']; ?></td>
                                    <td class="text-center"><?php echo $servicesData['orderServiceInst']; ?></td>
                                    <td class="text-center">
                                        <?php if ($servicesData['orderServiceAss'] == 1) { ?>
                                            Assigned
                                        <?php } elseif ($servicesData['orderServiceAss'] == 2) { ?>
                                            Declined
                                        <?php } else { ?>
                                            For Validation
                                        <?php } ?>    
                                    </td>
                                    <td class="text-center"><?php echo date('m/d/Y', strtotime($servicesData['orderDate'])); ?></td>
                                    <td class="text-center"><?php echo date('h:i a', strtotime($servicesData['orderDate'])); ?></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>

                </div>
            </div>     
        </div>

    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "assigned-service") { ?>

    <?php $aServicesDatas = $classReports->getAssignedServiceInst(); ?>

    <div class="container">
        <div class="border-bottom-custom-green mb-2">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-clipboard-check fa-fw fs-4 me-2"></i>Assigned Service Installation Requests Report</div>
        </div>
        
        <div class="card">
            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                        <table id="services-report" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Company Name</th>
                                    <th class="text-center">Service Request</th>
                                    <th class="text-center">Installer Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Assigned Date</th>
                                    <th class="text-center">Assigned Time</th>             
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($aServicesDatas)) { ?>
                                <?php foreach ($aServicesDatas as $aServicesData) { ?>
                                <tr>
                                    <td><?php echo $aServicesData['orderNo']; ?></td>
                                    <td class="text-center"><?php echo $aServicesData['firstName'] ." ".  $aServicesData['lastName']; ?></td>
                                    <td class="text-center"><?php echo $aServicesData['userCName']; ?></td>
                                    <td class="text-center"><?php echo $aServicesData['orderServiceInst']; ?></td>
                                    <td class="text-center"><?php echo $aServicesData['serviceInstFname'] . " " . $aServicesData['serviceInstLname']; ?></td>
                                    <td class="text-center">
                                        <?php if ($aServicesData['serviceInstStatus'] == 1) { ?>
                                            Done
                                        <?php } else { ?>
                                            On-going
                                        <?php } ?>    
                                    </td>
                                    <td class="text-center"><?php echo date('m/d/Y', strtotime($aServicesData['serviceAssignDate'])); ?></td>

                                    <td class="text-center"><?php echo date('h:i a', strtotime($aServicesData['serviceAssignDate'])); ?></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>

                </div>
            </div>     
        </div>

    </div>

<?php } else { 
    echo "<script>
        window.location.assign('index.php?route=404');
    </script>";
} ?>