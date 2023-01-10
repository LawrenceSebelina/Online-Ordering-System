<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>
        <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "my-info") { ?>
            My Account
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "change-my-password") { ?>
            Change My Account
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "info") { ?>
            <?php echo $_GET['un']; ?> | Account
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "change-password") { ?>
            <?php echo $_GET['un']; ?> | Change Password
        <?php } else { ?>
            Manage Account
        <?php } ?>
    </title>

    <style>
        
    </style>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php'); 
        include_once('assets/components/sidebars.php'); 
        include_once('../classes/configurationClass.php'); 
        include_once('../classes/signinClass.php'); 
        
        if (isset($_GET['uid']) && !empty($_GET['uid'])){
            $userHUserId = $userdetails['userUniqueId'];
            $userUniqueId = $_GET['uid'];

            if ($userUniqueId == $userHUserId && isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] !== "my-info" && $_GET['view'] !== "change-my-password") {
                echo "<script>
                    swal('Warning!', 'No account!', 'warning').then(function() {
                    window.location.assign('index.php?route=configuration&view=accounts');
                });
                </script>";
            } elseif ($userUniqueId !== $userHUserId && isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] !== "info" && $_GET['view'] !== "change-password") {
                echo "<script>
                    swal('Warning!', 'No account!', 'warning').then(function() {
                    window.location.assign('index.php?route=configuration&view=accounts');
                });
                </script>";
                }

            $datas = $classConfiguration->getUser($userUniqueId);
        }

        if (!empty($datas)) {
            foreach ($datas as $data) {
                $userId = $data['userId'];
                $newUserUniqueId = $data['userUniqueId'];
                $userFname = $data['firstName'];
                $userLname = $data['lastName'];
                $userAge = $data['age'];
                $userBirthday = $data['birthday'];
                $userAddress = $data['address'];
                $userContactNo = $data['contactNo'];
                $userGender = $data['gender'];
                $userUsername = $data['username'];
                $userPassword = $data['password'];
                $userCPassword= $data['cpassword'];
                $userEmail = $data['email'];
                $userUserType = $data['userType'];
                $userProfileImg = $data['userProfileImg'];
            }
        } else {
            echo "<script>
                swal('Warning!', 'No account!', 'warning').then(function() {
                window.location.assign('index.php?route=configuration&view=accounts');
            });
            </script>";
        }
    ?>
    <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
    
        <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "info" || $_GET['view'] == "my-info") { ?>
            <div class="container">
                
                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-user-pen fa-fw fs-4 me-2"></i>Update&nbsp<span class="text-warning text-decoration-underline"><?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "my-info") { ?>My<?php } else { ?><?php echo $userFname ?? ""; ?> <?php echo $userLname ?? ""; ?><?php } ?></span>&nbspInformation</div>
                </div>

                <?php 
                    if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "my-info") {
                        $classSignIn->userInfoSaved();
                    } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "info") {
                        $classConfiguration->userInfoSaved();
                    }
                ?>
                
                <div class="card"> 
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-light bg-opacity-25 overflow-auto">
                        <form method="post" enctype="multipart/form-data">

                            <input type="hidden" name="userId" id="userId" value="<?php echo $userId ?? ""; ?>">
                            <input type="hidden" name="newUserUniqueId" id="newUserUniqueId" value="<?php echo $userUniqueId ?? ""; ?>">
                            <input type="hidden" name="userInfoSavedUserUID" id="userInfoSavedUserUID" value="<?php echo $userHUserId ?? ""; ?>">

                            <div class="row row-cols-1">
                                <div class="col-md-12 col-lg-4">

                                    <h6 class="text-center bg-success bg-opacity-25 fw-bold fs-4 p-0">Profile Picture</h6>
                                
                                    <div class="upload-photo d-flex justify-content-center">
                                        <div class="preview-photo-uadmin">
                                            <div class="preview">
                                                <img src="<?php echo "../" . $userProfileImg ?? ""; ?>" id="photo-previewer-uadmin">
                                                <input type="file" id="file-preview-uadmin" accept="image/*" name="imageUAdmin" onchange="previewImageUAdmin(event);">

                                                <input type="hidden" value="<?php echo $userProfileImg ?? ""; ?>" name="default-photo">

                                                <label for="file-preview-uadmin">Upload Photo</label>
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
                                                    <input type="text" class="form-control" id="userFname" name="userFname" placeholder="First Name" value="<?php echo $userFname ?? ""; ?>" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())">
                                                    <label for="userFname">First Name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-group mb-3">       
                                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="userLname" name="userLname" placeholder="Last Name" value="<?php echo $userLname ?? ""; ?>" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())">
                                                    <label for="userLname">Last Name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group mb-3">       
                                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-calendar-plus fa-fw  fs-4"></i></span>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="userAge" name="userAge" placeholder="Age" value="<?php echo $userAge ?? ""; ?>" pattern="[0-9]+" title="Must contain numbers">
                                                    <label for="userAge">Age</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="input-group mb-3">       
                                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-calendar-days fa-fw fs-4"></i></span>
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="userBirthday" name="userBirthday" placeholder="Birthday" value="<?php echo $userBirthday ?? ""; ?>">
                                                    <label for="userBirthday">Birthday</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="input-group mb-3">       
                                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-person-half-dress fa-fw fs-4"></i></span>
                                                <div class="form-floating" style="height: 3.6rem;">
                                                    <select class="form-select mb-3" aria-label=".form-select-lg example" id="userGender" name="userGender">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <label for="userGender">Sex</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input-group">       
                                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-house fa-fw fs-4"></i></span>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="userAddress" name="userAddress" placeholder="Address" value="<?php echo $userAddress ?? ""; ?>"  pattern="[a-zA-Z0-9-_.,()ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.,())">
                                                    <label for="userAddress">Address</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userContactNo" name="userContactNo" placeholder="Contact No." value="<?php echo $userContactNo ?? ""; ?>" pattern="[0-9-_.()]+" title="Must contain numbers and symbols (e.g. -_.())">
                                            <label for="userContactNo">Contact No.</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-square-envelope fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userEmail" name="userEmail" placeholder="Email" value="<?php echo $userEmail ?? ""; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="(e.g. example@email.com)">
                                            <label for="userEmail">Email</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group mb-3">       
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-id-badge fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-secondary bg-opacity-25" id="userUsername" name="userUsername" placeholder="Username" value="<?php echo $userUsername ?? ""; ?>" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)" readonly>
                                            <label for="userUsername">Username</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4 row row-cols-1 g-2">
                                <div class="col-xl-2 col-md-3">
                                    <button type="button" class="btn btn-primary fw-bold me-2 w-100 d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#companyInfoSave"><i class="fa-solid fa-arrow-up-from-bracket fs-5 me-2"></i>Save Changes</button>
                                </div>
                            </div>

                            <div class="modal fade" id="companyInfoSave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border border-primary border-4">
                                        <div class="modal-body">
                                            <form class="row g-3" method="post" enctype="multipart/form-data">

                                                <div class="alert alert-primary d-flex align-items-center">
                                                    <i class="fa-solid fa-arrow-up-from-bracket fs-5 me-2"></i>
                                                    <div>
                                                        <strong>Save Changes</strong>
                                                    </div>
                                                </div>

                                                <div class="text-center">
                                                    <h4>Are you sure you want to save company information changes?</h4>
                                                </div> 

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary d-flex align-items-center" name="userInfoSaved"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                                                    <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                                                </div>
                                            </form>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>     
                </div>  

            </div>
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "change-password" || $_GET['view'] == "change-my-password") { ?>

            <div class="container">
                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-lock fa-fw fs-4 me-2"></i> Change&nbsp<span class="text-warning text-decoration-underline"><?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "change-my-password") { ?>My<?php } else { ?><?php echo $userFname ?? ""; ?> <?php echo $userLname ?? ""; ?><?php } ?></span>&nbspPassword</div>
                </div>

                <?php 
                    if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "change-my-password") {
                        $classSignIn->adminChangePass();
                    } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "change-password") {
                        $classConfiguration->adminChangePass();
                    }
                ?>
                

                <div class="card"> 
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-light bg-opacity-25 overflow-auto">
                            <form method="post" enctype="multipart/form-data">

                                <input type="hidden" name="userId" id="userId" value="<?php echo $userId ?? ""; ?>">
                                <input type="hidden" name="newUserUniqueId" id="newUserUniqueId" value="<?php echo $userUniqueId ?? ""; ?>">
                                <input type="hidden" name="changePassUserUID" id="changePassUserUID" value="<?php echo $userHUserId ?? ""; ?>">
                                <input type="hidden" name="changePassFullName" id="changePassFullName" value="<?php echo $userFname . " " . $userLname  ?? ""; ?>">
                                <input type="hidden" name="adminCPass" id="adminCPass" value="<?php echo $userPassword ?? ""; ?>">

                                <div class="row">

                                    <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "change-my-password") { ?>
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <div class="col-8 col-lg-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-lock fa-fw fs-4"></i></span>
                                                    <div class="form-floating">
                                                        <input type="password" class="form-control" id="adminCurrentPass" name="adminCurrentPass" placeholder="Current Password">
                                                        <label for="adminCurrentPass">Current Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="col-md-12 d-flex justify-content-center">
                                        <div class="col-8 col-lg-6">
                                            <div class="input-group mb-3">       
                                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-lock fa-fw fs-4"></i></span>
                                                <div class="form-floating">
                                                    <input type="password" class="form-control" id="adminNewPass" name="adminNewPass" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                                    <label for="adminNewPass">New Password</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 d-flex justify-content-center">
                                        <div class="col-8 col-lg-6">
                                            <div class="input-group mb-3">       
                                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-lock fa-fw fs-4"></i></span>
                                                <div class="form-floating">
                                                    <input type="password" class="form-control" id="adminCNewPass" name="adminCNewPass" placeholder="Confirm New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                                    <label for="adminCNewPass">Confirm New Password</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                </div>
                                
                                <div class="row d-flex justify-content-center mb-3 mt-3">
                                    <div class="col-md-3">
                                        <button class="w-100 btn btn-primary d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#adminCP" title="Confirm"><i class="fa-solid fa-check fs-5 me-2"></i><strong>Confirm</strong></button>
                                    </div>
                                </div>

                                <div class="modal fade" id="adminCP" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border border-primary border-4">
                                            <div class="modal-body">
                                                <div class="alert alert-primary d-flex align-items-center">
                                                    <i class="fa-solid fa-arrow-up-from-bracket fs-5 me-2"></i>
                                                    <div>
                                                        <strong>Save New Password</strong>
                                                    </div>
                                                </div>

                                                <div class="text-center">
                                                    <h4>Are you sure you want to save <span class="text-primary"><?php echo $userFname ?? ""; ?> <?php echo $userLname ?? ""; ?></span> new password?</h4>
                                                </div> 

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary d-flex align-items-center" name="adminChangePass"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
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
            </div>
            
        <?php } else { 
            echo "<script>
                window.location.assign('index.php?route=404');
            </script>";
        } ?>
        
        
    </main>

    <?php include_once('assets/components/footer.php'); ?>
    
    <script>
        //TODO Javascript for Image Previewer
        function previewImageUAdmin(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var previewUAdmin = document.getElementById("photo-previewer-uadmin");
                previewUAdmin.src = src;
                previewUAdmin.style.display = "block";
            }
        }
        //TODO End of Javascript for Image Previewer
    </script>
</body>
</html>