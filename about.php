<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>About</title>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once('assets/components/header.php'); ?>

    <main class="form-about flex-shrink-0 bg-light bg-opacity-75 mb-3">
        <div class="container">
            <div class="card shadow pe-5 px-5 pb-3 pt-3 bg-light bg-opacity-75">
                <h3 class="mb-3 fw-bold">About Us</h1>
                <div class="row">
                    <div class="col-md-5 d-flex align-items-center">
                        <img class="mb-4 img-fluid" src="<?php echo $companyLogoAlt ?? ""; ?>" alt="">
                    </div>
                    <div class="col-md-7">
                        <h3 class="text-decoration-underline mb-4">Company Profile</h3>
                        <div class="mb-2">
                            <strong>Company Name: </strong><span><?php echo $companyNameAlt ?? ""; ?></span>
                        </div>

                        <div class="mb-2">
                            <strong>President: </strong><span><?php echo $companyOwner ?? ""; ?></span>
                        </div>

                        <div class="mb-2">
                            <strong>Founded: </strong><span><?php echo $companyFounded ?? ""; ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <strong>Filipino Staff: </strong><span><?php echo $companyFilStaff ?? ""; ?> Person</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <strong>Japanese Staff: </strong><span><?php echo $companyJpnStaff ?? ""; ?> Person (<?php echo $companyOwner ?? ""; ?>)</span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-2">
                            <strong>Company Address: </strong><span><?php echo $companyAddress ?? ""; ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <strong>Company Contacts: </strong><span><?php echo $companyTelephone ?? ""; ?> & <?php echo $companyFax ?? ""; ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <strong>Company Email: </strong><span><?php echo $companyEmail ?? ""; ?></span>
                        </div>
                    </div>      

                    <div class="col-md-12">
                        <div class="mb-2">
                            <strong>Business: </strong><span><?php echo $companyBusiness ?? ""; ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <strong>Resposible Area: </strong><span><?php echo $companyResArea ?? ""; ?></span>
                        </div>
                    </div>
                </div>
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