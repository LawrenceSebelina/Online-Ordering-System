<!-- Assigned Servince Instatllation Request Modal -->
<?php $classServices->assignedService(); ?>
<div class="modal fade" id="assignService" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-success border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa-solid fa-calendar-check fs-5 me-2"></i>
                        <div>
                            <strong>Assign Installation Service Request</strong>
                        </div>
                    </div>

                    <input type="hidden" name="assignedUserUID" id="assignedUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""?>">
                    <input type="hidden" name="assignedOrderId" id="assignedOrderId">
                    <input type="hidden" name="assignedOrderNo" id="assignedOrderNo">
                    <input type="hidden" name="assignedUserId" id="assignedUserId">    
                   
                    <div class="mt-3">
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="assignedFirstName" id="assignedFirstName" class="form-control" placeholder="Installer First Name" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label>Installer First Name</label>
                            </div>
                        </div>
                    
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="assignedLastName" id="assignedLastName" class="form-control" placeholder="Installer Last Name" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label>Installer Last Name</label>
                            </div>
                        </div>
                        
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-id-badge fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="assignedPosition" id="assignedPosition" class="form-control" placeholder="Installer Position" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label>Installer Position</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-calendar-days fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="datetime-local" class="form-control" min="<?= date('Y-m-d H:i'); ?>" id="assignedDate" name="assignedDate" placeholder="Date & Time" required>
                                <label for="floatingInput">Date & Time</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-screwdriver-wrench fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="assignedDesc" id="assignedDesc" class="form-control bg-secondary bg-opacity-25" placeholder="Selected Service Installation Request" readonly>
                                <label>Selected Service Installation Request</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-success d-flex align-items-center"><i class="fa-solid fa-repeat"></i>&nbsp<strong>&nbsp&nbsp&nbspReset&nbsp&nbsp&nbsp</strong></button>
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="assignedService"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp<strong>&nbsp&nbsp&nbspConfirm&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Assigned Service Installation Request Modal  -->

<!-- Deleting of Declined Service Installation Request Modal -->
<?php $classServices->declinedService(); ?>
<div class="modal fade" id="declineService" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-danger border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="fa-solid fa-calendar-xmark fs-5 me-2"></i>
                        <div>
                            <strong>Decline Installation Service Request</strong>
                        </div>
                    </div>

                    <input type="hidden" name="declinedUserUID" id="declinedUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""?>">
                    <input type="hidden" name="declinedOrderId" id="declinedOrderId">
                    <input type="hidden" name="declinedOrderNo" id="declinedOrderNo">
                    <input type="hidden" name="declinedUserId" id="declinedUserId">
                    
                    <div class="mt-3">
                        <div class="text-center">
                            <h4>Are you sure you want to decline the service installation of Order No.: <strong><span id="declinedOrderNoShow" name="declinedOrderNoShow" class="text-danger"></span></strong>?</h4>
                        </div> 

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-danger bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="declinedReason" id="declinedReason" class="form-control" placeholder="Reason" style="height: 7rem;" required></textarea>
                                <label>Reason</label>
                            </div>
                        </div> 
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="declinedService"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Deleting of Declined Service Installation Request Modal -->

<!-- Assigned Declined Sevice Installation Request Modal -->
<?php $classServices->assignedDeclinedService(); ?>
<div class="modal fade" id="assignDeclinedService" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-success border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa-solid fa-calendar-check fs-5 me-2"></i>
                        <div>
                            <strong>Assign Installation Service Request</strong>
                        </div>
                    </div>

                    <input type="hidden" name="assignedDeclinedUserUID" id="assignedDeclinedUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""?>">
                    <input type="hidden" name="assignedDeclinedOrderId" id="assignedDeclinedOrderId">
                    <input type="hidden" name="assignedDeclinedOrderNo" id="assignedDeclinedOrderNo">
                    <input type="hidden" name="assignedDeclinedUserId" id="assignedDeclinedUserId"> 
                    <input type="hidden" name="assignedDeclinedServId" id="assignedDeclinedServId">   
                   
                    <div class="mt-3">
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="assignedDeclinedFN" id="assignedDeclinedFN" class="form-control" placeholder="Installer First Name" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label>Installer First Name</label>
                            </div>
                        </div>
                    
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="assignedDeclinedLN" id="assignedDeclinedLN" class="form-control" placeholder="Installer Last Name" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label>Installer Last Name</label>
                            </div>
                        </div>
                        
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-id-badge fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="assignedDeclinedPos" id="assignedDeclinedPos" class="form-control" placeholder="Installer Position" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label>Installer Position</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-calendar-days fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="datetime-local" class="form-control" min="<?= date('Y-m-d H:i'); ?>" id="assignedDeclinedDate" name="assignedDeclinedDate" placeholder="Date & Time" required>
                                <label for="floatingInput">Date & Time</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-screwdriver-wrench fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="assignedDeclineDesc" id="assignedDeclineDesc" class="form-control bg-secondary bg-opacity-25" placeholder="Selected Service Installation Request" readonly>
                                <label>Selected Service Installation Request</label>
                            </div>
                        </div>
                    </div>        

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-success d-flex align-items-center"><i class="fa-solid fa-repeat"></i>&nbsp<strong>&nbsp&nbsp&nbspReset&nbsp&nbsp&nbsp</strong></button>
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="assignedDeclinedService"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp<strong>&nbsp&nbsp&nbspConfirm&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Assigned Declined Service Installation Request Modal  -->

<!-- Mark As Done Service Installation Request Modal -->
<?php $classServices->assignedMarkedAsDone(); ?>
<div class="modal fade" id="assignMarkAsDone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-success border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa-solid fa-clipboard-check fs-5 me-2"></i>
                        <div>
                            <strong>Mark As Done Service Installation Request</strong>
                        </div>
                    </div>

                    <input type="hidden" name="markedAsDoneUserUID" id="markedAsDoneUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""?>">
                    <input type="hidden" name="markedAsDoneOrderId" id="markedAsDoneOrderId">
                    <input type="hidden" name="markedAsDoneOrderNo" id="markedAsDoneOrderNo">
                    <input type="hidden" name="markedAsDoneUserId" id="markedAsDoneUserId"> 
                    <input type="hidden" name="markedAsDoneServId" id="markedAsDoneServId">

                    <div class="text-center mt-3 mb-2">
                        <h4>Are you sure you want to mark as done Order No.: <strong><span id="markedAsDoneOrderNoShow" name="markedAsDoneOrderNoShow" class="text-success"></span></strong>?</h4>
                    </div> 

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="assignedMarkedAsDone"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Mark As Done Service Installation Request Modal -->