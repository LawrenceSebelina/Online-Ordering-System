<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <?php 
        include_once ('PHPMailer/src/Exception.php');
        include_once ('PHPMailer/src/PHPMailer.php');
        include_once ('PHPMailer/src/SMTP.php');
    ?>
    <title>Sign Up</title>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once('classes/dbhClass.php'); ?>
    <?php include_once('classes/signupClass.php'); ?>
    <?php include_once('assets/components/header.php'); ?>

    <?php $classSignUp->signUp(); ?>

    <main class="form-signup flex-shrink-0 bg-light bg-opacity-50 mb-3">
        <div class="container">
            <div class="card shadow pe-5 px-5 pb-3 pt-4 bg-light bg-opacity-75">
                <form method="post" enctype="multipart/form-data">
                
                    <h2 class="mb-5 fw-bold">Sign up</h1>

                    <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])) { ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fa-solid fa-circle-check fs-5 me-2"></i>
                            <span>
                                <?php 
                                    echo $_SESSION['success']; 
                                    unset($_SESSION['success']);
                                    unset($_SESSION['userdetails']);
                                ?>
                            </span>
                        </div>
                    <?php } elseif (isset($_SESSION['error']) && !empty($_SESSION['error'])) {?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fa-solid fa-circle-xmark fs-5 fs-4 me-2"></i>
                            <span>
                                <?php 
                                    echo $_SESSION['error']; 
                                    unset($_SESSION['error']);
                                ?>
                            </span>
                        </div>
                    <?php } ?>

                    

                    <div class="row row-cols-1 g-3">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center">
                                <p class="text-center bg-success bg-opacity-25 fw-bold fs-4 p-0 pe-2 px-2 w-auto">Profile Picture</p>
                            </div>
                            <div class="upload-photo">
                                <div class="preview-photo-user">
                                    <div class="preview">
                                        <img src="uploads/user-default-img.jpg" id="photo-previewer-user" class="img-fluid">
                                        <input type="file" id="file-preview-user" accept="image/*" name="imageUser" onchange="previewImageUser(event);">
                                        <input type="hidden" value="uploads/user-default-img.jpg" name="default-photo">
                                        <label for="file-preview-user">Upload Photo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-6">

                            <div class="d-flex justify-content-center">
                                <p class="text-center bg-success bg-opacity-25 fw-bold fs-4 p-0 pe-2 px-2 w-auto">Company ID</p>
                            </div>
                            <div class="upload-photo">
                                <div class="preview-photo-company">
                                    <div class="preview">
                                        <img src="uploads/company-default-img.jpg" id="photo-previewer-company" class="img-fluid">
                                        <input type="file" id="file-preview-company" accept="image/*" name="imageCompany" onchange="previewImageCompany(event);">
                                        <label for="file-preview-company">Upload Photo</label>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        
                        <div class="col-md-12">
                            <p class="text-center bg-success bg-opacity-25 fw-bold fs-4 p-0 pe-2 px-2">Personal Details</p>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $_SESSION['userdetails']['firstName'] ?? ""; ?>" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required>
                                    <label for="firstName">First Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $_SESSION['userdetails']['lastName'] ?? ""; ?>" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required>
                                    <label for="lastName">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-calendar-plus fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo $_SESSION['userdetails']['age'] ?? ""; ?>" pattern="[0-9]+" title="Must contain numbers" required>
                                    <label for="age">Age</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="input-group">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-calendar-days fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="date" class="form-control" max="<?= date('Y-m-d'); ?>" id="birthday" name="birthday" placeholder="Birthday" value="<?php echo $_SESSION['userdetails']['birthday'] ?? ""; ?>" required>
                                    <label for="birthday">Birthday</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-person-half-dress fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <select class="form-select" style="height: 3.6rem;" aria-label=".form-select-lg example" id="gender" name="gender" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label for="gender">Sex</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-house fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $_SESSION['userdetails']['address'] ?? ""; ?>" pattern="[a-zA-Z0-9-_.,()ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.,())" required>
                                    <label for="address">Address</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="input-group">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="contactNo" name="contactNo" placeholder="Contact No." value="<?php echo $_SESSION['userdetails']['contactNo'] ?? ""; ?>" pattern="[0-9-_.()]+" title="Must contain numbers and symbols (e.g. -_.())" required>
                                    <label for="contactNo">Contact No.</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="input-group">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-square-envelope fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"  placeholder="Email" value="<?php echo $_SESSION['userdetails']['email'] ?? ""; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="(e.g. example@email.com)" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-id-badge fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $_SESSION['userdetails']['username'] ?? ""; ?>" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)" required>
                                    <label for="username">Username</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-lock fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    <label for="password">Password</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-lock fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    <label for="cpassword">Confirm Password</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <p class="text-center bg-success bg-opacity-25 fw-bold fs-4 p-0 pe-2 px-2">Company Details</p>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group ">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="userCompanyName" name="userCompanyName" placeholder="Company Name" value="<?php echo $_SESSION['userdetails']['userCompanyName'] ?? ""; ?>" pattern="[a-zA-Z0-9-_.,()ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.,())" required>
                                    <label for="userCompanyName">Company Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group ">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="userCompanyAddress" name="userCompanyAddress"  placeholder="Company Address" value="<?php echo $_SESSION['userdetails']['userCompanyAddress'] ?? ""; ?>" pattern="[a-zA-Z0-9-_.,()ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.,())" required>
                                    <label for="userCompanyAddress">Company Address</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group ">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-id-badge fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="userCompanyPos" name="userCompanyPos"  placeholder="Company Position" value="<?php echo $_SESSION['userdetails']['userCompanyPos'] ?? ""; ?>" pattern="[a-zA-Z0-9-_.,()ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.,())" required>
                                    <label for="userCompanyPos">Company Position</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="input-group ">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="userCompanyContact" name="userCompanyContact"  placeholder="Company Contact No." value="<?php echo $_SESSION['userdetails']['userCompanyContact'] ?? ""; ?>" pattern="[0-9-_.()]+" title="Must contain numbers and symbols (e.g. -_.())" required>
                                    <label for="userCompanyContact">Company Contact No.</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="input-group ">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-square-envelope fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="userCompanyEmail" name="userCompanyEmail"  placeholder="Company Email" value="<?php echo $_SESSION['userdetails']['userCompanyEmail'] ?? ""; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="(e.g. example@email.com)" required>
                                    <label for="userCompanyEmail">Company Email</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center mb-3 mt-3">
                        <div class="col-md-6">
                            <button class="w-100 btn btn-lg btn-primary d-flex align-items-center justify-content-center" type="submit" name="signUp"><i class="fa-solid fa-arrow-up-from-bracket fs-4 me-2"></i><strong>Sign up</strong></button>
                        </div>
                    </div>
                    

                    <div class="checkbox text-center">
                        <label>
                            Already have an account? <a href="index.php?route=signin">Sign in here!</a>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include_once('assets/components/footer.php');?>

<script>
    //TODO Javascript for Image Previewer
    function previewImageUser(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var previewImageUser = document.getElementById("photo-previewer-user");
            previewImageUser.src = src;
            previewImageUser.style.display = "block";
        }
    }

    
    function previewImageCompany(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var previewImageCompany = document.getElementById("photo-previewer-company");
            previewImageCompany.src = src;
            previewImageCompany.style.display = "block";
        }
    }
    //TODO End of Javascript for Image Previewer
</script>
</body>
</html>