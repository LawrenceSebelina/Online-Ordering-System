<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Check Out</title>
</head>
<body class="d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php'); 
        include_once('classes/inventoryClass.php');

        if (isset($_GET['order']) && !empty($_GET['order'])) {
            $orderNo = $_GET['order'];
        }

        if (!empty($userdetails)) {  
        $userId = $userdetails['userId'];

        $details = $classInventory->getOrdersTotalBalance($userId);
        $infos = $classInventory->getOrdersTotalBalanceApproved($userId);
        $datas = $classInventory->getCheckOut($userId, $orderNo);

            if(!empty($datas)) {
                foreach ($datas as $data) { 
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
                    $newOrderNo = $data['orderNo'];
                    $totalNoItems = $data['totalNoItems'];
                    $totalNoQuantity = $data['totalNoQuantity'];
                    $totalAmount = $data['totalAmount'];
                }
            } else {
                echo "<script>
                    swal('Warning!', 'Please add item(s) first!', 'warning').then(function() {
                    window.location.assign('index.php?route=home');
                });
                </script>";
            }

            if (!empty($infos)) {
                foreach ($infos as $info) {
                    $totalBalanceApproved = $info['newTotalBalance'];
                }
            }

            if (!empty($details)) {
                foreach ($details as $detail) {
                    $totalBalance = $detail['newTotalBalance'];
                }
            }
    ?>

        <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
            <div class="container">
            <?php $classInventory->placeOrder(); ?>
            <form method="post" enctype="multipart/form-data">
                
                <div class="border-bottom-custom-green mb-4 mt-1">
                    <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-id-card fa-fw fs-4 me-2"></i>User Details</div>
                </div>
                
                <div class="card">
                    <div class="card-body shadow">
                        <div class="row row-cols-1 g-1 rounded d-flex align-items-center">

                            <div class="col-md-12 col-lg-2">
                                <div class="upload-photo">
                                    <div class="preview-photo-user mb-2">
                                        <div class="preview">
                                            <img src="<?php echo $userProfilePic ?? ""; ?>" class="img-fluid">
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
                                                <input type="text" class="form-control text-truncate" id="userFullName" name="userFullName" placeholder="Name" value="<?php echo $userFullName ?? ""; ?>" readonly>
                                                <label for="userFullName">Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="input-group mb-3">       
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-house fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userAddress" name="userAddress" placeholder="Address" value="<?php echo $userAddress ?? ""; ?>" readonly>
                                                <label for="userAddress">Address</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-3">       
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userContactNo" name="userContactNo" placeholder="Contact No." value="<?php echo $userContactNo ?? ""; ?>" readonly>
                                                <label for="userContactNo">Contact No.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">       
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-square-envelope fa-fw fs-4"></i></span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-truncate" id="userEmail" name="userEmail" placeholder="Email" value="<?php echo $userEmail ?? ""; ?>" readonly>
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
                    <div class="card-header text-center fw-bold text-uppercase d-flex align-items-start pb-2 text-custom-green"><i class="fa-solid fa-address-card fa-fw fs-4 me-2"></i>Company Details</div>
                </div>

                <div class="card">
                    <div class="card-body shadow">
                        <div class="row row-cols-1 g-1 rounded d-flex align-items-center">

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
                                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-id-badge fa-fw fs-4 fs-3"></i></span>
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
                                            <img src="<?php echo $userCompanyId ?? ""; ?>" class="img-fluid">
                                        </div>
                                    </div>
                                </div> 
                            </div>

                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4 mt-4">
                    <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-box fa-fw fs-4 me-2"></i>Order Details</div>
                </div>
                
                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Description</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($datas)) { ?>
                                    <?php foreach ($datas as $data) { ?>
                                        <?php if($data['productQty'] > $data['productRQty']) { 
                                            echo "<script>
                                                swal('Warning!', 'Item(s) exceeded the available quantity!', 'warning').then(function() {
                                                    window.location.assign('index.php?route=cart');
                                                });
                                            </script>";
                                        ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td><img src="<?php echo $data['productImgs']; ?>" width="100" height="100" alt=""></td>
                                                <td><?php echo $data['productDesc'] . " (" . $data['model'] . ")" . " - " . $data['weight'] . " " .$data['unit'] ; ?></td>
                                                <td class="text-end">₱<?php echo number_format($data['unitPrice'], 2); ?></td>
                                                <td class="text-end"><?php echo $data['productQty']; ?><input type="hidden" name="productQty[]" value="<?php echo $data['productQty']; ?>"></td>
                                                <td class="text-end">₱<?php echo number_format($data['total'], 2); ?></td>
                                                <td><input type="hidden" name="cartId[]" value="<?php echo $data['cartId']; ?>"></td>
                                                <td><input type="hidden" name="productId[]" value="<?php echo $data['productId']; ?>"></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4 mt-4">
                    <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-receipt fa-fw fs-4 me-2"></i>Payment Details</div>
                </div>
                
                <div class="card">
                    <div class="card-body shadow rounded">

                    <input type="hidden" name="orderId" id="orderId" value="<?php echo $data['orderId'] ?? ""; ?>">
                    <input type="hidden" name="userId" id="userId" value="<?php echo $userId ?? ""; ?>">

                        <div class="row">
                            <div class="col-md-6 border-end border-5 border-success">
                                <div class="container-fluid mb-3 border-bottom border-1 border-success">
                                    <label for="modeOfPayment" class="col-form-label mb-2"><strong>Mode of Payment:</strong></label>

                                    <div class="form-check mx-4">
                                        <input class="form-check-input" type="radio" id="fullPayment" name="payment" value="Full Payment" required>
                                        <label class="form-check-label" for="fullPayment">
                                            Full payment
                                        </label>
                                        <em><p style="font-size: 0.7rem;">(30 days payment period)</p></em>
                                    </div>
                                    
                                    <div class="form-check mx-4">
                                        <?php if (!empty($totalBalance) && $totalBalance > 0) { ?> 
                                            <input class="form-check-input" type="radio" id="installment" value="Installment" disabled>
                                            <label class="form-check-label" for="installment">
                                                Installment
                                            </label>
                                            <em><p style="font-size: 0.7rem;">(Waiting for approval for installment order.)</p></em>
                                        <?php } else if (!empty($totalBalanceApproved) && $totalBalanceApproved > 0) { ?> 
                                            <input class="form-check-input" type="radio" id="installment" value="Installment" disabled>
                                            <label class="form-check-label" for="installment">
                                                Installment
                                            </label>
                                            <em><p style="font-size: 0.7rem;">(You still have an existing installment payment in your previous order(s), settle the balance first to avail this payment option.)</p></em>
                                        <?php } elseif ($totalAmount < 5000) { ?> 
                                            <input class="form-check-input" type="radio" id="installment" value="Installment" disabled>
                                            <label class="form-check-label" for="installment">
                                                Installment
                                            </label>
                                            <em><p style="font-size: 0.7rem;">(Your order must be ₱5,000.00 or higher to avail this payment option)</p></em>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="radio" id="installment" name="payment" value="Installment" required>
                                            <label class="form-check-label" for="installment">
                                                Installment <em style="font-size: 0.8rem;">(Note: There is 10% interest for this payment option)</em>
                                            </label>
                                            <em><p style="font-size: 0.7rem;">(60 days payment period)</p></em>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="container-fluid">
                                    <label for="bankDetails" class="col-form-label mb-1"><strong>Bank Details:</strong></label>
                                    <div class="mx-4">
                                        <label class="mb-1 d-flex align-items-center" for="bankTypeName">
                                            <img src="assets/images/union-bank-logo.png" class="me-2" height="40" alt="">Union Bank
                                        </label>
                                        <div class="row">
                                            <label for="bankAccountNo" class="col col-sm-4 col-form-label fw-bold" style="font-size: 0.85rem;">Account No.: </label>
                                            <div class="col col-sm-8">
                                                <input type="text" class="form-control-plaintext" style="font-size: 0.85rem;" id="bankAccountNo" value="0098-7168-9645-764" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="bankAccountName" class="col col-sm-4 col-form-label fw-bold" style="font-size: 0.85rem;">Account Name.: </label>
                                            <div class="col col-sm-8">
                                                <input type="text" class="form-control-plaintext mb-2" style="font-size: 0.85rem;" id="bankAccountName" value="Star Seiki Philippines" readonly>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>

                            <div class="col-md-6 border-start border-5 border-success">
                                <div class="container-fluid">
                                    <div class="mb-1 row border-bottom border-1 border-success">
                                        <label for="serviceInstallation" class="col-form-label mb-1"><strong>Select Service Installation Request:</strong></label>

                                            <div class="input-group mb-2">
                                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-hand-pointer fa-fw fs-4"></i></span>
                                                
                                                <div class="form-floating">
                                                    <select class="form-select form-select-lg" id="orderServiceInst" name="orderServiceInst">
                                                        <option value="None" selected>None</option>
                                                        <option value="Robot Installation">Robot Installation</option>
                                                        <option value="Installation">Installation</option>
                                                        <option value="Robot Alarm Repair">Robot Alarm Repair</option>
                                                        <option value="Installation of Timing Belt">Installation of Timing Belt</option>
                                                    </select>
                                                    <label for="category">Type of Service Installation</label>
                                                </div>
                                                
                                            </div>

                                            <em><p style="font-size: 0.7rem;">(Service installation offered)</p></em>
                                        
                                    </div>

                                    <div class="mb-1 row">
                                        <label for="orderNo" class="col col-sm-4 col-form-label">Order No.:</label>
                                        <div class="col col-sm-8">
                                        <input type="text" class="form-control-plaintext text-end" id="orderNo" value="<?php echo $newOrderNo ?? "0"; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="mb-1 row">
                                        <label for="orderQuantity" class="col col-sm-6 col-form-label">Order Quantity:</label>
                                        <div class="col col-sm-6">
                                        <input type="text" class="form-control-plaintext text-end" id="orderQuantity" value="<?php echo $totalNoQuantity ?? "0"; ?>" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-1 row">
                                        <label for="itemsTotal" class="col col-sm-6 col-form-label">Items Total:</label>
                                        <div class="col col-sm-6">
                                        <input type="text" class="form-control-plaintext text-end" id="itemsTotal" value="<?php echo $totalNoItems ?? "0"; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="mb-1 row">
                                        <label for="subTotal" class="col col-sm-6 col-form-label">Sub Total:</label>
                                        <div class="col col-sm-6">
                                        <input type="text" class="form-control-plaintext text-end fw-bold" id="subTotal" value="₱<?php echo number_format($totalAmount, 2) ?? "0.00"; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="mt-4 row">

                                        <input type="hidden" id="rawTotalAmount" value="₱<?php echo number_format($totalAmount, 2) ?? "0.00"; ?>">
                                        <input type="hidden" name="snTotalAmount" id="snTotalAmount" value="0">
                                        <input type="hidden" name="snTotalDelFee" id="snTotalDelFee" value="0">
                                        <input type="hidden" name="snTotalServFee" id="snTotalServFee" value="0">

                                        <label for="totalInterest" class="col col-sm-6 col-form-label text-end"><strong>Interest (10%):</strong></label>
                                        <div class="col col-sm-6">
                                            <input type="text" class="form-control-plaintext fw-bold text-end" id="totalInterest" value="₱0.00" readonly>
                                        </div>

                                        <label for="totalDeliveryFee" class="col col-sm-6 col-form-label text-end"><strong>Delivery Fee:</strong></label>
                                        <div class="col col-sm-6">
                                            <input type="text" class="form-control-plaintext fw-bold text-end" id="totalDeliveryFee" value="₱200.00" readonly>
                                        </div>

                                        <label for="totalServiceFee" class="col col-sm-6 col-form-label text-end"><strong>Service Fee:</strong></label>
                                        <div class="col col-sm-6">
                                            <input type="text" class="form-control-plaintext fw-bold text-end" id="totalServiceFee" value="₱0.00" readonly>
                                        </div>

                                        <label for="totalAmount" class="col col-sm-6 col-form-label text-end"><strong>Total Amount:</strong></label>
                                        <div class="col col-sm-6">
                                            <input type="text" class="form-control-plaintext fw-bold text-end" id="totalAmount" value="₱<?php echo number_format($totalAmount + 200, 2) ?? "0.00"; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <em><p style="font-size: 0.85rem;" class="fw-bold">(<strong class="text-danger">Reminder: </strong><span class="text-decoration-underline">Please send to our email (jenna@star-seiki.com.ph) your bank receipts or proof of payment for verification.</span>)</p></em>   
                <div class="d-flex justify-content-end mb-3 mt-3">
                    <button class="w-25 btn btn-lg btn-primary d-flex justify-content-center align-items-center" type="submit" name="placeOrder"><i class="fa-solid fa-box fs-3 me-2"></i><strong>Place Order</strong></button>
                </div>
            </form>
            </div>
        </main>

    <?php include_once('assets/components/footer.php'); ?>
    
    <script>
        const rawTotalAmount = parseFloat($('#rawTotalAmount').val().replace(/[\₱,]/g, '')) + parseFloat($('#totalDeliveryFee').val().replace(/[\₱,]/g, ''));
        const rawtotalServiceFee = parseFloat($('#totalServiceFee').val().replace(/[\₱,]/g, ''));
        const totalServiceFee = $('#totalServiceFee');
        const snTotalAmount = $('#snTotalAmount');
        const snTotalDelFee = $('#snTotalDelFee').val("200");
        const snTotalServFee = $('#snTotalServFee');
        // const deliveryFee = parseFloat($('#totalDeliveryFee').val().replace(/[\₱,]/g, ''));

        $('#installment').change(function() {
            const totalInterest = $('#totalInterest');
            const totalAmount = $('#totalAmount');
            const interest = parseFloat(parseFloat(rawTotalAmount) - 200) * 0.10;
            const newTotal = parseFloat(rawTotalAmount) + interest;
            totalInterest.val("₱" + interest.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
            totalAmount.val("₱" + newTotal.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
            snTotalAmount.val(newTotal);
        });

        $('#fullPayment').change(function() {
            // if (this.checked) {
                $('#totalInterest').val("₱0.00");
                $('#totalAmount').val("₱" + rawTotalAmount.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                snTotalAmount.val(rawTotalAmount);
            // }
        });

        $('#orderServiceInst').change(function() {
            const selectedService = $('#orderServiceInst').find(":selected").val();

            if (selectedService != "None") {
                totalServiceFee.val("₱500.00");
                snTotalServFee.val("500")
                const addServiceFee = parseFloat(rawTotalAmount) + 500;
                $('#totalAmount').val("₱" + addServiceFee.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                snTotalAmount.val(addServiceFee);
            } else {
                totalServiceFee.val("₱0.00");
                snTotalServFee.val("0")
                $('#totalAmount').val("₱" + rawTotalAmount.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                snTotalAmount.val(rawTotalAmount);
            }
        });
    </script>

    <?php } else {
        $userId = null;
        echo "<script>
            swal('Warning!', 'Please Sign in first!', 'warning').then(function() {
                window.location.assign('index.php?route=signin');
            });
        </script>";
    } ?>
</body>
</html>