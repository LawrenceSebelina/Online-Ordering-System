<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>
        <?php if (isset($_GET['on']) && !empty($_GET['on'])) { ?>
            <?php echo $_GET['on'] ?> | Service Installation Request
        <?php } else { ?>
            Service Installation Requests
        <?php } ?>
    </title>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php'); 
        include_once('assets/components/sidebars.php'); 
        include_once('../classes/servicesClass.php'); 

        if (isset($_GET['on']) && !empty($_GET['on']) && isset($_GET['oid']) && !empty($_GET['oid'])){
            $orderId = $_GET['oid'];
            $orderNo = $_GET['on'];
            $infos = $classServices->getAssignedServiceInstInfo($orderId, $orderNo);
            $datas = $classServices->getOrderWithServiceInst($orderId, $orderNo);
            $details = $classServices->getDeclinedServiceInstInfo($orderId, $orderNo); 
        }

        if (!empty($infos)) {
            foreach ($infos as $info) {
                $assignedFullName = $info['serviceInstFname'] ." ". $info['serviceInstLname'];
                $assignedPosition = $info['serviceInstPos'];
                $assignedDate = date('m/d/Y h:i a', strtotime($info['serviceAssignDate']));
                $assignedDesc = $info['serviceInstDesc'];
            }
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
                $totalNoItems = $data['totalNoItems'];
                $totalNoQuantity = $data['totalNoQuantity'];
                $totalAmount = $data['totalAmount'];
                $totalBalance = $data['totalBalance'];
                $paymentType = $data['paymentType'];

                $orderServiceAss = $data['orderServiceAss'];
                $orderPurchased = $data['orderPurchased'];
                $orderDate = $data['orderDate'];
                $serviceAssignDate = $data['serviceAssignDate'];
                $serviceDate = $data['serviceDate'];
                $serviceInstStatus = $data['serviceInstStatus'];
                $serviceMarkedDate = $data['serviceMarkedDate'];
            }
        } else { 
            echo "<script>
                swal('Warning!', 'No order!', 'warning').then(function() {
                window.location.assign('index.php?route=services');
            });
            </script>";   
        }

        if (!empty($details)) {
            foreach ($details as $detail) {
                $declinedReason = $detail['serviceInstReason'];
                $declinedDate = date('m/d/Y h:i a', strtotime($detail['serviceAssignDate']));
            }
        }
    ?>

    <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">

        <?php if (isset($_GET['assigned']) && !empty($_GET['assigned']) && $_GET['assigned'] !== "true") {
            echo "<script>
                window.location.assign('index.php?route=404');
            </script>";
        } elseif (isset($_GET['declined']) && !empty($_GET['declined']) && $_GET['declined'] !== "true") {
            echo "<script>
                window.location.assign('index.php?route=404');
            </script>";
        } elseif (isset($_GET['done']) && !empty($_GET['done']) && $_GET['done'] !== "true") {
            echo "<script>
                window.location.assign('index.php?route=404');
            </script>";
        } else { ?>

            <div class="container">
                    <div class="border-bottom-custom-green mb-4 mt-1">
                        <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-box fa-fw fs-4 me-2"></i>Ordered No.: <?php echo $newOrderNo ?? ""; ?></div>
                    </div>

                    <div class="card card-timeline px-2 border-none mb-2 shadow"> 
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
                            
                            <?php if (!empty($orderServiceAss) && $orderServiceAss == 1) { ?>
                                <li class="active-success"> 
                                    <div>
                                        <i class="fa-solid fa-calendar-check fa-2xl"></i>
                                    </div>Assigned<br/> <?php echo date('m/d/Y h:i a', strtotime($serviceDate)); ?>
                                </li> 
                            <?php } elseif (!empty($orderServiceAss) && $orderServiceAss == 2) { ?>
                                <li class="active-danger"> 
                                    <div>
                                        <i class="fa-solid fa-calendar-check fa-2xl"></i>
                                    </div>Declined<br/> <?php echo date('m/d/Y h:i a', strtotime($serviceDate)); ?>
                                </li> 
                            <?php } else { ?>
                                <li> 
                                    <div>
                                        <i class="fa-solid fa-calendar-check fa-2xl"></i>
                                    </div>Service Installation (for Approval)
                                </li> 
                            <?php } ?>  

                            <?php if (!empty($orderServiceAss) && $orderServiceAss == 1) { ?>
                                <li class="active-success"> 
                                    <div>
                                        <i class="fa-solid fa-screwdriver-wrench fa-2xl"></i>
                                    </div>Installation Request Assigned<br/>Date: <?php echo date('m/d/Y h:i a', strtotime($serviceAssignDate)); ?>
                                </li> 
                            <?php } elseif (!empty($orderServiceAss) && $orderServiceAss == 2) { ?>
                                <li> 
                                    <div>
                                        <i class="fa-solid fa-screwdriver-wrench fa-2xl"></i>
                                    </div>Service Assigned
                                </li> 
                            <?php } else { ?>
                                <li> 
                                    <div>
                                        <i class="fa-solid fa-screwdriver-wrench fa-2xl"></i>
                                    </div>Service Assigned
                                </li> 
                            <?php } ?>          

                            <?php if (!empty($serviceInstStatus) && $serviceInstStatus == 1) { ?>
                                <li class="active-success"> 
                                    <div>
                                        <i class="fa-solid fa-circle-check fa-2xl"></i>
                                    </div>Marked Done<br/><?php echo date('m/d/Y h:i a', strtotime($serviceMarkedDate)); ?> 
                                </li> 
                            <?php } else { ?>
                                <li> 
                                    <div>
                                        <i class="fa-solid fa-circle-check fa-2xl"></i>
                                    </div>Marked Done
                                </li> 
                            <?php } ?>

                        </ul> 
                    </div>

                <?php if (!empty($orderServiceAss) && $orderServiceAss == 1) { ?>

                    <div class="border-bottom-custom-green mb-4 mt-4">
                        <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-screwdriver-wrench fa-fw fs-4 me-2"></i>Service Installation Details</div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="row row-cols-1 g-2 pb-2 shadow rounded">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control text-truncate" id="installerFullName" name="installerFullName" placeholder="Name" value="<?php echo $assignedFullName ?? ""; ?>" readonly>
                                            <label for="installerFullName">Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-id-badge fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control text-truncate" id="installerPosition" name="installerPosition" placeholder="Position" value="<?php echo $assignedPosition ?? ""; ?>" readonly>
                                            <label for="position">Position</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-calendar-days fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control text-truncate" id="installDate" name="installDate" placeholder="Service Intallation Date" value="<?php echo $assignedDate ?? ""; ?>" readonly>
                                            <label for="installDate">Service Installation Date</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-clipboard-list fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <p name="installerJobDesc" id="installerJobDesc" class="form-control h-100" placeholder="Job Description" readonly><?php echo $assignedDesc ?? ""; ?></p>
                                            <label for="installerJobDesc">Job Description</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } elseif (!empty($orderServiceAss) && $orderServiceAss == 2) { ?>

                    <div class="border-bottom-custom-green mb-2">
                        <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-screwdriver-wrench fa-fw fs-4 me-2"></i>Declined Service Installation Details</div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row row-cols-1 g-2 pb-2 shadow rounded">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control text-truncate" id="declineDate" name="declineDate" placeholder="Declined Service Intallation Date" value="<?php echo $declinedDate ?? ""; ?>" readonly>
                                            <label for="declineDate">Declined Service Installation Date</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-rectangle-list fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <textarea name="declinedReason" id="declinedReason" class="form-control" placeholder="Reason" style="height: 7rem;" readonly><?php echo $declinedReason ?? ""; ?></textarea>
                                            <label for="declinedReason">Declined Description</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                <div class="border-bottom-custom-green mb-4 mt-4">
                    <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-id-card fa-fw fs-4 me-2"></i>User Details</div>
                </div>
                    
                <div class="card">
                    <div class="card-body">
                        <div class="row row-cols-1 g-2 pb-2 shadow rounded">

                            
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control text-truncate" id="userFullName" name="userFullName"  placeholder="Name" value="<?php echo $userFullName ?? ""; ?>" readonly>
                                        <label for="userFullName">Name</label>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-house fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control text-truncate" id="userAddress" name="userAddress" placeholder="Address" value="<?php echo $userAddress ?? ""; ?>" readonly>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control text-truncate" id="userContactNo" name="userContactNo"  placeholder="Contact No." value="<?php echo $userContactNo ?? ""; ?>" readonly>
                                        <label for="userContactNo">Contact No.</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control text-truncate" id="userCompanyName" name="userCompanyName" placeholder="Company Name" value="<?php echo $userCompanyName ?? ""; ?>" readonly>
                                        <label for="userCompanyName">Company Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control text-truncate" id="userCompanyAddress" name="userCompanyAddress" placeholder="Company Address" value="<?php echo $userCompanyAddress ?? "";?>" readonly>
                                        <label for="userCompanyAddress">Company Address</label>
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

                <div class="border-bottom-custom-green mb-4 mt-4">
                    <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-box fa-fw fs-4 me-2"></i>Ordered Items</div>
                </div>
                
                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Product Description</th>
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
                                        <td class="text-end"><?php echo $data['productQty']; ?></td>
                                        <td class="text-end">₱<?php echo number_format($data['total']); ?></td>
                                    </tr>
                                    <?php } ?>    
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>     
                </div>

            </div>

        <?php } ?>
    </main>

    <?php include_once('assets/components/footer.php'); ?>
    
</body>
</html>