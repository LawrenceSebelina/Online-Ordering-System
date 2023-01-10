<!-- Adding of Admin Account Modal -->
<?php $classConfiguration->addAdmin(); ?>
<div class="modal fade" id="addNewAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content border border-success border-5 rounded">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa-solid fa-user-plus fs-5 me-2"></i>
                        <div>
                            <strong>New Admin</strong>
                        </div>
                    </div>

                    <div class="row row-cols-1">
                        <div class="col-md-12 col-lg-4">

                            <h6 class="text-center bg-success bg-opacity-25 fw-bold fs-4 p-0">Profile Picture</h6>
                        
                            <div class="upload-photo">
                                <div class="preview-photo-admin">
                                    <div class="preview">
                                        <img src="../uploads/admin-default-img.png" id="photo-previewer-admin" class="img-fluid">
                                        <input type="file" id="file-preview-admin" accept="image/*" name="imageAdmin" onchange="previewImageAdmin(event);">
                                        <input type="hidden" value="uploads/admin-default-img.png" name="default-photo">
                                        <label for="file-preview-admin">Upload Photo</label>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <input type="hidden" name="addAdminUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">

                        <div class="col-md-12 col-lg-8 pt-3 pb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="adminFName" name="adminFName" placeholder="First Name" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required>
                                            <label for="adminFName">First Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="adminLName" name="adminLName" placeholder="Last Name" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required>
                                            <label for="adminLName">Last Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-calendar-plus fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="adminAge" name="adminAge" placeholder="Age" pattern="[0-9]+" title="Must contain numbers" required>
                                            <label for="adminAge">Age</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-calendar-days fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="date" class="form-control" max="<?= date('Y-m-d'); ?>" id="adminBirthday" name="adminBirthday" placeholder="Birthday" required>
                                            <label for="adminBirthday">Birthday</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-person-half-dress fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <select class="form-select" style="height: 3.6rem;" aria-label=".form-select-lg example" id="adminGender" name="adminGender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <label for="adminGender">Gender</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-house fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="adminAddress" name="adminAddress" placeholder="Address" pattern="[a-zA-Z0-9-_.,()ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.,())" required>
                                            <label for="adminAddress">Address</label>
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
                                    <input type="text" class="form-control" id="adminContact" name="adminContact" placeholder="Contact No." pattern="[0-9-_.()]+" title="Must contain numbers and symbols (e.g. -_.())" required>
                                    <label for="adminContact">Contact No.</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="input-group mb-3">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-square-envelope fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="adminEmail" name="adminEmail" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="(e.g. example@email.com)" required>
                                    <label for="adminEmail">Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group mb-3">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-id-badge fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="adminUsername" name="adminUsername" placeholder="Username" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)" required>
                                    <label for="adminUsername">Username</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group mb-3">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-lock fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    <label for="adminPassword">Password</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group mb-3">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-lock fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="adminCPassword" name="adminCPassword" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    <label for="adminCPassword">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-success d-flex align-items-center"><i class="fa-solid fa-repeat"></i>&nbsp<strong>&nbsp&nbsp&nbspReset&nbsp&nbsp&nbsp</strong></button>
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="addAdmin"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp<strong>&nbsp&nbsp&nbspSave&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Adding of Admin Account Modal -->

<!-- Deleting of Admin Account Modal -->
<?php $classConfiguration->deleteAdminAccount(); ?>
<div class="modal fade" id="deleteAdminAccounts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-danger border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="fa-solid fa-user-xmark fs-5 me-2"></i>
                        <div>
                            <strong>Delete Admin Account</strong>
                        </div>
                    </div>

                    <input type="hidden" name="deleteAdminAccountID" id="deleteAdminAccountID">
                    <input type="hidden" name="deleteAdminAccountUID" id="deleteAdminAccountUID">
                    <input type="hidden" name="deleteAdminUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">
                    <input type="hidden" name="deleteAdminFullName" id="deleteAdminFullName">

                    <div class="text-center mt-3 mb-2">
                        <h4>Are you sure you want to delete <strong><span id="deleteAdminAccountShow" name="deleteAdminAccountShow" class="text-danger"></span></strong>?</h4>
                    </div> 

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="deleteAdminAccount"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Deleting of Admin Account Modal -->

