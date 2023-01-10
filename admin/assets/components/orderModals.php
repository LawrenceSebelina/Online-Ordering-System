<!-- Adding of Payment Modal -->
<?php $classOrders->addPayment(); ?>
<div class="modal fade" id="addPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-primary border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-primary d-flex align-items-center">
                        <i class="fa-solid fa-square-plus fs-5 me-2"></i>
                        <div>
                            <strong>Add Payment (<?php  echo $paymentType ?? ""; ?>)</strong>
                        </div>
                    </div>

                    <input type="hidden" name="orderUserUID" id="orderUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">
                    <input type="hidden" name="orderUserId" id="orderUserId" value="<?php echo $userId ?? ""; ?>">
                    <input type="hidden" name="orderOrderId" id="orderOrderId" value="<?php echo $orderId ?? ""; ?>">
                    <input type="hidden" name="orderOrderNo" id="orderOrderNo" value="<?php echo $orderNo ?? ""; ?>">
                    <input type="hidden" name="orderPaymentType" id="orderPaymentType" value="<?php echo $paymentType ?? ""; ?>">
                    <input type="hidden" name="orderTotalAmount" id="orderTotalAmount" value="<?php echo $totalAmount ?? ""; ?>"> <!-- intval($totalAmount) --> 
                    <input type="hidden" name="orderTotalBalance" id="orderTotalBalance" value="<?php echo $totalBalance ?? ""; ?>"> <!-- intval($totalBalance) --> 

                    <div class="mt-3">
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-money-bill-wave fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="totalAmount" id="totalAmount" class="form-control" placeholder="Total Amount" value="₱<?php echo number_format($totalAmount , 2) ?? ""; ?>" readonly>
                                <label>Total Amount</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-money-bill-wave fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="totalBalance" id="totalBalance" class="form-control" placeholder="Total Balance" value="₱<?php echo number_format($totalBalance, 2) ?? ""; ?>" readonly>
                                <label>Total Balance</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="orderPayment" id="orderPayment" class="form-control" placeholder="Insert Payment" pattern="[0-9.]+" title="Must contain numbers" required>
                                <label>Insert Payment</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="addPayment"><i class="fa-solid fa-credit-card"></i>&nbsp<strong>&nbsp&nbsp&nbspAdd&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Adding of Payment Modal -->

<!-- Approved Order Modal -->
<?php $classOrders->approvedOrder(); ?>
<div class="modal fade" id="approvedOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-success border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa-solid fa-clipboard-check fs-5 me-2"></i>
                        <div>
                            <strong>Approved Order</strong>
                        </div>
                    </div>

                    <input type="hidden" name="approvedUserUID" id="approvedUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">
                    <input type="hidden" name="approvedOrderId" id="approvedOrderId">
                    <input type="hidden" name="approvedOrderNo" id="approvedOrderNo">
                    <input type="hidden" name="approvedUserId" id="approvedUserId">
                    <input type="hidden" name="approvedPaymentType" id="approvedPaymentType">

                    <div class="text-center mt-3 mb-2">
                        <h4>Are you sure you want to approved Order No.: <strong><span id="approvedOrderNoShow" name="approvedOrderNoShow" class="text-success"></span></strong>?</h4>
                    </div> 

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="approvedOrder"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Approved Order Modal  -->

<!-- Set Delivery Details Modal -->
<?php $classOrders->setOrderDelInfo(); ?>
<div class="modal fade" id="setOrderDelivery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-success border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa-solid fa-calendar-days fs-5 me-2"></i>
                        <div>
                            <strong>Set Delivery Date</strong>
                        </div>
                    </div>

                    <input type="hidden" name="setOrderDelUserUID" id="setOrderDelUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">
                    <input type="hidden" name="setOrderDelId" id="setOrderDelId">
                    <input type="hidden" name="setOrderDelNo" id="setOrderDelNo">
                    <input type="hidden" name="setOrderDelUserId" id="setOrderDelUserId">
                    
                    <div class="mt-3">
                        <div class="text-center">
                            <h4>Are you sure you want to set delivery date for Order No.: <strong><span id="setOrderDelNoShow" name="setOrderDelNoShow" class="text-success"></span></strong>?</h4>
                        </div> 

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-calendar-days fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="date" class="form-control" min="<?= date('Y-m-d'); ?>" id="setOrderDelDate" name="setOrderDelDate" placeholder="Delivery Date" required>
                                <label for="floatingInput">Delivery Date</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="setOrderDelInfo"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Set Delivery Details Modal -->

<!-- Marked as Delivered Order Modal -->
<?php $classOrders->approvedMarkedAsDlvrd();  ?>
<div class="modal fade" id="markedDelivered" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-success border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa-solid fa-truck-fast fs-5 me-2"></i>
                        <div>
                            <strong>Marked as Delivered</strong>
                        </div>
                    </div>

                    <input type="hidden" name="mrkDlvrdUserUID" id="mrkDlvrdUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">
                    <input type="hidden" name="mrkDlvrdOrderId" id="mrkDlvrdOrderId">
                    <input type="hidden" name="mrkDlvrdOrderNo" id="mrkDlvrdOrderNo">
                    <input type="hidden" name="mrkDlvrdUserId" id="mrkDlvrdUserId">
                    <input type="hidden" name="mrkDlvrdDeliverId" id="mrkDlvrdDeliverId">

                    <div class="text-center mt-3 mb-2">
                        <h4>Are you sure you want to approved Order No.: <strong><span id="mrkDlvrdOrderNoShow" name="mrkDlvrdOrderNoShow" class="text-success"></span></strong>?</h4>
                    </div> 

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="approvedMarkedAsDlvrd"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Marked as Delivered Order Modal  -->

<!-- Marked as Return Order Modal -->
<?php $classOrders->approvedMarkedAsReturn();  ?>
<div class="modal fade" id="markedReturn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-danger border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="fa-solid fa-boxes-packing fs-5 me-2"></i>
                        <div>
                            <strong>Marked as Return</strong>
                        </div>
                    </div>

                    <input type="hidden" name="markReturnUserUID" id="markReturnUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">
                    <input type="hidden" name="markReturnOrderId" id="markReturnOrderId">
                    <input type="hidden" name="markReturnOrderNo" id="markReturnOrderNo">
                    <input type="hidden" name="markReturnUserId" id="markReturnUserId">
                    <input type="hidden" name="markReturnDeliverId" id="markReturnDeliverId">

                    <div class="text-center mt-3 mb-2">
                        <h4>Are you sure you want to approved Order No.: <strong><span id="markReturnOrderNoShow" name="markReturnOrderNoShow" class="text-danger"></span></strong>?</h4>
                    </div>
                    
                    <div class="input-group d-flex justify-content-center mt-3 mb-2">
                        <span class="input-group-text bg-danger bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                        <div class="form-floating">
                            <textarea name="markedReturnDesc" id="markedReturnDesc" class="form-control" placeholder="Return Reason" style="height: 5rem;" required></textarea>
                            <label for="markedReturnDesc">Return Reason</label>
                        </div>
                    </div> 

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="approvedMarkedAsReturn"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Marked as Return Order Modal  -->