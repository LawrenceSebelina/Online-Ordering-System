<?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "profile") { ?>
    <div class="border-bottom-custom-green mb-2 mt-1">
        <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start mx-2 pb-2 text-custom-green"><i class="fa-solid fa-user-pen fa-fw fs-4 me-2"></i>My Profile</div>
    </div>

    <?php $classSignIn->userChangeProfileDetails(); ?>

    <div class="card shadow"> 
        <div class="rounded">
            <div class="card-body border border-light border-5 rounded bg-light bg-opacity-25 overflow-auto">
                <form method="post" enctype="multipart/form-data">

                    <input type="hidden" name="userId" value="<?php echo $userdetails['userId'] ?? ""; ?>">

                    <div class="row row-cols-1">

                        <div class="col-md-12 col-lg-4">
                            <h6 class="text-center bg-success bg-opacity-25 fw-bold fs-4 p-0">Profile Picture</h6>
                        
                            <div class="upload-photo">
                                <div class="preview-photo-user">
                                    <div class="preview">
                                        <img src="<?php echo $userdetails['userProfileImg'] ?? ""; ?>" id="photo-previewer-user" class="img-fluid">
                                        <input type="file" id="file-preview-user" accept="image/*" name="userCDImageProfile" onchange="previewImageUser(event);">
                                        <input type="hidden" name="userCDProfileImgDir" value="<?php echo $userdetails['userProfileImg'] ?? ""; ?>">
                                        <label for="file-preview-user">Upload Photo</label>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-12 col-lg-8 pt-3 pb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userChangePDFName" name="userChangePDFName" placeholder="First Name" value="<?php echo $userdetails['firstName'] ?? ""; ?>" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers">
                                            <label for="userChangePDFName">First Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userChangePDLName" name="userChangePDLName" placeholder="Last Name" value="<?php echo $userdetails['lastName'] ?? ""; ?>" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers">
                                            <label for="userChangePDLName">Last Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-calendar-plus fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userChangePDAge" name="userChangePDAge" placeholder="Age" value="<?php echo $userdetails['age'] ?? ""; ?>" pattern="[0-9]+" title="Must contain numbers">
                                            <label for="userChangePDAge">Age</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-calendar-days fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="date" class="form-control" max="<?= date('Y-m-d'); ?>" id="userChangePDBirthday" name="userChangePDBirthday" placeholder="Birthday" value="<?php echo $userdetails['birthday'] ?? ""; ?>">
                                            <label for="userChangePDBirthday">Birthday</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-hand-pointer fa-fw fs-4"></i></span>
                                        <select class="form-select" style="height: 3.6rem;" aria-label=".form-select-lg example" id="userChangePDGender" name="userChangePDGender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-house fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userChangePDAddress" name="userChangePDAddress"  placeholder="Address" value="<?php echo $userdetails['address'] ?? ""; ?>" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)">
                                            <label for="userChangePDAddress">Address</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-5">
                            <div class="input-group mb-3">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="userChangePDContactNo" name="userChangePDContactNo" placeholder="Contact No." value="<?php echo $userdetails['contactNo'] ?? ""; ?>" pattern="[0-9-_.()]+" title="Must contain numbers and symbols (e.g. -_.())">
                                    <label for="userChangePDContactNo">Contact No.</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="input-group mb-3">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-square-envelope fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="userChangePDEmail" name="userChangePDEmail"  placeholder="Email" value="<?php echo $userdetails['email'] ?? ""; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="(e.g. example@email.com)">
                                    <label for="userChangePDEmail">Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group mb-3">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-id-badge fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-secondary bg-opacity-25" id="username" name="username" placeholder="Username" value="<?php echo $userdetails['username'] ?? ""; ?>" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)" readonly>
                                    <label for="username">Username</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="row d-flex justify-content-center mb-3 mt-3">
                        <div class="col-md-3">
                            <button class="w-100 btn btn-primary d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#userCPD" title="Save Changes"><i class="fa-solid fa-arrow-up-from-bracket fs-5 me-2"></i><strong>Save</strong></button>
                        </div>
                    </div>

                    <div class="modal fade" id="userCPD" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border border-primary border-4">
                                <div class="modal-body">
                                    <div class="alert alert-primary d-flex align-items-center">
                                        <i class="fa-solid fa-arrow-up-from-bracket fs-5 me-2"></i>
                                        <div>
                                            <strong>Save Changes</strong>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <h4>Are you sure you want to save profile details changes?</h4>
                                    </div> 

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="userChangePD"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "company-profile") { ?>

    <div class="border-bottom-custom-green mb-2 mt-1">
        <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start mx-2 pb-2 text-custom-green"><i class="fa-solid fa-address-card fa-fw fs-4 me-2"></i>Company Profile</div>
    </div>

    <?php $classSignIn->userChangeCompanyDetails(); ?>

    <div class="card shadow"> 
        <div class="rounded">
            <div class="card-body border border-light border-5 rounded bg-light bg-opacity-25 overflow-auto">
                <form method="post" enctype="multipart/form-data">

                    <input type="hidden" name="userId" value="<?php echo $userdetails['userId'] ?? ""; ?>">

                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="userCDCompanyName" name="userCDCompanyName" placeholder="Company Name" value="<?php echo $userdetails['userCName'] ?? ""; ?>" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)">
                                        <label for="userCDCompanyName">Company Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="input-group mb-3">       
                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="userCDCompanyAddress" name="userCDCompanyAddress" placeholder="Company Address" value="<?php echo $userdetails['userCAddress'] ?? ""; ?>" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)">
                                        <label for="userCDCompanyAddress">Company Address</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="input-group mb-3">       
                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-id-badge fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="userCDCompanyPos" name="userCDCompanyPos"  placeholder="Company Position" value="<?php echo $userdetails['userCPosition'] ?? ""; ?>">
                                        <label for="userCDCompanyPos">Company Position</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userCDCompanyContact" name="userCDCompanyContact"  placeholder="Company Contact No." value="<?php echo $userdetails['userCNo'] ?? ""; ?>" pattern="[0-9-_.()]+" title="Must contain numbers and symbols (e.g. -_.())">
                                            <label for="userCDCompanyContact">Company Contact No.</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-square-envelope fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userCDCompanyEmail" name="userCDCompanyEmail"  placeholder="Company Email" value="<?php echo $userdetails['userCEmail'] ?? ""; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="(e.g. example@email.com)">
                                            <label for="userCDCompanyEmail">Company Email</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 col-lg-4 pt-3">

                            <p class="text-center bg-success bg-opacity-25 fw-bold fs-4 p-0">Company Identification</p>

                            <div class="upload-photo">
                                <div class="preview-photo-company">
                                    <div class="preview">
                                        <img src="<?php echo $userdetails['userCId'] ?? ""; ?>" id="photo-previewer-company" class="img-fluid">
                                        <input type="file" id="file-preview-company" accept="image/*" name="userCDImageCompany" onchange="previewImageCompany(event);">
                                        <input type="hidden" name="userCDCompanyImgDir" value="<?php echo $userdetails['userCId'] ?? ""; ?>">
                                        <label for="file-preview-company">Upload Photo</label>
                                    </div>
                                </div>
                            </div> 

                        </div>

                    </div>
                    
                    <div class="row d-flex justify-content-center mb-3 mt-3">
                        <div class="col-md-3">
                            <button class="w-100 btn btn-primary d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#userCCD" title="Save Changes"><i class="fa-solid fa-arrow-up-from-bracket fs-5 me-2"></i><strong>Save</strong></button>
                        </div>
                    </div>

                    <div class="modal fade" id="userCCD" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border border-primary border-4">
                                <div class="modal-body">
                                    <div class="alert alert-primary d-flex align-items-center">
                                        <i class="fa-solid fa-arrow-up-from-bracket fs-5 me-2"></i>
                                        <div>
                                            <strong>Save Changes</strong>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <h4>Are you sure you want to save company details changes?</h4>
                                    </div> 

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="userChangeCD"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "password") { ?>

    <div class="border-bottom-custom-green mb-2 mt-1">
        <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start mx-2 pb-2 text-custom-green"><i class="fa-solid fa-lock fa-fw fs-4 me-2"></i>Change Password</div>
    </div>

    <?php $classSignIn->userChangePass(); ?>

    <div class="card shadow"> 
        <div class="rounded">
            <div class="card-body border border-light border-5 rounded bg-light bg-opacity-25 overflow-auto">
                <form method="post" enctype="multipart/form-data">

                    <input type="hidden" name="userId" value="<?php echo $userdetails['userId'] ?? ""; ?>">
                    <input type="hidden" name="userCPass" value="<?php echo $userdetails['password'] ?? ""; ?>">

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="col-8 col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-lock fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="userCurrentPass" name="userCurrentPass" placeholder="Current Password">
                                        <label for="userCurrentPass">Current Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="col-8 col-lg-6">
                                <div class="input-group mb-3">       
                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-lock fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="userNewPass" name="userNewPass" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                        <label for="userNewPass">New Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="col-8 col-lg-6">
                                <div class="input-group mb-3">       
                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-lock fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="userCNewPass" name="userCNewPass" placeholder="Confirm New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                        <label for="userCNewPass">Confirm New Password</label>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                    </div>
                    
                    <div class="row d-flex justify-content-center mb-3 mt-3">
                        <div class="col-md-3">
                            <button class="w-100 btn btn-primary d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#userCP" title="Save Changes"><i class="fa-solid fa-check fs-5 me-2"></i><strong>Confirm</strong></button>
                        </div>
                    </div>

                    <div class="modal fade" id="userCP" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border border-primary border-4">
                                <div class="modal-body">
                                    <div class="alert alert-primary d-flex align-items-center">
                                        <i class="fa-solid fa-check fs-5 me-2"></i>
                                        <div>
                                            <strong>Save Changes</strong>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <h4>Are you sure you want to save new password?</h4>
                                    </div> 

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="userChangePass"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "my-orders") { ?>

    <?php if (isset($_GET['oid']) && !empty($_GET['oid']) && isset($_GET['on']) && !empty($_GET['on'])) { 
        $orderId = $_GET['oid'];
        $orderNo = $_GET['on'];
        $datas = $classOrders->getOrder($orderId, $orderNo);
        $infos = $classOrders->getPayment($orderId, $orderNo);

        if (!empty($datas)) {
            foreach ($datas as $data) {
                $newOrderId = $data['orderId'];
                $newOrderNo = $data['newOrderNo'];
                $totalNoItems = $data['totalNoItems'];
                $totalNoQuantity = $data['totalNoQuantity'];
                $totalAmount = $data['totalAmount'];
                $totalBalance = $data['totalBalance'];
                $subTotal = $data['totalAmount'] - $data['totalDeliveryFee'] -  $data['totalServiceFee'];   
                $totalDeliveryFee = $data['totalDeliveryFee'];
                $totalServiceFee = $data['totalServiceFee'];
                $paymentType = $data['paymentType'];
                $orderPurchased = $data['orderPurchased'];
                $orderApproved = $data['orderApproved']; 
                $orderDate = $data['orderDate'];
                $orderApprovedDate = $data['orderApprovedDate'];
                $orderSetDeliver = $data['orderSetDeliver'];
                $deliveryEstDate = $data['deliveryEstDate'];
                $deliveryStatus = $data['deliveryStatus'];
                $deliveryMarkedDate = $data['deliveryMarkedDate'];
                $deliveryReturnDesc = $data['deliveryReturnDesc'];
            }
        }  else { 
            echo "<script>
                swal('Warning!', 'No order!', 'warning').then(function() {
                window.location.assign('index.php?route=user&view=my-orders');
            });
            </script>";  
        }  
    ?>
        <div class="d-flex justify-content-start mb-2 row row-cols-1 g-2">
            <div class="col-md-2">
            <a href="index.php?route=user&view=my-orders" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to My Orders"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
            </div>
        </div>

        <div class="card card-timeline px-2 border-none mb-2 shadow"> 
            <h5 class="m-2"><strong>Order No: </strong><?php echo $newOrderNo ?? ""; ?></h5>
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
                            </div>Payment <br/>Balance:&#x20B1;<?php echo number_format($totalBalance, 2); ?> 
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
        
        <div class="border-bottom-custom-green mb-2 mt-4">
            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start mx-2 pb-2 text-custom-green"><i class="fa-solid fa-receipt fa-fw fs-4 me-2"></i>Summary of Payment</div>
        </div>
            
        <div class="card">
            <div class="card-body shadow">
                <div class="row row-cols-1 g-2 pb-2 rounded mb-2">

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
                                <input type="text" class="form-control text-truncate" id="totalAmount" name="totalAmount" placeholder="Total Payment" value="&#x20B1;<?php echo number_format($totalAmount, 2) ?? ""; ?>" readonly>
                                <label for="totalAmount">Total Amount:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-calculator fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control text-truncate" id="totalBalance" name="totalBalance" placeholder="Total Balance" value="&#x20B1;<?php echo number_format($totalBalance, 2) ?? ""; ?>" readonly>
                                <label for="Total Balance">Total Balance:</label>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="shadow rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                    <?php if(!empty($infos)) { ?>
                        <div class="d-flex justify-content-center mb-4">   
                            <span class="fw-bold text-center"><strong>Reminder:</strong> Please send us your <span class="text-decoration-underline text-danger">bank receipts</span> or <span class="text-decoration-underline text-danger">proof of payment</span> for this order to our email address <span class="text-decoration-underline text-primary">(jenna@star-seiki.com.ph).</span></span>
                        </div>
                    <?php } ?>

                    <table id="userOrdersPaymentTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="d-none"></th>
                                <th>Pay</th>
                                <th>Balance</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($infos)) { ?>
                            <?php foreach ($infos as $info) { ?>
                            <tr>
                                <td class="d-none"><?php echo $info['paymentId']; ?></td>
                                <td class="text-end">&#x20B1;<?php echo number_format($info['pay'], 2); ?></td>
                                <td class="text-end">&#x20B1;<?php echo number_format($info['balance'], 2); ?></td>
                                <td><?php echo date('m/d/Y', strtotime($info['paymentDate'])); ?></td>
                                <td><?php echo date('h:i a', strtotime($info['paymentDate'])); ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="border-bottom-custom-green mb-2 mt-4">
                <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start px-2 pb-2 text-custom-green"><i class="fa-solid fa-box fa-fw fs-4 me-2"></i>Ordered Items</div>
            </div>
            
            <div class="card">
                <div class="shadow rounded">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                        <table id="userOrdersItemsTable" class="table table-striped" style="width:100%">
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
                                    <td><img src="<?php echo $data['productImgs']; ?>" width="100" height="100" alt=""></td>
                                    <td><?php echo $data['productDesc'] . " (" . $data['model'] . ")" . " - " . $data['weight'] . " " .$data['unit'] ; ?></td>
                                    <td class="text-end">&#x20B1;<?php echo number_format($data['unitPrice'], 2); ?></td>
                                    <td class="text-end"><?php echo $data['productQty']; ?></td>
                                    <td class="text-end">&#x20B1;<?php echo number_format($data['total'], 2); ?></td>
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

    <div class="border-bottom-custom-green mb-2 mt-1">
        <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start mx-2 pb-2 text-custom-green"><i class="fa-solid fa-box fa-fw fs-4 me-2"></i>My Orders</div>
    </div>

    <?php 
        $getOrderByUserId = $userdetails['userId'];
        $userOrders = $classOrders->getOrderByUserId($getOrderByUserId); 
    ?>

    <div class="card shadow"> 
        <div class="rounded">
            <div class="card-body border border-light border-5 rounded bg-light bg-opacity-25 overflow-auto">
                <table id="userOrdersTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="d-none"></th>
                            <th>Order No</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Total Amount</th>
                            <th class="text-center">Balance</th>
                            <th class="text-center">Order Date</th>
                            <th class="text-center">Order Time</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php if(!empty($userOrders)) { ?>
                        <?php foreach ($userOrders as $userOrder) { ?>
                        <tr class="item-notification" style="cursor: pointer;">
                            <td class="d-none">
                                <a href="index.php?route=user&view=my-orders&oid=<?php echo $userOrder["orderId"]; ?>&on=<?php echo $userOrder["orderNo"]; ?>"></a>
                            </td>
                            <td><?php echo $userOrder['orderNo']; ?></td>
                            <td class="text-center"><?php echo $userOrder['paymentType']; ?></td>
                            <td class="text-end">&#x20B1;<?php echo number_format($userOrder['totalAmount'], 2); ?></td>
                            <td class="text-end">&#x20B1;<?php echo number_format($userOrder['totalBalance'], 2); ?></td>
                            <td class="text-center"><?php echo date('m/d/Y', strtotime($userOrder['orderDate'])); ?></td>
                            <td class="text-center"><?php echo date('h:i a', strtotime($userOrder['orderDate'])); ?></td>
                            <?php if ($userOrder['orderApproved'] == 1) { ?>
                                <td class="text-center text-light bg-success">Approved</td>
                            <?php } else { ?>
                                <td class="text-center bg-warning">For Approval</td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php } ?>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "my-services-reqs") { ?>

    <?php if (isset($_GET['oid']) && !empty($_GET['oid']) && isset($_GET['on']) && !empty($_GET['on'])) { 
        $orderId = $_GET['oid'];
        $orderNo = $_GET['on'];
        $infos = $classServices->getAssignedServiceInstInfo($orderId, $orderNo);
        $datas = $classServices->getOrderWithServiceInst($orderId, $orderNo);
        $details = $classServices->getDeclinedServiceInstInfo($orderId, $orderNo); 

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
        }

        if (!empty($details)) {
            foreach ($details as $detail) {
                $declinedReason = $detail['serviceInstReason'];
                $declinedDate = date('m/d/Y h:i a', strtotime($detail['serviceAssignDate']));
            }
        }
    ?>
        <div class="d-flex justify-content-start mb-2 row row-cols-1 g-2">
            <div class="col-md-2">
            <a href="index.php?route=user&view=my-services-reqs" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="Back to My Service Installation Requests"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
            </div>
        </div>

        <div class="card card-timeline px-2 border-none mb-2 shadow"> 
            <h5 class="m-2"><strong>Order No: </strong><?php echo $newOrderNo ?? ""; ?></h5>
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
            <div class="border-bottom-custom-green mb-2 mt-4">
                <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start mx-2 pb-2 text-custom-green"><i class="fa-solid fa-screwdriver-wrench fa-fw fs-4 me-2"></i>Assigned Service Installation Details</div>
            </div>

            <div class="card">
                <div class="card-body shadow">
                    <div class="row row-cols-1 g-2 pb-2 rounded">
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

            <div class="border-bottom-custom-green mb-2 mt-4">
                <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start mx-2 pb-2 text-custom-green"><i class="fa-solid fa-screwdriver-wrench fa-fw fs-4 me-2"></i>Declined Service Installation Details</div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="row row-cols-1 g-2 pb-2 border-custom-green rounded">
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

        <div class="border-bottom-custom-green mb-2 mt-4">
            <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start mx-2 pb-2 text-custom-green"><i class="fa-solid fa-box fa-fw fs-4 me-2"></i>Ordered Items</div>
        </div>
        
        <div class="card">
            <div class="border-custom-green rounded">
                <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                    <table id="userServiceItemsTable" class="table table-striped" style="width:100%">
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
                                <td><img src="<?php echo $data['productImgs']; ?>" width="100" height="100" alt=""></td>
                                <td><?php echo $data['productDesc'] . " (" . $data['model'] . ")" . " - " . $data['weight'] . " " .$data['unit'] ; ?></td>
                                <td class="text-end"><?php echo $data['productQty']; ?></td>
                                <td class="text-end">&#x20B1;<?php echo number_format($data['total'], 2); ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>     
        </div>

    <?php } else { ?>
    
        <div class="border-bottom-custom-green mb-2 mt-1">
            <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start mx-2 pb-2 text-custom-green"><i class="fa-solid fa-screwdriver-wrench fa-fw fs-4 me-2"></i>My Service Installation Requests</div>
        </div>

        <?php 
            $getServiceInstByUserId = $userdetails['userId'];
            $userServiceInsts = $classServices->getServiceInstByUserId($getServiceInstByUserId); 
        ?>

        <div class="card"> 
            <div class="border-custom-green rounded">
                <div class="card-body border border-light border-5 rounded bg-light bg-opacity-25 overflow-auto">
                    <table id="userServiceTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="d-none"></th>
                                <th>Order No</th>
                                <th class="text-center">Service Request</th>
                                <th class="text-center">Order Date</th>
                                <th class="text-center">Order Time</th>
                                <th class="text-center">Request Status</th>
                                <th class="text-center">Installation Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(!empty($userServiceInsts)) { ?>
                            <?php foreach ($userServiceInsts as $userServiceInst) { ?>
                                <tr class="item-notification" style="cursor: pointer;">
                                    <td class="d-none">
                                        <a href="index.php?route=user&view=my-services-reqs&oid=<?php echo $userServiceInst["newOrderId"]; ?>&on=<?php echo $userServiceInst["newOrderNo"]; ?>"></a>
                                    </td>
                                    <td><?php echo $userServiceInst['newOrderNo']; ?></td>
                                    <td class="text-center"><?php echo $userServiceInst['orderServiceInst']; ?></td>
                                    <td class="text-center"><?php echo date('m/d/Y', strtotime($userServiceInst['orderDate'])); ?></td>
                                    <td class="text-center"><?php echo date('h:i a', strtotime($userServiceInst['orderDate'])); ?></td>
                                    <?php if ($userServiceInst['orderServiceAss'] == 1) { ?>
                                        <td class="text-center text-light bg-success">Assigned</td>
                                    <?php } elseif ($userServiceInst['orderServiceAss'] == 2) { ?>
                                        <td class="text-center text-light bg-danger">Declined</td>
                                    <?php } else { ?>
                                        <td class="text-center bg-warning">For Approval</td>
                                    <?php } ?>
                                    
                                    <?php if ($userServiceInst['orderServiceAss'] == 1) { ?>
                                        <?php if ($userServiceInst['serviceInstStatus'] == 1) { ?>
                                            <td class="text-center text-light bg-success">Done</td>
                                        <?php } else { ?>
                                            <td class="text-center bg-warning">On-going</td>
                                        <?php } ?>
                                    <?php } elseif ($userServiceInst['orderServiceAss'] == 2) { ?>
                                        <td class="text-center"></td>
                                    <?php } else { ?>
                                        <td class="text-center"></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <?php } ?>

<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "my-notifications") { ?>
    <div class="border-bottom-custom-green mb-2 mt-1">
        <div class="card-header text-center fw-bold text-uppercase d-flex align-items-center justify-content-start mx-2 pb-2 text-custom-green"><i class="fa-solid fa-bell fa-fw fs-4 me-2"></i>My Notifications</div>
    </div>

    <?php 
        $getNotifById = $userdetails['userId'];
        $userNotifs = $classServices->getNotificationsByUserId($getNotifById); 
    ?>

    <div class="card"> 
        <div class="border-custom-green rounded">
            <div class="card-body border border-light border-5 rounded bg-light bg-opacity-25 overflow-auto">
                <table id="userNotifTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="d-none"></th>
                            <th class="text-center">Notifications</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($userNotifs)) { ?>
                        <?php foreach ($userNotifs as $userNotif) { ?>
                        <tr class="item-notification" style="cursor: pointer;">
                            <td class="d-none">
                                <?php if ($userNotif['notificationType'] == 0 || $userNotif['notificationType'] == 1 || $userNotif['notificationType'] == 2 || $userNotif['notificationType'] == 3 || $userNotif['notificationType'] == 8 || $userNotif['notificationType'] == 9) { ?>
                                    <a href="index.php?route=user&view=my-orders&oid=<?php echo $userNotif["notificationOrderId"]; ?>&on=<?php echo $userNotif["notificationOrderNo"]; ?>"></a>
                                <?php } else { ?>
                                    <a href="index.php?route=user&view=my-services-reqs&oid=<?php echo $userNotif["notificationOrderId"]; ?>&on=<?php echo $userNotif["notificationOrderNo"]; ?>"></a>
                                <?php } ?>    
                            </td>

                            <?php if ($userNotif['notificationType'] == 0) { ?>
                                <td>
                                    <strong>Order Approved</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> has been approved. Order due date is on <strong class="text-primary"><?php echo date('M d, Y', strtotime($userNotif["orderDueDate"])); ?></strong>. Please settle <strong class="text-primary">&#x20B1;<?php echo number_format(intval($userNotif["totalBalance"] / 2), 2) ?></strong> of your total order(s) amount <strong class="text-primary">&#x20B1;<?php echo number_format($userNotif["totalBalance"], 2) ?></strong> upon approval of your installment. You have 60 days to settle the installment payment upon approval of order. <strong class="text-danger">Reminder: </strong><span class="text-decoration-underline">Please send to our email (jenna@star-seiki.com.ph) your bank receipts or proof of payment for verification.</span></span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 1) { ?>
                                <td>
                                    <strong>Order Approved</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> has been approved. Order due date is on <strong class="text-primary"><?php echo date('M d, Y', strtotime($userNotif["orderDueDate"])); ?></strong>. You have 30 days to settle the full payment upon approval of order. <strong class="text-danger">Reminder: </strong><span class="text-decoration-underline">Please send to our email (jenna@star-seiki.com.ph) your bank receipts or proof of payment for verification.</span></span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 2) { ?>
                                <td>
                                    <strong>Payment Received</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your <strong class="text-primary">&#x20B1;<?php echo number_format($userNotif["pay"], 2); ?></strong>  intallment payment has been received for your order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong>. Now, your remaining total balance is <strong class="text-primary">&#x20B1;<?php echo number_format($userNotif["balance"], 2); ?></strong>.</span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 3) { ?>
                                <td>
                                    <strong>Payment Received</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your <strong class="text-primary">&#x20B1;<?php echo number_format($userNotif["pay"], 2); ?></strong> full payment has been received for your order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong>.</span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 4) { ?>
                                <td>
                                    <strong>Service Installation Request Assigned</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your service installation request for order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> has successfully assigned. Installer Name: <strong class="text-primary"><?php echo $userNotif["serviceInstFname"] . " " . $userNotif["serviceInstLname"]; ?></strong>, Position: <strong class="text-primary"><?php echo $userNotif["serviceInstPos"]; ?></strong>, Installation Date: <strong class="text-primary"><?php echo date('M d, Y h:i a', strtotime($userNotif["serviceAssignDate"])); ?></strong>, Service Description: <strong class="text-primary"><?php echo $userNotif["serviceInstDesc"]; ?></strong>.</span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 5) { ?>
                                <td>
                                    <strong>Service Installation Request Declined</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your request for service installation for order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> is not available at this moment <strong class="text-primary"><?php echo $userNotif["serviceInstReason"]; ?></strong>. You will be <strong>reschedule and notify</strong> once our engineer is available. Sorry for inconvenience. Thank you :) </span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 6) { ?>
                                <td>
                                    <strong>Service Installation Request Assigned</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Sorry for the inconvenience, our service engineer are now available. Your service installation request for <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> has successfully <strong>rescheduled and assigned</strong>. Installer Name: <strong class="text-primary"><?php echo $userNotif["serviceInstFname"] . " " . $userNotif["serviceInstLname"]; ?></strong>, Position: <strong class="text-primary"><?php echo $userNotif["serviceInstPos"]; ?></strong>, Installation Date: <strong class="text-primary"><?php echo date('M d, Y h:i a', strtotime($userNotif["serviceAssignDate"])); ?></strong>, Service Description: <strong class="text-primary"><?php echo $userNotif["serviceInstDesc"]; ?></strong>. </span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 7) { ?>
                                <td>
                                    <strong>Service Installation Request Completed</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your service installation request for order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> has marked completed. </span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 8) { ?>
                                <td>
                                    <strong>Order Delivery Date</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> delivery date is on <strong class="text-primary"><?php echo date('M d, Y', strtotime($userNotif["deliveryEstDate"])); ?></strong>.</span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 9) { ?>
                                <td>
                                    <strong>Order Marked Delivered</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> has marked delivered. </span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 10) { ?>
                                <td>
                                    <strong>Order Payment Reminder</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> has 10 days left to pay your existing balance on your <strong class="text-primary">&#x20B1;<?php echo number_format($userNotif["totalBalance"], 2); ?></strong>. Please send your proof/s of payment to our email <strong class="text-danger">jenna@star-seiki.com.ph</strong> for verification. Thank you.</span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 11) { ?>
                                <td>
                                    <strong>Order Payment Reminder</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> is today <strong class="text-primary"><?php echo date('M d, Y', strtotime($userNotif["orderDueDate"])); ?></strong>. Please settle your balance payment <strong class="text-primary">&#x20B1;<?php echo number_format($userNotif["totalBalance"], 2); ?></strong> and send us the proof/s of payment to our email <strong class="text-danger">jenna@star-seiki.com.ph</strong> for verification. Thank you.</span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 12) { ?>
                                <td>
                                    <strong>Order Payment Reminder</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> is on last <strong class="text-primary"><?php echo date('M d, Y', strtotime($userNotif["orderDueDate"])); ?></strong>. Please settle your existing balance <strong class="text-primary">&#x20B1;<?php echo number_format($userNotif["totalBalance"], 2); ?></strong> to avoid inconvenience in your future transaction with us. Please send us the proof/s of payment to our email <strong class="text-danger">jenna@star-seiki.com.ph</strong> for verification. Thank you.</span>
                                </td>
                            <?php } elseif ($userNotif['notificationType'] == 13) { ?>
                                <td>
                                    <strong>Order Returned</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">We are sorry for the damaged product in your order <strong class="text-primary"><?php echo $userNotif["notificationOrderNo"]; ?></strong> that was delivered on last <strong class="text-primary"><?php echo date('M d, Y', strtotime($userNotif["deliveryMarkedDate"])); ?></strong>, we take the full accountability of that matter. We accept the return of the product. Thank you! Please shop again!</span>
                                </td>
                            <?php } ?>

                            <td class="text-center"><?php echo date('m/d/Y', strtotime($userNotif['notificationDate'])); ?></td>
                            <td class="text-center"><?php echo date('h:i a', strtotime($userNotif['notificationDate'])); ?></td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } else { 
    echo "<script>
        window.location.assign('index.php?route=404');
    </script>";
} ?>