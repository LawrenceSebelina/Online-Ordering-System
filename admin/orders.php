<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>
        <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "approved") { ?>
            Approved Orders
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "delivered") { ?>
            Delivered Orders
        <?php } else { ?>
            Orders
        <?php } ?>
    </title>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php');  
        include_once('assets/components/sidebars.php'); 
        include_once('../classes/ordersClass.php'); 
        $infos = $classOrders->getApprovedOrders();
        $datas = $classOrders->getOrders();
        $details = $classOrders->getDeliveredOrders();
        $stmts = $classOrders->getReturnedOrders();
        $orderLogs = $classOrders->getOrderLogs();
    ?>
    
    <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
        <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "approved") { ?>
            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Approved Orders Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=orders" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="View Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=delivered" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" title="View Delivered Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-solid fa-truck-fast fs-5 me-2"></i>View Delivered</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=returned" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" title="View Return Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-boxes-packing fs-5 me-2"></i>View Return</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=order-logs" class="btn btn-info d-flex align-items-center fw-bold me-2 w-100" title="View Order Logs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-book-open fs-5 me-2"></i>View Order Logs</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-clipboard-check fa-fw fs-4 me-2"></i>Approved Orders</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <div class="d-flex justify-content-center mb-4 row row-cols-sm-1 row-cols-md-2 g-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col d-flex align-items-center justify-content-start">
                                            <i class="fa-solid fa-square fs-1 me-2 text-warning text-opacity-50"></i> <span class="fw-bold">— Set Order Delivery Date</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div><em><p style="font-size: 0.7rem;">(Orders ready for setting the delivery date.)</p></em></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col d-flex align-items-center justify-content-start">
                                        <i class="fa-solid fa-square fs-1 me-2 text-info text-opacity-50"></i> <span class="fw-bold">— Mark Order as Delivered/ Return</span>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div><em><p style="font-size: 0.7rem;">(Orders ready for Marking as Done or Return)</p></em></div>
                                    </div>
                                </div>
                            </div>

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th>Order No</th>
                                        <th>Payment</th>
                                        <th>Order Date</th>
                                        <th>Time</th>
                                        <th>Approved Date</th>
                                        <th>Due Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($infos)) { ?>
                                    <?php foreach ($infos as $info) { ?>
                                        <?php if ($info['orderSetDeliver'] == 1) { ?>
                                            <tr class="bg-info bg-opacity-50">
                                                <td class="d-none"><?php echo $info['orderId']; ?></td>
                                                <td class="d-none"><?php echo $info['orderNo']; ?></td>
                                                <td class="d-none"><?php echo $info['userId']; ?></td>
                                                <td class="d-none"><?php echo $info['deliveryId']; ?></td>
                                                <td>
                                                    <a href="index.php?route=order&on=<?php echo $info["orderNo"]; ?>&oid=<?php echo $info["orderId"]; ?>&approved=true"><?php echo $info["orderNo"]; ?></a>
                                                </td>
                                                <td><?php echo $info['paymentType']; ?>
                                                </td>
                                                <td><?php echo date('m/d/Y', strtotime($info['orderDate'])); ?></td>
                                                <td><?php echo date('h:i a', strtotime($info['orderDate'])); ?></td>
                                                <td><?php echo date('m/d/Y', strtotime($info['orderApprovedDate'])); ?></td>
                                                <td><?php echo date('m/d/Y', strtotime($info['orderDueDate'])); ?></td>

                                                <?php if ($info['deliveryStatus'] == 0) { ?>
                                                    <td class="d-flex justify-content-center">
                                                        <button type="button" class="markedDelivered btn btn-success fw-bold me-2">
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <i class="fa-solid fa-truck-fast me-2 align-middle fs-5" title="Mark as Delivered" data-bs-toggle="tooltip" data-bs-placement="bottom"></i><span style="font-size: 0.8rem">Mark as Delivered</span>
                                                            </div>    
                                                        </button>

                                                        <button type="button" class="markedReturn btn btn-danger fw-bold me-2">
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <i class="fa-solid fa-boxes-packing me-2 align-middle fs-5" title="Mark as Return" data-bs-toggle="tooltip" data-bs-placement="bottom"></i><span style="font-size: 0.8rem">Mark as Return</span>
                                                            </div>    
                                                        </button>
                                                    </td>
                                                <?php } else { ?>
                                                    <td class="d-flex justify-content-center">
                                                        <button type="button" class="btn btn-secondary fw-bold me-2" disabled>
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <i class="fa-solid fa-truck-fast me-2 fs-5 align-middle" title="Marked Delivered" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>Marked Delivered
                                                            </div>    
                                                        </button>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } elseif ($info['orderSetDeliver'] == 0) { ?>
                                            <tr class="bg-warning bg-opacity-50">
                                                <td class="d-none"><?php echo $info['orderId']; ?></td>
                                                <td class="d-none"><?php echo $info['orderNo']; ?></td>
                                                <td class="d-none"><?php echo $info['userId']; ?></td>
                                                <td class="d-none"><?php echo $info['deliveryId']; ?></td>
                                                <td>
                                                    <a href="index.php?route=order&on=<?php echo $info["orderNo"]; ?>&oid=<?php echo $info["orderId"]; ?>&approved=true"><?php echo $info["orderNo"]; ?></a>
                                                </td>
                                                <td><?php echo $info['paymentType']; ?>
                                                </td>
                                                <td><?php echo date('m/d/Y', strtotime($info['orderDate'])); ?></td>
                                                <td><?php echo date('h:i a', strtotime($info['orderDate'])); ?></td>
                                                <td><?php echo date('m/d/Y', strtotime($info['orderApprovedDate'])); ?></td>
                                                <td><?php echo date('m/d/Y', strtotime($info['orderDueDate'])); ?></td>

                                                <td class="d-flex justify-content-center">
                                                    <button type="button" class="setOrderDelivery btn btn-success fw-bold me-2">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <i class="fa-solid fa-truck fs-5 me-2 align-middle" title="Set Delivery Date" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>Set Delivery
                                                        </div>    
                                                    </button>
                                                </td>

                                                <!-- <?php if ($info['paymentType'] == "Full Payment" ) { ?>
                                                    <?php if ($info['totalBalance'] == 0) { ?>
                                                        <td class="d-flex justify-content-center">
                                                            <button type="button" class="setOrderDelivery btn btn-success fw-bold me-2">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <i class="fa-solid fa-truck fs-5 me-2 align-middle" title="Set Delivery Date" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>Set Delivery
                                                                </div>    
                                                            </button>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td class="d-flex justify-content-center">
                                                            <button type="button" class="btn btn-secondary fw-bold me-2" disabled>
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <i class="fa-solid fa-truck fs-5 me-2 align-middle" title="Set Delivery Date" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>Set Delivery
                                                                </div>    
                                                            </button>
                                                        </td>
                                                    <?php } ?>
                                                <?php } elseif ($info['paymentType'] == "Installment" ) { ?>
                                                    <?php if ($info['totalBalance'] < $info['totalAmount']) { ?>
                                                        <td class="d-flex justify-content-center">
                                                            <button type="button" class="setOrderDelivery btn btn-success fw-bold me-2">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <i class="fa-solid fa-truck fs-5 me-2 align-middle" title="Set Delivery Date" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>Set Delivery
                                                                </div>    
                                                            </button>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td class="d-flex justify-content-center">
                                                            <button type="button" class="btn btn-secondary fw-bold me-2" disabled>
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <i class="fa-solid fa-truck fs-5 me-2 align-middle" title="Set Delivery Date" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>Set Delivery
                                                                </div>    
                                                            </button>
                                                        </td>
                                                    <?php } ?>
                                                <?php } ?> -->
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>   

                        <?php include_once('assets/components/orderModals.php'); ?>

                    </div>   

                </div>
            </div>
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "returned") { ?> 
            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Returned Orders Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=orders" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=approved" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="View Approved Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-clipboard-check fs-5 me-2"></i>View Approved</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=delivered" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" title="View Delivered Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-solid fa-truck-fast fs-5 me-2"></i>View Delivered</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=order-logs" class="btn btn-info d-flex align-items-center fw-bold me-2 w-100" title="View Order Logs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-book-open fs-5 me-2"></i>View Order Logs</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-boxes-packing fa-fw fs-4 me-2"></i>Returned Orders</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example3" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th>Order No</th>
                                        <th class="text-center">Payment</th>
                                        <th class="text-center">Balance</th>
                                        <th class="text-center">Order Date</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Delivery Marked Date</th>
                                        <th class="text-center">Payment Status</th>
                                        <th class="text-center">Payment Due</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($stmts)) { ?>
                                    <?php foreach ($stmts as $stmt) { ?>
                                    <tr>
                                        <td class="d-none"><?php echo $stmt['orderId']; ?></td>
                                        <td class="d-none"><?php echo $stmt['orderNo']; ?></td>
                                        <td class="d-none"><?php echo $stmt['userId']; ?></td>
                                        <td>
                                            <a href="index.php?route=order&on=<?php echo $stmt["orderNo"]; ?>&oid=<?php echo $stmt["orderId"]; ?>&returned=true"><?php echo $stmt["orderNo"]; ?></a>
                                        </td>
                                        <td class="text-center"><?php echo $stmt['paymentType']; ?></td>
                                        <td class="text-end">₱<?php echo number_format($stmt['totalBalance'], 2); ?></td>
                                        <td class="text-center"><?php echo date('m/d/Y', strtotime($stmt['orderDate'])); ?></td>
                                        <td class="text-center"><?php echo date('h:i a', strtotime($stmt['orderDate'])); ?></td>
                                        <td class="text-center"><?php echo date('m/d/Y', strtotime($stmt['deliveryMarkedDate'])); ?></td>
                                        <?php if ($stmt['totalBalance'] > 0) { ?>
                                            <td class="text-center">Not yet fully paid</td>
                                        <?php } else { ?>
                                            <td class="text-center">Fully paid</td>
                                        <?php } ?>
                                        <td class="text-center"><?php echo date('m/d/Y', strtotime($stmt['orderDueDate'])); ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>   

                        <?php include_once('assets/components/orderModals.php'); ?>

                    </div>   

                </div>
            </div>
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "delivered") { ?> 
            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Delivered Orders Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=orders" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=approved" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="View Approved Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-clipboard-check fs-5 me-2"></i>View Approved</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=returned" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" title="View Return Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-boxes-packing fs-5 me-2"></i>View Return</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=order-logs" class="btn btn-info d-flex align-items-center fw-bold me-2 w-100" title="View Order Logs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-book-open fs-5 me-2"></i>View Order Logs</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-truck-fast fa-fw fs-4 me-2"></i>Delivered Orders</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example3" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th>Order No</th>
                                        <th class="text-center">Payment</th>
                                        <th class="text-center">Balance</th>
                                        <th class="text-center">Order Date</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Delivery Marked Date</th>
                                        <th class="text-center">Payment Status</th>
                                        <th class="text-center">Payment Due</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($details)) { ?>
                                    <?php foreach ($details as $detail) { ?>
                                    <tr>
                                        <td class="d-none"><?php echo $detail['orderId']; ?></td>
                                        <td class="d-none"><?php echo $detail['orderNo']; ?></td>
                                        <td class="d-none"><?php echo $detail['userId']; ?></td>
                                        <td>
                                            <a href="index.php?route=order&on=<?php echo $detail["orderNo"]; ?>&oid=<?php echo $detail["orderId"]; ?>&delivered=true"><?php echo $detail["orderNo"]; ?></a>
                                        </td>
                                        <td class="text-center"><?php echo $detail['paymentType']; ?></td>
                                        <td class="text-end">₱<?php echo number_format($detail['totalBalance'], 2); ?></td>
                                        <td class="text-center"><?php echo date('m/d/Y', strtotime($detail['orderDate'])); ?></td>
                                        <td class="text-center"><?php echo date('h:i a', strtotime($detail['orderDate'])); ?></td>
                                        <td class="text-center"><?php echo date('m/d/Y', strtotime($detail['deliveryMarkedDate'])); ?></td>
                                        <?php if ($detail['totalBalance'] > 0) { ?>
                                            <td class="text-center">Not yet fully paid</td>
                                        <?php } else { ?>
                                            <td class="text-center">Fully paid</td>
                                        <?php } ?>
                                        <td class="text-center"><?php echo date('m/d/Y', strtotime($detail['orderDueDate'])); ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>   

                        <?php include_once('assets/components/orderModals.php'); ?>

                    </div>   

                </div>
            </div>
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "order-logs") { ?>

            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Order Logs Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=orders" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=approved" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="View Approved Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-clipboard-check fs-5 me-2"></i>View Approved</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=delivered" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" title="View Delivered Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-truck-fast fs-5 me-2"></i>View Delivered</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=returned" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" title="View Return Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-boxes-packing fs-5 me-2"></i>View Return</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-book-open fa-fw fs-4 me-2"></i>Order Logs</div>
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

                                    <?php if(!empty($orderLogs)) { ?>
                                    <?php foreach ($orderLogs as $orderLog) { ?>
                                    <tr>
                                        <td><?php echo $orderLog['firstName']." ". $orderLog['lastName']; ?></td>
                                        <td><?php echo $orderLog['userType']; ?></td>
                                        <td><?php echo $orderLog['activityDone']; ?></td>
                                        <td class="text-center"><?php echo date('m/d/Y', strtotime($orderLog['activityDate'])); ?></td>
                                        <td class="text-center"><?php echo date('h:i a', strtotime($orderLog['activityDate'])); ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>     
                </div>

            </div>
        <?php } elseif (isset($_GET['route']) && !empty($_GET['route']) && !isset($_GET['view']) && empty($_GET['view']) && $_GET['route'] == "orders") { ?>

            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Orders Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=approved" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="View Approved Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-clipboard-check fs-5 me-2"></i>View Approved</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=delivered" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" title="View Delivered Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-truck-fast fs-5 me-2"></i>View Delivered</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=returned" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" title="View Return Orders" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-boxes-packing fs-5 me-2"></i>View Return</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=orders&view=order-logs" class="btn btn-info d-flex align-items-center fw-bold me-2 w-100" title="View Order Logs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-book-open fs-5 me-2"></i>View Order Logs</a>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-box fa-fw fs-4 me-2"></i>Orders</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th>Order No</th>
                                        <th class="text-center">Payment</th>
                                        <th class="text-center">Order Date</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($datas)) { ?>
                                    <?php foreach ($datas as $data) { ?>
                                    <tr>
                                        <td class="d-none"><?php echo $data['orderId']; ?></td>
                                        <td class="d-none"><?php echo $data['orderNo']; ?></td>
                                        <td class="d-none"><?php echo $data['userId']; ?></td>
                                        <td>
                                            <a href="index.php?route=order&on=<?php echo $data["orderNo"]; ?>&oid=<?php echo $data["orderId"]; ?>"><?php echo $data["orderNo"]; ?></a>
                                        </td>
                                        <td class="text-center"><?php echo $data['paymentType']; ?></td>
                                        <td class="text-center"><?php echo date('m/d/Y', strtotime($data['orderDate'])); ?></td>
                                        <td class="text-center"><?php echo date('h:i a', strtotime($data['orderDate'])); ?></td>
                                        <td class="d-flex justify-content-center">
                                            <button type="button" class="approvedOrder btn btn-success fw-bold me-2"><i class="fa-solid fa-clipboard-check fs-5 me-2 align-middle" title="Approve Order" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>Approve</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        <?php include_once('assets/components/orderModals.php'); ?>

                    </div>     
                </div>

            </div>

        <?php } else { 
            echo "<script>
                window.location.assign('index.php?route=404');
            </script>";
        } ?>
    </main>

    <?php include_once('assets/components/footer.php'); ?>

</body>
</html>