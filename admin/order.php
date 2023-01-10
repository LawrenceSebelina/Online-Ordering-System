<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>
        <?php if (isset($_GET['on']) && !empty($_GET['on'])) { ?>
            <?php echo $_GET['on'] ?> | Order
        <?php } else { ?>
            Order
        <?php } ?>
    </title>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php'); 
        include_once('assets/components/sidebars.php'); 
        include_once('../classes/ordersClass.php'); 

        if (isset($_GET['on']) && !empty($_GET['on']) && isset($_GET['oid']) && !empty($_GET['oid'])){
            $orderId = $_GET['oid'];
            $orderNo = $_GET['on'];
            $datas = $classOrders->getOrder($orderId, $orderNo);
            $infos = $classOrders->getPayment($orderId, $orderNo);
        }

        if (!empty($datas)) {
            foreach ($datas as $data) {
                $newOrderNo = $data['newOrderNo'];
                $userId = $data['userId'];
                $userFullName = $data['firstName'] . " " . $data['lastName'];
                $userAddress = $data['address'];
                $userContactNo = $data['contactNo'];
                $userEmail = $data['email'];
                $userProfilePic = $data['userProfileImg'];
                $userCompanyName = $data['userCName'];
                $userCompanyAddress = $data['userCAddress'];
                $userCompanyPos = $data['userCPosition'];
                $userCompanyContact = $data['userCNo'];
                $userCompanyEmail = $data['userCEmail'];
                $userCompanyId = $data['userCId'];
                $orderApproved = $data['orderApproved'];
                $totalNoItems = $data['totalNoItems'];
                $totalNoQuantity = $data['totalNoQuantity'];
                $totalAmount = $data['totalAmount'];
                $totalBalance = $data['totalBalance'];
                $subTotal = $data['totalAmount'] - $data['totalDeliveryFee'] -  $data['totalServiceFee'];   
                $totalDeliveryFee = $data['totalDeliveryFee'];
                $totalServiceFee = $data['totalServiceFee'];
                $paymentType = $data['paymentType'];

                $orderPurchased = $data['orderPurchased'];
                $orderDate = $data['orderDate'];
                $orderApprovedDate = $data['orderApprovedDate'];
                $orderSetDeliver = $data['orderSetDeliver'];
                $deliveryEstDate = $data['deliveryEstDate'];
                $deliveryStatus = $data['deliveryStatus'];
                $deliveryMarkedDate = $data['deliveryMarkedDate'];
                $deliveryReturnDesc = $data['deliveryReturnDesc'];
            }
        } else {
            echo "<script>
                swal('Warning!', 'No order!', 'warning').then(function() {
                window.location.assign('index.php?route=orders');
            });
            </script>";
        }

        
    ?>

    <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
        <div class="container">

            <div class="border-bottom-custom-green mb-4 mt-1">
                <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-box fa-fw fs-4 me-2"></i>Ordered No.: <?php echo $newOrderNo ?? ""; ?></div>
            </div>

            <div class="card card-timeline px-2 border-none mb-4 shadow"> 
                <ul class="order-progress"> 

                    <?php if (!empty($orderPurchased) && $orderPurchased == 1) { ?>
                        <li class="active-success"> 
                            <div>
                                <i class="fa-solid fa-receipt fa-2xl"></i>
                            </div>Order Placed<br/><?php echo date('m/d/Y h:i a', strtotime($orderDate)); ?>
                        </li> 
                    <?php } else { ?>
                        <li> 
                            <div>
                                <i class="fa-solid fa-receipt fa-2xl"></i>
                            </div>Order Placed
                        </li> 
                    <?php } ?>  
                        
                    <?php if (!empty($orderApproved) && $orderApproved == 1) { ?>
                        <li class="active-success"> 
                            <div>
                                <i class="fa-solid fa-box fa-2xl"></i>
                            </div>Order Approved<br/><?php echo date('m/d/Y h:i a', strtotime($orderApprovedDate)); ?>
                        </li> 
                    <?php } else { ?>
                        <li class="active-warning"> 
                            <div>
                                <i class="fa-solid fa-box fa-2xl"></i>
                            </div>Order (for Approval)
                        </li> 
                    <?php } ?>  

                    <?php if (!empty($orderApproved) && $orderApproved == 1) { ?>
                        <?php if ($totalBalance == 0) { ?>
                            <li class="active-success"> 
                                <div>
                                    <i class="fa-solid fa-money-bill-wave fa-2xl"></i>
                                </div>Payment<br/>Fully Paid
                            </li> 
                        <?php } else { ?>
                            <li class="active-warning"> 
                                <div>
                                    <i class="fa-solid fa-money-bill-wave fa-2xl"></i>
                                </div>Payment <br/>Balance:&#x20B1;<?php echo $totalBalance; ?> 
                            </li> 
                        <?php } ?>   
                    <?php } else { ?> 
                        <li> 
                            <div>
                                <i class="fa-solid fa-money-bill-wave fa-2xl"></i>
                            </div>Payment
                        </li> 
                    <?php } ?> 

                    <?php if (!empty($orderSetDeliver) && $orderSetDeliver == 1) { ?>
                        <li class="active-success"> 
                            <div>
                                <i class="fa-solid fa-truck fa-2xl"></i>
                            </div>Out for Delivery<br/>Est Date:<?php echo date('m/d/Y', strtotime($deliveryEstDate)); ?> 
                        </li> 
                    <?php } else { ?>
                        <li> 
                            <div>
                                <i class="fa-solid fa-truck fa-2xl"></i>
                            </div>Out for Delivery 
                        </li> 
                    <?php } ?>  
                    

                    <?php if (!empty($deliveryStatus) && $deliveryStatus == 1) { ?>
                        <li class="active-success"> 
                            <div>
                                <i class="fa-solid fa-people-carry-box fa-2xl"></i>
                            </div>Marked Delivered<br/><?php echo date('m/d/Y h:i a', strtotime($deliveryMarkedDate)); ?> 
                        </li> 
                    <?php } elseif (!empty($deliveryStatus) && $deliveryStatus == 2) { ?>
                        <li class="active-danger"> 
                            <div>
                                <i class="fa-solid fa-people-carry-box fa-2xl"></i>
                            </div>Marked Returned<br/><?php echo date('m/d/Y h:i a', strtotime($deliveryMarkedDate)); ?><br/><br/>
                            Reason: <?php echo $deliveryReturnDesc; ?>
                        </li> 
                    <?php } else { ?>
                        <li> 
                            <div>
                                <i class="fa-solid fa-people-carry-box fa-2xl"></i>
                            </div>Marked Delivered
                        </li> 
                    <?php } ?>

                </ul> 
            </div>

            <div class="border-bottom-custom-green mb-4">
                <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-receipt fa-fw fs-4 me-2"></i>Summary of Payment</div>
            </div>
                
            <div class="card">
                <div class="card-body">
                    <div class="row row-cols-1 g-2 pb-2 shadow rounded mb-2">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-box fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control text-truncate" id="orderNo" name="orderNo" placeholder="Order No." value="<?php echo $newOrderNo ?? ""; ?>" readonly>
                                    <label for="orderNo">Order No.:</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-box fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control text-truncate" id="orderQuantity" name="orderQuantity" placeholder="Order Quantity" value="<?php echo $totalNoQuantity ?? ""; ?>" readonly>
                                    <label for="orderQuantity">Order Quantity:</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-box fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control text-truncate" id="totalItems" name="totalItems" placeholder="Total Items" value="<?php echo $totalNoItems ?? ""; ?>" readonly>
                                    <label for="totalItems">Total Items:</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-credit-card fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control text-truncate" id="paymentType" name="paymentType" placeholder="Company Name" value="<?php echo $paymentType ?? ""; ?>" readonly>
                                    <label for="paymentType">Type of Payment:</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-truck fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control text-truncate" id="totalDeliveryFee" name="totalDeliveryFee" placeholder="Delivery Fee" value="&#x20B1;<?php echo number_format($totalDeliveryFee, 2) ?? ""; ?>" readonly>
                                    <label for="Delivery Fee">Delivery Fee:</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-screwdriver-wrench fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control text-truncate" id="totalServiceFee" name="totalServiceFee" placeholder="Service Fee" value="&#x20B1;<?php echo number_format($totalServiceFee, 2) ?? ""; ?>" readonly>
                                    <label for="Service Fee">Service Fee:</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-receipt fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control text-truncate" id="subTotal" name="subTotal" placeholder="Sub Total" value="&#x20B1;<?php echo number_format($subTotal, 2) ?? ""; ?>" readonly>
                                    <label for="Sub Total">Sub Total:</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-tag fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control text-truncate" id="totalAmount" name="totalAmount" placeholder="Total Payment" value="₱<?php echo number_format($totalAmount, 2) ?? ""; ?>" readonly>
                                    <label for="totalAmount">Total Amount:</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-calculator fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control text-truncate" id="totalBalance" name="totalBalance" placeholder="Total Balance" value="₱<?php echo number_format($totalBalance, 2) ?? ""; ?>" readonly>
                                    <label for="Total Balance">Total Balance:</label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <?php if (!empty($orderApproved)) {  ?>
                    <?php if ($orderApproved == 1) {  ?>
                        <div class="shadow rounded">
                            <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                                <?php if ($totalBalance > 0) { ?>
                                    <div class="d-flex justify-content-start mb-4">
                                        <button type="button" class="btn btn-success d-flex align-items-center fw-bold me-2" data-bs-toggle="modal" data-bs-target="#addPayment"><i class="fa-solid fa-square-plus fs-5 me-2"></i>Add Payment</button>
                                    </div>
                                <?php } ?>

                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Pay</th>
                                            <th>Balance</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php if(!empty($infos)) { ?>
                                        <?php foreach ($infos as $info) { ?>
                                        <tr>
                                            <td>₱<?php echo number_format($info['pay'], 2); ?></td>
                                            <td>₱<?php echo number_format($info['balance'], 2); ?></td>
                                            <td class="text-end"><?php echo date('m/d/Y h:i a', strtotime($info['paymentDate'])); ?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    <?php } ?>
                <?php } ?>

                <div class="border-bottom-custom-green mb-4 mt-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-box fa-fw fs-4 me-2"></i>Ordered Items</div>
                </div>
                
                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example2" class="table table-striped" style="width:100%">
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
                                    
                                    <?php if(!empty($datas)) { ?>
                                    <?php foreach ($datas as $data) { ?>
                                    <tr>
                                        <td><img src="<?php echo "../" . $data['productImgs']; ?>" width="100" height="100" alt=""></td>
                                        <td><?php echo $data['productDesc'] . " (" . $data['model'] . ")" . " - " . $data['weight'] . " " .$data['unit'] ; ?></td>
                                        <td class="text-end">₱<?php echo number_format($data['unitPrice'], 2); ?></td>
                                        <td class="text-end"><?php echo $data['productQty']; ?></td>
                                        <td class="text-end">₱<?php echo number_format($data['total'], 2); ?></td>
                                    </tr>
                                    <?php } ?>                                    
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>     
                </div>
                
                <div class="border-bottom-custom-green mb-4 mt-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-id-card fa-fw fs-4 me-2"></i>User Details</div>
                </div>
                    
                <div class="card">
                    <div class="card-body">
                        <div class="row row-cols-1 g-1 shadow rounded d-flex align-items-center">

                            <div class="col-md-12 col-lg-2">
                                <div class="upload-photo">
                                    <div class="preview-photo-user mb-2">
                                        <div class="preview">
                                            <img src="<?php echo "../" . $userProfilePic ?? ""; ?>" class="img-fluid">
                                        </div>
                                    </div>
                                </div> 
                            </div> 

                            <div class="col-md-12 col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userFullName" name="userFullName"  placeholder="Name" value="<?php echo $userFullName ?? ""; ?>" readonly>
                                                <label for="userFullName">Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-house fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userAddress" name="userAddress" placeholder="Address" value="<?php echo $userAddress ?? ""; ?>" readonly>
                                                <label for="address">Address</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userContactNo" name="userContactNo"  placeholder="Contact No." value="<?php echo $userContactNo ?? ""; ?>" readonly>
                                                <label for="userContactNo">Contact No.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userEmail" name="userEmail"  placeholder="Email" value="<?php echo $userEmail ?? ""; ?>" readonly>
                                                <label for="userEmail">Email</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4 mt-4">
                    <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-address-card fa-fw fs-4 me-2"></i>Company Details</div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row row-cols-1 g-1 shadow rounded d-flex align-items-center">

                            <div class="col-md-12 col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">       
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userCompanyName" name="userCompanyName" placeholder="Company Name" value="<?php echo $userCompanyName ?? ""; ?>" readonly>
                                                <label for="userCompanyName">Company Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">       
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-id-badge fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userCompanyPos" name="userCompanyPos" placeholder="Company Position" value="<?php echo $userCompanyPos ?? ""; ?>" readonly>
                                                <label for="userCompanyPos">Company Position</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">       
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userCompanyContact" name="userCompanyContact" placeholder="Company Contact No." value="<?php echo $userCompanyContact ?? ""; ?>" readonly>
                                                <label for="userCompanyContact">Company Contact No.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">       
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-square-envelope fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userCompanyEmail" name="userCompanyEmail" placeholder="Company Email" value="<?php echo $userCompanyEmail ?? ""; ?>" readonly>
                                                <label for="userCompanyEmail">Company Email</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-group mb-3">       
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userCompanyAddress" name="userCompanyAddress" placeholder="Company Address" value="<?php echo $userCompanyAddress ?? ""; ?>" readonly>
                                                <label for="userCompanyAddress">Company Address</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 col-lg-3">
                                <h6 class="text-center bg-success bg-opacity-25 fw-bold fs-4 p-0">Company ID</h6>
                                <div class="upload-photo">
                                    <div class="preview-photo-user mb-2">
                                        <div class="preview">
                                            <img src="<?php echo "../" . $userCompanyId ?? ""; ?>" class="img-fluid">
                                        </div>
                                    </div>
                                </div> 
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </main>

    <?php include_once('assets/components/orderModals.php'); ?>
    <?php include_once('assets/components/footer.php'); ?>
    
</body>
</html>