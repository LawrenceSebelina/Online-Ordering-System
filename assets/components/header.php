<?php 
    include_once('classes/dbhClass.php'); 
    include_once('classes/configurationClass.php'); 
    $datas = $classConfiguration->getCompanyInfo();

    if (!empty($datas)) {
        foreach ($datas as $data) {
            $companyInfoId = $data['companyInfoId'];
            $companyName = $data['companyName'];
            $companyNameAlt = $data['companyNameAlt'];
            $companyAddress = $data['companyAddress'];
            $companyTelephone = $data['companyTelephone'];
            $companyFax = $data['companyFax'];
            $companyEmail = $data['companyEmail'];
            $companyBusiness = $data['companyBusiness'];
            $companyResArea = $data['companyResArea'];
            $companyFounded = $data['companyFounded'];
            $companyOwner = $data['companyOwner'];
            $companyFilStaff = $data['companyFilStaff'];
            $companyJpnStaff = $data['companyJpnStaff'];
            $companyLogo = $data['companyLogo'];
            $companyLogoAlt = $data['companyLogoAlt'];
        }
    }
?>

<?php 
    if (!isset($_GET['route']) && empty($_GET['route'])) {
        echo "<script>
            window.location.assign('index.php?route=home');
        </script>";
    } elseif (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "sitemap" || $_GET['route'] == "faqs" || $_GET['route'] == "contacts" || $_GET['route'] == "about" || $_GET['route'] == "signin" || $_GET['route'] == "signup" || $_GET['route'] == "verify") { 
?>

<?php 
    include_once('classes/dbhClass.php');
    include_once('classes/signinClass.php');
    $userdetails = $classSignIn->getUserDetails();
?>

<header>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fs-4" href="index.php?route=home"><img src="<?php echo $companyLogo ?? ""; ?>" alt="" height="50"></a>
            <span class="text-light company-name"><?php echo $companyName ?? ""; ?></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (!empty($userdetails)) {  ?>
                        <span class="text-light fs-5">| <?php echo $companyName ?? ""; ?></span>
                    <?php } else { ?>
                        <span class="text-light fs-5 d-none d-lg-none d-xl-block">| <?php echo $companyName ?? ""; ?></span>
                    <?php } ?>
                </div>
                <ul class="nav nav-pills mb-2 mb-lg-0">
                    <li class="nav-item"><a href="index.php?route=home" class="nav-link" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="index.php?route=about" class="nav-link nav-about">About</a></li>
                    <li class="nav-item"><a href="index.php?route=contacts" class="nav-link nav-contacts">Contacts</a></li>
                    <li class="nav-item"><a href="index.php?route=faqs" class="nav-link nav-faqs">FAQs</a></li>
                    <li class="nav-item"><a href="index.php?route=sitemap" class="nav-link nav-sitemap">Site Map</a></li>

                    <?php if (empty($userdetails)) { ?>
                        <div class="border-end border-2 border-light px-1 pe-1"></div>
                        <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "signin") { ?>
                            <li class="nav-item d-flex align-items-center"><a href="index.php?route=signup" class="btn btn-warning w-100">Sign Up</a></li>
                        <?php } elseif (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "signup") { ?>
                            <li class="nav-item d-flex align-items-center"><a href="index.php?route=signin" class="btn btn-outline-light w-100">Sign In</a></li>
                        <?php } else { ?>
                            <li class="nav-item d-flex align-items-center"><a href="index.php?route=signup" class="btn btn-warning w-100">Sign Up</a></li>
                            <li class="nav-item d-flex align-items-center"><a href="index.php?route=signin" class="btn btn-outline-light w-100">Sign In</a></li>
                        <?php } ?>
                    <?php } ?>
                
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php } else { ?>
    <?php 
    // require_once('mainFunctions.php');
    // include_once('functionClasses.php');
    // $users = $class->getUsers();
    // $userdetails = $class->getUserDetails();
    include_once('classes/dbhClass.php');
    include_once('classes/signinClass.php');
    $userdetails = $classSignIn->getUserDetails();
    include_once('classes/inventoryClass.php');
    $datas = $classInventory->getCategories();
   
    if (!empty($userdetails)) {
        if ($userdetails['userType'] == 'Admin') {
            header('location: signout.php');
        }
    }
?>

<header>
    <nav class="navbar navbar-expand-lg fixed-top">
    <input type="hidden" value="<?php echo $userdetails['userId'] ?? ""; ?>" id="userIdentification">
    <input type="hidden" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>" id="userUniqueIdentification">
    <input type="hidden" id="userStatus" value="">
        <div class="container d-flex flex-wrap">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex justify-content-end d-lg-none">
                <img src="<?php echo $companyLogoAlt ?? ""; ?>" alt="" height="40"></a>
            </div>
            <div class="collapse navbar-collapse mt-2" id="navbarSupportedContent">
                <ul class="nav me-auto nav-pills mb-2 mb-lg-0">
                    <li class="nav-item"><a href="index.php?route=home" class="nav-link nav-home">Home</a></li> <!-- aria-current="route" --->
                    <li class="nav-item"><a href="index.php?route=about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="index.php?route=contacts" class="nav-link">Contacts</a></li>
                    <li class="nav-item"><a href="index.php?route=faqs" class="nav-link">FAQs</a></li>
                    <li class="nav-item"><a href="index.php?route=sitemap" class="nav-link nav-sitemap">Site Map</a></li>

                    <li class="nav-item dropdown dropdown-hover position-static">
                        <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories <!-- nav-category&cid=<?php echo $_GET['cid'] ?> -->
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu w-auto mt-0" aria-labelledby="categoryDropdown" style="border-top-left-radius: 0; border-top-right-radius: 0; max-height: 25rem; overflow-y: auto;">

                            <div class="container">
                                <div class="row"> <!-- my-4 -->
                                
                                    <div class="col-md-auto col-lg-auto mb-3 mb-lg-0">
                                        <div class="list-group list-group-flush">
                                            <!-- <p class="mb-0 list-group-item text-uppercase bg-custom-green text-light font-weight-bold">Categories</p> -->

                                        <?php if (!empty($datas)) { ?>
                                        <?php foreach ($datas as $data) { ?>
                                            <a href="index.php?route=category&cid=<?php echo $data['categoryUniqueId']; ?>&cn=<?php echo $data['categoryName']; ?>" class="list-group-item list-group-item-action d-flex align-items-center"><i class="fa-solid fa-caret-right me-2 text-success"></i><?php echo $data['categoryName']; ?></a> <!-- &#9679;  -->
                                        <?php } ?>
                                        <?php } else {?>
                                            <p>No Categories</p>
                                        <?php } ?>

                                        </div>
                                    </div> 
                                
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <ul class="nav nav-pills mb-2 mb-lg-0">
                    <?php if (!empty($userdetails)) { ?>
                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center col-lg-auto mb-3 mb-lg-0 me-4">
                            <li class="dropdown dropdown-hover">
                                <a class="text-decoration-none position-relative" href="index.php?route=user&view=my-notifications" id="notificationsDropdown" role="button"
                                    aria-expanded="false"> <!-- data-bs-toggle="dropdown" -->
                                    <i class="fa-solid fa-bell fs-4 text-light d-flex align-items-center"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger count-notification">
                                    
                                    </span>
                                </a>
                    
                                <div class="d-none d-lg-block">
                                    <div class="dropdown-menu mt-0 end-0" aria-labelledby="notificationsDropdown"> <!-- w-auto -->

                                        <div class="container" style="border-top-left-radius: 0; border-top-right-radius: 0; width: 25rem; max-height: 25rem; overflow-y: auto;">
                                            <div class="row">
                                            
                                                <div class="col-md-auto col-lg-auto mb-3 mb-lg-0 w-100">
                                                    <div class="list-group list-group-flush">
                                                        <span class="text-start text-secondary fw-bold recent-notifications">Recently Received Notifications</span>

                                                        <table id="userNotificationTable" class="table table-borderless" style="width:100%">
                                                            <tbody class="notifications text-light">       
                                                                
                                                            </tbody>
                                                        </table>

                                                        
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="px-3 pe-3">
                                            <div class="text-light mt-1">
                                                <a class="btn btn-primary btn-sm w-100 view-notifications-btn" href="index.php?route=user&view=my-notifications" role="button">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                    <?php } ?>

                    <div class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if (!empty($userdetails)) { ?>
                            <div class="flex-shrink-0 dropdown">
                                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-light me-2 fw-bold text-decoration-underline"><?php echo $userdetails['firstName'] ?? ""; ?> <?php echo $userdetails['lastName'] ?? ""; ?></span>
                                    <img src="<?php echo $userdetails['userProfileImg'] ?? "";  ?>" alt="mdo" width="32" height="32" class="rounded-circle">
                                </a>
                                <ul class="dropdown-menu text-small shadow">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center text-start" href="index.php?route=user&view=profile"><i class="fa-solid fa-user fa-fw me-2"></i>My Account</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="index.php?route=user&view=my-orders"><i class="fa-solid fa-box fa-fw me-2"></i>My Orders</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="index.php?route=user&view=my-services-reqs"><i class="fa-solid fa-screwdriver-wrench fa-fw me-2"></i>My Service Reqs</a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="index.php?route=signout"><i class="fa-solid fa-arrow-right-from-bracket fa-fw me-2"></i>Sign out</a>
                                    </li>
                                </ul>
                            </div>           
                        <?php } else { ?>
                            <li class="nav-item d-flex align-items-center"><a href="index.php?route=signin" class="btn btn-outline-light w-100">Sign In</a></li>
                            <li class="nav-item d-flex align-items-center"><a href="index.php?route=signup" class="btn btn-warning w-100">Sign Up</a></li>
                        <?php } ?>
                    </div>
                </ul>
            </div>
            
            <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "checkout"){ ?>
                
                <div class="container d-flex align-items-center justify-content-center mt-3">
                    <a href="#" class="d-flex mb-3 mb-lg-0 text-dark text-decoration-none me-md-auto d-none d-lg-block">
                        <img src="<?php echo $companyLogoAlt ?? ""; ?>" alt="" height="40"></a>
                        <!-- <span class="fs-4 text-light">Double header</span> -->
                    </a>
                    <div class="card-header d-flex col-12 col-lg-auto mb-3 mb-lg-0 fw-bold fs-4 me-md-auto text-warning">
                        Checkout
                    </div>
                </div>
            
            <?php } else { ?>

                <div class="container d-flex align-items-center justify-content-center mt-3">
                    <a href="index.php?route=home" class="d-flex mb-3 mb-lg-0 text-dark text-decoration-none me-md-auto d-none d-lg-block">
                        <img src="<?php echo $companyLogoAlt ?? ""; ?>" alt="" height="40"></a>
                        <!-- <span class="fs-4 text-light">Double header</span> -->
                    </a>

                    <form method="get" action="" class="d-flex col-12 col-lg-auto mb-3 mb-lg-0 w-75 me-md-auto" role="search">
                        <input class="form-control me-2" type="hidden" name="route" value="search">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="<?php echo $_GET['search'] ?? ""?>">
                        <button class="btn btn-outline-success me-2" type="submit">Search</button>
                    </form>
                    
                    <!-- flex-shrink-0 dropdown col-lg-auto mb-3 mb-lg-0 -->
                    <!-- <div class="flex-shrink-0 dropdown col-lg-auto mb-3 mb-lg-0">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-light">Lawrence Sebelina</span>
                            <img src="" alt="" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div> -->
                    <?php if (!empty($userdetails)) { ?>
                        <div class="flex-shrink-0 d-flex align-items-center col-lg-auto mb-3 mb-lg-0">
                            <ul class="nav nav-pills">
                                <li class="dropdown dropdown-hover">
                                    
                                    <a class="text-decoration-none position-relative" href="index.php?route=cart" id="cartDropdown" role="button"
                                        aria-expanded="false">
                                        <i class="fa-solid fa-cart-shopping fs-4 text-light d-flex align-items-center"></i>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger count-items">
                                        
                                        </span>
                                    </a>
                        
                                    <div class="d-none d-lg-block">
                                        <div class="dropdown-menu mt-0 end-0" aria-labelledby="cartDropdown">

                                            <div class="container" style="border-top-left-radius: 0; border-top-right-radius: 0; width: 20rem; max-height: 28rem; overflow-y: auto;"> <!-- overflow-y: auto; -->
                                                <div class="row">
                                                
                                                    <div class="col-md-auto col-lg-auto mb-3 mb-lg-0 w-100">
                                                        <span class="text-start text-secondary fw-bold recent-items">Recently Added Items</span>

                                                        <table id="cartNotificationTable" class="table table-borderless" style="width:100%">
                                                            <!-- <thead>
                                                                <tr>
                                                                    <th>Description</th>
                                                                    <th>Unit Price</th>
                                                                    <th>Quantity</th>
                                                                </tr>
                                                            </thead> -->
                                                            <tbody class="cart-items text-light">       
                                                                
                                                            </tbody>
                                                        </table>

                                                        <!-- <div class="list-group list-group-flush cart-items">
                                                        

                                                        </div> -->
                                                    
                                                    
                                                    </div> 
                                                
                                                </div>
                                            </div>
                                            <div class="px-3 pe-3 pb-1">
                                                <div class="clearfix text-light mt-1">
                                                    <span class="float-start text-primary fw-bold total-items mt-"></span>
                                                    <a class="btn btn-primary btn-sm float-end view-cart-btn" href="index.php?route=cart" role="button">View My Cart</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                            
                        </div>
                    <?php } ?>
                </div>

            <?php } ?>
            
            
        </div>
    </nav>
</header>

<?php } ?>



