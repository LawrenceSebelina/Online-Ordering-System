<?php 
    // require_once('mainFunctions.php');
    // include_once('functionClasses.php');
    // $users = $class->getUsers();
    // $userdetails = $class->getUserDetails();
    include_once('../classes/dbhClass.php');
    include_once('../classes/signinClass.php');
    $userdetails = $classSignIn->getUserDetails();

    if (!isset($_SESSION['userdetails'])) {
        header('location: ../index.php?route=signin');
    } elseif ($userdetails['userType'] == 'User') {
        header('location: ../index.php');
    }

    include_once('../classes/configurationClass.php'); 
    $datas = $classConfiguration->getCompanyInfo();

    if (!empty($datas)) {
        foreach ($datas as $data) {
            $companyName = $data['companyName'];
            $companyNameAlt = $data['companyNameAlt'];
            $companyLogo = $data['companyLogo'];
            $companyLogoAlt = $data['companyLogoAlt'];
        }
    }
?>

<header class="sidenav-header" id="sidenav-header">
    <input type="hidden" value="<?php echo $userdetails['userId'] ?? ""; ?>" id="userIdentification">
    <input type="hidden" value="" id="userStatus">
    <div class="sidenav-toggle"> 
        <i class="fa-solid fa-bars fa-sm" id="sidenav-toggle-icon"></i>
    </div>
    <div class="sidenav-title">
        <p>
            <?php echo $companyName ?? ""; ?>
        </p>
    </div>
    <div class="sidenav-logo"> 
        <div class="flex-shrink-0 dropdown">
            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="text-light me-2 fw-bold text-decoration-underline"><?php echo $userdetails['firstName'] ?? ""; ?> <?php echo $userdetails['lastName'] ?? "";  ?></span>
                <img src="<?php echo "../" . $userdetails['userProfileImg'] ?? "";  ?>" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small shadow">
                <li>
                    <a class="dropdown-item d-flex align-items-center text-start" href="index.php?route=account&view=my-info&uid=<?php echo $userdetails['userUniqueId']; ?>&un=<?php echo $userdetails['firstName'] ." ". $userdetails['lastName']; ?>"><i class="fa-solid fa-user fa-fw me-2"></i>My Account</a>
                </li>

                <?php if ($userdetails['userType'] == "Head Admin") { ?>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="index.php?route=inventory"><i class="fa-solid fa-warehouse fa-fw me-2"></i>Inventory</a>
                    </li>
                <?php } ?>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="index.php?route=orders"><i class="fa-solid fa-box fa-fw me-2"></i>Orders</a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="index.php?route=services"><i class="fa-solid fa-screwdriver-wrench fa-fw me-2"></i>Services</a>
                </li>

                <?php if ($userdetails['userType'] == "Head Admin") { ?>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="index.php?route=configuration"><i class="fa-solid fa-gear fa-fw me-2"></i>Configuration</a>
                    </li>
                <?php } ?>

                <?php if ($userdetails['userType'] == "Head Admin") { ?>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="index.php?route=reports"><i class="fa-solid fa-folder-open fa-fw me-2"></i>Reports</a>
                    </li>
                <?php } ?>

                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="../signout.php"><i class="fa-solid fa-arrow-right-from-bracket fa-fw me-2"></i>Sign out</a>
                </li>
            </ul>
        </div>
    </div>  
</header>