<!-- Adding of FAQs Modal -->
<?php $classConfiguration->addFaqs(); ?>
<div class="modal fade" id="addNewFaq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border border-success border-5 rounded">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa-solid fa-square-plus fs-5 me-2"></i>
                        <div>
                            <strong>New Frequently Asked Question</strong>
                        </div>
                    </div>

                    <input type="hidden" name="addFaqUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">

                    <div class="mt-3">
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-circle-question fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="faqQuestion" id="faqQuestion" class="form-control" placeholder="Question" style="height: 7rem;" required></textarea>
                                <label for="faqQuestion">Question</label>
                            </div>
                        </div> 

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-circle-info fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="faqAnswer" id="faqAnswer" class="form-control" placeholder="Answer" style="height: 7rem;" required></textarea>
                                <label for="faqAnswer">Answer</label>
                            </div>
                        </div> 
                    </div>
                    
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-success d-flex align-items-center"><i class="fa-solid fa-repeat"></i>&nbsp<strong>&nbsp&nbsp&nbspReset&nbsp&nbsp&nbsp</strong></button>
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="addFaq"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp<strong>&nbsp&nbsp&nbspSave&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Adding of FAQs Modal -->

<!-- Updating of FAQs Modal -->
<?php $classConfiguration->updateFaqs(); ?>
<div class="modal fade" id="updateFaqs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border border-primary border-5 rounded">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-primary d-flex align-items-center">
                        <i class="fa-solid fa-pen-to-square fs-5 me-2"></i>
                        <div>
                            <strong>Update Frequently Asked Question</strong>
                        </div>
                    </div>

                    <input type="hidden" name="updateFaqUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">
                    <input type="hidden" name="updateFaqId" id="updateFaqId">

                    <div class="mt-3">

                    <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-hand-pointer fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <select class="form-select" style="height: 3.6rem;" aria-label=".form-select-lg example" id="updateFaqOrder" name="updateFaqOrder">
                                    <option value="1">Display as First FAQs</option>
                                    <option value="2">Display as Second FAQs</option>
                                    <option value="3">Display as Third FAQs</option>
                                    <option value="4">Display as Fourth FAQs</option>
                                    <option value="5">Display as Fifth FAQs</option>
                                    <option value="0">Not Displayed</option>
                                </select>
                                <label for="updateFaqOrder">Frequently Asked Question No. Display</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-circle-question fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="updateFaqQuestion" id="updateFaqQuestion" class="form-control" placeholder="Question" style="height: 7rem;" required></textarea>
                                <label for="updateFaqQuestion">Question</label>
                            </div>
                        </div> 

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-circle-info fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="updateFaqAnswer" id="updateFaqAnswer" class="form-control" placeholder="Answer" style="height: 7rem;" required></textarea>
                                <label for="updateFaqAnswer">Answer</label>
                            </div>
                        </div> 
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="updateFaq"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp<strong>&nbsp&nbsp&nbspSave&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Updating of FAQs Modal -->

<!-- Deleting of FAQs Modal -->
<?php $classConfiguration->deleteFaqs(); ?>
<div class="modal fade" id="deleteFaqs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border border-danger border-5 rounded">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="fa-solid fa-trash-can fs-5 me-2"></i>
                        <div>
                            <strong>Delete Frequently Asked Question</strong>
                        </div>
                    </div>

                    <input type="hidden" name="deleteFaqUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">
                    <input type="hidden" name="deleteFaqQ" id="deleteFaqQ">
                    <input type="hidden" name="deleteFaqId" id="deleteFaqId">

                    <div class="mt-3">
                        <div class="text-center mt-3 mb-2">
                            <h4>Are you sure you want to delete this Frequently Asked Question?</h4>
                        </div> 

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-danger bg-opacity-25"><i class="fa-solid fa-circle-question fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="deleteFaqQuestion" id="deleteFaqQuestion" class="form-control" placeholder="Question" style="height: 7rem;" required></textarea>
                                <label for="deleteFaqQuestion">Question</label>
                            </div>
                        </div> 

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-danger bg-opacity-25"><i class="fa-solid fa-circle-info fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="deleteFaqAnswer" id="deleteFaqAnswer" class="form-control" placeholder="Answer" style="height: 7rem;" required></textarea>
                                <label for="deleteFaqAnswer">Answer</label>
                            </div>
                        </div> 
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="deleteFaq"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Deleting of FAQs Modal -->