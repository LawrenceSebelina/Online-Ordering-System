<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Contact Us</title>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once('assets/components/header.php'); ?>
    <?php include_once('classes/configurationClass.php'); ?>

    <main class="form-contacts flex-shrink-0 bg-light bg-opacity-75 mb-3">
        <div class="container">
            <div class="card shadow pe-5 px-5 pb-3 pt-3 bg-light bg-opacity-75">
                <h3 class="mb-3 fw-bold">Contact Us</h1>
                <?php $classConfiguration->submitContactUs(); ?>
                <form method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required>
                                    <label for="firstName">First Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">       
                                <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required>
                                    <label for="lastName">Last Name</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">       
                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-square-envelope fa-fw fs-4"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="(e.g. example@email.com)" required>
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">       
                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="contactNo" id="contactNo" placeholder="Contact No." pattern="[0-9-_.()]+" title="Must contain numbers and symbols (e.g. -_.())" required>
                            <label for="contactNo">Contact No.</label>
                        </div>
                    </div>  

                    <div class="input-group mb-3">       
                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-circle-question fa-fw fs-4"></i></span>
                        <div class="form-floating">
                            <textarea name="inquiry" id="inquiry" class="form-control" placeholder="Inquiry" style="height: 7rem;" required></textarea>
                            <label>Inquiry</label>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center mb-3 mt-4">
                        <div class="col-md-6">
                            <button class="w-100 btn btn-lg btn-primary d-flex align-items-center justify-content-center" type="submit" name="submitContactUs"><i class="fa-solid fa-paper-plane fs-4 me-2"></i><strong>Submit</strong></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>
    
    <?php include_once('assets/components/footer.php'); ?>
    
</body>
</html>


<!-- RewriteEngine on
RewriteCond %{THE_REQUEST} /([^.]+)\.php [NC]
RewriteRule ^ /%1 [NC,L,R]
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^ %{REQUEST_URI}.php [NC,L] -->

