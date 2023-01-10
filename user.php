<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Home</title>
</head>
<body class="d-flex flex-column h-100">
    <?php
        include_once('assets/components/header.php'); 
        include_once('classes/inventoryClass.php');
        include_once('classes/ordersClass.php');
        include_once('classes/servicesClass.php');
    ?>

        <?php $datas = $classInventory->getProducts(); ?>
    
        <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
            
            <div class="row g-2">
                <div class="col-md-2 d-flex justify-content-start p-0">
                    <div class="flex-shrink-0 p-3 bg-custom-green" style="width: 200px;">
                        <a href="index.php?route=user&view=profile" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                            <span class="fs-5 fw-semibold text-light">
                                <img src="<?php echo $userdetails['userProfileImg'] ?? ""; ?>" alt="mdo" width="32" height="32" class="rounded-circle me-2">
                                <span class="text-light fs-6 fw-bold text-decoration-underline"><?php echo $userdetails['firstName'] ?? ""; ?> <?php echo $userdetails['lastName'] ?? ""; ?></span>
                            </span>
                        </a>
                        <ul class="list-unstyled ps-0">
                            <li class="mb-1">
                                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 text-light collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                My Account
                                </button>
                                <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li class="nav-element"><a href="index.php?route=user&view=profile" class="d-inline-flex text-decoration-none rounded nav-profile">My Profile</a></li>
                                        <li class="nav-element"><a href="index.php?route=user&view=company-profile" class="d-inline-flex text-decoration-none rounded nav-company-profile">Company Profile</a></li>
                                        <li class="nav-element"><a href="index.php?route=user&view=password" class="d-inline-flex text-decoration-none rounded nav-password">Change Password</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-1">
                                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 text-light collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                                Orders
                                </button>
                                <div class="collapse show" id="orders-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li class="nav-element"><a href="index.php?route=user&view=my-orders" class="d-inline-flex text-decoration-none rounded nav-my-orders">My Orders</a></li>
                                        <li class="nav-element"><a href="index.php?route=user&view=my-services-reqs" class="d-inline-flex text-decoration-none rounded nav-my-services-reqs">My Service Reqs</a></li>
                                        <!-- <li class="nav-element"><a href="#" class="d-inline-flex text-decoration-none rounded">Shipped</a></li>
                                        <li class="nav-element"><a href="#" class="d-inline-flex text-decoration-none rounded">Returned</a></li> -->
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-element mb-1">
                                <a href="index.php?route=user&view=my-notifications" class="btn btn-toggle d-inline-flex align-items-center text-decoration-none rounded border-0 nav-my-notifications">Notifications</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12 col-xl-10 p-0">

                    <?php include_once('userContent.php'); ?>

                </div>
            </div>
            
        </main>


    <?php include_once('assets/components/footer.php'); ?>

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

        function previewPaymentProof(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var previewPaymentProof = document.getElementById("photo-previewer-proof");
                previewPaymentProof.src = src;
                previewPaymentProof.style.display = "block";
            }
        }
        //TODO End of Javascript for Image Previewer
    </script>
</body>
</html>